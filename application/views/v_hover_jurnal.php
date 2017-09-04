<div style="min-height:175px;">
    	<center>
        <?php 
		if(empty($hasil->foto)|| $hasil->foto==''){
			?>
            
            <img src="<?php echo base_url();?>assets/images/Book Icon.png" class="img-thumbnail img-responsive" alt="Cinque Terre" style="height:150px"/>
            <?php
		}
		else{ ?>
        <a href="<?php echo base_url();?>assets/upload/images/asli/<?php echo $hasil->foto; ?>" target="_blank">
    		<img src="<?php echo base_url();?>assets/upload/images/thumb/<?php echo $hasil->foto; ?>" class="img-thumbnail img-responsive" alt="Cinque Terre" style="height:250px">
        </a>
            <?php }?>
    	</center>
</div>
<br/>
<div style="background-image :url(<?php echo base_url(); ?>assets/images/concrete_seamless.png); 
background-image : repeat; border-radius:5px; padding:20px;">
    	
    		<b>ISBN: </b><?php echo $hasil->isbn;?><br/>
            <b>Judul: </b><?php echo $hasil->judul;?><br/><br/>
            <b>Keterangan:</b>
            <?php echo $hasil->keterangan;?>
    	
</div> 