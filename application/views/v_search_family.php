<?php
if(empty($cari)){
	echo'data tidak ditemukan';
}
else{
	?>
    <div class="table-responsive">
    <table class="table table-hover table-striped">
    <tr>
    <td>No.</td>
    <td>Kode</td>
    <td>Nama</td>
    <td>Kategori</td>
    <td>Aksi</td>
    </tr>
    <?php
	$no = 1;
foreach($cari as $value)
{
                ?>
                <tr>
                    <td><?= $no;?></td>
                    <td><?= $value->kode;?></td>
                    <td><?= $value->nama;?></td>
                    <td><?= $value->kategori;?></td>
     <td><a href="#" class="editfamily" id="<?php echo $value->id;?>"><span class="glyphicon glyphicon-pencil"></span></a> 
     <span class="glyphicon glyphicon-option-vertical"></span>
      <a href="#" class="hapusfamily" id="<?php echo $value->id;?>" name="<?php echo $value->foto;?>"><span class="glyphicon glyphicon-remove"></span></a> </td>
                </tr>
                <?php
$no++;
}
	?>
    </table>
    </div>
    <?php
}
?>