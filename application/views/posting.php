<?php
    if(empty($hasil)){
        echo "Tidak ada data";
    }
    else{
    ?>
    
    <div class="table-responsive">
 

    <table class="table table-striped table-bordered table-hover" id="tabeljurnal">
        <tr align="center">
            <td>No</td>
            <td>Judul</td>
            <td>Kategori</td>
            
            <td>Aksi</td>
        </tr>
        <?php
        $no = 1;
        foreach($hasil as $data) {
        ?>
        <tr>
            <td><?php echo $no++ ;?>.</td>
            <td><?php echo $data->judul;?></td>
            <td><?php echo $data->kategori ;?></td>
            
            <td align="center">
            <a href="#" class="editposting" id="<?php echo $data->id;?>" >
                <span class="glyphicon glyphicon-pencil"></span></a>
            <span class="glyphicon glyphicon-option-vertical"></span>
            <a href="#" class="hapusposting" id="<?php echo $data->id;?>" name="<?php echo $data->gambar;?>">
            <span class="glyphicon glyphicon-remove"></span>
            </a>
            </td>
        </tr>
        <?php
        }
        ?>
        </table>
        </div>
 
    <?php
    }
    ?>
	