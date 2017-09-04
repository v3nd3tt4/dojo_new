<div style="margin-top:50px; min-height:250px; color:#fff; padding-top:10px; color:#969090; border-bottom:solid 15px #000; background-image :url(<?php echo base_url(); ?>assets/images/footer_lodyas.png); 
background-image : repeat;">

<div class="container" >

	<!-- Modal searching -->
<div id="modsearching" class="modal fade" role="dialog">

  <div class="modal-dialog">

    <!-- Modal content-->
    <div class="modal-content">
      <div class="modal-header" style="
                background-image :url(<?php echo base_url(); ?>assets/images/restaurant.png); 
				background-image : repeat;
                color:#fff;
                ">
        <button type="button" class="close" data-dismiss="modal">&times;</button>
        <h4 class="modal-title">Pencarian</h4>
      </div>
      <div class="modal-body">
        
        
        <div id="resultsearching">
        </div>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
      </div>
    </div>

  </div>
</div>
<!-- end modal searching -->

		<div class="row">
    		<div class="col-md-4" style="margin-bottom:30px;">
        		<!-- <h4>Supported By</h4>
                <a href="http://stekomindo.or.id/"><img src="http://stekomindo.or.id/images/logo-01.png" class="img-rounded" width="65"/></a>
                <br/><br/> -->
                <h4>Portal</h4>
                <div class="list">
					<ul>
                    	<li><span class="glyphicon glyphicon-fire"></span> <a href="http://radenintan.ac.id" style="color:#969090;" target="_blank">UIN Raden Intan Lampung</a></li>
                        <li><span class="glyphicon glyphicon-fire"></span> <a href="https://siakad.radenintan.ac.id/web/" style="color:#969090;" target="_blank">Sistem Informasi Akademik (SIAKAD)</a></li>
                        <li><span class="glyphicon glyphicon-fire"></span> <a href="http://konseling.hol.es" style="color:#969090;" target="_blank">Cyber Counseling</a></li>
                        <li><span class="glyphicon glyphicon-fire"></span> <a href="http://stekomindo.or.id/" style="color:#969090;" target="_blank" >Stekomindo</a></li>
<li><span class="glyphicon glyphicon-fire"></span> <a href="http://keanggotaan.pnri.go.id/daftarpetunjuk.aspx" style="color:#969090;" target="_blank" >Perpustakaan Nasional</a></li>
                        <li><span class="glyphicon glyphicon-fire"></span> <a href="#admin" style="color:#969090;" target="_blank" data-toggle="modal">Admin</a></li>
                    </ul>
                </div>
        	</div>
            
            <div class="col-md-4" style="margin-bottom:30px;">
        		<h4>Kemahasiswaan</h4>
                <div class="list">
                	<ul class="list" >
                    	<li><a href="<?php echo base_url(); ?>detail/index/36/Himpunan-Mahasiswa-Jurusan" style="color:#969090;"><span class="glyphicon glyphicon-fire"></span> Himpunan Mahasiswa Jurusan (HMJ) BK</span></a></li>
                        <li><a href="<?php echo base_url(); ?>alumni/tracer_alumni" style="color:#969090;;"><span class="glyphicon glyphicon-fire"></span> Ikatan Alumni</a></li>
                        <li><a href="<?php echo base_url(); ?>detail/index/34/Konselor-Inspirator--KOINS-" style="color:#969090;;"><span class="glyphicon glyphicon-fire"></span> Konselor Inspirator (KOINS)</a></li>
                        <li><a href="<?=base_url()?>pengajuan_judul" style="color:#969090;"><span class="glyphicon glyphicon-fire"></span> Pengajuan Judul Skripsi</a></li>
                    </ul>
                </div><br/>
                      <h4>Mail</h4>
                <div class="list">
                	<ul class="list" >
                    	<li><span class="glyphicon glyphicon-fire"></span> <a href="https://8004.dapurhosting.com:2096/logout/?locale=en" style="color:#969090;">PSBK UIN Raden Intan Web Mail</a></span></li>
                        <li><a href="<?php echo base_url(); ?>kotak_saran" style="color:#969090;;"><span class="glyphicon glyphicon-fire"></span> Kotak Saran</a></li>
                        
                        
                    </ul>
                </div>
        </div>
            
            <div class="col-md-4" style="margin-bottom:30px;">
        		<h4>Sekretariat</h4>
                <p>Prodi Bimbingan Konseling, Fakultas Tarbiyah Dan Keguruan, Universitas Islam Negeri (UIN) Raden Intan Lampung</p>
                <p>Jl. Letkol Kolonel Endro Suratmin, Sukarame, Bandar Lampung, Lampung</p>
                <p>Telp. (0721) 780887 <br/> E-mail: admin@psbkiainradenintan.ac.id</p>
                <p>Copyright &copy; 2016 BK | All Right Reserved</p>
                <p>Created By Pilopa | <a href="http://stekomindo.or.id/" style="color:#969090;">stekomindo</a></p>
        	</div>
    	</div>
    
    <div id="admin" class="modal fade" role="dialog">
    	<div class="modal-dialog">
        	<div class="modal-content" style="margin-top:100px;">
            	<div class="modal-header" 
                style="
                background-image :url(<?php echo base_url(); ?>assets/images/restaurant.png); 
				background-image : repeat;
                color:#fff;
                ">
                	<button type="button" class="close" data-dismiss="modal">&times;</button>
                    	<h4 class="modal-title">Admin Login</h4>
              	</div>
            	<div class="modal-body">
                	<div id="notifAdmin"></div>
            		<form role="form" id="formAdmin" name="formAdmin">
                    	<div class="form-group">
                        	<label for="username">
                            	Username
                            </label>
                            <input type="text" class="form-control" name="username" id="username" placeholder="username anda"/>
                        </div>
                        <div class="form-group">
                        	<label for="username">
                            	Password
                            </label>
                            <input type="password" class="form-control" name="password" id="password" placeholder="password anda"/>
                        </div>
                        <button type="button" class="btn btn-default" id="login">Login</button>
                     </form>
                </div>
                <div class="modal-footer">
                	<button type="button" class="btn btn-default" data-dismiss="modal">close</button>
                </div>
                </div>
                </div>
                </div>
            
            
</div>
</div>

<!-- jQuery Version 1.11.0 -->
<script src="<?php echo base_url(); ?>assets/jquery.js"></script>
<script src="<?php echo base_url(); ?>assets/jsw.js"></script>
<script src="<?php echo base_url(); ?>assets/ckeditor/ckeditor.js"></script>
<script src="<?php echo base_url(); ?>assets/dataTable/js/jquery.dataTables.js"></script>
<script src="<?php echo base_url(); ?>assets/dataTable/js/dataTables.bootstrap.js"></script>
<script src="<?php echo base_url(); ?>assets/responsiveslides.js"></script>
<script>
$(document).ready(function() {

	$(".rslides").responsiveSlides({
  auto: true,             // Boolean: Animate automatically, true or false
  speed: 500,            // Integer: Speed of the transition, in milliseconds
  timeout: 4000,          // Integer: Time between slide transitions, in milliseconds
  pager: false,           // Boolean: Show pager, true or false
  nav: false,             // Boolean: Show navigation, true or false
  random: false,          // Boolean: Randomize the order of the slides, true or false
  pause: false,           // Boolean: Pause on hover, true or false
  pauseControls: true,    // Boolean: Pause when hovering controls, true or false
  prevText: "Previous",   // String: Text for the "previous" button
  nextText: "Next",       // String: Text for the "next" button
  maxwidth: "",           // Integer: Max-width of the slideshow, in pixels
  navContainer: "",       // Selector: Where controls should be appended to, default is after the 'ul'
  manualControls: "",     // Selector: Declare custom pager navigation
  namespace: "rslides",   // String: Change the default namespace used
  before: function(){},   // Function: Before callback
  after: function(){}     // Function: After callback
});

	$.get( "<?php echo base_url();?>posting/visitor/<?php echo $_SERVER['REMOTE_ADDR'].""?>", function( data ) {
  		$( "#viewviewer" ).html( data );
  		
	});
	
	$(document).on('click', '#searching', function(){
		$('#modsearching').modal();
		$( "#resultsearching" ).html( '<img src="<?php echo base_url(); ?>assets/images/loading4.gif"/> Loading...' );
		var keyword=$('#katakunci').val();
		
		$.ajax({
			url:'<?php echo base_url(); ?>posting/search',
			type:'POST',
			data:'search='+keyword,
			success: function(msg){
				$('#resultsearching').html(msg);
			}
		});
	});
	
	$("#ck_slide > div:gt(0)").hide();
			setInterval(function() { 
			$('#ck_slide > div:first')
			.fadeOut(100)
			.next()
			.fadeIn(900)
			.end()
			.appendTo('#ck_slide');
		},  5000);
	
	$(document).on('click', '.hoperjurnal', function(){
		var id= $(this).attr('id');
		$( "#loadinghoverjurnal" ).html( '<img src="<?php echo base_url(); ?>assets/images/loading4.gif"/> Loading...' );
		$("#modhoverjurnal").modal();
		$.ajax({
			url:'<?php echo base_url(); ?>jurnal/tampiljurnalperid/'+id,
			type:'POST',
			success: function(msg){
				$('#resulthoverjurnal').html(msg);
				$( "#loadinghoverjurnal" ).html( '' );
			}
		});
	});

});
</script>

<script>
$(document).ready(function() {
	$.get( "<?php echo base_url();?>posting/tampil_info", function( data ) {
  		$( "#infopengumuman" ).html( data );
  		
	});
});
</script>

<!-- family -->
<script>
$(document).ready(function() {
	
	$(document).on('click', '#tamfamily', function(){
		$("#modfamily").modal();
		
	});
	
	$(document).on('click', '#fungtambahfamily', function(){
		$('#tomtambahfamily').attr('name','tambah');
	});
	
	$(document).on('click', '.hapusfamily', function(){
	var id=$(this).attr('id');
	var foto=$(this).attr('name');
	$( "#notifhapusfamily" ).html( '<img src="<?php echo base_url(); ?>assets/images/loading4.gif"/> Loading...' );
	$.ajax({
		url:'<?php echo base_url();?>family/hapus_family/'+id+'/'+foto,
		type:'POST',
		success: function(html){
			if(html=='sukses'){
				
				$('#notifhapusfamily').addClass('alert alert-success');
				$('#notifhapusfamily').html(html+'<a href="#" class="close" data-dismiss="alert" arial-label="close">&times;</a>');
				
			}
		}
	});
});

$(document).on('click', '.editfamily', function(){
		$('#tomtambahfamily').attr('name','update');
		$("#tambahfamily").modal();
	
		var id=$(this).attr('id');
		
		$.ajax({
		url:'<?php echo base_url(); ?>family/tampilperid/'+id,
		dataType:'json',
		type:'POST',
		success: function(msg){
			$('#idfamily').val(msg.id);
			$('#kodefamily').val(msg.kode);
			$('#namafamily').val(msg.nama);
			$('#kategorifamily').val(msg.kategori);
			CKEDITOR.instances.keteranganfamily.setData(msg.keterangan);
		}
	});
});
	
	$(document).on('click', '#tomsearchfamily', function(){
		var data=$('#searchfamily').val();
		$('#resultfamily').html('<img src="<?php echo base_url(); ?>assets/images/loading4.gif"/> Loading...');
		$.ajax({
			url:'<?php echo base_url();?>family/cari',
			data: 'searchfamily='+data,
			type:'POST',
			success: function(msg){
				$('#resultfamily').html(msg);
			}
			
		});
	});
	
	$(document).on('click', '#tomtambahfamily', function(){
		var fung=$(this).attr('name');
		var data = new FormData(document.getElementById("formTambahfamily"));
		//untuk mengupdate isi textarea ckeditor
		for (instance in CKEDITOR.instances) {
				CKEDITOR.instances[instance].updateElement();
		}
		
		if(fung=='tambah'){
			$( "#notiffamily" ).html( '<img src="<?php echo base_url(); ?>assets/images/loading4.gif"/> Loading...' );
		$.ajax({
			url:'<?php echo base_url(); ?>family/simpan_family',
			type:'POST',
			enctype: 'multipart/form-data',
			data:data,
			processData: false,
			contentType: false,
			success: function(html){
					$( "#notiffamily" ).html(html);
					if(html=='sukses'){
					$('#notiffamily').addClass('alert alert-success');
					$('#notiffamily').html(html+' menyimpan <a href="#" class="close" data-dismiss="alert" arial-label="close">&times;</a>');
					
					$('#kodefamily').val('');
					$('#namafamily').val('');
					
					}
					else if(html=='gagal'){
					$('#notiffamily').addClass('alert alert-danger');
					$('#notiffamily').html(html+' menyimpan <a href="#" class="close" data-dismiss="alert" arial-label="close">&times;</a>');
					}
				}
		});
		}
		
		else if(fung=='update'){
			$('#notiffamily').html('<img src="<?php echo base_url(); ?>assets/images/loading4.gif"/> Loading...' );
			
			$('#notiffamily').removeClass('alert alert-success');
			
			$.ajax({
			url:'<?php echo base_url(); ?>family/update_family',
			enctype: 'multipart/form-data',
			data:data,
			processData: false,
			contentType: false,
			type: 'POST',
			success: function(html){
				$('#notiffamily').html(html);
				if(html=='sukses'){
					$('#notiffamily').addClass('alert alert-success');
					$('#notiffamily').html(html+'<a href="#" class="close" data-dismiss="alert" arial-label="close">&times;</a>');
					
					$('#judulposting').val('');
					$('#kodefamily').val('');
					$('#namafamily').val('');
					
					}
					else if(html=='gagal'){
						$('#notiffamily').html(html);
					}
			}
			});
		}
	
	});
    
});
</script>
<!-- end family -->

<!-- posting -->
<script>
$(document).ready(function() {
	
$(document).on('click', '#tamposting', function(){
	$("#modposting").modal();
	$( "#resultposting" ).html( '<img src="<?php echo base_url(); ?>assets/images/loading4.gif"/> Loading...' );
	$.get( "<?php echo base_url();?>posting/tampil_posting", function( data ) {
  		$( "#resultposting" ).html( data );
  		
	});
});


$(document).on('click', '#fungtambahposting', function(){
	$('#tomtambahposting').attr('name','tambah');
});

$(document).on('click', '.editposting', function(){
		$('#tomtambahposting').attr('name','update');
		$("#tambahposting").modal();
	
		var id=$(this).attr('id');
		
		$.ajax({
		url:'<?php echo base_url(); ?>posting/tampilperid/'+id,
		dataType:'json',
		type:'POST',
		success: function(msg){
			$('#idposting').val(msg.id);
			$('#judulposting').val(msg.judul);
			$('#kategoriposting').val(msg.kategori);
			CKEDITOR.instances.keteranganposting.setData(msg.keterangan);
		}
	});
});

$(document).on('click', '.hapusposting', function(){
	var id=$(this).attr('id');
	var foto=$(this).attr('name');
	$( "#notifhapusposting" ).html( '<img src="<?php echo base_url(); ?>assets/images/loading4.gif"/> Loading...' );
	$.ajax({
		url:'<?php echo base_url();?>posting/hapus_posting/'+id+'/'+foto,
		type:'POST',
		success: function(html){
			if(html=='sukses'){
				$.get( "<?php echo base_url();?>posting/tampil_posting", function( data ) {
  				$( "#resultposting" ).html( data );
				$('#notifhapusposting').addClass('alert alert-success');
				$('#notifhapusposting').html(html+'<a href="#" class="close" data-dismiss="alert" arial-label="close">&times;</a>');
  				});
				
			}
		}
	});
});

$(document).on('click', '#tomtambahposting', function(){
	var fung=$(this).attr('name');
	var data = new FormData(document.getElementById("formTambahposting"));
		//untuk mengupdate isi textarea ckeditor
		for (instance in CKEDITOR.instances) {
				CKEDITOR.instances[instance].updateElement();
		}
		
		if(fung=='tambah'){
		$( "#notifposting" ).html( '<img src="<?php echo base_url(); ?>assets/images/loading4.gif"/> Loading...' );
		$.ajax({
			url:'<?php echo base_url(); ?>posting/simpan_posting',
			type:'POST',
			enctype: 'multipart/form-data',
			data:data,
			processData: false,
			contentType: false,
			success: function(html){
				$( "#notifposting" ).html(html);
				if(html=='sukses'){
				$('#notifposting').addClass('alert alert-success');
				$('#notifposting').html(html+' menyimpan <a href="#" class="close" data-dismiss="alert" arial-label="close">&times;</a>');
				$( "#resultposting" ).html( '<img src="<?php echo base_url(); ?>assets/images/loading4.gif"/> Loading...' );
				$.get( "<?php echo base_url();?>posting/tampil_posting", function( data ) {
					$( "#resultposting" ).html( data );
					
				});
				$('#judulposting').val('');
				
				}
				else if(html=='gagal'){
				$('#notifposting').addClass('alert alert-danger');
				$('#notifposting').html(html+' menyimpan <a href="#" class="close" data-dismiss="alert" arial-label="close">&times;</a>');
				}
			}
		});
		}
		
		else if(fung=='update'){
			
			$('#notifposting').html('<img src="<?php echo base_url(); ?>assets/images/loading4.gif"/> Loading...' );
			
			$('#notifposting').removeClass('alert alert-success');
			
			$.ajax({
			url:'<?php echo base_url(); ?>posting/update_posting',
			enctype: 'multipart/form-data',
			data:data,
			processData: false,
			contentType: false,
			type: 'POST',
			success: function(html){
				$('#notifposting').html(html);
				if(html=='sukses'){
					$('#notifposting').addClass('alert alert-success');
					$('#notifposting').html(html+'<a href="#" class="close" data-dismiss="alert" arial-label="close">&times;</a>');
					$( "#resultposting" ).html( '<img src="<?php echo base_url(); ?>assets/images/loading4.gif"/> Loading...' );
					$.get( "<?php echo base_url();?>posting/tampil_posting", function( data ) {
					$( "#resultposting" ).html( data );
					});
					$('#judulposting').val('');
					
					}
					else if(html=='gagal'){
						$('#notifposting').html(html);
					}
			}
			});
			
			}
		
});



});
</script>

<!-- end posting -->

<!--admin-->
<script>
$(document).ready(function() {
	
$(document).on('click', '#tamadmin', function(){
	$("#admin").modal();
	$( "#result" ).html( '<img src="<?php echo base_url(); ?>assets/images/loading4.gif"/> Loading...' );
	$.get( "<?php echo base_url();?>admin/tamadmin", function( data ) {
  		$( "#result" ).html( data );
  		
	});
});

$(document).on('click', '#fungtambah', function(){
	$('#tomtambahadmin').attr('name','tambah');
	$('#namatambah').val('');
	$('#passwordtambah').val('');
});


//edit admin
$(document).on('click', '.editadmin', function(){
	$("#tambahadmin").modal();
	$('#tomtambahadmin').attr('name','update');
	var username=$(this).attr('id');
	
	$.ajax({
		url:'<?php echo base_url(); ?>admin/tampilperid/'+username,
		dataType:'json',
		type:'POST',
		success: function(msg){
			$('#usernametambah').val(msg.username);
			$('#namatambah').val(msg.nama);
			$('#passwordtambah').val(msg.password);
		}
	});
	
});
//end edit admin

$(document).on('click', '#tomtambahadmin', function(){
	var fung=$(this).attr('name');
	
	if(fung=='tambah'){
	$('#notif').html('<img src="<?php echo base_url(); ?>assets/images/loading4.gif"/> Loading...' );
	var data=$('#formTambahAdmin').serialize();
	$('#notif').removeClass('alert alert-success');
	$.ajax({
		url:'<?php echo base_url(); ?>admin/tambahadmin',
		data: data,
		type: 'POST',
		success: function(html){
			$('#notif').html(html);
			if(html=='sukses'){
				$('#notif').addClass('alert alert-success');
				$('#notif').html(html+'<a href="#" class="close" data-dismiss="alert" arial-label="close">&times;</a>');
				$( "#result" ).html( '<img src="<?php echo base_url(); ?>assets/images/loading4.gif"/> Loading...' );
				$.get( "<?php echo base_url();?>admin/tamadmin", function( data ) {
  				$( "#result" ).html( data );
  				});
				$('#namatambah').val('');
				$('#passwordtambah').val('');
			}
			else if(html=='gagal'){
				$('#notif').html(html);
			}
		}
	});
	}
	
	else if(fung=='update'){
		$('#notif').html('<img src="<?php echo base_url(); ?>assets/images/loading4.gif"/> Loading...' );
		var data=$('#formTambahAdmin').serialize();
		$('#notif').removeClass('alert alert-success');
		
		$.ajax({
		url:'<?php echo base_url(); ?>admin/updateadmin',
		data: data,
		type: 'POST',
		success: function(html){
			$('#notif').html(html);
			if(html=='sukses'){
				$('#notif').addClass('alert alert-success');
				$('#notif').html(html+'<a href="#" class="close" data-dismiss="alert" arial-label="close">&times;</a>');
				$( "#result" ).html( '<img src="<?php echo base_url(); ?>assets/images/loading4.gif"/> Loading...' );
				$.get( "<?php echo base_url();?>admin/tamadmin", function( data ) {
  				$( "#result" ).html( data );
  				});
				$('#namatambah').val('');
				$('#passwordtambah').val('');
			}
			else if(html=='gagal'){
				$('#notif').html(html);
			}
		}
		});
		
	}
});

//hapus admin
$(document).on('click','.hapusadmin', function(){
	var username=$(this).attr('id');
	$( "#notifhapus" ).html( '<img src="<?php echo base_url(); ?>assets/images/loading4.gif"/> Loading...' );
	$.ajax({
		url:'<?php echo base_url();?>admin/hapusadmin/'+username,
		type:'POST',
		success: function(html){
			if(html=='sukses'){
				$.get( "<?php echo base_url();?>admin/tamadmin", function( data ) {
  				$( "#result" ).html( data );
				$('#notifhapus').addClass('alert alert-success');
				$('#notifhapus').html(html+'<a href="#" class="close" data-dismiss="alert" arial-label="close">&times;</a>');
  				});
				
			}
		}
	});
});
//end hapus admin



});
</script>
<!--admin-->

<!-- jurnal -->
<script>
$(document).ready(function() {
	
	$('.dttbl').dataTable();

	$(document).on('click', '#tamjurnal', function(){
	
	$("#modjurnal").modal();
	$( "#resultjurnal" ).html( '<img src="<?php echo base_url(); ?>assets/images/loading4.gif"/> Loading...' );
	$.get( "<?php echo base_url();?>jurnal/tampil_jurnal", function( data ) {
  		$( "#resultjurnal" ).html( data );
		
	});
});
	
	$(document).on('click', '#fungtambahjurnal', function(){
		$('#tomtambahjurnal').attr('name','tambah');
		$('#isbn').val('');
		$('#juduljurnal').val('');
		$('#keteranganjurnal').val('');
	});
	
	$(document).on('click', '.editjurnal', function(){
		$('#tomtambahjurnal').attr('name','update');
		$("#tambahjurnal").modal();
	
		var id=$(this).attr('id');
		
		$.ajax({
		url:'<?php echo base_url(); ?>jurnal/tampilperid/'+id,
		dataType:'json',
		type:'POST',
		success: function(msg){
			$('#idjurnal').val(msg.id);
			$('#isbn').val(msg.isbn);
			$('#juduljurnal').val(msg.judul);
			CKEDITOR.instances.keteranganjurnal.setData(msg.keterangan);
		}
	});
	
	});
	
	
	
	//hapus jurnal
	$(document).on('click','.hapusjurnal', function(){
		var id=$(this).attr('id');
		var foto=$(this).attr('name');
		$( "#notifhapusjurnal" ).html( '<img src="<?php echo base_url(); ?>assets/images/loading4.gif"/> Loading...' );
		$.ajax({
			url:'<?php echo base_url();?>jurnal/hapus_jurnal/'+id+'/'+foto,
			type:'POST',
			success: function(html){
				if(html=='sukses'){
					$.get( "<?php echo base_url();?>jurnal/tampil_jurnal", function( data ) {
					$( "#resultjurnal" ).html( data );
					$('#notifhapusjurnal').addClass('alert alert-success');
					$('#notifhapusjurnal').html(html+'<a href="#" class="close" data-dismiss="alert" arial-label="close">&times;</a>');
					});
				}
			}
		});
	});
//end hapus admin
	
	$(document).on('click', '#tomtambahjurnal', function(){
		var fung=$(this).attr('name');
		var data = new FormData(document.getElementById("formTambahJurnal"));
		//untuk mengupdate isi textarea ckeditor
		for (instance in CKEDITOR.instances) {
				CKEDITOR.instances[instance].updateElement();
		}
		if(fung=='tambah'){
		$( "#notifjurnal" ).html( '<img src="<?php echo base_url(); ?>assets/images/loading4.gif"/> Loading...' );
		$.ajax({
			url:'<?php echo base_url(); ?>jurnal/simpanjurnal',
			type:'POST',
			enctype: 'multipart/form-data',
			data:data,
			processData: false,
			contentType: false,
			success: function(html){
				$( "#notifjurnal" ).html(html);
				if(html=='sukses'){
				$('#notifjurnal').addClass('alert alert-success');
				$('#notifjurnal').html(html+' menyimpan <a href="#" class="close" data-dismiss="alert" arial-label="close">&times;</a>');
				$( "#resultjurnal" ).html( '<img src="<?php echo base_url(); ?>assets/images/loading4.gif"/> Loading...' );
	$.get( "<?php echo base_url();?>jurnal/tampil_jurnal", function( data ) {
  		$( "#resultjurnal" ).html( data );
  		
	});
				$('#isbn').val('');
				$('#juduljurnal').val('');
				}
				else if(html=='gagal'){
				$('#notifjurnal').addClass('alert alert-danger');
				$('#notifjurnal').html(html+' menyimpan <a href="#" class="close" data-dismiss="alert" arial-label="close">&times;</a>');
				}
			}
		});
		}
		
		else if(fung=='update'){
			
			$('#notifjurnal').html('<img src="<?php echo base_url(); ?>assets/images/loading4.gif"/> Loading...' );
			
			$('#notifjurnal').removeClass('alert alert-success');
			
			$.ajax({
			url:'<?php echo base_url(); ?>jurnal/update_jurnal',
			enctype: 'multipart/form-data',
			data:data,
			processData: false,
			contentType: false,
			type: 'POST',
			success: function(html){
				$('#notifjurnal').html(html);
				if(html=='sukses'){
					$('#notifjurnal').addClass('alert alert-success');
					$('#notifjurnal').html(html+'<a href="#" class="close" data-dismiss="alert" arial-label="close">&times;</a>');
					$( "#resultjurnal" ).html( '<img src="<?php echo base_url(); ?>assets/images/loading4.gif"/> Loading...' );
					$.get( "<?php echo base_url();?>jurnal/tampil_jurnal", function( data ) {
					$( "#resultjurnal" ).html( data );
					});
					$('#isbn').val('');
					$('#juduljurnal').val('');
					}
					else if(html=='gagal'){
						$('#notifjurnal').html(html);
					}
			}
			});
			
			}
	});
    
});
</script>
<!-- end jurnal -->

<!-- Bootstrap Core JavaScript -->
<script src="<?php echo base_url(); ?>assets/bootStrap/js/bootstrap.min.js"></script>
<script>
$(document).ready(function() {
for (instance in CKEDITOR.instances) {
				CKEDITOR.instances[instance].updateElement();
}

});
</script>
<script>
$(document).ready(function() {
	
    $(document).on('click', '#login', function(){
		var data=$('#formAdmin').serialize();
		$('#notifAdmin').html('<img src="<?php echo base_url(); ?>assets/images/loading4.gif"/> Loading...');
		$.ajax({
			url:'<?php echo base_url(); ?>c_login',
			type:'POST',
			data:data,
			success: function(notif){
				$('#notifAdmin').html(notif);
			}
		});
	});
});
</script>
<!-- galeri -->
<script>
$(document).ready(function() {
	
	$(document).on('click', '#tamgaleri', function(){
		$("#modgaleri").modal();
		$( "#resultgaleri" ).html( '<img src="<?php echo base_url(); ?>assets/images/loading4.gif"/> Loading...' );
	$.get( "<?php echo base_url();?>gallery/tampil_galeri", function( data ) {
  		$( "#resultgaleri" ).html( data );
		
	});
		
	});
	
	$(document).on('click', '.editgaleri', function(){
		$('#tomtambahgaleri').attr('name','update');
		$("#tambahgaleri").modal();
	
		var id=$(this).attr('id');
		
		$.ajax({
		url:'<?php echo base_url(); ?>gallery/tampilperid/'+id,
		dataType:'json',
		type:'POST',
		success: function(msg){
			$('#idgaleri').val(msg.id);
			$('#judulgaleri').val(msg.judul);
			$('#kategorigaleri').val(msg.kategori);
			
		}
	});
	
	});
	
	//hapus jurnal
	$(document).on('click','.hapusgaleri', function(){
		var id=$(this).attr('id');
		var foto=$(this).attr('name');
		$( "#notifhapusgaleri" ).html( '<img src="<?php echo base_url(); ?>assets/images/loading4.gif"/> Loading...' );
		$.ajax({
			url:'<?php echo base_url();?>gallery/hapus_galeri/'+id+'/'+foto,
			type:'POST',
			success: function(html){
				if(html=='sukses'){
					$.get( "<?php echo base_url();?>gallery/tampil_galeri", function( data ) {
					$( "#resultgaleri" ).html( data );
					$('#notifhapusgaleri').addClass('alert alert-success');
					$('#notifhapusgaleri').html(html+'<a href="#" class="close" data-dismiss="alert" arial-label="close">&times;</a>');
					});
				}
			}
		});
	});
//end hapus admin
	
	$(document).on('click', '#fungtambahgaleri', function(){
		$('#tomtambahgaleri').attr('name','tambah');
	});
	
	$(document).on('click', '#tomtambahgaleri', function(){
		var fung=$(this).attr('name');
		var data = new FormData(document.getElementById("formTambahgaleri"));
		//untuk mengupdate isi textarea ckeditor
		for (instance in CKEDITOR.instances) {
				CKEDITOR.instances[instance].updateElement();
		}
		
		if(fung=='tambah'){
		$( "#notifgaleri" ).html( '<img src="<?php echo base_url(); ?>assets/images/loading4.gif"/> Loading...' );
		$.ajax({
			url:'<?php echo base_url(); ?>gallery/simpangaleri',
			type:'POST',
			enctype: 'multipart/form-data',
			data:data,
			processData: false,
			contentType: false,
			success: function(html){
				$( "#notifgaleri" ).html(html);
				if(html=='sukses'){
				$('#notifgaleri').addClass('alert alert-success');
				$('#notifgaleri').html(html+' menyimpan <a href="#" class="close" data-dismiss="alert" arial-label="close">&times;</a>');
				$( "#resultgaleri" ).html( '<img src="<?php echo base_url(); ?>assets/images/loading4.gif"/> Loading...' );
				$.get( "<?php echo base_url();?>gallery/tampil_galeri", function( data ) {
					$( "#resultgaleri" ).html( data );
					
				});
				
				$('#judulgaleri').val('');
				}
				else if(html=='gagal'){
				$('#notifgaleri').addClass('alert alert-danger');
				$('#notifgaleri').html(html+' menyimpan <a href="#" class="close" data-dismiss="alert" arial-label="close">&times;</a>');
				}
			}
		});
		}
		
		else if(fung=='update'){
			
			$('#notifgaleri').html('<img src="<?php echo base_url(); ?>assets/images/loading4.gif"/> Loading...' );
			
			$('#notifgaleri').removeClass('alert alert-success');
			
			$.ajax({
			url:'<?php echo base_url(); ?>gallery/update_galeri',
			enctype: 'multipart/form-data',
			data:data,
			processData: false,
			contentType: false,
			type: 'POST',
			success: function(html){
				$('#notifgaleri').html(html);
				if(html=='sukses'){
					$('#notifgaleri').addClass('alert alert-success');
					$('#notifgaleri').html(html+'<a href="#" class="close" data-dismiss="alert" arial-label="close">&times;</a>');
					$( "#resultgaleri" ).html( '<img src="<?php echo base_url(); ?>assets/images/loading4.gif"/> Loading...' );
					$.get( "<?php echo base_url();?>gallery/tampil_galeri", function( data ) {
					$( "#resultgaleri" ).html( data );
					});
					$('#judulgaleri').val('');
					}
					else if(html=='gagal'){
						$('#notifgaleri').html(html);
					}
			}
			});
			
			}
	});
    
});
</script>
<script>
$(document).ready(function(){
  
   $(document).on('submit', '#submitSaran', function(eve){
      eve.preventDefault();
      $('#notifsaran').html('Loading ...');
      var data = $('#submitSaran').serialize();
      $.ajax({
        url:'<?php echo base_url(); ?>kotak_saran/insert',
        data: data,
        type: 'POST',
        success: function(notif){
            $('#notifsaran').html(notif);
       }
     });
   });

   $(document).on('submit', '#form_tracer_alumni', function(e){
   		e.preventDefault();
   		var data = new FormData(document.getElementById("form_tracer_alumni"));
   		$('#notif').html('Loading..');
   		$.ajax({
   			url: '<?=base_url()?>alumni/tambah_alumni',
   			type: 'POST',
			enctype: 'multipart/form-data',
			data:data,
			processData: false,
			contentType: false,
			success: function(msg){
				$('#notif').html(msg);
			}

   		});
   });
	$(document).on('submit', '#form_pengajuan_judul', function(e){
		e.preventDefault();
		$('#notif_pengajuan_judul').html('Loading...');
		var data = $('#form_pengajuan_judul').serialize();
		$.ajax({
			url: '<?=base_url()?>pengajuan_judul/tambah_judul',
			type: 'POST',
			data: data,
			success: function(msg){
				$('#notif_pengajuan_judul').html(msg);
			}
		});
	});


});
</script>

<!-- end galeri -->
</body>
</html>