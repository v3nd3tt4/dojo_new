	<div class="row">
		<div class="col-md-12">
			<h3>Pengajuan Judul Skripsi <a href="<?=base_url()?>pengajuan_judul/judul_diterima" class="btn btn-primary pull-right"><span class="glyphicon glyphicon-eye-open"></span>  Judul Yang Diterima</a> <a href="<?=base_url()?>pengajuan_judul/judul_ditolak" class="btn btn-danger pull-right"><span class="glyphicon glyphicon-eye-open"></span>  Judul Yang Ditolak</a></h3>
		</div>
	</div>
	<hr/>
	<form id="form_pengajuan_judul">
		<div class="form-group">
			<label>NPM:*</label>
			<input type="text" name="npm" id="npm" class="form-control" required/>
		</div>
		<div class="form-group">
			<label>Nama:*</label>
			<input type="text" name="nama" id="nama" class="form-control" required/>
		</div>
		<div class="form-group">
			<label>Judul 1:*</label>
			<textarea name="judul1" id="judul1" class="form-control" style="resize: none" required></textarea>
		</div>
		<div class="form-group">
			<label>Judul 2:*</label>
			<textarea name="judul2" id="judul2" class="form-control" style="resize: none" required></textarea>
		</div>
		<div class="form-group">
			<label>Judul 3:*</label>
			<textarea name="judul3" id="judul3" class="form-control" style="resize: none"></textarea>
		</div>
		<div class="form-group">
			<label>Keterangan:</label>
			<textarea name="keterangan" id="keterangan" class="form-control" style="resize: none"></textarea>
		</div>
		<button class="btn btn-success" type="submit"><span class="glyphicon glyphicon-refresh"></span>  Proses</button>
	</form>
	<div id="notif_pengajuan_judul"></div>

</div>