	<div class="row">
		<div class="col-md-12">
			<div class="row">
				<div class="col-md-12">
					<h3>Tracer Alumni <a href="<?=base_url()?>alumni" class="btn btn-danger pull-right"><span class="glyphicon glyphicon-eye-open"></span>  Lihat Data Almuni</a></h3>
					
					<hr/>
				</div>
			</div>
			<form id="form_tracer_alumni">
				<div class="form-group">
					<label>NPM:</label>
					<input type="text" name="npm" id="npm" class="form-control" required>
				</div>
				<div class="form-group">
					<label>Nama:</label>
					<input type="text" name="nama" id="nama" class="form-control" required>
				</div>
				<div class="form-group">
					<label>Foto:</label>
					<input type="file" name="foto" id="foto" class="form-control" required>
				</div>
				<div class="form-group">
					<label>Tahun Masuk:</label>
					<input type="number" name="tahun_masuk" id="tahun_masuk" class="form-control" required>
				</div>
				<div class="form-group">
					<label>Tahun Lulus:</label>
					<input type="number" name="tahun_lulus" id="tahun_lulus" class="form-control" required>
				</div>
				<div class="form-group">
					<label>Pekerjaan:</label>
					<input type="text" name="pekerjaan" id="pekerjaan" class="form-control" required>
				</div>
				<div class="form-group">
					<label>Tempat Bekerja:</label>
					<input type="text" name="tempat_bekerja" id="tempat_bekerja" class="form-control" required>
				</div>
				<div class="form-group">
					<label>Alamat:</label>
					<textarea name="alamat" id="alamat" class="form-control" style="resize: none" required></textarea>
				</div>
				<div class="form-group">
					<label>Keterangan Lainnya:</label>
					<textarea name="Keterangan" id="Keterangan" class="form-control" style="resize: none" required></textarea>
				</div>
				<button type="submit" class="btn btn-primary"><span class="glyphicon glyphicon-floppy-disk"></span>  Simpan</button>
				<div id="notif"></div>
			</form>
		</div>
	</div>
</div>