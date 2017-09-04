<?php
class Posting extends CI_Controller {
	
	function __construct(){
		parent::__construct();
		$this->load->model('M_posting');
		$this->load->library('image_lib');
		$this->load->library('upload');
                
	}
	
	function tampil_posting(){
		$data['hasil']=$this->M_posting->tampil_semua_posting();
		$this->load->view('posting',$data);
	}
	
	function tampil_info(){
		$data['hasil']=$this->M_posting->kategori('informasi_pengumuman')->result();
		$this->load->view('vinfo',$data);
	}
	
	function visitor($ip){
		$data=array(
		'ip'=> $this->db->escape($ip),
		'hits'=>1,
		'tanggal'=>date('Y-m-d')
		);
		if($this->M_posting->tambah_data($data,'viewer')){
		$kemarin  = date("Y-m-d",mktime(0,0,0,date('m'),date('d')-1,date('Y')));
		$data=array(
		'hari_ini'=>$this->db->query('SELECT sum(hits) AS hari_ini FROM viewer WHERE tanggal="'.date("Y-m-d").'"')->row(),
		'kemarin'=>$this->db->query('SELECT sum(hits) AS kemarin FROM viewer WHERE tanggal="'.$kemarin.'"')->row(),
		'total'=>$this->db->query('SELECT sum(hits) as total FROM viewer')->row()
		);
		$this->load->view('vVisitor',$data);
		}
	}
	
	//tampil per id
	public function tampilperid($id){
		$data=$this->M_posting->filter_data($id)->row();
		echo json_encode($data);
	}
	
	public function search(){
		$keyword=addslashes($this->input->post('search'));
		if($keyword==''){
			echo '<div class="alert alert-danger"><a href="#" class="close" data-dismiss="alert" arial-label="close">&times;</a><strong>Peringatan!</strong> Kata lunci harus diisi !</div>';
		}
		else{
		$data['hasil']=$this->M_posting->searching($keyword);
		$this->load->view('vSearch',$data);
		}
	}
	
	function update_posting(){
        if($this->session->userdata('level') == "" || $this->session->userdata('level') == null){
             echo'<script>alert("anda tidak mempunyai hak akses");window.location.href="'.base_url().'";</script>';
        }
		$id=$this->input->post('idposting');
		$judul=addslashes($this->input->post('judulposting'));
		$kategori=$this->input->post('kategoriposting');
		$tempImg=@$_FILES['gambarposting']['tmp_name'];
		$keterangan=$this->input->post('keteranganposting');
		if($judul==''){
			$this->session->set_flashdata(
			    'msg', 
			    '<div class="alert alert-danger"><a href="#" class="close" data-dismiss="alert" arial-label="close">&times;</a><strong>Peringatan!</strong> Judul harus diisi !</div>'
			);
			redirect(base_url().'adminNew/home/edit/'.$id); //location
		}
		elseif($kategori=='-- pilih --' || $kategori=='' ){
			$this->session->set_flashdata(
			    'msg', 
			    '<div class="alert alert-danger"><a href="#" class="close" data-dismiss="alert" arial-label="close">&times;</a><strong>Peringatan!</strong> Kategori belum dipilih !</div>'
			);
			redirect(base_url().'adminNew/home/edit/'.$id); //location
		}
		elseif($keterangan==''||empty($keterangan)){
			$this->session->set_flashdata(
			    'msg', 
			    '<div class="alert alert-danger"><a href="#" class="close" data-dismiss="alert" arial-label="close">&times;</a><strong>Peringatan!</strong> keterangan harus diisi !</div>'
			);
			redirect(base_url().'adminNew/home/edit/'.$id); //location
		}
		else{
			if(empty($tempImg)){
				$data = array( 
				 'judul'=>$judul,
				 'kategori'=>$this->input->post('kategoriposting'),
				 
				 'keterangan'=>$this->input->post('keteranganposting'),
				 'tanggal'=>date('Y-m-d H:i:s')
				 ); 
				 $update=$this->M_posting->update_data($id,'post',$data); 
				 if($update){
				 	$this->session->set_flashdata(
					    'msg', 
					    '<div class="alert alert-success"><a href="#" class="close" data-dismiss="alert" arial-label="close">&times;</a><strong>Success!</strong> Posting berhasil diupdate !</div>'
					);
					redirect(base_url().'adminNew/home/edit/'.$id); //location
				 }
				 else{
				 	$this->session->set_flashdata(
					    'msg', 
					    '<div class="alert alert-danger"><a href="#" class="close" data-dismiss="alert" arial-label="close">&times;</a><strong>Peringatan!</strong> Posting gagal diupdate !</div>'
					);
					redirect(base_url().'adminNew/home/edit/'.$id); //location
				 } 
			}
			else{
			$config['upload_path']   =   "assets/upload/images/asli/";
       		$config['allowed_types'] =   "jpg|jpeg"; 
       		$config['max_size']      =   "5000";
			$config['file_name'] = url_title($this->input->post('gambarposting')); 
			$this->upload->initialize($config); //meng set config yang sudah di atur 
			
			if( !$this->upload->do_upload('gambarposting')) {
				$this->session->set_flashdata(
				    'msg', 
				    '<div class="alert alert-danger"><a href="#" class="close" data-dismiss="alert" arial-label="close">&times;</a><strong>Peringatan!</strong> '.$this->upload->display_errors().' !</div>'
				);
				redirect(base_url().'adminNew/home/edit/'.$id); //location
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
				 'kategori'=>$this->input->post('kategoriposting'),
				 'gambar'=>$this->upload->file_name,				 
				 'keterangan'=>$this->input->post('keteranganposting'),
				 'tanggal'=>date('Y-m-d H:i:s')
				 ); 
				 $update=$this->M_posting->update_data($id,'post',$data); 
				 if($update){
				 	$this->session->set_flashdata(
					    'msg', 
					    '<div class="alert alert-success"><a href="#" class="close" data-dismiss="alert" arial-label="close">&times;</a><strong>Success!</strong> Posting berhasil diupdate !</div>'
					);
					redirect(base_url().'adminNew/home/edit/'.$id); //location
				 }
				 else{
				 	$this->session->set_flashdata(
					    'msg', 
					    '<div class="alert alert-danger"><a href="#" class="close" data-dismiss="alert" arial-label="close">&times;</a><strong>Peringatan!</strong> Posting gagal diupdate !</div>'
					);
					redirect(base_url().'adminNew/home/edit/'.$id); //location
				 } 
			}
			}
		}
		
	}
	
	public function hapus_posting($id, $foto = ""){
                if($this->session->userdata('level') == "" || $this->session->userdata('level') == null){
                     echo'<script>alert("anda tidak mempunyai hak akses");window.location.href="'.base_url().'";</script>';
                }
		if(isset($foto) || $foto != ""){
			$fotoasli= 'assets/upload/images/asli/'.$foto;
			$fotothumb= 'assets/upload/images/thumb/'.$foto;
			unlink($fotoasli);
			unlink($fotothumb);
			$hapus=$this->M_posting->hapus_data($id);
			if($hapus){
				$this->session->set_flashdata(
				    'msg', 
				    '<div class="alert alert-success"><a href="#" class="close" data-dismiss="alert" arial-label="close">&times;</a><strong>Success!</strong> Posting berhasil dihapus !</div>'
				);
				redirect(base_url().'adminNew/home'); //location
			}
			else{
				$this->session->set_flashdata(
				    'msg', 
				    '<div class="alert alert-danger"><a href="#" class="close" data-dismiss="alert" arial-label="close">&times;</a><strong>Peringatan!</strong> Posting gagal dihapus !</div>'
				);
				redirect(base_url().'adminNew/home'); //location
			}
		}
		else{
			$hapus=$this->M_posting->hapus_data($id);
			if($hapus){
				$this->session->set_flashdata(
				    'msg', 
				    '<div class="alert alert-success"><a href="#" class="close" data-dismiss="alert" arial-label="close">&times;</a><strong>Success!</strong> Posting berhasil dihapus !</div>'
				);
				redirect(base_url().'adminNew/home'); //location
			}
			else{
				$this->session->set_flashdata(
				    'msg', 
				    '<div class="alert alert-danger"><a href="#" class="close" data-dismiss="alert" arial-label="close">&times;</a><strong>Peringatan!</strong> Posting gagal dihapus !</div>'
				);
				redirect(base_url().'adminNew/home'); //location
			}
		}
	}
	
	function simpan_posting(){
                if($this->session->userdata('level') == "" || $this->session->userdata('level') == null){
                     echo'<script>alert("anda tidak mempunyai hak akses");window.location.href="'.base_url().'";</script>';
                }
		$judul=addslashes($this->input->post('judulposting'));
		$kategori=$this->input->post('kategoriposting');
		$tempImg=@$_FILES['gambarposting']['tmp_name'];
		$keterangan=$this->input->post('keteranganposting');
		if($judul==''){
			$this->session->set_flashdata(
			    'msg', 
			    '<div class="alert alert-danger"><a href="#" class="close" data-dismiss="alert" arial-label="close">&times;</a><strong>Peringatan!</strong> Judul harus diisi !</div>'
			);
			redirect(base_url().'adminNew/home/tambah'); //location
		}
		elseif($kategori=='-- pilih --' || $kategori=='' ){
			$this->session->set_flashdata(
			    'msg', 
			    '<div class="alert alert-danger"><a href="#" class="close" data-dismiss="alert" arial-label="close">&times;</a><strong>Peringatan!</strong> Kategori belum dipilih !</div>'
			);
			redirect(base_url().'adminNew/home/tambah'); //location
		}
		elseif($keterangan==''||empty($keterangan)){
			$this->session->set_flashdata(
			    'msg', 
			    '<div class="alert alert-danger"><a href="#" class="close" data-dismiss="alert" arial-label="close">&times;</a><strong>Peringatan!</strong> keterangan harus diisi !</div>'
			);
			redirect(base_url().'adminNew/home/tambah'); //location
		}
		else{
			if(empty($tempImg)){
				$data = array( 
				 'judul'=>$judul,
				 'kategori'=>$this->input->post('kategoriposting'),
				 'keterangan'=>$this->input->post('keteranganposting'),
				 'tanggal'=>date('Y-m-d H:i:s'),
				 'status' => 'posting'
				 ); 
				 $simpan=$this->M_posting->tambah_data($data,'post'); 
				 if($simpan){
				 	$this->session->set_flashdata(
					    'msg', 
					    '<div class="alert alert-success"><a href="#" class="close" data-dismiss="alert" arial-label="close">&times;</a><strong>Success!</strong> Posting berhasil ditambahkan !</div>'
					);
					redirect(base_url().'adminNew/home/tambah'); //location
				 }
				 else{
				 	$this->session->set_flashdata(
					    'msg', 
					    '<div class="alert alert-danger"><a href="#" class="close" data-dismiss="alert" arial-label="close">&times;</a><strong>Peringatan!</strong> Posting gagal ditambahkan !</div>'
					);
					redirect(base_url().'adminNew/home/tambah'); //location
				 }
			}
			else{
			$config['upload_path']   =   "assets/upload/images/asli/";
       		$config['allowed_types'] =   "jpg|jpeg"; 
       		$config['max_size']      =   "5000";
       		$config['overwrite'] = TRUE;
			$config['file_name'] = url_title($this->input->post('gambarposting')); 
			$this->upload->initialize($config); //meng set config yang sudah di atur 
			
			if( !$this->upload->do_upload('gambarposting')) {
				$this->session->set_flashdata(
				    'msg', 
				    '<div class="alert alert-danger"><a href="#" class="close" data-dismiss="alert" arial-label="close">&times;</a><strong>Peringatan!</strong> '.$this->upload->display_errors().' !</div>'
				);
				redirect(base_url().'adminNew/home/tambah'); //location
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
				'kategori'=>$this->input->post('kategoriposting'),
				'status' => 'posting',
				'gambar'=>$this->upload->file_name,
				'keterangan'=>$this->input->post('keteranganposting'),
				'tanggal'=>date('Y-m-d H:i:s')
				); 
				$simpan=$this->M_posting->tambah_data($data,'post'); 
				if($simpan){
					$this->session->set_flashdata(
					    'msg', 
					    '<div class="alert alert-success"><a href="#" class="close" data-dismiss="alert" arial-label="close">&times;</a><strong>Success!</strong> Posting berhasil ditambahkan !</div>'
					);
					redirect(base_url().'adminNew/home/tambah'); //location
				}
				else{
					$this->session->set_flashdata(
					    'msg', 
					    '<div class="alert alert-danger"><a href="#" class="close" data-dismiss="alert" arial-label="close">&times;</a><strong>Peringatan!</strong> Posting gagal ditambahkan !</div>'
					);
					redirect(base_url().'adminNew/home/tambah'); //location
				}
			}
			
		}
		
		}
}
	
}