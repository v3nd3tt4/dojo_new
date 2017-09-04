<?php
defined('BASEPATH') OR exit('No direct script access allowed');

//class untuk halaman utama
class Welcome extends CI_Controller {
	public function index()
	{
		$this->load->model('M_galeri');
		$this->load->model('M_posting');
		$data=array('title'=>'PSBK IAIN Raden Intan',
					'isi'=>'we',
					'hasil'=>$this->M_galeri->list_banner(),
					'activitas'=>$this->M_posting->depan_activity()
					);
		$this->load->view('template/wrapper',$data);
	}
	
	
}


