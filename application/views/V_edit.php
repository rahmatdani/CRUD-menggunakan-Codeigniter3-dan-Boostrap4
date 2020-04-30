<div class="container">
	<div class="row" style="margin-top: 50px">
		<div class="col-sm-8">

			<?php foreach($mahasiswa as $mhs) : ?>
			<form method="post" action="<?php echo base_url('Crud/ubah_data_aksi') ?>">

				<div class="form-group">
					<label>Nama</label>
					<input type="hidden" value="<?php echo $mhs->id_mhs; ?>" name="id_mhs" >
					<input type="text" name="nama" value="<?php echo $mhs->nama; ?>" class="form-control">
					<?php echo form_error('nama','<div class="text-small text-danger">','</div>') ?>
				</div>

				<div class="form-group">
					<label>Alamat</label>
					<input type="text" name="alamat" value="<?php echo $mhs->alamat; ?>" class="form-control">
					<?php echo form_error('alamat','<div class="text-small text-danger">','</div>') ?>
				</div>

				<div class="form-group">
					<label>No Handphone</label>
					<input type="text" name="no_hp" value="<?php echo $mhs->no_hp; ?>" class="form-control">
					<?php echo form_error('no_hp','<div class="text-small text-danger">','</div>') ?>
				</div>

				<button type="submit" class="btn btn-primary">Edit</button>
				
			</form>
			<?php endforeach ?>
		</div>
		<div class="col-sm-4">
			<p>
				Isilah biodata diri anda dengan benar dan sesuai dengan identitas asli yang tertera pada KTP, SIM (pilih salah satunya), karena hal menetukan kelayakan diri anda, apakah layak masuk atau tidak.
			</p>
		</div>
	</div>
</div>