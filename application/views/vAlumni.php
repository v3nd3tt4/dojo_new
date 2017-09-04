<?php

if(empty($hasil)){
	echo 'belum ada data';
}

else{
	?>
    
    <div class="row">
    
    <?php
	foreach($hasil as $data){
		?>
        <div class="col-md-4 " style="margin-bottom:30px; min-height:250px; ">
    
	<div style="min-height:175px;" class="hoper">
    	<center>
        <?php 
		if(empty($data->foto)|| $data->foto==''){
			?>
            <img src="<?php echo base_url();?>assets/images/a72d77116a59a9dc1cf93c577b32ebe6.jpg" class="img-thumbnail img-responsive" alt="Cinque Terre" style="height:150px"/>
            <?php
		}
		else{ ?>
    		<img src="<?php echo base_url();?>assets/upload/images/thumb/<?php echo $data->foto; ?>" class="img-thumbnail img-responsive" alt="Cinque Terre" style="height:150px">
            <?php }?>
    	</center>
    </div>
    <div style="background-image :url(<?php echo base_url(); ?>assets/images/concrete_seamless.png); 
background-image : repeat; border-radius:5px;">
    	<center>
        <a href="<?php echo base_url(); ?>prev/index/<?php echo $data->id; ?>/<?php echo str_replace(' ','-',$data->nama); ?>">
    		<b>NPM: </b><?php echo $data->kode;?><br/>
         
            <b>Nama: </b><?php echo $data->nama;?>
            </a> 
    	</center>
    </div> 
   
</div> 
        
        
        <?php
	}
	?>
    </div>
<div class="row">
<?php echo $halaman;?>
</div> 
	<?php
	
}
?>
</div>