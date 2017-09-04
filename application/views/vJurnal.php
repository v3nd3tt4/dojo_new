<div class="row">
<?php
if(empty($query)){
	echo 'belum ada data';
}
else{
	foreach($query as $data){
?>
	<div class="col-md-4 " style="margin-bottom:30px; min-height:250px; ">
    <a href="#" class="hoperjurnal" id="<?php echo $data->id; ?>">
	<div style="min-height:175px;" class="hoper">
    	<center>
        <?php 
		if(empty($data->foto)|| $data->foto==''){
			?>
            <img src="<?php echo base_url();?>assets/images/Book Icon.png" class="img-thumbnail img-responsive" alt="Cinque Terre" style="height:150px"/>
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
    		<b>ISBN: </b><?php echo $data->isbn;?><br/>
            <b>Judul: </b><?php echo $data->judul;?>
    	</center>
    </div> 
    </a> 
</div> 
<?php
	}
	?>
    <!-- Modal hover jurnal -->
<div id="modhoverjurnal" class="modal fade" role="dialog">

  <div class="modal-dialog">

    <!-- Modal content-->
    <div class="modal-content">
      <div class="modal-header" style="
                background-image :url(<?php echo base_url(); ?>assets/images/restaurant.png); 
				background-image : repeat;
                color:#fff;
                ">
        <button type="button" class="close" data-dismiss="modal">&times;</button>
        <h4 class="modal-title">Jurnal</h4>
      </div>
      <div class="modal-body">
        
        
        <div id="loadinghoverjurnal"></div>
        <div id="resulthoverjurnal">
        </div>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
      </div>
    </div>

  </div>
</div>
<!-- end modal hover jurnal -->
    <?php
}
?>
    
    
</div>
<div class="row">
<?php echo $halaman;?>
</div>
</div>