<?php
defined('BASEPATH') OR exit('No direct script access allowed');

//class untuk halaman utama
class Sejarah extends CI_Controller {
	//memanggil halaman sejarah
	function index(){
		$this->load->model('M_posting');
		$this->M_posting->kategori('sejarah');
		
		$data=array('title'=>'Sejarah',
					'isi'=>'vSejarah',
					'hasil'=>$this->M_posting->kategori('sejarah')->row(),
					'total'=>$this->M_posting->kategori('sejarah')->num_rows()
					);
		$this->load->view('template/wrapper',$data);
	}
}