<div class="container">
	<div class="row" style="margin-top: 50px">
		<div class="col-sm-8">
			<form method="post" action="<?php echo base_url('Crud/daftar_aksi') ?>">
				<div class="form-group">
					<label>Nama</label>
					<input type="text" name="nama" class="form-control" placeholder="Masukkan Nama Anda" autocomplete="off" autofocus="">
					<?php echo form_error('nama','<div class="text-small text-danger">','</div>') ?>
				</div>
				<div class="form-group">
					<label>Alamat</label>
					<input type="text" name="alamat" class="form-control" placeholder="Masukkan Alamat Anda">
					<?php echo form_error('alamat','<div class="text-small text-danger">','</div>') ?>
				</div>
				<div class="form-group">
					<label>No Handphone</label>
					<input type="number" name="no_hp" class="form-control" placeholder="Masukkan Nomor Handphone anda">
					<?php echo form_error('no_hp','<div class="text-small text-danger">','</div>') ?>
				</div>
				<button type="submit" class="btn btn-primary">Daftar</button>
			</form>
		</div>
		<div class="col-sm-4">
			<p>
				Isilah biodata diri anda dengan benar dan sesuai dengan identitas asli yang tertera pada KTP, SIM (pilih salah satunya), karena hal menetukan kelayakan diri anda, apakah layak masuk atau tidak.
			</p>
		</div>
	</div>
</div>