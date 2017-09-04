<?php
defined('BASEPATH') OR exit('No direct script access allowed');

//class untuk halaman utama
class Visi_misi extends CI_Controller {
	
	//memanggil halaman visi dan misi
	function index(){
		$this->load->model('M_posting');
		
		$data=array('title'=>'Visi dan Misi',
					'isi'=>'vVisiMisi',
					'hasil'=>$this->M_posting->kategori('visi_misi')->row(),
					'total'=>$this->M_posting->kategori('visi_misi')->num_rows()
					);
		$this->load->view('template/wrapper',$data);
	}
}