<?php
class Detail extends CI_Controller {
	
	function __construct(){
		parent::__construct();
		$this->load->model('M_posting');
	}
	
	function index($id,$judul){		
		$data=array('title'=>'Detail',
					'isi'=>'vDetail',
					'hasil'=>$this->M_posting->filter_data($id)->row(),
					'total'=>$this->M_posting->filter_data($id)->num_rows()
					);
		$this->load->view('template/wrapper',$data);
	}
}