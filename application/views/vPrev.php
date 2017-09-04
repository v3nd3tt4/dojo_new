<?php
	
if(empty($hasil)){
	echo 'Belum ada data';
}
elseif($total!=1){
	echo 'terjadi kesalahan data';
}
			
else{
	?>
    <h3 style="margin-top:0px;"><?php echo $hasil->nama; ?></h3>
    <h3 style="margin-top:0px;"><?php echo $hasil->kode; ?></h3>
    
    <hr/>
    <?php
	if($hasil->foto!='' || !empty($hasil->foto)){
		?>
        <center>
        <br/>
        <img src="<?php echo base_url();?>assets/upload/images/asli/<?php echo $hasil->foto; ?>" class="img-thumbnail img-responsive" alt="Cinque Terre" style="max-height:350px">
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