<?php
    if(empty($hasil)){
        echo "Tidak ada data";
    }
    else{
    ?>
    
  		<table class="table table-hover">
        <?php
        foreach($hasil as $data){
			?>
            
            <tr>
            <td><?php
			if($data->gambar=='' || empty($data->gambar)){
				?>
                
				<img src="<?php echo base_url(); ?>assets/images/Book Icon.png" width="100">
                <?php
			}
			else{
            ?><img src="<?php echo base_url(); ?>assets/upload/images/thumb/<?php echo $data->gambar; ?>" width="100">
            <?php
			}
            ?></td>
            <td>
            <a href="<?php echo base_url(); ?>detail/index/<?php echo $data->id; ?>/<?php echo str_replace(' ','-',$data->judul); ?>">
            <h4 style="margin-top:0px;">
			<?php
			
			
			 echo $data->judul; ?>
            </h4>
            </a>
            <p style="font-size:12px; color:#B5B5B5;"><span class="glyphicon glyphicon-time"></span> <?php echo date('d F Y', strtotime($data->tanggal)); ?> | <span class="glyphicon glyphicon-user"></span> Posted by admin</p>
            </td>
            </tr>
            
            <?php
        }
		?>
   
  		</table>
	
	<?php
	}
	?>
	