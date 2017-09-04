<?php
class Mahasiswa extends CI_Controller {
	
	function __construct(){
		parent::__construct();
		$this->load->model('M_family');
		$this->load->library('image_lib');
		$this->load->library('upload');
	}
	
	//memanggil halaman dosen
	function index($id=NULL){
		$jml = $this->db->get_where('family', array('kategori'=>'Mahasiswa'));
		 $config['base_url'] = base_url().'activity/index';
		 $config['total_rows'] = $jml->num_rows();
		 $config['per_page'] = '18';
		 // config pagination ke bootstrap
		$config['full_tag_open'] = "<ul class='pagination pagination-sm'>";
		$config['full_tag_close'] ="</ul>";
		$config['num_tag_open'] = '<li>';
		$config['num_tag_close'] = '</li>';
		$config['cur_tag_open'] = "<li class='disabled'><li class='active'><a href='#'>";
		$config['cur_tag_close'] = "<span class='sr-only'></span></a></li>";
		$config['next_tag_open'] = "<li>";
		$config['next_tagl_close'] = "</li>";
		$config['prev_tag_open'] = "<li>";
		$config['prev_tagl_close'] = "</li>";
		$config['first_tag_open'] = "<li>";
		$config['first_tagl_close'] = "</li>";
		$config['last_tag_open'] = "<li>";
		$config['last_tagl_close'] = "</li>";

		 $this->pagination->initialize($config);
		 //buat pagination
 		 $data['halaman'] = $this->pagination->create_links();

         //tamplikan data
         $data['query'] = $this->M_family->ambil_family_mahasiswa($config['per_page'], $id);
		$data=array('title'=>'Mahasiswa',
					'isi'=>'vMahasiswa',
					'halaman'=>$this->pagination->create_links(),
					'jumlah'=>$jml->num_rows(),
					'hasil'=>$this->M_family->ambil_family_mahasiswa($config['per_page'], $id)
					);
		$this->load->view('template/wrapper',$data);
	}
	
}