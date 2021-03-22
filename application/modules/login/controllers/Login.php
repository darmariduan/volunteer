<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Login extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();
        $this->load->library('form_validation');
        $this->load->library('datatables');
        $this->load->model('Login_model');
        $this->load->model('komunitas/GetKomunitas_model');
        if (($this->session->userdata('aktif') != true) && ($this->session->userdata('level') == 1)) {
            redirect('dashboard');
        } elseif (($this->session->userdata('aktif') != true) && ($this->session->userdata('level') == 2)) {
            redirect('user');
        }
    }

    public function index()
    {
        $data 	= [
            'titles'	=> 'Login',
            'login'		=> 'Log In',
            'komunitas'	=> $this->GetKomunitas_model->getKomunitas(),
            'view'		=> "v_login"
        ];
        $this->load->view("index", $data);
    }

    public function aksi()
    {
        // Validasi Error
        $this->form_validation->set_rules("username", "Username", "trim|min_length[3]|required");
        $this->form_validation->set_rules("password", "password", "trim|required");

        if ($this->form_validation->run() == false) {
            $data 	= [
                'titles'	=> 'Login',
                'login'		=> 'Log In',
                'komunitas'	=> $this->GetKomunitas_model->getKomunitas(),
                'view'		=> "v_login"
            ];
            $this->load->view("index", $data);
        } else {
            // ambil post dari form login
            $username   = htmlspecialchars($this->input->post('username'));
            $password   = htmlspecialchars(md5($this->input->post('password')));

            // model database
            $cek_admin = $this->Login_model->auth_user($username, $password);

            if ($cek_admin->num_rows() > 0) {
                $data = $cek_admin->row_array();

                $data_session = array(
                    'id'        => $data['id'],
                    'nama'      => $data['nama_admin'],
                    'foto'      => $data['foto'],
                    'username'  => $username,
                    'aktif'     => true,
                    'level'     => $data['level']
                );

                // Set session user data
                $this->session->set_userdata($data_session);
                if ($this->session->userdata('level') == 1) {
                    redirect('dashboard');
                } else {
                    redirect('users');
                }
            } else {
                $this->session->set_flashdata('message', '<div class="alert alert-danger" role="alert">Data Tidak ditemukan</div>');
                redirect('login', 'refresh');
            }
        }
    }

    // Register
    public function register()
    {
        $data 	= [
            'titles'	=> 'Register',
            'register'	=> 'Register',
            'komunitas'	=> $this->GetKomunitas_model->getKomunitas(),
            'agama'		=> $this->Login_model->viewagama()->result_array(),
            'program'	=> $this->Login_model->viewprogram()->result_array(),
            'role1'		=> $this->Login_model->view1()->result_array(),
            'view'		=> "v_register"
        ];
        $this->load->view("index", $data);
    }

    // Register Action
    public function regkom()
    {
        $data 	= [
            'titles'	=> 'Register',
            'register'	=> 'Register'
        ];
        $this->form_validation->set_rules("nama", "Nama", "trim|min_length[5]|required");
        $this->form_validation->set_rules("alamat", "Alamat", "trim|min_length[5]|required");
        $this->form_validation->set_rules("agama", "Agama", "trim|required");
        $this->form_validation->set_rules("organisasi", "Organisasi", "trim|required");
        $this->form_validation->set_rules("nohp", "Nohp", "trim|required");
        $this->form_validation->set_rules("username", "Username", "trim|min_length[5]|is_unique[users.username]|required");
        $this->form_validation->set_rules("email", "Email", "trim|is_unique[users.email]|required|trim");
        $this->form_validation->set_rules("password", "Password", "trim|required");
        $this->form_validation->set_rules("repassword", "Repassword", "trim|required|matches[password]");
        $this->form_validation->set_rules("category", "Category", "trim|required");
        $this->form_validation->set_rules("tempatlahir", "Tempatlahir", "trim|required");

        if ($this->form_validation->run() == false) {
            $data 	= [
                'titles'	=> 'Login',
                'register'	=> 'Register',
                'komunitas'	=> $this->GetKomunitas_model->getKomunitas(),
                'agama'		=> $this->Login_model->viewagama()->result_array(),
                'program'	=> $this->Login_model->viewprogram()->result_array(),
                'role1'		=> $this->Login_model->view1()->result_array(),
                'view'		=> "v_register"
            ];
            $this->load->view("index", $data);
        } else {
            $foto 	  = $_FILES['image'];

            if ($foto = '') {
                $this->session->set_flashdata('message', 'Foto Tidak Ditemukan');
                echo 'kosong';
            // redirect('dashboard/slider');
            } else {
                $config['upload_path'] 		= './frontend/assets/images/users';
                $config['allowed_types'] 	= 'jpg|png|jpeg';
                $config['max_size'] 		= 2048;
                $config['file_name'] 		= 'users-' . date('Y-m-d');

                $this->load->library('upload', $config);
                if (!$this->upload->do_upload('image')) {
                    $this->session->set_flashdata('message', '<div class="alert alert-danger" role="alert">Upload Foto Gagal, Pastikan file dibawah 2Mb dan Berformat jpg,png,img. </div>');
                    redirect('dashboard/slider');
                } else {
                    $input = [
                        'nama_admin'	=> htmlspecialchars($this->input->post('nama')),
                        'alamat'		=> htmlspecialchars($this->input->post('alamat')),
                        'agama'			=> htmlspecialchars($this->input->post('agama')),
                        'tempat'		=> htmlspecialchars($this->input->post('tempatlahir')),
                        'organisasi'	=> htmlspecialchars($this->input->post('organisasi')),
                        'email'			=> htmlspecialchars($this->input->post('email')),
                        'nohp	'		=> htmlspecialchars($this->input->post('nohp')),
                        'program'		=> htmlspecialchars($this->input->post('program')),
                        'username'		=> htmlspecialchars($this->input->post('username')),
                        'password'		=> md5(htmlspecialchars($this->input->post('password'))),
                        'foto'			=> $this->upload->data('file_name'),
                        'level'			=> htmlspecialchars($this->input->post('category'))
                    ];

                    // Insert to database
                    $insert = $this->Login_model->insert_users($input);
                    if ($insert) {
                        $this->session->set_flashdata('message', '<div class="alert alert-success" role="alert">Congrulation your account has been created</div>');
                    } else {
                        $this->session->set_flashdata('message', '<div class="alert alert-danger" role="alert">Something Error...</div>');
                    }
                    redirect('login', 'refresh');
                }
            }
        }
    }

    // Lupa Password View
    public function forgotPass()
    {
        $data 	= [
            'titles'	=> 'Lupa Password',
            'forgot'	=> 'Lupas Password',
            'komunitas'	=> $this->GetKomunitas_model->getKomunitas(),
            'agama'		=> $this->Login_model->viewagama()->result_array(),
            'program'	=> $this->Login_model->viewprogram()->result_array(),
            'role1'		=> $this->Login_model->view1()->result_array(),
            'view'		=> "v_forget"
        ];
        $this->load->view("index", $data);
    }
    
    // Lupa Password Aksi
    public function aksiLupa()
    {
        $this->form_validation->set_rules("username", "Username", "trim|required");
        $this->form_validation->set_rules("no_hp", "No_hp", "trim|required");
        $this->form_validation->set_rules("forpassa", "Forpassa", "trim|required");

        if ($this->form_validation->run() == false) {
            $data 	= [
                'titles'	=> 'Login',
                'forgot'	=> 'Lupa Password',
                'komunitas'	=> $this->GetKomunitas_model->getKomunitas(),
                'view'		=> "v_forget"
            ];
            $this->load->view("index", $data);
        } else {
            // ambil post dari form login
            $username   = htmlspecialchars($this->input->post('username'));
            $no_hp   	= htmlspecialchars($this->input->post('no_hp'));
            
            // model database
            $cek_admin = $this->Login_model->cek_User($username, $no_hp);
            
            if ($cek_admin->num_rows() > 0) {
                // Jika ada masukkan password baru
                $input 		= [
                    'password'		=> htmlspecialchars(md5($this->input->post('forpassa'))),
                    'username'		=> $username
                ];
                
                // Update password baru
                $update = $this->Login_model->updatePass($input);
                
                if ($update) {
                    $this->session->set_flashdata('message', '<div class="alert alert-success" role="alert">Password berhasil dirubah !!!</div>');
                } else {
                    echo 'Failed';
                }
                redirect('login', 'refresh');
            } else {
                $this->session->set_flashdata('message', '<div class="alert alert-danger" role="alert">Data yang anda masukkan tidak ada</div>');
            }
            // redirect('login/forgotPass', 'refresh');
        }
    }

    public function logout()
    {
        $this->session->sess_destroy();
        redirect(base_url(), 'refresh');
    }
}
