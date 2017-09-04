<div class="row" style="margin-bottom:25px; padding-left:15px;padding-right:15px;">
<?php 
if(empty($hasil)){
	echo'tidak ada data';
}
else{
	?>
   <ul class="rslides">
    	<?php
			foreach($hasil as $data){
				?>
                <li>
                
			<img class="img-responsive" src="<?php echo base_url(); ?>assets/upload/images/asli/<?php echo $data->nama;?>" title="<?php echo $data->judul;?>">
            
		</li>
                <?php
			}
		?>
    </ul>
    <?php
}
?>
</div>
       
        <div class="row" style="padding-left:15px;padding-right:15px;">
            <br/>
            <br/>
            <br/>
             <?php
			 if(empty($activitas)){
				 echo' ';
			 }
			 else{
				 foreach($activitas as $data){
					 $date=explode('-',$data->tanggal);
					 $tanggal=$date[2];
					 $bulan=$date[1];
					 if($bulan=='01'){$bulan='Jan';}elseif($bulan=='02'){$bulan='Feb';}elseif($bulan=='03'){$bulan='Mar';}elseif($bulan=='04'){$bulan='Apr';}elseif($bulan=='05'){$bulan='Mei';}elseif($bulan=='06'){$bulan='Jun';}elseif($bulan=='07'){$bulan='Jul';}elseif($bulan=='08'){$bulan='Aug';}elseif($bulan=='09'){$bulan='Sep';}elseif($bulan=='10'){$bulan='Oct';}elseif($bulan=='11'){$bulan='Nov';}elseif($bulan=='12'){$bulan='Des';}
					 
					 $isi=strlen($data->keterangan);
					 if($isi>150){$isi=substr($data->keterangan,0,150).'...';}
					 else{ $isi=$data->keterangan;}
			 ?>
            <div class="col-md-6" style="margin-bottom:20px; min-height:0px;">
            	<table class="table" style="border:none;">
                	<tr>
                    	<td><div style=" padding:5px; width:50px; border:solid medium #1FD3AE; color:#1FD3AE"><b style="font-size:24px"><?=$tanggal?></b> <?=$bulan?></div></td>
                        <td>
                        	<h3 style="margin-top:0px;">
                            	<a href="<?php echo base_url(); ?>detail/index/<?php echo $data->id; ?>/<?php $kata=array('.', '/', '(', ')', ':', ';', ',', ' '); echo str_replace($kata,'-',$data->judul); ?>" style="color:#000;">
									<?=$data->judul;?>
                                </a>
                            </h3>
                        </td>
                    </tr>
                    <tr>
                    	<td></td>
                        <td><?=$isi?></td>
                    </tr>
                </table>
            </div>
            <?php
				 }
			 }
			?>
             
            
        </div>
        
</div>
    

