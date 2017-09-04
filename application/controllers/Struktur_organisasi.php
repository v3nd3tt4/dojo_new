<?php
defined('BASEPATH') OR exit('No direct script access allowed');

//class untuk halaman utama
class Struktur_organisasi extends CI_Controller {
	//memanggil halaman visi dan misi
	function index(){
		$this->load->model('M_posting');
		$data=array('title'=>'Struktur Organisasi',
					'isi'=>'vStrukturOrganisasi',
					'hasil'=>$this->M_posting->kategori('struktur_organisasi')->row(),
					'total'=>$this->M_posting->kategori('struktur_organisasi')->num_rows()
					);
		$this->load->view('template/wrapper',$data);
	}
}