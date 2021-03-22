<?php
defined('BASEPATH') or exit('No direct script access allowed');

class News extends CI_Controller
{
	function __construct()
	{
		parent::__construct();
		$this->load->library('form_validation');
		$this->load->library('upload');
		$this->load->model('dashboard/Dashboard_model');
		$this->load->model('komunitas/GetKomunitas_model');
		$this->load->model('News_model');
		$this->load->model('login/Login_model');
		set_zone();

		if ($this->session->userdata('aktif') != TRUE) {
			$this->session->set_flashdata('message', '<div class="alert alert-danger" role="alert">Harap login untuk melanjutkan</div>');
			redirect('login');
		}
	}

	function index()
	{
		$data	= [
			'titles'	=> "Dashboard User",
			'komunitas'	=> $this->GetKomunitas_model->getKomunitas(),
			'alluser'	=> $this->Dashboard_model->allUser(),
			'usersl'	=> $this->Dashboard_model->view()->result_array(),
			'new'		=> $this->Dashboard_model->news(),
			'berita'	=> $this->db->order_by('created_at', 'DESC')->get('tbl_berita')->result(),
			'dashboard'	=> TRUE,
			'breadcumb'	=> "Dashboard",
			'view'		=> "v_news"
		];
		$this->load->view("index", $data);
	}

	function addnews(Type $var = null)
	{
		$data	= [
			'titles'	=> "Dashboard Administrator",
			'komunitas'	=> $this->GetKomunitas_model->getKomunitas(),
			'alluser'	=> $this->Dashboard_model->allUser(),
			'usersl'	=> $this->Dashboard_model->view()->result_array(),
			'new'		=> $this->Dashboard_model->news(),
			'berita'	=> $this->db->order_by('created_at', 'DESC')->get('tbl_berita')->result(),
			'dashboard'	=> TRUE,
			'breadcumb'	=> "Dashboard",
			'view'		=> "v_add_post"
		];
		$this->load->view("index", $data);
	}

	public function deleteBerita($id)
	{
		if ($this->Dashboard_model->delete_berita($id)) {
			$this->session->set_flashdata('message', '<div class="alert alert-success" role="alert">Congrulation your news data has been deleted</div>');
		} else {
			$this->session->set_flashdata('message', '<div class="alert alert-danger" role="alert">Error To delete your news data</div>');
		}
		redirect('news');
	}

	function save()
	{
		$input = [
			'judul'			=> htmlspecialchars($this->input->post('judul')),
			'deskripsi' 	=> htmlspecialchars($this->input->post('deskripsi')),
			'created_at' 	=> date('Y:m:d H:i:s')
		];
		if ($this->News_model->insert_berita($input)) {
			$this->session->set_flashdata('message', '<div class="alert alert-success" role="alert">Data Berita Berhasil Ditambahkan <br>Judul : ' . $input['judul'] . '</div>');
		}
		redirect('news');
	}

	//upload image summernote
	function upload_image()
	{
		if (isset($_FILES["file"]["name"])) {
			$config['upload_path'] = './frontend/assets/images/';
			$config['allowed_types'] = 'jpg|jpeg|png|gif';
			$this->upload->initialize($config);
			if (!$this->upload->do_upload('file')) {
				$this->upload->display_errors();
				return FALSE;
			} else {
				$data = $this->upload->data();
				//Compress Image
				$config['image_library'] = 'gd2';
				$config['source_image'] = './frontend/assets/images/' . $data['file_name'];
				$config['create_thumb'] = FALSE;
				$config['maintain_ratio'] = TRUE;
				$config['quality'] = '60%';
				$config['width'] = 800;
				$config['height'] = 800;
				$config['new_image'] = './frontend/assets/images/' . $data['file_name'];
				$this->load->library('image_lib', $config);
				$this->image_lib->resize();
				echo base_url() . 'assets/images/' . $data['file_name'];
			}
		}
	}
}
