<div class="row">
<a id="tamposting">
<div class="col-md-4 hoper" style="margin-bottom:30px; min-height:250px; ">
	<div style="min-height:175px;">
    	<center>
    		<img src="<?php echo base_url();?>assets/images/Element+Urban+Village+Phase+I+Brochure+Activity+Icon+-+Water.jpg" class="img-circle" alt="Cinque Terre" width="125">
    	</center>
    </div>
    <div>
    	<center>
    		Posting
    	</center>
    </div>  
</div> 
</a>
<a id="tamjurnal">
<div class="col-md-4 hoper" style="margin-bottom:30px; min-height:250px; ">
   <div style="min-height:175px;">
    	<center>
    		<img src="<?php echo base_url();?>assets/images/Book Icon.png" class="img-circle" alt="Cinque Terre" width="125">
    	</center>
    </div>
    <div>
    	<center>
        Jurnal
    	</center>
    </div>   
</div> 
</a>

<a href="#" id="tamfamily">
<div class="col-md-4 hoper" style="margin-bottom:30px; min-height:250px; ">
   <div style="min-height:175px;">
    	<center>
    		<img src="<?php echo base_url();?>assets/images/web-experience.png" class="img-circle" alt="Cinque Terre" width="125">
    	</center>
    </div>
    <div>
    	<center>
    		BK Family
    	</center>
    </div>   
</div> 
</a>

<a id="tamgaleri">
<div class="col-md-4 hoper" style="margin-bottom:30px; min-height:250px;">
   <div style="min-height:175px;">
    	<center>
    		<img src="<?php echo base_url();?>assets/images/User_Experience_Design-512.png" class="img-circle" alt="Cinque Terre" width="125">
    	</center>
    </div>
    <div>
    	<center>
    		Galeri
    	</center>
    </div>
</div> 
</a>

<a id="tamadmin">
<div class="col-md-4 hoper" style="margin-bottom:30px; min-height:250px;">
	<div style="min-height:175px;">
    	<center>
    		<img src="<?php echo base_url(); ?>assets/images/user_business_person_businessman_man_flat_icon-512.png" class="img-circle" alt="Cinque Terre" width="125">
    	</center>
    </div>
    <div>
    	<center>
    		Administrator
    	</center>
    </div>
</div> 
</a>

<div class="col-md-4 hoper" style="margin-bottom:30px; min-height:250px;">
<a href="<?php echo base_url(); ?>admin/logout">
	<div style="min-height:175px;">
    	<center>
    		<img src="<?php echo base_url();?>assets/images/Graphicloads-100-Flat-Stop-2 (1).ico" class="img-circle" alt="Cinque Terre" width="125">
    	</center>
    </div>
    <div>
    	<center>
    		hello, <?php echo $nama;?> !!
    	</center>
    </div>
</a>
</div> 

<!-- row end -->
</div>
<!-- row end -->


<!-- Modal admin -->
<div id="admin" class="modal fade" role="dialog">

  <div class="modal-dialog">

    <!-- Modal content-->
    <div class="modal-content">
      <div class="modal-header" style="
                background-image :url(<?php echo base_url(); ?>assets/images/restaurant.png); 
				background-image : repeat;
                color:#fff;
                ">
        <button type="button" class="close" data-dismiss="modal">&times;</button>
        <h4 class="modal-title">Kelola Admin</h4>
      </div>
      <div class="modal-body">
        <button id="fungtambah" class="btn btn-primary" type="button" data-toggle="modal" data-target="#tambahadmin">Tambah Admin</button>
        <br/><br/>
        <div id="notifhapus"></div>
        <div id="result">
        </div>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
      </div>
    </div>

  </div>
</div>
<!-- end modal admin -->

<!-- Modal tambah admin -->
<div id="tambahadmin" class="modal fade" role="dialog">
  <div class="modal-dialog">

    <!-- Modal content-->
    <div class="modal-content">
      <div class="modal-header" style="
                background-image :url(<?php echo base_url(); ?>assets/images/restaurant.png); 
				background-image : repeat;
                color:#fff;
                ">
        <button type="button" class="close" data-dismiss="modal">&times;</button>
        <h4 class="modal-title">Tambah Admin</h4>
      </div>
      <div class="modal-body">
        <form role="form" id="formTambahAdmin" name="formTambahAdmin">
                    	<div class="form-group">
                        <div id="notif"></div>
                        <input type="text" style="display:none" name="usernametambah" id="usernametambah"/>
                        	<label for="username">
                            	Nama:
                            </label>
                            <input type="text" class="form-control" name="namatambah" id="namatambah" placeholder="nama anda"/>
                        </div>
                        <div class="form-group">
                        	<label for="username">
                            	Password:
                            </label>
                            <input type="password" class="form-control" name="passwordtambah" id="passwordtambah" placeholder="password anda"/>
                        </div>
                        <button type="button" class="btn btn-default" id="tomtambahadmin">Simpan</button>
                     </form>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
      </div>
    </div>

  </div>
</div>
<!-- end modal tambah admin -->

<!-- Modal jurnal -->
<div id="modjurnal" class="modal fade" role="dialog">

  <div class="modal-dialog">

    <!-- Modal content-->
    <div class="modal-content">
      <div class="modal-header" style="
                background-image :url(<?php echo base_url(); ?>assets/images/restaurant.png); 
				background-image : repeat;
                color:#fff;
                ">
        <button type="button" class="close" data-dismiss="modal">&times;</button>
        <h4 class="modal-title">Kelola Jurnal</h4>
      </div>
      <div class="modal-body">
        <button id="fungtambahjurnal" class="btn btn-primary" type="button" data-toggle="modal" data-target="#tambahjurnal">Tambah Jurnal</button>
        <br/><br/>
        <div id="notifhapusjurnal"></div>
        <div id="resultjurnal">
        </div>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
      </div>
    </div>

  </div>
</div>
<!-- end modal jurnal -->

<!-- Modal tambah jurnal -->
<div id="tambahjurnal" class="modal fade" role="dialog">
  <div class="modal-dialog">

    <!-- Modal content-->
    <div class="modal-content">
      <div class="modal-header" style="
                background-image :url(<?php echo base_url(); ?>assets/images/restaurant.png); 
				background-image : repeat;
                color:#fff;
                ">
        <button type="button" class="close" data-dismiss="modal">&times;</button>
        <h4 class="modal-title">Tambah Jurnal</h4>
      </div>
      <div class="modal-body">
        <form role="form" id="formTambahJurnal" name="formTambahAdmin" enctype="multipart/form-data">
                    	<div class="form-group">
                        
                        <input type="text" style="display:none" name="idjurnal" id="idjurnal"/>
                        	<label for="username">
                            	ISBN:
                            </label>
                            <input type="text" class="form-control" name="isbn" id="isbn" placeholder="ISBN"/>
                        </div>
                        <div class="form-group">
                        	<label for="username">
                            	Judul:
                            </label>
                            <input type="text" class="form-control" name="juduljurnal" id="juduljurnal" placeholder="Judul Jurnal"/>
                        </div>
                        <div class="form-group">
                        	<label for="username">
                            	Gambar:
                            </label>
                            <input type="file" class="form-control" name="userfile" id="userfile" placeholder="Judul Jurnal"/>
                        </div>
                        <div class="form-group">
                        	<label for="username">
                            	Keterangan:
                            </label>
                            <textarea class="ckeditor" name="keteranganjurnal" id="keteranganjurnal"></textarea>
                        </div>
                        <button type="button" class="btn btn-default" id="tomtambahjurnal">Simpan</button>
                        <div id="notifjurnal"></div>
                     </form>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
      </div>
    </div>

  </div>
</div>
<!-- end modal tambah jurnal -->

<!-- Modal posting -->
<div id="modposting" class="modal fade" role="dialog">

  <div class="modal-dialog modal-lg">

    <!-- Modal content-->
    <div class="modal-content ">
      <div class="modal-header" style="
                background-image :url(<?php echo base_url(); ?>assets/images/restaurant.png); 
				background-image : repeat;
                color:#fff;
                ">
        <button type="button" class="close" data-dismiss="modal">&times;</button>
        <h4 class="modal-title">Kelola posting</h4>
      </div>
      <div class="modal-body">
        <button id="fungtambahposting" class="btn btn-primary" type="button" data-toggle="modal" data-target="#tambahposting">Tambah posting</button>
        <br/><br/>
        <div id="notifhapusposting"></div>
        <div id="resultposting">
        </div>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
      </div>
    </div>

  </div>
</div>
<!-- end modal posting -->

<!-- Modal tambah posting -->
<div id="tambahposting" class="modal fade" role="dialog">
  <div class="modal-dialog">

    <!-- Modal content-->
    <div class="modal-content">
      <div class="modal-header" style="
                background-image :url(<?php echo base_url(); ?>assets/images/restaurant.png); 
				background-image : repeat;
                color:#fff;
                ">
        <button type="button" class="close" data-dismiss="modal">&times;</button>
        <h4 class="modal-title">Tambah Posting</h4>
      </div>
      <div class="modal-body">
        <form role="form" id="formTambahposting" name="formTambahposting" enctype="multipart/form-data">
                    	<div class="form-group">
                        
                        <input type="text" style="display:none" name="idposting" id="idposting"/>
                        	<label for="username">
                            	judul:
                            </label>
                            <input type="text" class="form-control" name="judulposting" id="judulposting" placeholder="Judul"/>
                        </div>
                        <div class="form-group">
                        	<label for="username">
                            	Kategori
                            </label>
                            <select class="form-control" name="kategoriposting" id="kategoriposting">
                            <option selected>-- pilih --</option>     
                            <option value="sejarah">sejarah</option>
                            <option value="visi_misi">visi_misi</option>
                            <option value="struktur_organisasi">struktur_organisasi</option>
                       	    <option value="activity">activity</option>
                            <option value="informasi_pengumuman">informasi_pengumuman</option>
                            <option value="kurikulum">kurikulum</option>
                            <option value="konseling">konseling</option>
                            </select>
                            
                        </div>
                        <div class="form-group">
                        	<label for="username">
                            	Gambar:
                            </label>
                            <input type="file" class="form-control" name="gambarposting" id="gambarposting" placeholder="Judul Jurnal"/>
                        </div>
                        <div class="form-group">
                        	<label for="username">
                            	Keterangan:
                            </label>
                            <textarea class="ckeditor" name="keteranganposting" id="keteranganposting"></textarea>
                        </div>
                        <button type="button" class="btn btn-default" id="tomtambahposting">Simpan</button>
                        <div id="notifposting"></div>
                     </form>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
      </div>
    </div>

  </div>
</div>
<!-- end modal tambah posting-->

<!-- Modal family -->
<div id="modfamily" class="modal fade" role="dialog">

  <div class="modal-dialog modal-lg">

    <!-- Modal content-->
    <div class="modal-content">
      <div class="modal-header" style="
                background-image :url(<?php echo base_url(); ?>assets/images/restaurant.png); 
				background-image : repeat;
                color:#fff;
                ">
        <button type="button" class="close" data-dismiss="modal">&times;</button>
        <h4 class="modal-title">Kelola Family</h4>
      </div>
      <div class="modal-body">
        
        <button id="fungtambahfamily" class="btn btn-primary" type="button" data-toggle="modal" data-target="#tambahfamily">Tambah Family</button>
        
        <ul class="nav navbar-nav navbar-right">
      	<li>         
        <input type="text" class="form-control"  name="searchfamily" id="searchfamily" placeholder="Kata kunci..."/>
        </li>
      	<li>
        <button id="tomsearchfamily" class="btn btn-danger" type="button" style="margin-right:25px;" ><span class="glyphicon glyphicon-search"></span> Cari</button>
        </li>
    </ul>
       
        
        
        <br/><br/>
        <div id="notifhapusfamily"></div>
        <div id="resultfamily">
        </div>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
      </div>
    </div>

  </div>
</div>
<!-- end modal family -->

<!-- Modal tambah family -->
<div id="tambahfamily" class="modal fade" role="dialog">
  <div class="modal-dialog">

    <!-- Modal content-->
    <div class="modal-content">
      <div class="modal-header" style="
                background-image :url(<?php echo base_url(); ?>assets/images/restaurant.png); 
				background-image : repeat;
                color:#fff;
                ">
        <button type="button" class="close" data-dismiss="modal">&times;</button>
        <h4 class="modal-title">Tambah Family</h4>
      </div>
      <div class="modal-body">
        <form role="form" id="formTambahfamily" name="formTambahfamily" enctype="multipart/form-data">
                        <div class="form-group">
                        <label for="username">
                            	Jenis ID:
                            </label>
                        <select name="idnyafamily" id="idnyafamily" class="form-control"/>
                                    <option>--pilih--</option>
                        	    <option value="NIDN">NIDN</option>
                                    <option value="NIDK">NIDK</option>
                                    <option value="NPM">NPM</option>
                        </select>
                        </div>
                    	<div class="form-group">
                        
                        <input type="text" style="display:none" name="idfamily" id="idfamily"/>
                        	<label for="username">
                            	NPM/NIP/Kode-Dosen:
                            </label>
                            <input type="text" class="form-control" name="kodefamily" id="kodefamily" placeholder="NPM/NIP/Kode-Dosen"/>
                        </div>
                        <div class="form-group">
                        
                        	<label for="username">
                            	Nama:
                            </label>
                            <input type="text" class="form-control" name="namafamily" id="namafamily" placeholder="Nama"/>
                        </div>
                        <div class="form-group">
                        	<label for="username">
                            	Kategori
                            </label>
                            <select class="form-control" name="kategorifamily" id="kategorifamily">
                            <option selected>-- pilih --</option>     
                            <option value="Dosen">Dosen</option>
                            <option value="Mahasiswa">Mahasiswa</option>
                            <option value="Alumni">Alumni</option>                       	
                            </select>
                            
                        </div>
                        <div class="form-group">
                        	<label for="username">
                            	Gambar:
                            </label>
                            <input type="file" class="form-control" name="gambarfamily" id="gambarfamily" placeholder="Judul Jurnal"/>
                        </div>
                        <div class="form-group">
                        	<label for="username">
                            	Keterangan:
                            </label>
                            <textarea class="ckeditor" name="keteranganfamily" id="keteranganfamily"></textarea>
                        </div>
                        <button type="button" class="btn btn-default" id="tomtambahfamily">Simpan</button>
                        <div id="notiffamily"></div>
                     </form>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
      </div>
    </div>

  </div>
</div>
<!-- end modal tambah family-->

<!-- Modal family -->
<div id="modgaleri" class="modal fade" role="dialog">

  <div class="modal-dialog">

    <!-- Modal content-->
    <div class="modal-content">
      <div class="modal-header" style="
                background-image :url(<?php echo base_url(); ?>assets/images/restaurant.png); 
				background-image : repeat;
                color:#fff;
                ">
        <button type="button" class="close" data-dismiss="modal">&times;</button>
        <h4 class="modal-title">Kelola Galeri</h4>
      </div>
      <div class="modal-body">
        
        <button id="fungtambahgaleri" class="btn btn-primary" type="button" data-toggle="modal" data-target="#tambahgaleri">Tambah Galeri</button>  
        
        <br/><br/>
        <div id="notifhapusgaleri"></div>
        <div id="resultgaleri">
        </div>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
      </div>
    </div>

  </div>
</div>
<!-- end modal family -->

<!-- Modal tambah family -->
<div id="tambahgaleri" class="modal fade" role="dialog">
  <div class="modal-dialog">

    <!-- Modal content-->
    <div class="modal-content">
      <div class="modal-header" style="
                background-image :url(<?php echo base_url(); ?>assets/images/restaurant.png); 
				background-image : repeat;
                color:#fff;
                ">
        <button type="button" class="close" data-dismiss="modal">&times;</button>
        <h4 class="modal-title">Tambah Galeri</h4>
      </div>
      <div class="modal-body">
        <form role="form" id="formTambahgaleri" name="formTambahgaleri" enctype="multipart/form-data">
                    	<div class="form-group">
                        
                        <input type="text" style="display:none" name="idgaleri" id="idgaleri"/>
                        	<label for="username">
                            	Judul
                            </label>
                            <input type="text" class="form-control" name="judulgaleri" id="judulgaleri" placeholder="Judul"/>
                        </div>
                        
                        <div class="form-group">
                        	<label for="username">
                            	Kategori
                            </label>
                            <select class="form-control" name="kategorigaleri" id="kategorigaleri">
                            <option selected>-- pilih --</option>     
                            <option value="galeri">galeri</option>
                            <option value="banner">banner</option>
                                                 	
                            </select>
                            
                        </div>
                        <div class="form-group">
                        	<label for="username">
                            	Gambar:
                            </label>
                            <input type="file" class="form-control" name="gambargaleri" id="gambargaleri" placeholder="Judul Jurnal"/>
                        </div>
                        
                        <button type="button" class="btn btn-default" id="tomtambahgaleri">Simpan</button>
                        <div id="notifgaleri"></div>
                     </form>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
      </div>
    </div>

  </div>
</div>
<!-- end modal tambah family-->

<!-- end -->
</div>