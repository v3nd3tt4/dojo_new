<?php
defined('BASEPATH') OR exit('No direct script access allowed');

//class untuk halaman utama
class C_login extends CI_Controller {
	
	function __construct(){
		parent::__construct();
		$this->load->model('User');
	}
	
	public function index()
	{
		$username=addslashes($this->input->post('username'));
		$password=md5(addslashes($this->input->post('password')));
		
		if($username==''){
			echo '<div class="alert alert-danger"><a href="#" class="close" data-dismiss="alert" arial-label="close">&times;</a><strong>Peringatan!</strong> Username harus diisi !</div>';
		}
		else if($password=='' || $password=='d41d8cd98f00b204e9800998ecf8427e' ){
			echo'<div class="alert alert-danger"><a href="#" class="close" data-dismiss="alert" arial-label="close">&times;</a><strong>Peringatan!</strong> Password harus diisi !</div>';
		}
		else{
			$data=array(
			'username'=>$username,
			'password'=>$password
			);
			$hasil=$this->User->cek_user($data);
			if($hasil->num_rows()==1){
				foreach($hasil->result() as $sess){
					$sess_data['logged_in']='Berhasil Login';
					$sess_data['uid']=$sess->id;
					$sess_data['username']=$sess->username;
					$sess_data['nama']=$sess->nama;
					$sess_data['password']=$sess->password;
					$sess_data['level']=$sess->level;
					$this->session->set_userdata($sess_data);
				}
				if($this->session->userdata('level')=='admin'){
					echo'<script>window.location.href="'.base_url().'adminNew/home";</script>';
					echo'<div class="alert alert-success"><a href="#" class="close" data-dismiss="alert" arial-label="close">&times;</a>User ditemukan, sedang menyambungkan..</div>';
				}
				else if($this->session->userdata('level')=='master'){
					redirect('master');
				}
			}
			else{
					echo'<div class="alert alert-danger"><a href="#" class="close" data-dismiss="alert" arial-label="close">&times;</a><strong>Peringatan!</strong> User tidak ditemukan !</div>';
				}
			
			
		}
	}
	
	
}


