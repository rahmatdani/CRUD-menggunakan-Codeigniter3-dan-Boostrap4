<div class="container">
	<div class="jumbotron mt-3">
	  <h1 class="display-4">Selamat Datang</h1>
	  <p class="lead">Silahkan isi form pendaftaran mahasiswa, dan jangan lupa isi data dengan lengkap dan benar ya</p>
	  <hr class="my-4">
	  <p class="lead">
	    <a class="btn btn-primary btn-lg" href="<?php echo base_url('Crud/Daftar') ?>" role="button">Daftar skuy</a>
	  </p>
	</div>
	<div class="row">
		<div class="col-md-5">
			<form action="" method="post">
				<div class="input-group mb-3">
				  <input type="text" class="form-control" placeholder="Cari" name="cari" autocomplete="off" autofocus="">
				  <div class="input-group-append">
				    <input class="btn btn-primary" type="submit" name="submit"></input>
				  </div>
				</div>
			</form>
		</div>
	</div>
	<?php echo $this->session->flashdata('pesan'); ?>
	<h5>Total : <?php echo $total_rows; ?></h5>
	<table class="table table-striped">
	  <thead>
	    <tr>
	      <th scope="col">#</th>
	      <th scope="col">Nama</th>
	      <th scope="col">Alamat</th>
	      <th scope="col">No Hp</th>
	      <th scope="col">Action</th>
	    </tr>
	  </thead>
	  <tbody>
	  	<?php if(empty($mahasiswa)) : ?>
	  	<tr>
	  		<td colspan="6">
	  			<div class="alert alert-danger" role="alert">
				  Data tidak ditemukan!
				</div>
	  		</td>
	  	</tr>
	  	<?php endif ?>

	  	<?php foreach($mahasiswa as $mhs) : ?>
	    <tr>
	      <th><?php echo ++$start ?></th>
	      <td><?php echo $mhs->nama ?></td>
	      <td><?php echo $mhs->alamat ?></td>
	      <td><?php echo $mhs->no_hp ?></td>
	      <td>
	      	<a href="<?php echo base_url('Crud/ubah_data/').$mhs->id_mhs ?>" class="badge badge-success">Edit</a>
	      	<a href="<?php echo base_url('Crud/hapus_data_aksi/').$mhs->id_mhs ?>" class="badge badge-danger">Hapus</a>
	      	<a href="" class="badge badge-primary">Detail</a>
	      </td>
	    </tr>
		<?php endforeach; ?>
	  </tbody>
	</table>
	<?php echo $this->pagination->create_links(); ?>
</div>
