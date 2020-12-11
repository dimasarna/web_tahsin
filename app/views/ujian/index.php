<div class="container mt-4">
	<div class="row">
		<div class="col-12">
			<?php Flasher::flash(); ?>
		</div>
	</div>
	<div class="row">
		<div class="col-12">
			<form action="<?php echo BASEURL; ?>/ujian/search" method="post">
				<div class="input-group mb-3">
				  <input type="text" id="keyword" name="keyword" class="form-control" placeholder="Nama ujian" aria-label="Nama ujian" aria-describedby="button-addon2">
				  <div class="input-group-append">
				    <button class="btn btn-primary" type="submit" id="button-addon2">Cari</button>
				  </div>
				</div>
			</form>
		</div>
	</div>
	<!-- Button trigger modal -->
	<button type="button" class="btn btn-primary tombolTambahUjian" data-toggle="modal" data-target="#formModal">
	  Tambah Ujian
	</button>
	<div class="row mt-2">
		<div class="col-12"><h3>Daftar Ujian</h3></div>
	</div>
	<table class="table table-bordered">
	  <thead>
	    <tr>
	      <th scope="col">#</th>
	      <th scope="col">Kode Ujian</th>
	      <th scope="col">Nama Ujian</th>
	      <th scope="col">Token Ujian</th>
	      <th scope="col">Aksi</th>
	    </tr>
	  </thead>
	  <tbody>
	  	<?php $no = 1; foreach ($data as $arr) : ?>
	  	<tr>
	      <th scope="row"><?php echo $no; ?></th>
	      <td><?php echo $arr['exam_code'] ?></td>
	      <td><?php echo $arr['exam_name'] ?></td>
	      <td><?php echo $arr['token'] ?></td>
	      <td>
	      	<a class="badge badge-success ml-1 tombolUbahUjian" href="#" data-toggle="modal" data-target="#formModal" data-id="<?php echo $arr['exam_id']; ?>">ubah</a>
	      	<a class="badge badge-danger ml-1" href="<?php echo BASEURL; ?>/ujian/delete/<?php echo $arr['exam_id']; ?>" onclick="return confirm('Are you sure?');">hapus</a>
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
        <h5 class="modal-title" id="titleModalLabel">Tambah Data Ujian</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <form id="formInput" action="<?php echo BASEURL; ?>/ujian/add" method="post">
      <div class="modal-body">
    	<div class="form-group">
    		<input type="hidden" id="inputId" name="id">
		    <label for="inputCode">Kode Ujian</label>
		    <input type="text" class="form-control" id="inputCode" name="code" aria-describedby="inputHelp">
		    <label for="inputName">Nama Ujian</label>
		    <input type="text" class="form-control" id="inputName" name="name" aria-describedby="inputHelp">
		    <label for="inputToken">Token Ujian</label>
		    <input type="text" class="form-control" id="inputToken" name="token" aria-describedby="inputHelp">
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