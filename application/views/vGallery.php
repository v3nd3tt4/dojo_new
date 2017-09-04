<?php

if(empty($hasil)){
	echo 'belum ada data';
}

else{
	?>
    <!-- <div class="row"> -->
    
    <?php
    $i = 0;
	foreach($hasil as $data){
    if($i%3==0) {
        if ($i==0) {
            echo '<div class="row" style="margin-bottom:15px;">';
        } else{
            echo '</div><div class="row" style="margin-bottom:15px;">';
        }
    } 
		?>
        <div class="col-md-4 " style="margin-bottom:30px; min-height:250px; ">
    
	<div style="min-height:175px;" class="hoper">
    <a href="<?php echo base_url();?>assets/upload/images/asli/<?php echo $data->nama; ?>" target="_blank">
    	<center>
        <?php 
		if(empty($data->nama)|| $data->nama==''){
			?>
            <img src="<?php echo base_url();?>assets/images/a72d77116a59a9dc1cf93c577b32ebe6.jpg" class="img-thumbnail img-responsive" alt="Cinque Terre" style="height:150px"/>
            <?php
		}
		else{ ?>
    		<img src="<?php echo base_url();?>assets/upload/images/thumb/<?php echo $data->nama; ?>" class="img-thumbnail img-responsive" alt="Cinque Terre" style="height:150px">
            <?php }?>
    	</center>
    </div>
    <div style="background-image :url(<?php echo base_url(); ?>assets/images/concrete_seamless.png); 
background-image : repeat; border-radius:5px;">
    	<center>
       
    		<b></b><?php echo $data->judul;?><br/>
         <br/>
            
           
    	</center>
         </a> 
    </div> 
   
</div> 
        
        
        <?php
        $i++;
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