<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Addnews extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();
        $this->load->library('form_validation');
        $this->load->library('upload');
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
        $data = [
            'titles'		=> "Dashboard Administrator",
            'komunitas'		=> $this->GetKomunitas_model->getKomunitas(),
            'usersl'		=> $this->Dashboard_model->view()->result_array(),
            'addNews'		=> true,
            'breadcumb'		=> "Add News",
            'view'			=> "v_add_post"
        ];
        $this->load->view("index", $data);
    }
    
    public function edit($id)
    {
        $data = [
            'titles'		=> "Dashboard Administrator",
            'komunitas'		=> $this->GetKomunitas_model->getKomunitas(),
            'usersl'		=> $this->Dashboard_model->view()->result_array(),
            'berita'		=> $this->Dashboard_model->viewberita($id)->result_array(),
            'addNews'		=> true,
            'breadcumb'		=> "Add News",
            'view'			=> "v_edit_post"
        ];
        $this->load->view("index", $data);
    }

    public function publish()
    {
        // $config['upload_path'] 		= './frontend/assets/images/berita/';
        // $config['allowed_types'] 	= 'gif|jpg|png|jpeg|bmp';
        // $config['encrypt_name'] 	= TRUE;

        // $this->upload->initialize($config);

        // if (!empty($_FILES['filefoto']['name'])) {
        // 	if ($this->upload->do_upload('filefoto')) {
        // 		$img = $this->upload->data();
        // 		//Compress Image
        // 		$config['image_library'] = 'gd2';
        // 		$config['source_image'] = './frontend/assets/images/berita/' . $img['file_name'];
        // 		$config['create_thumb'] = FALSE;
        // 		$config['maintain_ratio'] = FALSE;
        // 		$config['quality'] = '60%';
        // 		$config['width'] = 500;
        // 		$config['height'] = 320;
        // 		$config['new_image'] = './frontend/assets/images/berita/' . $img['file_name'];
        // 		$this->load->library('image_lib', $config);
        // 		$this->image_lib->resize();

        $input = [
            'judul'     	=> strip_tags(htmlspecialchars($this->input->post('title', true), ENT_QUOTES)),
            'deskripsi' 	=> $this->input->post('contents'),
            'created_at' 	=> date('Y:m:d H:i:s')
        ];
        if ($this->Dashboard_model->insert_berita($input)) {
            $this->session->set_flashdata('message', '<div class="alert alert-success" role="alert">Data Berita Berhasil Ditambahkan <br>Judul : ' . $input['judul'] . '</div>');
        }
        redirect('news');
        // 	} else {
        // 		$this->session->set_flashdata('message', '<div class="alert alert-danger" role="alert">Something Error !!!</div>');
        // 		redirect('addnews');
        // 	}
        // } else {
        // 	redirect('addnews');
        // }
    }
    
    public function publishedit($id)
    {
        $input = [
            'judul'     	=> strip_tags(htmlspecialchars($this->input->post('title', true), ENT_QUOTES)),
            'deskripsi' 	=> $this->input->post('contents'),
            'created_at' 	=> date('Y:m:d H:i:s')
        ];
        if ($this->Dashboard_model->update_berita($id, $input)) {
            $this->session->set_flashdata('message', '<div class="alert alert-success" role="alert">Data Berita Berhasil Ditambahkan <br>Judul : ' . $input['judul'] . '</div>');
        }
        redirect('news');
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
}
