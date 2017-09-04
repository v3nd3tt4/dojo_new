<?php
defined('BASEPATH') OR exit('No direct script access allowed');

//class untuk halaman utama
class Gallery extends CI_Controller {
	
	function __construct(){
		parent::__construct();
		$this->load->model('M_galeri');
		$this->load->library('image_lib');
		$this->load->library('upload');
	}
	
	function hapus_galeri($id, $foto){
		if($this->session->userdata('level') == "" || $this->session->userdata('level') == null){
             echo'<script>alert("anda tidak mempunyai hak akses");window.location.href="'.base_url().'";</script>';
        }
		$fotoasli= 'assets/upload/images/asli/'.$foto;
		$fotothumb= 'assets/upload/images/thumb/'.$foto;
		unlink($fotoasli);
		unlink($fotothumb);
		$hapus=$this->M_galeri->hapusdata($id);
		if($hapus){
			$this->session->set_flashdata(
			  'msg', 
			  '<div class="alert alert-success"><a href="#" class="close" data-dismiss="alert" arial-label="close">&times;</a><strong>Success!</strong> Data berhasil dihapus !</div>'
			);
			redirect(base_url().'adminNew/home/galeri'); //location
		}
		else{
			$this->session->set_flashdata(
			  'msg', 
			  '<div class="alert alert-danger"><a href="#" class="close" data-dismiss="alert" arial-label="close">&times;</a><strong>Peringatan!</strong> Data gagal dihapus !</div>'
			);
			redirect(base_url().'adminNew/home/galeri'); //location
		}
	}
	
	//tampil per id
	public function tampilperid($id){
		$data=$this->M_galeri->filter_data($id)->row();
		echo json_encode($data);
	}
	
	//memanggil halaman galei
	function index($id=NULL){
		$jml = $this->db->get_where('gambar', array('kategori'=>'galeri'));
		 $config['base_url'] = base_url().'activity/index';
		 $config['total_rows'] = $jml->num_rows();
		 $config['per_page'] = '18';
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
		 $data['query'] = $this->M_galeri->ambil_galeri($config['per_page'], $id);
		$data=array('title'=>'Gallery',
					'isi'=>'vGallery',
					'halaman'=>$this->pagination->create_links(),
					'jumlah'=>$jml->num_rows(),
					'hasil'=>$this->M_galeri->ambil_galeri($config['per_page'], $id)
					);
		$this->load->view('template/wrapper',$data);
	}
	
	function tampil_galeri(){
		$data['hasil']=$this->M_galeri->tampil_semua_galeri();
		$this->load->view('galeri',$data);
	}
	
	
	function update_galeri(){
		if($this->session->userdata('level') == "" || $this->session->userdata('level') == null){
             echo'<script>alert("anda tidak mempunyai hak akses");window.location.href="'.base_url().'";</script>';
        }
		$id=$this->input->post('idgaleri');
		$judul=addslashes($this->input->post('judulgaleri'));
		$kategori=$this->input->post('kategorigaleri');
		$tempImg=@$_FILES['gambargaleri']['tmp_name'];
		
		if($judul==''){
			echo '<div class="alert alert-danger"><a href="#" class="close" data-dismiss="alert" arial-label="close">&times;</a><strong>Peringatan!</strong> Judul harus diisi !</div>';
		}
		elseif($kategori=='' || $kategori=='-- pilih --'){
			echo '<div class="alert alert-danger"><a href="#" class="close" data-dismiss="alert" arial-label="close">&times;</a><strong>Peringatan!</strong> Kategori harus diisi !</div>';
		}
		elseif(empty($tempImg)){
			$data = array( 
				 'judul'=>$judul,
				 
				 'kategori'=>$kategori,
				 'tanggal'=>date('Y-m-d H:i:s')
			); 
			$simpan=$this->M_galeri->update_data($id, 'gambar', $data); 
			if($simpan){
				$this->session->set_flashdata(
				  'msg', 
				  '<div class="alert alert-success"><a href="#" class="close" data-dismiss="alert" arial-label="close">&times;</a><strong>Success!</strong> Data berhasil diupdate !</div>'
				);
				redirect(base_url().'adminNew/home/edit_galeri/'.$id); //location
			}
			else{
				$this->session->set_flashdata(
				  'msg', 
				  '<div class="alert alert-danger"><a href="#" class="close" data-dismiss="alert" arial-label="close">&times;</a><strong>Peringatan!</strong> Data gagal diupdate !</div>'
				);
				redirect(base_url().'adminNew/home/edit_galeri/'.$id); //location
			}
		}
		else{
			
			$config['upload_path']   =   "assets/upload/images/asli/";
       		$config['allowed_types'] =   "gif|jpg|jpeg"; 
       		$config['max_size']      =   "5000";
       		$config['overwrite'] = TRUE;
			$config['file_name'] = url_title($this->input->post('gambargaleri')); 
			$this->upload->initialize($config); //meng set config yang sudah di atur 
			
			if( !$this->upload->do_upload('gambargaleri')) {
				$this->session->set_flashdata(
				  'msg', 
				  '<div class="alert alert-danger"><a href="#" class="close" data-dismiss="alert" arial-label="close">&times;</a><strong>Peringatan!</strong> '.$this->upload->display_errors().' !</div>'
				);
				redirect(base_url().'adminNew/home/edit_galeri/'.$id); //location
				
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
					'judul'=>$judul,
					'nama'=>$this->upload->file_name,
					'kategori'=>$kategori,
					'tanggal'=>date('Y-m-d H:i:s')
				); 
				$simpan=$this->M_galeri->update_data($id, 'gambar', $data); 
				if($simpan){
					$this->session->set_flashdata(
					  'msg', 
					  '<div class="alert alert-success"><a href="#" class="close" data-dismiss="alert" arial-label="close">&times;</a><strong>Success!</strong> Data berhasil diupdate !</div>'
					);
					redirect(base_url().'adminNew/home/edit_galeri/'.$id); //location
				}
				else{
					$this->session->set_flashdata(
					  'msg', 
					  '<div class="alert alert-danger"><a href="#" class="close" data-dismiss="alert" arial-label="close">&times;</a><strong>Peringatan!</strong> Data gagal diupdate !</div>'
					);
					redirect(base_url().'adminNew/home/edit_galeri/'.$id); //location
				}
			}
			
		}
	}
	
	function simpangaleri(){
		if($this->session->userdata('level') == "" || $this->session->userdata('level') == null){
             echo'<script>alert("anda tidak mempunyai hak akses");window.location.href="'.base_url().'";</script>';
        }
		$judul=addslashes($this->input->post('judulgaleri'));
		$kategori=$this->input->post('kategorigaleri');
		$tempImg=@$_FILES['gambargaleri']['tmp_name'];
		
		if($judul==''){
			$this->session->set_flashdata(
			  'msg', 
			  '<div class="alert alert-danger"><a href="#" class="close" data-dismiss="alert" arial-label="close">&times;</a><strong>Success!</strong> Judul harus diisi !</div>'
			);
			redirect(base_url().'adminNew/home/tambah_galeri'); //location
		}
		elseif($kategori=='' || $kategori=='-- pilih --'){
			$this->session->set_flashdata(
			  'msg', 
			  '<div class="alert alert-danger"><a href="#" class="close" data-dismiss="alert" arial-label="close">&times;</a><strong>Success!</strong> Kategori harus diisi !</div>'
			);
			redirect(base_url().'adminNew/home/tambah_galeri'); //location
		}
		elseif(empty($tempImg)){
			$this->session->set_flashdata(
			  'msg', 
			  '<div class="alert alert-danger"><a href="#" class="close" data-dismiss="alert" arial-label="close">&times;</a><strong>Success!</strong> file harus diisi !</div>'
			);
			redirect(base_url().'adminNew/home/tambah_galeri'); //location
		}
		else{
			
			$config['upload_path']   =   "assets/upload/images/asli/";
       		$config['allowed_types'] =   "gif|jpg|jpeg"; 
       		$config['max_size']      =   "5000";
       		$config['overwrite'] = TRUE;
			$config['file_name'] = url_title($this->input->post('gambargaleri')); 
			$this->upload->initialize($config); //meng set config yang sudah di atur 
			
			if( !$this->upload->do_upload('gambargaleri')) {
				$this->session->set_flashdata(
				  'msg', 
				  '<div class="alert alert-danger"><a href="#" class="close" data-dismiss="alert" arial-label="close">&times;</a><strong>Peringatan!</strong> '.$this->upload->display_errors().' !</div>'
				);
				redirect(base_url().'adminNew/home/edit_galeri/'.$id); //location
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
				 'judul'=>$judul,
				 'nama'=>$this->upload->file_name,
				 'kategori'=>$kategori,
				 'tanggal'=>date('Y-m-d H:i:s')
				 ); 
				 $simpan=$this->M_galeri->tambahdata($data,'gambar'); 
				 if($simpan){
					$this->session->set_flashdata(
					  'msg', 
					  '<div class="alert alert-success"><a href="#" class="close" data-dismiss="alert" arial-label="close">&times;</a><strong>Success!</strong> Data berhasil disimpan !</div>'
					);
					redirect(base_url().'adminNew/home/tambah_galeri'); //location
				}
				else{
					$this->session->set_flashdata(
					  'msg', 
					  '<div class="alert alert-danger"><a href="#" class="close" data-dismiss="alert" arial-label="close">&times;</a><strong>Peringatan!</strong> Data gagal disimpan !</div>'
					);
					redirect(base_url().'adminNew/home/tambah_galeri'); //location
				}
			}
			
		}
		
	}
	//end tambah
	}
	//end
