<?php
defined('BASEPATH') OR exit('No direct script access allowed');

//class untuk halaman utama
class Kurikulum extends CI_Controller {
	//memanggil halaman sejarah
	function index(){
		$this->load->model('M_posting');
		$this->M_posting->kategori('kurikulum');
		
		$data=array('title'=>'Kurikulum',
					'isi'=>'vKurikulum',
					'hasil'=>$this->M_posting->kategori('kurikulum')->row(),
					'total'=>$this->M_posting->kategori('kurikulum')->num_rows()
					);
		$this->load->view('template/wrapper',$data);
	}
}