<?php
defined('BASEPATH') OR exit('No direct script access allowed');

//class untuk halaman utama
class Kotak_saran extends CI_Controller {
	//memanggil halaman sejarah
	function index(){
		$this->load->model('M_posting');
		$this->M_posting->kategori('konseling');
		
		$data=array('title'=>'home',
					'isi'=>'vKotakSaran',
					'hasil'=>$this->M_posting->kategori('konseling')->row(),
					'total'=>$this->M_posting->kategori('konseling')->num_rows()
					);
		$this->load->view('template/wrapper',$data);
	}

    function insert(){
           $this->load->model('M_posting');
           $nama = $this->input->post('namaSaran', true);
           $email = $this->input->post('emailSaran', true);
           $pesan = $this->input->post('pesanSaran', true);

           if($nama == '' || empty($nama)){
               echo '<div class="alert alert-danger"><strong>Peringatan!</strong> nama harus diisi</div>';
           }else if($email == '' || empty($email)){
               echo '<div class="alert alert-danger"><strong>Peringatan!</strong> email harus diisi</div>';
           }else if($pesan == '' || empty($pesan)){
               echo '<div class="alert alert-danger"><strong>Peringatan!</strong> pesan harus diisi</div>';
           }else{
               $data = array(
                       'nama' => $nama,
                       'email' => $email,
                       'pesan' => $pesan,
                       'tanggal' => date('Y-m-d H:i:s')
               );
               $simpan = $this->M_posting->tambah_data($data, 'saran');
               if($simpan){
                  echo '<div class="alert alert-success"><strong>Success!</strong> pesan berhasil dikirim</div><script>location.reload();</script>';
               }else{
                  echo '<div class="alert alert-danger"><strong>Peringatan!</strong> gagal menyimpan</div>';
               }
           }


    }
    
  public function hapus_saran($id){
    if($this->session->userdata('level') == "" || $this->session->userdata('level') == null){
         echo'<script>alert("anda tidak mempunyai hak akses");window.location.href="'.base_url().'";</script>';
    }
    $hapus =  $this->db->delete('saran', array('id' => $id));
     if($hapus){
      $this->session->set_flashdata(
          'msg', 
          '<div class="alert alert-success"><a href="#" class="close" data-dismiss="alert" arial-label="close">&times;</a><strong>Success!</strong> Data berhasil dihapus !</div>'
      );
      redirect(base_url().'adminNew/home/kotak_saran'); //location
     }
     else{
      $this->session->set_flashdata(
          'msg', 
          '<div class="alert alert-danger"><a href="#" class="close" data-dismiss="alert" arial-label="close">&times;</a><strong>Peringatan!</strong> Data gagal dihapus !</div>'
      );
      redirect(base_url().'adminNew/home/kotak_saran'); //location
     } 
  }

}
