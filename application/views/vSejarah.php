<?php
	
if(empty($hasil)){
	echo 'Belum ada data';
}
elseif($total!=1){
	echo 'terjadi kesalahan data';
}
			
else{
	?>
    <h1 style="margin-top:0px;"><?php echo $hasil->judul; ?></h1>
    <p style="font-size:12px; color:#B5B5B5;"><span class="glyphicon glyphicon-time"></span> <?php echo date('d F Y', strtotime($hasil->tanggal)); ?> | <span class="glyphicon glyphicon-user"></span> Posted by admin</p>
    <hr/>
    <?php
	if($hasil->gambar!='' || !empty($hasil->gambar)){
		?>
        <center>
        <br/>
        <img src="<?php echo base_url();?>assets/upload/images/asli/<?php echo $hasil->gambar; ?>" class="img-thumbnail img-responsive" alt="Cinque Terre" style="max-height:350px">
        </center>
        <br/>
        
        <?php
	}
	?>
    <p>
        <?php echo $hasil->keterangan; ?>
        </p>
    <?php
	
}
?>
            
</div>