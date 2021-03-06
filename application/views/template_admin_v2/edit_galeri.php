<?php $row = $data->row();?>
<div class="row">
    <div class="col-lg-12">
        <div class="ibox float-e-margins">
            <form id="frm_tambah_galeri" enctype="multipart/form-data" method="POST" action="<?=base_url()?>gallery/update_galeri">
            	<div class="ibox-title">
                    <div class="row">
                        <div class="col-md-10">
                            <h3>Edit Galeri</h3>
                        </div>
                        <div class="col-md-2">
                            <button type="submit" class="btn btn-danger" style="float: right;"><i class="fa fa-save"></i>  Simpan</button>
                        </div>
                    </div>
                </div>
                <div class="ibox-content">
                    <?=@$this->session->flashdata('msg')?>
            		<div class="form-group">
            			<label>Judul:</label>
                        <input type="hidden" name="idgaleri" value="<?=$row->id?>">
            			<input type="text" name="judulgaleri" class="form-control" value="<?=$row->judul?>" required />
            		</div>
            		<div class="form-group">
            			<label>Kategori:</label>
            			<select name="kategorigaleri" class="form-control" required>
                            <option value="">--pilih--</option>
                            <option value="galeri" <?=$row->kategori == 'galeri' ? 'selected' : ''?>>galeri</option>
                            <option value="banner" <?=$row->kategori == 'banner' ? 'selected' : ''?>>banner</option>
                        </select>
            		</div>
            		<div class="form-group">
            			<label>Foto:</label>
            			<input type="file" name="gambargaleri" class="form-control"/>
            		</div>
                </div>
            </form>
        </div>
    </div>
</div>
