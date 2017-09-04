	<div class="table-responsive">
		<table class="table table-striped table-hover dttbl">
			<thead>
				<tr>
					<th>No.</th>
					<th>NPM</th>
					<th>Nama</th>
					<th>Judul Yang diterima</th>
					<th>Keterangan</th>
				</tr>
			</thead>
			<tbody>
				<?php 
				$no = 1;
				foreach($list->result() as $row){?>
				<tr>
					<td><?=$no++?>.</td>
					<td><?=$row->npm?></td>
					<td><?=$row->nama?></td>
					<td>
					<?php 
					if($row->judul_diterima == 1){
						echo $row->judul_1;
					}else if($row->judul_diterima == 2){
						echo $row->judul_2;
					}else if($row->judul_diterima == 3){
						echo $row->judul_3;
					}else{
						echo '-';
					}
					?>						
					</td>
					<td><?=$row->alasan_diterima?></td>
				</tr>
				<?php }?>
			</tbody>
		</table>
	</div>
</div>