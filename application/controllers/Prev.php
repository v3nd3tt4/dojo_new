<?php
class Prev extends CI_Controller {
	
	function __construct(){
		parent::__construct();
		$this->load->model('M_family');
	}
	
	function index($id){		
		$data=array('title'=>'Detail BK Family',
					'isi'=>'vPrev',
					'hasil'=>$this->M_family->filter_data($id)->row(),
					'total'=>$this->M_family->filter_data($id)->num_rows()
					);
		$this->load->view('template/wrapper',$data);
	}
}