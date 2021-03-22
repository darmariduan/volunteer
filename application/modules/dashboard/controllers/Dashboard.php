<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Dashboard extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();
        $this->load->library('form_validation');
        $this->load->library('datatables');
        $this->load->model('Dashboard_model');
        $this->load->model('komunitas/GetKomunitas_model');
        $this->load->model('login/Login_model');
        set_zone();

        if ($this->session->userdata('aktif') != true) {
            $this->session->set_flashdata('message', '<div class="alert alert-danger" role="alert">Harap login untuk melanjutkan</div>');
            redirect('login');
        }
    }

    public function index()
    {
        $data	= [
            'titles'	=> "Dashboard User",
            'komunitas'	=> $this->GetKomunitas_model->getKomunitas(),
            'alluser'	=> $this->Dashboard_model->allUser(),
            'usersl'	=> $this->Dashboard_model->view()->result_array(),
            'new'		=> $this->Dashboard_model->news(),
            'files'		=> $this->Dashboard_model->get_umum()->result(),
            'dashboard'	=> true,
            'breadcumb'	=> "Dashboard",
            'view'		=> "v_dashboard"
        ];
        $this->load->view("index", $data);
    }

    public function profile()
    {
        $data	= [
            'titles'		=> "Dashboard User",
            'komunitas'		=> $this->GetKomunitas_model->getKomunitas(),
            'usersl'		=> $this->Dashboard_model->view()->result_array(),
            'getProfile'	=> $this->Dashboard_model->getProfile()->result(),
            'profile'		=> true,
            'breadcumb'		=> "Profile",
            'view'			=> "v_profile"
        ];
        $this->load->view('index', $data);
    }

    public function update()
    {
        $id			= htmlspecialchars($this->input->post('id'));
        $nama		= htmlspecialchars($this->input->post('namkom'));
        $deskripsi	= htmlspecialchars($this->input->post('deskripsi'));
        $alamat		= htmlspecialchars($this->input->post('alamat'));
        $email		= htmlspecialchars($this->input->post('email'));
        $visi		= htmlspecialchars($this->input->post('visi'));
        $misi		= htmlspecialchars($this->input->post('misi'));
        $wasone		= htmlspecialchars($this->input->post('wasone'));
        $wastwo		= htmlspecialchars($this->input->post('wastwo'));
        $motto		= htmlspecialchars($this->input->post('motto'));

        // Insert to database
        $insert = $this->Dashboard_model->insert($id, $nama, $deskripsi, $alamat, $email, $visi, $misi, $wasone, $wastwo, $motto);
        if ($insert) {
            $this->session->set_flashdata('message', '<div class="alert alert-danger" role="alert">Error</div>');
            redirect('dashboard/profile');
        } else {
            $this->session->set_flashdata('message', '<div class="alert alert-success" role="alert">Congrulation your Profile has been updated</div>');
            redirect('dashboard/profile');
        }

        // $s = '<br>';
        // echo $nama . $s . $deskripsi . $s . $alamat . $s . $email . $s . $visi . $s . $misi . $s . $visi . $s . $wasone . $s . $watwo;
    }

    // **************
    // USERS
    // **************
    public function users()
    {
        $data	= [
            'titles'		=> "Dashboard User",
            'komunitas'		=> $this->GetKomunitas_model->getKomunitas(),
            'usersl'		=> $this->Dashboard_model->view()->result_array(),
            'role'			=> $this->Login_model->view()->result_array(),
            'user'			=> $this->Dashboard_model->getdata()->result(),
            'users'			=> true,
            'breadcumb'		=> "Users",
            'view'			=> "v_users"
        ];
        $this->load->view('index', $data);
    }

    public function userid($id = 0)
    {
        if ($id != 0) {
            $data = [
                'nama_admin'	=> htmlspecialchars($this->input->post('namaadmin')),
                'username' 		=> htmlspecialchars($this->input->post('username')),
                'level' 		=> htmlspecialchars($this->input->post('category')),
            ];
            if ($this->Dashboard_model->update_users($id, $data)) {
                $this->session->set_flashdata('message', '<div class="alert alert-success" role="alert">Data User Berhasil di Update <br>Username : ' . $data['username'] . '</div>');
            }
            redirect('dashboard/users');
        }
    }

    public function deleteUser($id)
    {
        if ($this->Dashboard_model->delete_user($id)) {
            $this->session->set_flashdata('message', '<div class="alert alert-success" role="alert">Congrulation your Users data has been deleted</div>');
        } else {
            $this->session->set_flashdata('message', '<div class="alert alert-danger" role="alert">Error To delete your Users data</div>');
        }
        redirect('dashboard/users');
    }

    // **************
    // ANNOUNCEMENT
    // **************
    public function announcement()
    {
        $data	= [
            'titles'		=> "Dashboard Administrator",
            'komunitas'		=> $this->GetKomunitas_model->getKomunitas(),
            'usersl'		=> $this->Dashboard_model->view()->result_array(),
            'announ'		=> $this->db->order_by('created_at', 'DESC')->get('announcement')->result(),
            'announcement'	=> true,
            'breadcumb'		=> "Announcement",
            'view'			=> "v_announcement"
        ];
        $this->load->view('index', $data);
    }

    public function addannouncement($id = 0)
    {
        if ($id != 0) {
            $data = [
                'keterangan' => ($this->input->post('deskripsi'))
            ];
            // echo json_encode($data, true);
            if ($this->Dashboard_model->update_announcement($id, $data)) {
                $this->session->set_flashdata('message', '<div class="alert alert-success" role="alert">Data Berita Berhasil di Update <br>Judul : ' . $data['judul'] . '</div>');
            };
            redirect('dashboard/announcement');
        } else {
            $input = [
                'keterangan' 	=> ($this->input->post('isi')),
                'created_at' 	=> date('Y:m:d H:i:s')
            ];
            if ($this->Dashboard_model->insert_announcent($input)) {
                $this->session->set_flashdata('message', '<div class="alert alert-success" role="alert">Data Berita Berhasil Ditambahkan</div>');
            }
            redirect('dashboard/announcement');
        }
    }

    public function deleteAnnouncement($id)
    {
        if ($this->Dashboard_model->delete_announcement($id)) {
            $this->session->set_flashdata('message', '<div class="alert alert-success" role="alert">Congrulation your news data has been deleted</div>');
        } else {
            $this->session->set_flashdata('message', '<div class="alert alert-danger" role="alert">Error To delete your news data</div>');
        }
        redirect('dashboard/announcement');
    }

    // **************
    // NEWS
    // **************
    public function news()
    {
        $data	= [
            'titles'		=> "Dashboard User",
            'komunitas'		=> $this->GetKomunitas_model->getKomunitas(),
            'usersl'		=> $this->Dashboard_model->view()->result_array(),
            'news'			=> true,
            'breadcumb'		=> "News",
            'berita' 		=> $this->db->order_by('created_at', 'DESC')->get('tbl_berita')->result(),
            'view'			=> "v_news"
        ];
        $this->load->view('index', $data);
    }

    public function berita($id = 0)
    {
        if ($id != 0) {
            $data = [
                'deskripsi' => htmlspecialchars(($this->input->post('deskripsi')))
            ];
            if ($this->Dashboard_model->update_berita($id, $data)) {
                $this->session->set_flashdata('message', '<div class="alert alert-success" role="alert">Data Berita Berhasil di Update <br>Judul : ' . $data['judul'] . '</div>');
            }
            redirect('dashboard/news');
        } elseif ($this->input->post()) {
            $foto 	  = $_FILES['image'];
            if ($foto = '') {
                $this->session->set_flashdata('message', 'Foto Tidak Ditemukan');
            } else {
                $config['upload_path'] 		= './frontend/assets/images/berita';
                $config['allowed_types'] 	= 'jpg|png|jpeg';
                $config['max_size'] 		= 2048;
                $config['file_name'] 		= 'berita-' . date('Y-m-d');

                $this->load->library('upload', $config);
                if (!$this->upload->do_upload('image')) {
                    $this->session->set_flashdata('message', '<div class="alert alert-danger" role="alert">Upload Foto Gagal, Pastikan file dibawah 2Mb dan Berformat jpg,png,img. </div>');
                } else {
                    $input = [
                        'judul'     	=> htmlspecialchars($this->input->post('judul')),
                        'image'     	=> htmlspecialchars($this->upload->data('file_name')),
                        'deskripsi' 	=> htmlspecialchars($this->input->post('deskripsi')),
                        'created_at' 	=> date('Y:m:d H:i:s')
                    ];
                    if ($this->Dashboard_model->insert_berita($input)) {
                        $this->session->set_flashdata('message', '<div class="alert alert-success" role="alert">Data Berita Berhasil Ditambahkan <br>Judul : ' . $input['judul'] . '</div>');
                    }
                }
            }
            redirect('dashboard/news');
        }
    }

    // Delete News
    public function deleteBerita($id, $foto)
    {
        if ($this->Dashboard_model->delete_berita($id)) {
            $this->session->set_flashdata('message', '<div class="alert alert-success" role="alert">Congrulation your news data has been deleted</div>');
            $targetFile = './frontend/assets/images/berita/' . $foto;

            unlink($targetFile);
        } else {
            $this->session->set_flashdata('message', '<div class="alert alert-danger" role="alert">Error To delete your news data</div>');
        }
        redirect('dashboard/news');
    }

    // **************
    // REPORT
    // **************
    public function report()
    {
        $data	= [
            'titles'		=> "Dashboard User",
            'komunitas'		=> $this->GetKomunitas_model->getKomunitas(),
            'usersl'		=> $this->Dashboard_model->view()->result_array(),
            'report'		=> true,
            'breadcumb'		=> "Report",
            'view'			=> "v_users"
        ];
        $this->load->view('index', $data);
    }

    // **************
    // SLIDER
    // **************

    public function slider()
    {
        $data	= [
            'titles'		=> "Dashboard Administrator",
            'komunitas'		=> $this->GetKomunitas_model->getKomunitas(),
            'usersl'		=> $this->Dashboard_model->view()->result_array(),
            'slide'			=> $this->db->order_by('id', 'DESC')->get('imgdashboard')->result(),
            'slider'		=> true,
            'breadcumb'		=> "Slider",
            'view'			=> "v_slider"
        ];
        $this->load->view('index', $data);
    }

    public function slideract($id = 0)
    {
        if ($id != 0) {
            $this->session->set_flashdata('message', '<div class="alert alert-success" role="alert">Data Berita Berhasil di Update </div>');
            redirect('dashboard/slider');
        } else {
            if ($this->input->post()) {
                echo ' kosong';
            } else {
                $foto 	  = $_FILES['image'];
                if ($foto = '') {
                    $this->session->set_flashdata('message', 'Foto Tidak Ditemukan');
                    redirect('dashboard/slider');
                } else {
                    $config['upload_path'] 		= './frontend/assets/images/dashboard';
                    $config['allowed_types'] 	= 'jpg|png|jpeg';
                    $config['max_size'] 		= 2048;
                    $config['file_name'] 		= 'dashboard-' . date('Y-m-d');

                    $this->load->library('upload', $config);
                    if (!$this->upload->do_upload('image')) {
                        $this->session->set_flashdata('message', '<div class="alert alert-danger" role="alert">Upload Foto Gagal, Pastikan file dibawah 2Mb dan Berformat jpg,png,img. </div>');
                        redirect('dashboard/slider');
                    } else {
                        $input = [
                            'image'     => $this->upload->data('file_name')
                        ];
                        if ($this->Dashboard_model->insert_slider($input)) {
                            $this->session->set_flashdata('message', '<div class="alert alert-success" role="alert">Data Slider Berhasil Ditambahkan <br></div>');
                            redirect('dashboard/slider');
                        }
                    }
                }
            }
        }
    }

    public function deleteSlider($id)
    {
        if ($this->Dashboard_model->delete_slider($id)) {
            $this->session->set_flashdata('message', '<div class="alert alert-success" role="alert">Congrulation your news data has been deleted</div>');
            $targetFile = './frontend/assets/images/dashboard/' . $foto;

            unlink($targetFile);
        } else {
            $this->session->set_flashdata('message', '<div class="alert alert-danger" role="alert">Error To delete your news data</div>');
        }
        redirect('dashboard/slider');
    }

    // **************
    // MENU
    // **************
    public function menu()
    {
        $data	= [
            'titles'		=> "Dashboard Administrator",
            'komunitas'		=> $this->GetKomunitas_model->getKomunitas(),
            'usersl'		=> $this->Dashboard_model->view()->result_array(),
            'slide'			=> $this->db->order_by('id', 'DESC')->get('imgdashboard')->result(),
            'menu'			=> $this->GetKomunitas_model->getmenu()->result(),
            'men'			=> true,
            'breadcumb'		=> "Menu",
            'view'			=> "v_menu"
        ];
        $this->load->view('index', $data);
    }

    public function addMenu()
    {
        $input = [
            'menu'		=> htmlspecialchars($this->input->post('menu')),
            'isi_menu'	=> htmlspecialchars($this->input->post('content'))
        ];

        if ($this->Dashboard_model->insert_menu($input)) {
            $this->session->set_flashdata('message', '<div class="alert alert-success" role="alert">Menu has been created</div>');
        } else {
            $this->session->set_flashdata('message', '<div class="alert alert-danger" role="alert">Something Error !!!</div>');
        }
        redirect('dashboard/menu');
    }

    public function menuupdate($id)
    {
        $input = [
            'menu'		=> htmlspecialchars($this->input->post('nama_menu')),
            'isi_menu'	=> htmlspecialchars($this->input->post('content'))
        ];

        if ($this->Dashboard_model->update_menu($id, $input)) {
            $this->session->set_flashdata('message', '<div class="alert alert-success" role="alert">Pesan berhasil di kirim ke Administrator</div>');
            redirect('dashboard/menu');
        } else {
            $this->session->set_flashdata('message', '<div class="alert alert-danger" role="alert">Something Error !!!</div>');
        }
    }

    public function deletemenu($id)
    {
        if ($this->Dashboard_model->delete_menu($id)) {
            $this->session->set_flashdata('message', '<div class="alert alert-success" role="alert">Congrulation your Menu data has been deleted</div>');
        } else {
            $this->session->set_flashdata('message', '<div class="alert alert-danger" role="alert">Error To delete your Menu data</div>');
        }
        redirect('dashboard/menu');
    }

    // Messages
    public function messagelist()
    {
        $data = [
            'titles'		=> "Dashboard Administrator",
            'komunitas'		=> $this->GetKomunitas_model->getKomunitas(),
            'allmessages'	=> $this->Dashboard_model->allMessages(),
            'usersl'		=> $this->Dashboard_model->view()->result_array(),
            'message'		=> $this->Dashboard_model->getmessage()->result(),
            'usersl'		=> $this->Dashboard_model->view()->result_array(),
            'messages'		=> true,
            'breadcumb'		=> "Messages",
            'view'			=> "v_messages"
        ];
        $this->load->view("index", $data);
    }

    public function sendmessage()
    {
        // Insert ke database pesan
        $input = [
            'from_users'	=> $this->session->userdata('id'),
            'to_admin'		=> htmlspecialchars($this->input->post('to_usersadmin')),
            'content'		=> $this->input->post('contents'),
            'date'			=> date('Y:m:d H:i:s')
        ];

        if ($this->Dashboard_model->insert_messages($input)) {
            $this->session->set_flashdata('message', '<div class="alert alert-success" role="alert">Pesan berhasil di kirim</div>');
            redirect('dashboard/messagelist');
        } else {
            $this->session->set_flashdata('message', '<div class="alert alert-danger" role="alert">Something Error !!!</div>');
        }
    }

    public function file($path, $nama_file)
    {
        if ($this->uri->segment(3)) {
            $uri = '/' . $this->uri->segment(3);
            if ($this->uri->segment(4)) {
                $uri .= '/' . $this->uri->segment(4);
                if ($this->uri->segment(5)) {
                    $uri .= '/' . $this->uri->segment(5);
                    if ($this->uri->segment(6)) {
                        $uri .= '/' . $this->uri->segment(6);
                    }
                }
            }
        }
        $this->load->helper('download');
        force_download('frontend/files/' . $path . '/' . $nama_file, null);
    }

    public function addFiles()
    {
        $file_name      = htmlspecialchars($this->input->post('file_name'));
        $uploaded_by    = $this->session->userdata('id');
        $uploaded_to    = htmlspecialchars($this->input->post('to_usersadmin'));
        $file 	        = $_FILES['files'];
        if ($file = '') {
            // $this->session->set_flashdata('gagal','File Tidak Ditemukan');
            echo 'kosong';
        } else {
            $config['upload_path'] 		= './frontend/files/umum/';
            $config['allowed_types'] 	= 'pdf';
            $config['max_size'] 		= 10000;
            $config['file_name'] 		= $file_name . '-' . date('Y-m-d');

            $this->load->library('upload', $config);
            if (!$this->upload->do_upload('files')) {
                $this->session->set_flashdata('message', '<div class="alert alert-danger" role="alert">Failed to Upload your file be sure size of file Max 10 Mb and format type <br> pdf	</div>');
            } else {
                $file = [
                    'file_name'     => $file_name,
                    'upload_name'   => $this->upload->data('file_name'),
                    'uploaded_by'   => $uploaded_by,
                    'uploaded_to'   => $uploaded_to,
                    'uploaded_at'   => date('Y:m:d H:i:s')
                ];
                if ($this->Dashboard_model->add_file($file)) {
                    $this->session->set_flashdata('message', '<div class="alert alert-success" role="alert">Upload Files Berhasil<br>File : ' . $file_name . '</div>');
                } else {
                    $this->session->set_flashdata('message', '<div class="alert alert-danger" role="alert">Failed to Upload your file </div>');
                }
            }
        }
        redirect('dashboard');
    }

    public function delete_file($id, $upload_name)
    {
        if ($this->Dashboard_model->delete_file($id)) {
            unlink('./frontend/files/umum/' . $upload_name);
            $this->session->set_flashdata('message', '<div class="alert alert-success" role="alert">Delete Files Berhasil<br>File : ' . $upload_name . '</div>');
            redirect('dashboard', 'refresh');
        } else {
            $this->session->set_flashdata('message', '<div class="alert alert-danger" role="alert">Failed to delete your file </div>');
        }
    }

    // Print Member Data
    public function print()
    {
        $data['user'] = $this->Dashboard_model->getdata()->result();
        $this->load->view('print', $data);
    }

    public function profuser($id = 0)
    {
        if ($id != 0) {
            $data = [
                'titles'		=> "Dashboard Administrator",
                'komunitas'		=> $this->GetKomunitas_model->getKomunitas(),
                'allmessages'	=> $this->Dashboard_model->allMessages(),
                'usersl'		=> $this->Dashboard_model->viewprof($id)->result_array(),
                'agama'			=> $this->Login_model->viewagama()->result_array(),
                'program'		=> $this->Login_model->viewprogram()->result_array(),
                'profile'		=> true,
                'breadcumb'		=> "Profile",
                'view'			=> "v_profuser"
            ];
            $this->load->view("index", $data);
        }
    }

    public function profedit()
    {
        $id	= $this->session->userdata('id');
        
        $this->form_validation->set_rules("nama_admin", "Nama_admin", "trim|min_length[5]|required");
        $this->form_validation->set_rules("alamat", "Alamat", "trim|min_length[5]|required");
        // $this->form_validation->set_rules("agama", "Agama", "trim|required");
        $this->form_validation->set_rules("organisasi", "Organisasi", "trim|required");
        $this->form_validation->set_rules("no_hp", "No_hp", "trim|required");
        $this->form_validation->set_rules("email", "Email", "trim|required|trim");
        $this->form_validation->set_rules("password", "Password", "trim|required");
        $this->form_validation->set_rules("repassword", "Repassword", "trim|required|matches[password]");
        // $this->form_validation->set_rules("program", "Program", "trim|required");
        if ($this->form_validation->run() == false) {
            $data = [
                'titles'		=> "Dashboard Administrator",
                'komunitas'		=> $this->GetKomunitas_model->getKomunitas(),
                'allmessages'	=> $this->Dashboard_model->allMessages(),
                'usersl'		=> $this->Dashboard_model->viewprof($id)->result_array(),
                'agama'			=> $this->Login_model->viewagama()->result_array(),
                'program'		=> $this->Login_model->viewprogram()->result_array(),
                'profile'		=> true,
                'breadcumb'		=> "Profile",
                'view'			=> "v_profuser"
            ];
            $this->load->view("index", $data);
        } else {
            $input = [
                'nama_admin'	=> htmlspecialchars($this->input->post('nama_admin')),
                'alamat'		=> htmlspecialchars($this->input->post('alamat')),
                'agama'			=> htmlspecialchars($this->input->post('agama')),
                'organisasi'	=> htmlspecialchars($this->input->post('organisasi')),
                'nohp	'		=> htmlspecialchars($this->input->post('no_hp')),
                'email'			=> htmlspecialchars($this->input->post('email')),
                'password'		=> md5(htmlspecialchars($this->input->post('password'))),
                'program'		=> htmlspecialchars($this->input->post('program'))
            ];
            if ($this->Dashboard_model->update_prof($id, $input)) {
                $this->session->set_flashdata('message', '<div class="alert alert-success" role="alert">Data User Berhasil di Update <br>Username : ' . $input['nama_admin'] . '</div>');
            }
            redirect('dashboard/profedit');
        }
    }

    // Sertificate
    // function sertif()
    // {
    // 	$data = [
    // 		'titles'		=> "Dashboard Administrator",
    // 		'komunitas'		=> $this->GetKomunitas_model->getKomunitas(),
    // 		'allmessages'	=> $this->Dashboard_model->allMessages(),
    // 		'sertif'		=> TRUE,
    // 		'breadcumb'		=> "Sertif",
    // 		'view'			=> "v_messages"
    // 	];
    // 	$this->load->view("index", $data);

    // 	// 'files' => $this->Files_m->get_umum(),
    // }
}
