<?php unset($_SESSION["temp_info"]); ?>
<div class="container mt-4">
	<div class="row">
		<div class="col-12">
			<?php Flasher::flash(); ?>
		</div>
	</div>
	<!-- Button trigger modal -->
	<button type="button" class="btn btn-primary tombolJoinKelas" data-toggle="modal" data-target="#formModal" data-user-id="<?php echo $_SESSION['user_information']['user_id']; ?>">
	  Gabung Kelas
	</button>
	<div class="row mt-2">
		<div class="col-12"><h3>Daftar Ujian</h3></div>
	</div>
	<div class="accordion" id="accordionExample">
	  <?php $id = 0; foreach ($data as $arr): ?>
	  <div class="card">
	    <div class="card-header" id="heading_<?php echo($id+1); ?>">
	      <h2 class="mb-0">
	        <button class="btn btn-link btn-block text-left" type="button" data-toggle="collapse" data-target="#collapse_<?php echo($id+1); ?>" aria-expanded="true" aria-controls="collapse_<?php echo($id+1); ?>">
	          <?php echo $arr["class_code"] . " - " . $arr["class_name"]; ?>
	        </button>
	      </h2>
	    </div>
	    <div id="collapse_<?php echo($id+1); ?>" class="collapse" aria-labelledby="heading_<?php echo($id+1); ?>" data-parent="#accordionExample">
	      <div class="card-body">
	      	<?php if (count($data2[$id]) == 0) echo "Empty"; else { ?>
	      	<table class="table table-bordered">
			  <thead>
			    <tr>
			      <th scope="col">#</th>
			      <th scope="col">Kode Ujian</th>
			      <th scope="col">Nama Ujian</th>
			      <th scope="col">Aksi</th>
			    </tr>
			  </thead>
			  <tbody>
			  	<?php foreach ($data2[$id] as $key => $value): ?>
			  	<tr>
			      <th scope="row"><?php echo($key+1); ?></th>
			      <td><?php echo $value['exam_code']; ?></td>
			      <td><?php echo $value['exam_name']; ?></td>
			      <td><a class="badge badge-primary tombolMengikutiUjian" href="#" data-toggle="modal" data-target="#formModal" data-class-id="<?php echo $value['class_id']; ?>" data-exam-id="<?php echo $value['exam_id']; ?>" data-user-id="<?php echo $_SESSION['user_information']['user_id']; ?>">ikuti</a></td>
			    </tr>
				<?php endforeach; ?>
			  </tbody>
			</table>
			<?php } ?>
	      </div>
	    </div>
	  </div>
	  <?php $id++; endforeach; ?>
	</div>
</div>
<!-- Modal -->
<div class="modal fade" id="formModal" tabindex="-1" role="dialog" aria-labelledby="titleModalLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="titleModalLabel">Ikuti Kelas</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <form id="formInput" action="<?php echo BASEURL; ?>/ujian_pengguna/join_kelas" method="post">
      <div class="modal-body">
    	<div class="form-group">
    		<input type="hidden" id="inputClassId" name="class_id" value="">
    		<input type="hidden" id="inputExamId" name="exam_id" value="">
    		<input type="hidden" id="inputUserId" name="user_id" value="">
		    <label id="labelInput" for="inputCode">Kode Kelas</label>
		    <input type="text" class="form-control" id="inputCode" name="code">
		  </div>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
        <button type="submit" class="btn btn-primary">Gabung</button>
      </div>
  	</form>
    </div>
  </div>
</div>