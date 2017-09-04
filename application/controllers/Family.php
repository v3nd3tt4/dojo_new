<?php

class Family extends CI_Controller {
	
	function __construct(){
		parent::__construct();
		$this->load->model('M_family');
		$this->load->library('image_lib');
		$this->load->library('upload');
		$this->load->helper('url');
  		$this->load->library('pagination');//1
  		$this->load->database();//memanggil pengaturan database dan mengaktifkannya
                if($this->session->userdata('level') == "" || $this->session->userdata('level') == null){
                     echo'<script>alert("anda tidak mempunyai hak akses");window.location.href="'.base_url().'";</script>';
                }
	}
	
	function cari(){         
		  $pencarian = $this->input->post('searchfamily');
		  if($pencarian==''){
			  echo '<div class="alert alert-danger"><a href="#" class="close" data-dismiss="alert" arial-label="close">&times;</a><strong>Peringatan!</strong> Keyword harus diisi !</div>';
		  }
		  else{
		  $data['cari']=$this->M_family->list_data($pencarian);

		  $this->load->view('v_search_family',$data);
		  }
	}
	
	function update_family(){
		if($this->session->userdata('level') == "" || $this->session->userdata('level') == null){
             echo'<script>alert("anda tidak mempunyai hak akses");window.location.href="'.base_url().'";</script>';
        }
		$id=$this->input->post('idfamily');
        $jns_id = $this->input->post('idnyafamily');
		$kodefamily=addslashes($this->input->post('kodefamily'));
		$namafamily=addslashes($this->input->post('namafamily'));
		$kategorifamily=$this->input->post('kategorifamily');
		$tempImg=@$_FILES['gambarfamily']['tmp_name'];
		$keterangan=$this->input->post('keteranganfamily');
		if($kodefamily==''){
			$this->session->set_flashdata(
			    'msg', 
			    '<div class="alert alert-danger"><a href="#" class="close" data-dismiss="alert" arial-label="close">&times;</a><strong>Peringatan!</strong> NPM/NIP/Kode-Dosen harus diisi !</div>'
			);
			redirect(base_url().'adminNew/home/edit_dosen/'.$id); //location
		}
		elseif($namafamily==''){
			$this->session->set_flashdata(
			    'msg', 
			    '<div class="alert alert-danger"><a href="#" class="close" data-dismiss="alert" arial-label="close">&times;</a><strong>Peringatan!</strong> Nama harus diisi !</div>'
			);
			redirect(base_url().'adminNew/home/edit_dosen/'.$id); //location
		}
		elseif($kategorifamily=='-- pilih --' || $kategorifamily=='' ){
			$this->session->set_flashdata(
			    'msg', 
			    '<div class="alert alert-danger"><a href="#" class="close" data-dismiss="alert" arial-label="close">&times;</a><strong>Peringatan!</strong> Kategori belum dipilih !</div>'
			);
			redirect(base_url().'adminNew/home/edit_dosen/'.$id); //location
		}
		elseif($keterangan==''||empty($keterangan)){
			$this->session->set_flashdata(
			    'msg', 
			    '<div class="alert alert-danger"><a href="#" class="close" data-dismiss="alert" arial-label="close">&times;</a><strong>Peringatan!</strong> keterangan harus diisi !</div>'
			);
			redirect(base_url().'adminNew/home/edit_dosen/'.$id); //location
		}
		else{
			if(empty($tempImg)){
				$data = array( 
				 'jenis_id'=> $jns_id,
				 'kode'=>$kodefamily,
				 'nama'=>$namafamily,
				 'kategori'=>$this->input->post('kategorifamily'),
				 'keterangan'=>$this->input->post('keteranganfamily'),				 
				 'kategori_dosen' => $this->input->post('kategoridosen'),
				 ); 
				 $update=$this->M_family->update_data($id,'family',$data); 
				 if($update){
				 	$this->session->set_flashdata(
					    'msg', 
					    '<div class="alert alert-success"><a href="#" class="close" data-dismiss="alert" arial-label="close">&times;</a><strong>Success!</strong> Data berhasil diupdate !</div>'
					);
					redirect(base_url().'adminNew/home/edit_dosen/'.$id); //location
				 }
				 else{
				 	$this->session->set_flashdata(
					    'msg', 
					    '<div class="alert alert-danger"><a href="#" class="close" data-dismiss="alert" arial-label="close">&times;</a><strong>Peringatan!</strong> Data gagal diupdate !</div>'
					);
					redirect(base_url().'adminNew/home/edit_dosen/'.$id); //location
				 }
			}
			else{
			$config['upload_path']   =   "assets/upload/images/asli/";
       		$config['allowed_types'] =   "gif|jpg|jpeg"; 
       		$config['max_size']      =   "5000";
			$config['file_name'] = url_title($this->input->post('gambarfamily')); 
			$this->upload->initialize($config); //meng set config yang sudah di atur 
			
			if( !$this->upload->do_upload('gambarfamily')) {
				$this->session->set_flashdata(
				    'msg', 
				    '<div class="alert alert-danger"><a href="#" class="close" data-dismiss="alert" arial-label="close">&times;</a><strong>Peringatan!</strong>'.$this->upload->display_errors().'</div>'
				);
				redirect(base_url().'adminNew/home/edit_dosen/'.$id); //location
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
                                 'jenis_id'=> $jns_id,
				 'kode'=>$kodefamily,
				 'nama'=>$namafamily,
				 'kategori'=>$this->input->post('kategorifamily'),				 
				 'kategori_dosen' => $this->input->post('kategoridosen'),
				 'foto'=>$this->upload->file_name,
				 'keterangan'=>$this->input->post('keteranganfamily')	
				 ); 
				 $update=$this->M_family->update_data($id,'family',$data); 
				 if($update){
				 	$this->session->set_flashdata(
					    'msg', 
					    '<div class="alert alert-success"><a href="#" class="close" data-dismiss="alert" arial-label="close">&times;</a><strong>Success!</strong> Data berhasil diupdate !</div>'
					);
					redirect(base_url().'adminNew/home/edit_dosen/'.$id); //location
				 }
				 else{
				 	$this->session->set_flashdata(
					    'msg', 
					    '<div class="alert alert-danger"><a href="#" class="close" data-dismiss="alert" arial-label="close">&times;</a><strong>Peringatan!</strong> Data gagal diupdate !</div>'
					);
					redirect(base_url().'adminNew/home/edit_dosen/'.$id); //location
				 }
			}
			}
		}
	}
	//tampil per id
	public function tampilperid($id){
		$data=$this->M_family->filter_data($id)->row();
		echo json_encode($data);
	}
	
	public function hapus_family($id, $foto){
		if($this->session->userdata('level') == "" || $this->session->userdata('level') == null){
             echo'<script>alert("anda tidak mempunyai hak akses");window.location.href="'.base_url().'";</script>';
        }
		if(isset($foto)){
			$fotoasli= 'assets/upload/images/asli/'.$foto;
			$fotothumb= 'assets/upload/images/thumb/'.$foto;
			unlink($fotoasli);
			unlink($fotothumb);
			$hapus=$this->M_family->hapus_data($id);
			if($hapus){
			 	$this->session->set_flashdata(
				    'msg', 
				    '<div class="alert alert-success"><a href="#" class="close" data-dismiss="alert" arial-label="close">&times;</a><strong>Success!</strong> Data berhasil dihapus !</div>'
				);
				redirect(base_url().'adminNew/home/dosen'); //location
			 }
			 else{
			 	$this->session->set_flashdata(
				    'msg', 
				    '<div class="alert alert-danger"><a href="#" class="close" data-dismiss="alert" arial-label="close">&times;</a><strong>Peringatan!</strong> Data gagal dihapus !</div>'
				);
				redirect(base_url().'adminNew/home/dosen'); //location
			 }
		}
		else{
			$hapus=$this->M_family->hapus_data($id);
			if($hapus){
			 	$this->session->set_flashdata(
				    'msg', 
				    '<div class="alert alert-success"><a href="#" class="close" data-dismiss="alert" arial-label="close">&times;</a><strong>Success!</strong> Data berhasil dihapus !</div>'
				);
				redirect(base_url().'adminNew/home/dosen'); //location
			 }
			 else{
			 	$this->session->set_flashdata(
				    'msg', 
				    '<div class="alert alert-danger"><a href="#" class="close" data-dismiss="alert" arial-label="close">&times;</a><strong>Peringatan!</strong> Data gagal dihapus !</div>'
				);
				redirect(base_url().'adminNew/home/dosen'); //location
			 }
		}
	}
	
	function simpan_family(){
		if($this->session->userdata('level') == "" || $this->session->userdata('level') == null){
             echo'<script>alert("anda tidak mempunyai hak akses");window.location.href="'.base_url().'";</script>';
        }
        $jns_id = $this->input->post('idnyafamily');
		$kodefamily=addslashes($this->input->post('kodefamily'));
		$namafamily=addslashes($this->input->post('namafamily'));
		$kategorifamily=$this->input->post('kategorifamily');
		$tempImg=@$_FILES['gambarfamily']['tmp_name'];
		$keterangan=$this->input->post('keteranganfamily');
		if($kodefamily==''){
			$this->session->set_flashdata(
			    'msg', 
			    '<div class="alert alert-danger"><a href="#" class="close" data-dismiss="alert" arial-label="close">&times;</a><strong>Peringatan!</strong> NPM/NIP/Kode-Dosen harus diisi !</div>'
			);
			redirect(base_url().'adminNew/home/tambah_dosen'); //location
		}
		elseif($namafamily==''){
			$this->session->set_flashdata(
			    'msg', 
			    '<div class="alert alert-danger"><a href="#" class="close" data-dismiss="alert" arial-label="close">&times;</a><strong>Peringatan!</strong> Nama harus diisi !</div>'
			);
			redirect(base_url().'adminNew/home/tambah_dosen'); //location
		}
		elseif($kategorifamily=='-- pilih --' || $kategorifamily=='' ){
			$this->session->set_flashdata(
			    'msg', 
			    '<div class="alert alert-danger"><a href="#" class="close" data-dismiss="alert" arial-label="close">&times;</a><strong>Peringatan!</strong> Kategori belum dipilih !</div>'
			);
			redirect(base_url().'adminNew/home/tambah_dosen'); //location
		}
		elseif($keterangan==''||empty($keterangan)){
			$this->session->set_flashdata(
			    'msg', 
			    '<div class="alert alert-danger"><a href="#" class="close" data-dismiss="alert" arial-label="close">&times;</a><strong>Peringatan!</strong> keterangan harus diisi !</div>'
			);
			redirect(base_url().'adminNew/home/tambah_dosen'); //location
		}
		else{
			if(empty($tempImg)){
				$data = array( 
                 'jenis_id'=> $jns_id,
				 'kode'=>$kodefamily,
				 'nama'=>$namafamily,
				 'kategori'=>$this->input->post('kategorifamily'),
				 'keterangan'=>$this->input->post('keteranganfamily'),
				 'kategori_dosen' => $this->input->post('kategoridosen'),
				 ); 
				 $simpan=$this->M_family->tambah_data($data,'family'); 
				 if($simpan){
				 	$this->session->set_flashdata(
					    'msg', 
					    '<div class="alert alert-success"><a href="#" class="close" data-dismiss="alert" arial-label="close">&times;</a><strong>Success!</strong> Data berhasil disimpan !</div>'
					);
					redirect(base_url().'adminNew/home/tambah_dosen'); //location
				 }
				 else{
				 	$this->session->set_flashdata(
					    'msg', 
					    '<div class="alert alert-danger"><a href="#" class="close" data-dismiss="alert" arial-label="close">&times;</a><strong>Peringatan!</strong> Data gagal disimpan !</div>'
					);
					redirect(base_url().'adminNew/home/tambah_dosen'); //location
				 }
			}
			else{
				$config['upload_path']   =   "assets/upload/images/asli/";
	       		$config['allowed_types'] =   "gif|jpg|jpeg"; 
	       		$config['max_size']      =   "5000";
				$config['file_name'] = url_title($this->input->post('gambarfamily')); 
				$this->upload->initialize($config); //meng set config yang sudah di atur 
				
				if( !$this->upload->do_upload('gambarfamily')) {
					$this->session->set_flashdata(
					    'msg', 
					    '<div class="alert alert-danger"><a href="#" class="close" data-dismiss="alert" arial-label="close">&times;</a><strong>Peringatan!</strong> '.$this->upload->display_errors().'</div>'
					);
					redirect(base_url().'adminNew/home/tambah_dosen'); //location
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
	                                 'jenis_id'=> $jns_id,
					 'kode'=>$kodefamily,
					 'nama'=>$namafamily,
					 'kategori'=>$this->input->post('kategorifamily'),
					 'foto'=>$this->upload->file_name,
					 'keterangan'=>$this->input->post('keteranganfamily'),
					 'kategori_dosen' => $this->input->post('kategoridosen'),			 
					 ); 
					  $simpan=$this->M_family->tambah_data($data,'family'); 
					 if($simpan){
					 	$this->session->set_flashdata(
						    'msg', 
						    '<div class="alert alert-success"><a href="#" class="close" data-dismiss="alert" arial-label="close">&times;</a><strong>Success!</strong> Data berhasil disimpan !</div>'
						);
						redirect(base_url().'adminNew/home/tambah_dosen'); //location
					 }
					 else{
					 	$this->session->set_flashdata(
						    'msg', 
						    '<div class="alert alert-danger"><a href="#" class="close" data-dismiss="alert" arial-label="close">&times;</a><strong>Peringatan!</strong> Data gagal disimpan !</div>'
						);
						redirect(base_url().'adminNew/home/tambah_dosen'); //location
					 }
				}
			
			}
		}
	}
}