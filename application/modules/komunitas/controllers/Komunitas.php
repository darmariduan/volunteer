<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Komunitas extends CI_Controller
{
	function __construct()
	{
		parent::__construct();
		$this->load->library('form_validation');
		$this->load->library('datatables');
		//load libary pagination
		$this->load->library('pagination');
		$this->load->model('GetKomunitas_model');
		$this->load->model('dashboard/Dashboard_model');
	}

	public function index()
	{
		$data = [
			'title'         => 'Home',
			'komunitas'		=> $this->GetKomunitas_model->getKomunitas(),
			'berita'        => $this->db->order_by('id_berita', 'DESC')->limit(3)->get('tbl_berita')->result(),
			'lain'          => $this->db->where('id', 1)->get('lain_lain')->row(),
			'image'			=> $this->GetKomunitas_model->imgDash()->result(),
			'aktivitas'     => $this->db->order_by('id_aktivitas', 'DESC')->limit(5)->get('aktivitas')->result(),
			'menu'			=> $this->GetKomunitas_model->getmenu()->result(),
			'view'			=> 'v_komunitas'
		];

		$this->load->view('index', $data);
	}

	function prof()
	{
		$data = [
			'title'         => 'Profile',
			'komunitas'		=> $this->GetKomunitas_model->getKomunitas(),
			'berita'        => $this->db->order_by('id_berita', 'DESC')->limit(3)->get('tbl_berita')->result(),
			'lain'          => $this->db->where('id', 1)->get('lain_lain')->row(),
			'image'			=> $this->GetKomunitas_model->imgDash()->result(),
			'menu'			=> $this->GetKomunitas_model->getmenu()->result(),
			'aktivitas'     => $this->db->order_by('id_aktivitas', 'DESC')->limit(5)->get('aktivitas')->result(),
			'view'			=> 'v_profile'
		];

		$this->load->view('index', $data);
	}

	function view($id)
	{
		$row = $this->GetKomunitas_model->get_by_id($id);
		if ($row) {
			$data = array(
				'title'			=> 'News',
				'komunitas'		=> $this->GetKomunitas_model->getKomunitas(),
				'berita'        => $this->db->where('id_berita', $id)->order_by('id_berita', 'DESC')->limit(3)->get('tbl_berita')->result(),
				'lain'          => $this->db->where('id', 1)->get('lain_lain')->row(),
				'image'			=> $this->GetKomunitas_model->imgDash()->result(),
				'menu'			=> $this->GetKomunitas_model->getmenu()->result(),
				'aktivitas'     => $this->db->order_by('id_aktivitas', 'DESC')->limit(5)->get('aktivitas')->result(),
				'view'				=> "v_viewnews"
			);
			$this->load->view('index', $data);
		}
	}

	// View All News
	function viewall()
	{
		$data = [
			'title'         => 'News',
			'komunitas'		=> $this->GetKomunitas_model->getKomunitas(),
			'berita'        => $this->db->order_by('id_berita', 'DESC')->get('tbl_berita')->result(),
			'lain'          => $this->db->where('id', 1)->get('lain_lain')->row(),
			'image'			=> $this->GetKomunitas_model->imgDash()->result(),
			'menu'			=> $this->GetKomunitas_model->getmenu()->result(),
			'aktivitas'     => $this->db->order_by('id_aktivitas', 'DESC')->limit(5)->get('aktivitas')->result(),
			'view'			=> 'v_newsall'
		];
		// $this->load->view('index', $data);

		//konfigurasi pagination
		$config['base_url'] = site_url('dashboard/viewall'); //site url
		$config['total_rows'] = $this->db->count_all('tbl_berita'); //total row
		$config['per_page'] = 5;  //show record per halaman
		$config["uri_segment"] = 3;  // uri parameter
		$choice = $config["total_rows"] / $config["per_page"];
		$config["num_links"] = floor($choice);

		// Membuat Style pagination untuk BootStrap v4
		$config['first_link']       = 'First';
		$config['last_link']        = 'Last';
		$config['next_link']        = 'Next';
		$config['prev_link']        = 'Prev';
		$config['full_tag_open']    = '<div class="pagging text-center"><nav><ul class="pagination justify-content-center">';
		$config['full_tag_close']   = '</ul></nav></div>';
		$config['num_tag_open']     = '<li class="page-item"><span class="page-link">';
		$config['num_tag_close']    = '</span></li>';
		$config['cur_tag_open']     = '<li class="page-item active"><span class="page-link">';
		$config['cur_tag_close']    = '<span class="sr-only">(current)</span></span></li>';
		$config['next_tag_open']    = '<li class="page-item"><span class="page-link">';
		$config['next_tagl_close']  = '<span aria-hidden="true">&raquo;</span></span></li>';
		$config['prev_tag_open']    = '<li class="page-item"><span class="page-link">';
		$config['prev_tagl_close']  = '</span>Next</li>';
		$config['first_tag_open']   = '<li class="page-item"><span class="page-link">';
		$config['first_tagl_close'] = '</span></li>';
		$config['last_tag_open']    = '<li class="page-item"><span class="page-link">';
		$config['last_tagl_close']  = '</span></li>';

		$this->pagination->initialize($config);

		$data['page'] = ($this->uri->segment(3)) ? $this->uri->segment(3) : 0;

		//panggil function get_news_list yang ada pada model News_model. 
		$data['data'] = $this->GetKomunitas_model->get_news_list($config["per_page"], $data['page']);

		$data['pagination'] = $this->pagination->create_links();

		//load view News view
		$this->load->view('index', $data);
	}

	// Anggota
	function anggota()
	{
		$data = [
			'title'         => 'Anggota',
			'komunitas'		=> $this->GetKomunitas_model->getKomunitas(),
			'usersl'		=> $this->Dashboard_model->getdata()->result_array(),
			'berita'        => $this->db->order_by('id_berita', 'DESC')->limit(3)->get('tbl_berita')->result(),
			'lain'          => $this->db->where('id', 1)->get('lain_lain')->row(),
			'image'			=> $this->GetKomunitas_model->imgDash()->result(),
			'menu'			=> $this->GetKomunitas_model->getmenu()->result(),
			'aktivitas'     => $this->db->order_by('id_aktivitas', 'DESC')->limit(5)->get('aktivitas')->result(),
			'view'			=> 'v_anggota'
		];
		$this->load->view('index', $data);
	}

	function menu($id)
	{
		$data = [
			'title'         => 'Menu',
			'komunitas'		=> $this->GetKomunitas_model->getKomunitas(),
			'usersl'		=> $this->Dashboard_model->viewanggota()->result_array(),
			'berita'        => $this->db->order_by('id_berita', 'DESC')->limit(3)->get('tbl_berita')->result(),
			'lain'          => $this->db->where('id', 1)->get('lain_lain')->row(),
			'image'			=> $this->GetKomunitas_model->imgDash()->result(),
			'menu'			=> $this->GetKomunitas_model->getmenu()->result(),
			'aktivitas'     => $this->db->order_by('id_aktivitas', 'DESC')->limit(5)->get('aktivitas')->result(),
			'view'			=> 'menu'
		];
		$data['menulist'] = $this->GetKomunitas_model->get_by_id_menu($id);
		$this->load->view('index', $data);
	}

	// function menu()
	// {
	// 	$data['menu'] = $this->GetKomunitas_model->getmenu()->result();
	// 	echo json_encode($data['menu'][0]->menu);
	// }
}
