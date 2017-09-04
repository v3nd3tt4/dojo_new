<?php
defined('BASEPATH') OR exit('No direct script access allowed');

//class untuk halaman utama
class Pengajuan_judul extends CI_Controller {
	
	//memanggil halaman visi dan misi
	function index(){
		$this->load->model('M_admin');
		
		$data=array('title'=>'Pengajuan Judul Skripsi',
					'isi'=>'vPengajuanJudul',
					);
		$this->load->view('template/wrapper',$data);
	}

        public function tambah_judul(){
            $this->load->model('M_admin');
            $cek = $this->M_admin->getData('pengajuan_judul', array('npm' => $this->input->post('npm', true), 'judul_diterima is not null' => null ));
            if($cek->num_rows() != 0){
                echo '<div class="alert alert-danger"><a href="#" class="close" data-dismiss="alert" arial-label="close">&times;</a><strong>Peringatan!</strong> Anda sudah pernah melakukan pengajuan judul !</div>';
            }else{
                $data = array(
                  'npm' => $this->input->post('npm', true),
                  'nama' => $this->input->post('nama', true),
                  'judul_1' => $this->input->post('judul1', true), 
                  'judul_2' => $this->input->post('judul2', true), 
                  'judul_3' => $this->input->post('judul3', true), 
                  'keterangan' => $this->input->post('keterangan', true), 
                  'status' => 'menunggu', 
                  'tanggal' => date('YmdHis')
                );
                $simpan = $this->M_admin->saveData('pengajuan_judul', $data);
                if($simpan){
					echo '<div class="alert alert-success"><a href="#" class="close" data-dismiss="alert" arial-label="close">&times;</a><strong>Peringatan!</strong> Data berhasil disimpan, Admin akan memverifikasi judul anda</div>';
					echo '<script>location.reload();</script>';
				}else{
					echo '<div class="alert alert-danger"><a href="#" class="close" data-dismiss="alert" arial-label="close">&times;</a><strong>Peringatan!</strong> Data gagal disimpan</div>';
				}
            }
            
        }
  public function update_judul_yang_diterima(){
    if($this->session->userdata('level') == "" || $this->session->userdata('level') == null){
         echo'<script>alert("anda tidak mempunyai hak akses");window.location.href="'.base_url().'";</script>';
    }
    $this->load->model('M_posting');
    $id = $this->input->post('id_judul', true);
    $data = array(
      'judul_diterima' => $this->input->post('judul_yang_diterima', true),
      'alasan_diterima' => $this->input->post('alasan_judul_diterima', true),
    );
    $update = $this->M_posting->update_data_new('id_pengajuan_judul', $id, 'pengajuan_judul', $data);
    if($update){
      $this->session->set_flashdata(
          'msg', 
          '<div class="alert alert-success"><a href="#" class="close" data-dismiss="alert" arial-label="close">&times;</a><strong>Success!</strong> Berhasil disimpan !</div>'
      );
      redirect(base_url().'adminNew/home/detail_judul/'.$id); //location
    }
    else{
      $this->session->set_flashdata(
          'msg', 
          '<div class="alert alert-danger"><a href="#" class="close" data-dismiss="alert" arial-label="close">&times;</a><strong>Peringatan!</strong> Gagal disimpan !</div>'
      );
      redirect(base_url().'adminNew/home/detail_judul/'.$id); //location
    }

  }

  public function judul_diterima(){
    $this->load->model('M_admin');
    $data=array(
      'title'=>'Pengajuan Judul Skripsi',
      'isi'=>'judul_diterima',
      'list' => $this->M_admin->getData('pengajuan_judul', array('judul_diterima is NOT NULL' => NULL ))
          );
    $this->load->view('template/wrapper',$data);
  }

  public function judul_ditolak(){
    $this->load->model('M_admin');
    $data=array(
      'title'=>'Pengajuan Judul Skripsi',
      'isi'=>'judul_ditolak',
      'list' => $this->M_admin->getData('pengajuan_judul', array('judul_diterima is NULL' => NULL ))
          );
    $this->load->view('template/wrapper',$data);
  }  

}