<?php
    if(empty($hasil)){
        echo "Tidak ada data";
    }
    else{
    ?>
    <div class="table-responsive">
 

    <table class="table table-striped table-bordered table-hover">
        <tr align="center">
            <td>No</td>
            <td>Username</td>
            <td>Nama</td>
            
            <td>Aksi</td>
        </tr>
        <?php
        $no = 1;
        foreach($hasil as $data) {
        ?>
        <tr>
            <td><?php echo $no++ ;?>.</td>
            <td><?php echo $data->username;?></td>
            <td><?php echo $data->nama ;?></td>
            
            <td align="center">
            <a href="#" class="editadmin" id="<?php echo $data->username;?>" >
                <span class="glyphicon glyphicon-pencil"></span></a>
            <span class="glyphicon glyphicon-option-vertical"></span>
            <a href="#" class="hapusadmin" id="<?php echo $data->username;?>">
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
	