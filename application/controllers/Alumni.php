<?php
class Alumni extends CI_Controller {
	
	function __construct(){
		parent::__construct();
		$this->load->model('M_family');
		$this->load->library('image_lib');
		$this->load->library('upload');
	}
	
	//memanggil halaman dosen
	function index($id=NULL){
		$jml = $this->db->get_where('family', array('kategori'=>'Alumni'));
		 $config['base_url'] = base_url().'alumni/index';
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

         //tamplikan data
         $data['query'] = $this->M_family->ambil_family_alumni($config['per_page'], $id);
		$data=array('title'=>'Alumni',
					'isi'=>'vAlumni',
					'halaman'=>$this->pagination->create_links(),
					'jumlah'=>$jml->num_rows(),
					'hasil'=>$this->M_family->ambil_family_alumni($config['per_page'], $id)
					);
		$this->load->view('template/wrapper',$data);
	}

	public function tracer_alumni(){
		$data = array(
			'title'=>'Alumni',
			'isi'=>'vTracerAlumni',
		);

		$this->load->view('template/wrapper',$data);
	}

	public function batalkan_verifikasi_alumni($id){
		if($this->session->userdata('level') == "" || $this->session->userdata('level') == null){
             echo'<script>alert("anda tidak mempunyai hak akses");window.location.href="'.base_url().'";</script>';
        }
		$update = $this->M_family->update_data($id, 'family', array('status' => 'dibatalkan'));
		 if($update){
		 	$this->session->set_flashdata(
			    'msg', 
			    '<div class="alert alert-success"><a href="#" class="close" data-dismiss="alert" arial-label="close">&times;</a><strong>Success!</strong> Data berhasil diupdate !</div>'
			);
			redirect(base_url().'adminNew/home/alumni'); //location
		 }
		 else{
		 	$this->session->set_flashdata(
			    'msg', 
			    '<div class="alert alert-danger"><a href="#" class="close" data-dismiss="alert" arial-label="close">&times;</a><strong>Peringatan!</strong> Data gagal diupdate !</div>'
			);
			redirect(base_url().'adminNew/home/alumni'); //location
		 } 
	}

	public function verifikasi_alumni($id){
		if($this->session->userdata('level') == "" || $this->session->userdata('level') == null){
             echo'<script>alert("anda tidak mempunyai hak akses");window.location.href="'.base_url().'";</script>';
        }
		$update = $this->M_family->update_data($id, 'family', array('status' => 'ter-verifikasi'));
		if($update){
		 	$this->session->set_flashdata(
			    'msg', 
			    '<div class="alert alert-success"><a href="#" class="close" data-dismiss="alert" arial-label="close">&times;</a><strong>Success!</strong> Data berhasil diupdate !</div>'
			);
			redirect(base_url().'adminNew/home/alumni'); //location
		 }
		 else{
		 	$this->session->set_flashdata(
			    'msg', 
			    '<div class="alert alert-danger"><a href="#" class="close" data-dismiss="alert" arial-label="close">&times;</a><strong>Peringatan!</strong> Data gagal diupdate !</div>'
			);
			redirect(base_url().'adminNew/home/alumni'); //location
		 }
	}

	public function tambah_alumni(){
		if($this->session->userdata('level') == "" || $this->session->userdata('level') == null){
             echo'<script>alert("anda tidak mempunyai hak akses");window.location.href="'.base_url().'";</script>';
        }
		$config['upload_path']   =   "assets/upload/images/asli/";
   		$config['allowed_types'] =   "jpg|jpeg"; 
   		$config['max_size']      =   "1000";
		$config['file_name'] = url_title($this->input->post('foto')); 
		$config['overwrite'] = true;
		$this->upload->initialize($config); //meng set config yang sudah di atur 
		// var_dump($_POST);
		// die();
		if( !$this->upload->do_upload('foto')) {			
			echo '<div class="alert alert-danger"><a href="#" class="close" data-dismiss="alert" arial-label="close">&times;</a><strong>Peringatan!</strong> '.$this->upload->display_errors().'</div>';
		}
		else{ 
			$data = array(
				'kode' => $this->input->post('npm'),
				'nama' => $this->input->post('nama'),
				'alamat' => $this->input->post('alamat'),
				'kategori' => 'Alumni',
				'status' => 'menunggu',
				'foto' => $this->upload->file_name,
				'tahun_masuk' => $this->input->post('tahun_masuk'),
				'tahun_lulus' => $this->input->post('tahun_lulus'),
				'posisi_kerja' => $this->input->post('pekerjaan'),
				'tahun_lulus' => $this->input->post('tahun_lulus'),
				'tempat_kerja' => $this->input->post('tempat_bekerja'),
				'alamat' => $this->input->post('alamat'),
				'keterangan' => $this->input->post('Keterangan')
			);
			$simpan = $this->M_family->tambah_data($data, 'family');
			if($simpan){
				echo '<div class="alert alert-success"><a href="#" class="close" data-dismiss="alert" arial-label="close">&times;</a><strong>Peringatan!</strong> Data berhasil disimpan, terimakasih atas kontribusi anda</div>';
				echo '<script>location.reload();</script>';
			}else{
				echo '<div class="alert alert-danger"><a href="#" class="close" data-dismiss="alert" arial-label="close">&times;</a><strong>Peringatan!</strong> Data gagal disimpan</div>';
			}
		}
	}
	
}