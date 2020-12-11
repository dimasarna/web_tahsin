<div class="container mt-4">
	<div class="row">
		<div class="col-12">
			<?php Flasher::flash(); ?>
		</div>
	</div>
	<div class="row">
		<div class="col-12">
			<form action="<?php echo BASEURL; ?>/pengguna/search" method="post">
				<div class="input-group mb-3">
				  <input type="text" id="keyword" name="keyword" class="form-control" placeholder="Nama pengguna" aria-label="Nama pengguna" aria-describedby="button-addon2">
				  <div class="input-group-append">
				    <button class="btn btn-primary" type="submit" id="button-addon2">Cari</button>
				  </div>
				</div>
			</form>
		</div>
	</div>
	<!-- Button trigger modal -->
	<button type="button" class="btn btn-primary tombolTambahPengguna" data-toggle="modal" data-target="#formModal">
	  Tambah Pengguna
	</button>
	<div class="row mt-2">
		<div class="col-12"><h3>Daftar Pengguna</h3></div>
	</div>
	<ul class="list-group">
	  <?php foreach ($data as $arr) : ?>
	  <li class="list-group-item"><?php echo $arr['name']; ?>
	    <a class="badge badge-danger float-right ml-1" href="<?php echo BASEURL; ?>/pengguna/delete/<?php echo $arr['user_id']; ?>" onclick="return confirm('Are you sure?');">hapus</a>
	    <a class="badge badge-success float-right ml-1 tombolUbahPengguna" href="#" data-toggle="modal" data-target="#formModal" data-id="<?php echo $arr['user_id']; ?>">ubah</a>
	    <a class="badge badge-primary float-right" href="<?php echo BASEURL; ?>/pengguna/detail/<?php echo $arr['user_id']; ?>">detail</a>
	  </li>
	  <?php endforeach; ?>
	</ul>
</div>
<!-- Modal -->
<div class="modal fade" id="formModal" tabindex="-1" role="dialog" aria-labelledby="titleModalLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="titleModalLabel">Tambah Data Pengguna</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <form id="formInput" action="<?php echo BASEURL; ?>/pengguna/add" method="post">
      <div class="modal-body">
    	<div class="form-group">
    		<input type="hidden" id="inputId" name="id">
		    <label id="labelUsername" for="inputUsername">Username</label>
		    <input type="text" class="form-control" id="inputUsername" name="username" aria-describedby="inputHelp">
		    <label for="inputNama">Nama</label>
		    <input type="text" class="form-control" id="inputNama" name="name" aria-describedby="inputHelp">
		    <label for="inputEmail">Email</label>
		    <input type="text" class="form-control" id="inputEmail" name="email" aria-describedby="inputHelp">
		    <label for="inputNomor">Nomor Telepon</label>
		    <input type="text" class="form-control" id="inputNomor" name="phone_number" aria-describedby="inputHelp">
		    <small id="inputHelp" class="form-text text-muted">We'll never share your data with anyone else.</small>
		  </div>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
        <button type="submit" class="btn btn-primary">Tambah Data</button>
      </div>
  	</form>
    </div>
  </div>
</div>