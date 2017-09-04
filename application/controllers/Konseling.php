<?php
defined('BASEPATH') OR exit('No direct script access allowed');

//class untuk halaman utama
class Konseling extends CI_Controller {
	//memanggil halaman sejarah
	function index(){
		$this->load->model('M_posting');
		$this->M_posting->kategori('konseling');
		
		$data=array('title'=>'Konseling',
					'isi'=>'vKonseling',
					'hasil'=>$this->M_posting->kategori('konseling')->row(),
					'total'=>$this->M_posting->kategori('konseling')->num_rows()
					);
		$this->load->view('template/wrapper',$data);
	}
}
