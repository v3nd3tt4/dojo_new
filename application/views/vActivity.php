<div class="row">
<?php

if(empty($hasil)){
	echo 'belum ada data';
}
else{
	foreach($hasil as $data){
?>
	<div class="col-md-4 " style="margin-bottom:30px; min-height:250px; ">
    
	<div style="min-height:175px;" class="hoper">
    	<center>
        <?php 
		if(empty($data->gambar)|| $data->gambar==''){
			?>
            <img src="<?php echo base_url();?>assets/images/Book Icon.png" class="img-thumbnail img-responsive" alt="Cinque Terre" style="height:150px"/>
            <?php
		}
		else{ ?>
    		<img src="<?php echo base_url();?>assets/upload/images/thumb/<?php echo $data->gambar; ?>" class="img-thumbnail img-responsive" alt="Cinque Terre" style="height:150px">
            <?php }?>
    	</center>
    </div>
    <div style="background-image :url(<?php echo base_url(); ?>assets/images/concrete_seamless.png); 
background-image : repeat; border-radius:5px;">
    	<center>
        <a href="<?php echo base_url(); ?>detail/index/<?php echo $data->id; ?>/<?php echo str_replace(' ','-',$data->judul); ?>">
    		<b>Judul: </b><?php echo $data->judul;?><br/>
         
            <b>Tanggal: </b><?php echo date('d F Y', strtotime($data->tanggal)); ?>
            </a> 
    	</center>
    </div> 
   
</div> 
<?php
	}
}
	?>
  </div>
<div class="row">
<?php echo $halaman;?>
</div>    	
</div>