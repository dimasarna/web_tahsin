<div class="container mt-4">
	<div class="row">
		<div class="col-12">
			<?php Flasher::flash(); ?>
		</div>
	</div>
	<div class="row">
		<div class="col-12">
			<form action="<?php echo BASEURL; ?>/soal/search" method="post">
				<div class="input-group mb-3">
				  <input type="text" id="keyword" name="keyword" class="form-control" placeholder="Keyword pertanyaan" aria-label="Keyword pertanyaan" aria-describedby="button-addon2">
				  <div class="input-group-append">
				    <button class="btn btn-primary" type="submit" id="button-addon2">Cari</button>
				  </div>
				</div>
			</form>
		</div>
	</div>
	<!-- Button trigger modal -->
	<button type="button" class="btn btn-primary tombolTambahSoal" data-toggle="modal" data-target="#formModal">
	  Tambah Soal
	</button>
	<div class="row mt-2">
		<div class="col-12"><h3>Daftar Soal</h3></div>
	</div>
	<table class="table table-bordered">
  <thead>
    <tr>
      <th scope="col">#</th>
      <th scope="col">Pertanyaan</th>
      <th scope="col">Pilihan 1</th>
      <th scope="col">Pilihan 2</th>
      <th scope="col">Pilihan 3</th>
      <th scope="col">Pilihan 4</th>
      <th scope="col">Aksi</th>
    </tr>
  </thead>
  <tbody>
  	<?php $no = 1; foreach ($data as $arr) : ?>
  	<tr>
      <th scope="row"><?php echo $no; ?></th>
      <td><?php echo $arr['question'] ?></td>
      <td><?php echo $arr['choice_a'] ?></td>
      <td><?php echo $arr['choice_b'] ?></td>
      <td><?php echo $arr['choice_c'] ?></td>
      <td><?php echo $arr['choice_d'] ?></td>
      <td>
      	<a class="badge badge-success ml-1 tombolUbahSoal" href="#" data-toggle="modal" data-target="#formModal" data-id="<?php echo $arr['question_id']; ?>">ubah</a>
      	<a class="badge badge-danger ml-1" href="<?php echo BASEURL; ?>/soal/delete/<?php echo $arr['question_id']; ?>" onclick="return confirm('Are you sure?');">hapus</a>
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
        <h5 class="modal-title" id="titleModalLabel">Tambah Data Soal</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <form id="formInput" action="<?php echo BASEURL; ?>/soal/add" method="post">
      <div class="modal-body">
    	<div class="form-group">
    		<input type="hidden" id="inputId" name="id">
		    <label for="inputQuestion">Pertanyaan</label>
		    <input type="text" class="form-control" id="inputQuestion" name="question" aria-describedby="inputHelp">
		    <label for="inputChoiceA">Pilihan 1</label>
		    <input type="text" class="form-control" id="inputChoiceA" name="choice_a" aria-describedby="inputHelp">
		    <label for="inputChoiceB">Pilihan 2</label>
		    <input type="text" class="form-control" id="inputChoiceB" name="choice_b" aria-describedby="inputHelp">
		    <label for="inputChoiceC">Pilihan 3</label>
		    <input type="text" class="form-control" id="inputChoiceC" name="choice_c" aria-describedby="inputHelp">
		    <label for="inputChoiceD">Pilihan 4</label>
		    <input type="text" class="form-control" id="inputChoiceD" name="choice_d" aria-describedby="inputHelp">
		    <label for="inputAnswer">Jawaban</label>
		    <input type="text" class="form-control" id="inputAnswer" name="answer" maxlength="1" aria-describedby="inputHelp">
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