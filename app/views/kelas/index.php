<div class="container mt-4">
	<div class="row">
		<div class="col-12">
			<?php Flasher::flash(); ?>
		</div>
	</div>
	<div class="row">
		<div class="col-12">
			<form action="<?php echo BASEURL; ?>/kelas/search" method="post">
				<div class="input-group mb-3">
				  <input type="text" id="keyword" name="keyword" class="form-control" placeholder="Nama kelas" aria-label="Nama kelas" aria-describedby="button-addon2">
				  <div class="input-group-append">
				    <button class="btn btn-primary" type="submit" id="button-addon2">Cari</button>
				  </div>
				</div>
			</form>
		</div>
	</div>
	<!-- Button trigger modal -->
	<button type="button" class="btn btn-primary tombolTambahKelas" data-toggle="modal" data-target="#formModal">
	  Tambah Kelas
	</button>
	<div class="row mt-2">
		<div class="col-12"><h3>Daftar Kelas</h3></div>
	</div>
	<table class="table table-bordered">
	  <thead>
	    <tr>
	      <th scope="col">#</th>
	      <th scope="col">Kode Kelas</th>
	      <th scope="col">Nama Kelas</th>
	      <th scope="col">Aksi</th>
	    </tr>
	  </thead>
	  <tbody>
	  	<?php $no = 1; foreach ($data as $arr) : ?>
	  	<tr>
	      <th scope="row"><?php echo $no; ?></th>
	      <td><?php echo $arr['class_code'] ?></td>
	      <td><?php echo $arr['class_name'] ?></td>
	      <td>
	      	<a class="badge badge-success ml-1 tombolUbahKelas" href="#" data-toggle="modal" data-target="#formModal" data-id="<?php echo $arr['class_id']; ?>">ubah</a>
	      	<a class="badge badge-danger ml-1" href="<?php echo BASEURL; ?>/ujian/delete/<?php echo $arr['class_id']; ?>" onclick="return confirm('Are you sure?');">hapus</a>
	      </td>
	    </tr>
		<?php $no++; endforeach; ?>
	  </tbody>
	</table>
</div>
<!-- Modal -->
<div class="modal fade" id="formModal" tabindex="-1" role="dialog" aria-labelledby="titleModalLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="titleModalLabel">Tambah Data Kelas</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <form id="formInput" action="<?php echo BASEURL; ?>/kelas/add" method="post">
      <div class="modal-body">
    	<div class="form-group">
    		<input type="hidden" id="inputId" name="id">
		    <label for="inputName">Nama Kelas</label>
		    <input type="text" class="form-control" id="inputName" name="name" aria-describedby="inputHelp">
		    <label for="inputCode">Kode Kelas</label>
		    <input type="text" class="form-control" id="inputCode" name="code" aria-describedby="inputHelp">
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