<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Users extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();
        $this->load->library('form_validation');
        $this->load->library('datatables');
        $this->load->library('upload');
        $this->load->model('Users_model');
        $this->load->model('komunitas/GetKomunitas_model');
        $this->load->model('dashboard/Dashboard_model');
        $this->load->model('login/Login_model');
        set_zone();

        if ($this->session->userdata('aktif') != true && $this->session->userdata('admin') == 0) {
            $this->session->set_flashdata('message', 'Harap login untuk melanjutkan');
            redirect('login');
        }
    }

    public function index()
    {
        $data	= [
            'titles'	=> "Dashboard User",
            'komunitas'	=> $this->GetKomunitas_model->getKomunitas(),
            'message'	=> $this->Users_model->getmessage()->result(),
            'hassert'	=> $this->Users_model->hassert()->result(),
            'usersl'	=> $this->Users_model->view()->result_array(),
            'users'		=> true,
            'breadcumb'	=> "users",
            'view'		=> "v_users"
        ];
        $this->load->view("index", $data);
        // echo json_encode($this->Users_model->hassert()->result()['0']->file_name, true);
    }

    public function messages()
    {
        $data	= [
            'titles'		=> "Dashboard User",
            'komunitas'		=> $this->GetKomunitas_model->getKomunitas(),
            'allmessages'	=> $this->Users_model->allMessages(),
            'message'		=> $this->Users_model->getdata()->result(),
            'userlist'		=> $this->Users_model->view()->result_array(),
            'usersl'		=> $this->Users_model->view()->result_array(),
            'messages'		=> true,
            'breadcumb'		=> "Messages",
            'view'			=> "v_messages"
        ];
        $this->load->view("index", $data);
    }

    public function sendmessage()
    {
        // ambil post dari form users/messages jika yang kirim pesan user maka to otomatis 1 jika bukan maka bisa di pilih
        // if ($this->session->userdata('level') != 1) {
        // 	$to   		= '1';
        // } else {
        // 	$to   		= htmlspecialchars($this->input->post('to_admin'));
        // }

        // Insert ke database pesan
        $input = [
            'from_users'	=> $this->session->userdata('id'),
            'to_admin'		=> '1',
            'content'		=> $this->input->post('contents'),
            'date'			=> date('Y:m:d H:i:s')
        ];

        if ($this->Users_model->insert_messages($input)) {
            $this->session->set_flashdata('message', '<div class="alert alert-success" role="alert">Pesan berhasil di kirim ke Administrator</div>');
            redirect('users/messages');
        } else {
            $this->session->set_flashdata('message', '<div class="alert alert-danger" role="alert">Something Error !!!</div>');
        }
    }

    //upload image summernote
    public function upload_image()
    {
        if (isset($_FILES["file"]["name"])) {
            $config['upload_path'] = './frontend/assets/images/summernote';
            $config['allowed_types'] = 'jpg|jpeg|png|gif';
            $this->upload->initialize($config);
            if (!$this->upload->do_upload('file')) {
                $this->upload->display_errors();
                return false;
            } else {
                $data = $this->upload->data();
                //Compress Image
                $config['image_library'] = 'gd2';
                $config['source_image'] = './frontend/assets/images/summernote/' . $data['file_name'];
                $config['create_thumb'] = false;
                $config['maintain_ratio'] = true;
                $config['quality'] = '60%';
                $config['width'] = 800;
                $config['height'] = 800;
                $config['new_image'] = './frontend/assets/images/summernote/' . $data['file_name'];
                $this->load->library('image_lib', $config);
                $this->image_lib->resize();
                echo base_url() . 'frontend/assets/images/summernote/' . $data['file_name'];
            }
        }
    }

    // Edit Profile
    public function profile()
    {
        $data	= [
            'titles'		=> "Dashboard User",
            'komunitas'		=> $this->GetKomunitas_model->getKomunitas(),
            'allmessages'	=> $this->Users_model->allMessages(),
            'message'		=> $this->Users_model->getdata()->result(),
            'userlist'		=> $this->Users_model->view()->result_array(),
            'usersl'		=> $this->Users_model->view()->result_array(),
            'agama'			=> $this->Login_model->viewagama()->result_array(),
            'program'		=> $this->Login_model->viewprogram()->result_array(),
            'Profile'		=> true,
            'breadcumb'		=> "Profile",
            'view'			=> "v_profuser"
        ];
        $this->load->view("index", $data);
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
            redirect('users/profile');
        }
    }
}
