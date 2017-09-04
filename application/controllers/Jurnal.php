<?php
defined('BASEPATH') OR exit('No direct script access allowed');

//class untuk halaman utama
class Jurnal extends CI_Controller {
	
	function __construct(){
		parent::__construct();
		$this->load->model('M_jurnal');
		$this->load->library('image_lib');
		$this->load->library('upload');
	}
	
	function tampil_jurnal(){
		$data['hasil']=$this->M_jurnal->tampil_semua_jurnal();
		$this->load->view('jurnal',$data);
	}
	
	public function hapus_jurnal($id, $foto){
		if($this->session->userdata('level') == "" || $this->session->userdata('level') == null){
             echo'<script>alert("anda tidak mempunyai hak akses");window.location.href="'.base_url().'";</script>';
        }
		if(isset($foto)){
			$fotoasli= 'assets/upload/images/asli/'.$foto;
			$fotothumb= 'assets/upload/images/thumb/'.$foto;
			unlink($fotoasli);
			unlink($fotothumb);
			$hapus=$this->M_jurnal->hapusdata($id);
			if($hapus){
				echo 'sukses';
			}
			else{
				echo 'gagal';
			}
		}
		else{
			$hapus=$this->M_jurnal->hapusdata($id);
			if($hapus){
				echo 'sukses';
			}
			else{
				echo 'gagal';
			}
		}
	}
	
	//tampil per id
	public function tampilperid($id){
		$data=$this->M_jurnal->filter_data($id)->row();
		echo json_encode($data);
	}
	
	public function tampiljurnalperid($id){
		$data['hasil']=$this->M_jurnal->filter_data($id)->row();
		$this->load->view('v_hover_jurnal',$data);
	}
	
	//memanggil halaman jurnal
	function index($id=NULL){
		 $jml = $this->db->get('jurnal');
		 $config['base_url'] = base_url().'jurnal/index';
		 $config['total_rows'] = $jml->num_rows();
		 $config['per_page'] = '12';
		 // config pagination ke bootstrap
		$config['full_tag_open'] = "<ul class='pagination pagination-sm'>";
		$config['full_tag_close'] ="</ul>";
		$config['num_tag_open'] = '<li>';
		$config['num_tag_close'] = '</li>';
		$config['cur_tag_open'] = "<li class='disabled'><li class='active'><a href='#'>";
		$config['cur_tag_close'] = "<span class='sr-only'></span></a></li>";
		$config['next_tag_open'] = "<li>";
		$config['next_tagl_close'] = "</li>";
		$config['prev_tag_open'] = "<li>";
		$config['prev_tagl_close'] = "</li>";
		$config['first_tag_open'] = "<li>";
		$config['first_tagl_close'] = "</li>";
		$config['last_tag_open'] = "<li>";
		$config['last_tagl_close'] = "</li>";

		 $this->pagination->initialize($config);
		 //buat pagination
 		 $data['halaman'] = $this->pagination->create_links();

         //tamplikan data
         $data['query'] = $this->M_jurnal->ambil_jurnal($config['per_page'], $id);

		$data=array('title'=>'Jurnal',
					'isi'=>'vJurnal',
					'halaman'=>$this->pagination->create_links(),
					'query'=>$this->M_jurnal->ambil_jurnal($config['per_page'], $id)
					);
		 $this->load->view('template/wrapper',$data);
	}
	
	function update_jurnal(){
		if($this->session->userdata('level') == "" || $this->session->userdata('level') == null){
             echo'<script>alert("anda tidak mempunyai hak akses");window.location.href="'.base_url().'";</script>';
        }
		$id=$this->input->post('idjurnal');
		$isbn=addslashes($this->input->post('isbn'));
		$judul=addslashes($this->input->post('juduljurnal'));
		$tempImg=@$_FILES['userfile']['tmp_name'];
		$keterangan=$this->input->post('keteranganjurnal');
		if($isbn==''){
			echo '<div class="alert alert-danger"><a href="#" class="close" data-dismiss="alert" arial-label="close">&times;</a><strong>Peringatan!</strong> isbn harus diisi !</div>';
		}
		elseif($judul==''){
			echo '<div class="alert alert-danger"><a href="#" class="close" data-dismiss="alert" arial-label="close">&times;</a><strong>Peringatan!</strong> judul harus diisi !</div>';
		}
		elseif($keterangan==''||empty($keterangan)){
			echo '<div class="alert alert-danger"><a href="#" class="close" data-dismiss="alert" arial-label="close">&times;</a><strong>Peringatan!</strong> keterangan harus diisi !</div>';
		}
		else{
			if(empty($tempImg)){
				$data = array( 
				 'isbn'=>$isbn,
				 'judul'=>$judul,
				 'keterangan'=>$this->input->post('keteranganjurnal'),
				 'tanggal'=>date('Y-m-d H:i:s')
				 ); 
				 $update=$this->M_jurnal->update_data($id,'jurnal',$data); 
				 if($update){
				 	echo 'sukses';
				 }
				 else{
					 echo 'gagal';
				 }
			}
			else{
			$config['upload_path']   =   "assets/upload/images/asli/";
       		$config['allowed_types'] =   "gif|jpg|jpeg"; 
       		$config['max_size']      =   "5000";
			$config['file_name'] = url_title($this->input->post('userfile')); 
			$this->upload->initialize($config); //meng set config yang sudah di atur 
			
			if( !$this->upload->do_upload('userfile')) {
				echo $this->upload->display_errors(); 
			}
			else{ 
			$fInfo = $this->upload->data(); //uploading
			$direktoriThumb     = "assets/upload/images/thumb/";
			$file="assets/upload/images/asli/".$this->upload->file_name;
				 //identitas file gambar
    		$realImages             = imagecreatefromjpeg($file);
    		$width                  = imageSX($realImages);
    		$height                 = imageSY($realImages);
    
    		//simpan ukuran thumbs
    		$thumbWidth     = 320;
    		$thumbHeight    = ($thumbWidth / $width) * $height;
    
			//mengubah ukuran gambar
			$thumbImage = imagecreatetruecolor($thumbWidth, $thumbHeight);
			imagecopyresampled($thumbImage, $realImages, 0,0,0,0, $thumbWidth, $thumbHeight, $width, $height);
			
			//simpan gambar thumbnail
			imagejpeg($thumbImage,$direktoriThumb.$this->upload->file_name);
			
			//hapus objek gambar dalam memori
			imagedestroy($realImages);
			imagedestroy($thumbImage);
			
			     $data = array( 
				 'isbn'=>$isbn,
				 'judul'=>$judul,
				 'foto'=>$this->upload->file_name,
				 'keterangan'=>$this->input->post('keteranganjurnal'),
				 'tanggal'=>date('Y-m-d H:i:s')
				 ); 
				 $update=$this->M_jurnal->update_data($id,'jurnal',$data); 
				 if($update){
				 	echo 'sukses';
					
				 }
				 else{
					 echo 'gagal';
				 }
			}
			}
		}
		
	}
	
	function simpanjurnal(){
		if($this->session->userdata('level') == "" || $this->session->userdata('level') == null){
             echo'<script>alert("anda tidak mempunyai hak akses");window.location.href="'.base_url().'";</script>';
        }
		$isbn=addslashes($this->input->post('isbn'));
		$judul=addslashes($this->input->post('juduljurnal'));
		$tempImg=@$_FILES['userfile']['tmp_name'];
		$keterangan=$this->input->post('keteranganjurnal');
		if($isbn==''){
			echo '<div class="alert alert-danger"><a href="#" class="close" data-dismiss="alert" arial-label="close">&times;</a><strong>Peringatan!</strong> isbn harus diisi !</div>';
		}
		elseif($judul==''){
			echo '<div class="alert alert-danger"><a href="#" class="close" data-dismiss="alert" arial-label="close">&times;</a><strong>Peringatan!</strong> judul harus diisi !</div>';
		}
		elseif($keterangan==''||empty($keterangan)){
			echo '<div class="alert alert-danger"><a href="#" class="close" data-dismiss="alert" arial-label="close">&times;</a><strong>Peringatan!</strong> keterangan harus diisi !</div>';
		}
		else{
			if(empty($tempImg)){
				$data = array( 
				 'isbn'=>$isbn,
				 'judul'=>$judul,
				 
				 'keterangan'=>$this->input->post('keteranganjurnal'),
				 'tanggal'=>date('Y-m-d H:i:s')
				 ); 
				 $simpan=$this->M_jurnal->tambahdata($data,'jurnal'); 
				 if($simpan){
				 	echo 'sukses';
				 }
				 else{
					 echo 'gagal';
				 }
			}
			else{
			$config['upload_path']   =   "assets/upload/images/asli/";
       		$config['allowed_types'] =   "gif|jpg|jpeg"; 
       		$config['max_size']      =   "5000";
			$config['file_name'] = url_title($this->input->post('userfile')); 
			$this->upload->initialize($config); //meng set config yang sudah di atur 
			
			if( !$this->upload->do_upload('userfile')) {
				echo $this->upload->display_errors(); 
			}
			else{ 
			$fInfo = $this->upload->data(); //uploading
			$direktoriThumb     = "assets/upload/images/thumb/";
			$file="assets/upload/images/asli/".$this->upload->file_name;
				 //identitas file gambar
    		$realImages             = imagecreatefromjpeg($file);
    		$width                  = imageSX($realImages);
    		$height                 = imageSY($realImages);
    
    		//simpan ukuran thumbs
    		$thumbWidth     = 320;
    		$thumbHeight    = ($thumbWidth / $width) * $height;
    
			//mengubah ukuran gambar
			$thumbImage = imagecreatetruecolor($thumbWidth, $thumbHeight);
			imagecopyresampled($thumbImage, $realImages, 0,0,0,0, $thumbWidth, $thumbHeight, $width, $height);
			
			//simpan gambar thumbnail
			imagejpeg($thumbImage,$direktoriThumb.$this->upload->file_name);
			
			//hapus objek gambar dalam memori
			imagedestroy($realImages);
			imagedestroy($thumbImage);
			
			     $data = array( 
				 'isbn'=>$isbn,
				 'judul'=>$judul,
				 'foto'=>$this->upload->file_name,
				 'keterangan'=>$this->input->post('keteranganjurnal'),
				 'tanggal'=>date('Y-m-d H:i:s')
				 ); 
				 $simpan=$this->M_jurnal->tambahdata($data,'jurnal'); 
				 if($simpan){
				 	echo 'sukses';
					
				 }
				 else{
					 echo 'gagal';
				 }
			}
			
		}
		
	}
}
}