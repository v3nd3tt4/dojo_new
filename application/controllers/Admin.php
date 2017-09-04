<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Admin extends CI_Controller {
	
	public function __construct(){
		parent::__construct();
		if($this->session->userdata('username')==""){
			redirect(base_url());
		}
		$this->load->helper('text');
	}
	
	public function index(){
		$data=array('title'=>'admin',
					'isi'=>'vAdmin',
					'link' => 'dashboard',
					'nama'=>$this->session->userdata('nama'),
					'username'=>$this->session->userdata('username')
					);
		$this->load->view('template/wrapper',$data);
	}
	
	public function logout(){
		$this->session->unset_userdata('username');
		$this->session->unset_userdata('level');
		session_destroy();
		redirect(base_url());
	}
	
	public function tamadmin(){
		$this->load->model('M_admin');
		$data['hasil']=$this->M_admin->bacadata();	
		$this->load->view('admin',$data);
	}
	
	public function tambahadmin(){
		if($this->session->userdata('level') == "" || $this->session->userdata('level') == null){
             echo'<script>alert("anda tidak mempunyai hak akses");window.location.href="'.base_url().'";</script>';
        }
		$nama = $this->input->post('namatambah');
        $password = md5($this->input->post('passwordtambah'));
        $konfirmasi_password = md5($this->input->post('konfirmasipasswordtambah'));
		if($nama=='' || empty($nama)){
			$this->session->set_flashdata(
			  'msg', 
			  '<div class="alert alert-danger"><a href="#" class="close" data-dismiss="alert" arial-label="close">&times;</a><strong>Peringatan!</strong> nama harus diisi !</div>'
			);
			redirect(base_url().'adminNew/home/tambah_user'); //location
		}
		elseif($password=='' || $password=='d41d8cd98f00b204e9800998ecf8427e'){
			$this->session->set_flashdata(
			  'msg', 
			  '<div class="alert alert-danger"><a href="#" class="close" data-dismiss="alert" arial-label="close">&times;</a><strong>Peringatan!</strong> password harus diisi !</div>'
			);
			redirect(base_url().'adminNew/home/tambah_user'); //location
		}else if($konfirmasi_password != $password){
			$this->session->set_flashdata(
			  'msg', 
			  '<div class="alert alert-danger"><a href="#" class="close" data-dismiss="alert" arial-label="close">&times;</a><strong>Peringatan!</strong> password tidak sama !</div>'
			);
			redirect(base_url().'adminNew/home/tambah_user'); //location
		}else{
			$this->load->model('M_admin');
			$simpan=$this->M_admin->tambahdata();
			if($simpan){
				$this->session->set_flashdata(
				  'msg', 
				  '<div class="alert alert-success"><a href="#" class="close" data-dismiss="alert" arial-label="close">&times;</a><strong>Success!</strong> User berhasil ditambahkan !</div>'
				);
				redirect(base_url().'adminNew/home/tambah_user'); //location
			}
			else{
				$this->session->set_flashdata(
				  'msg', 
				  '<div class="alert alert-danger"><a href="#" class="close" data-dismiss="alert" arial-label="close">&times;</a><strong>Peringatan!</strong> User gagal ditambahkan !</div>'
				);
				redirect(base_url().'adminNew/home/tambah_user'); //location
			}
		}
	}
	
	public function hapusadmin($username){
		if($this->session->userdata('level') == "" || $this->session->userdata('level') == null){
             echo'<script>alert("anda tidak mempunyai hak akses");window.location.href="'.base_url().'";</script>';
        }
		$this->load->model('M_admin');
        $hapus=$this->M_admin->hapusdata($username);
		if($hapus){
			$this->session->set_flashdata(
			  'msg', 
			  '<div class="alert alert-success"><a href="#" class="close" data-dismiss="alert" arial-label="close">&times;</a><strong>Success!</strong> User berhasil dihapus !</div>'
			);
			redirect(base_url().'adminNew/home/user'); //location
		}
		else{
			$this->session->set_flashdata(
			  'msg', 
			  '<div class="alert alert-danger"><a href="#" class="close" data-dismiss="alert" arial-label="close">&times;</a><strong>Peringatan!</strong> User gagal dihapus !</div>'
			);
			redirect(base_url().'adminNew/home/user'); //location
		}
	}
	
	public function tampilperid($username){
		$this->load->model('M_admin');
		$data=$this->M_admin->filterdata($username)->row();
		echo json_encode($data);
	}
	
	public function updateadmin(){
		if($this->session->userdata('level') == "" || $this->session->userdata('level') == null){
             echo'<script>alert("anda tidak mempunyai hak akses");window.location.href="'.base_url().'";</script>';
        }
		$id = $this->input->post('id');
		$nama = $this->input->post('namatambah');
        $password = md5($this->input->post('passwordtambah'));
        $konfirmasi_password = md5($this->input->post('konfirmasipasswordtambah'));
		if($nama=='' || empty($nama)){
			$this->session->set_flashdata(
			  'msg', 
			  '<div class="alert alert-danger"><a href="#" class="close" data-dismiss="alert" arial-label="close">&times;</a><strong>Peringatan!</strong> nama harus diisi !</div>'
			);
			redirect(base_url().'adminNew/home/edit_user/'.$id); //location
		}
		elseif($password=='' || $password=='d41d8cd98f00b204e9800998ecf8427e'){
			$this->session->set_flashdata(
			  'msg', 
			  '<div class="alert alert-danger"><a href="#" class="close" data-dismiss="alert" arial-label="close">&times;</a><strong>Peringatan!</strong> password harus diisi !</div>'
			);
			redirect(base_url().'adminNew/home/edit_user/'.$id); //location
		}else if($konfirmasi_password != $password){
			$this->session->set_flashdata(
			  'msg', 
			  '<div class="alert alert-danger"><a href="#" class="close" data-dismiss="alert" arial-label="close">&times;</a><strong>Peringatan!</strong> password tidak sama !</div>'
			);
			redirect(base_url().'adminNew/home/edit_user/'.$id); //location
		}else{
		$this->load->model('M_admin');
		$update=$this->M_admin->updatedata();
			if($update){
				$this->session->set_flashdata(
				  'msg', 
				  '<div class="alert alert-success"><a href="#" class="close" data-dismiss="alert" arial-label="close">&times;</a><strong>Success!</strong> User berhasil diupdate !</div>'
				);
				redirect(base_url().'adminNew/home/edit_user/'.$id); //location
			}
			else{
				$this->session->set_flashdata(
				  'msg', 
				  '<div class="alert alert-danger"><a href="#" class="close" data-dismiss="alert" arial-label="close">&times;</a><strong>Peringatan!</strong> User gagal diupdate !</div>'
				);
				redirect(base_url().'adminNew/home/edit_user/'.$id); //location
			}
		}
	}
}