<div class="container mt-4">
	<div class="row">
		<div class="col-12">
			<?php Flasher::flash(); ?>
		</div>
	</div>
	<div class="row mt-2">
		<div class="col-12"><h3>Riwayat Ujian</h3></div>
	</div>
	<div class="accordion" id="accordionExample">
	  <?php $id = 0; foreach ($data as $arr): ?>
	  <div class="card">
	    <div class="card-header" id="heading<?php echo $id; ?>">
	      <h2 class="mb-0">
	        <button class="btn btn-link btn-block text-left" type="button" data-toggle="collapse" data-target="#collapse<?php echo $id; ?>" aria-expanded="true" aria-controls="collapse<?php echo $id; ?>">
	          <?php echo $arr["class_code"] . " - " . $arr["class_name"]; ?>
	        </button>
	      </h2>
	    </div>
	    <div id="collapse<?php echo $id; ?>" class="collapse" aria-labelledby="heading<?php echo $id; ?>" data-parent="#accordionExample">
	      <div class="card-body">
	      	<?php if (count($data2[$id]) == 0) echo "Empty"; else { ?>
	      	<table class="table table-bordered">
			  <thead>
			    <tr>
			      <th scope="col">#</th>
			      <th scope="col">Kode Ujian</th>
			      <th scope="col">Nama Ujian</th>
			      <th scope="col">Nilai</th>
			    </tr>
			  </thead>
			  <tbody>
			  	<?php foreach ($data2[$id] as $key => $value): ?>
			  	<tr>
			      <th scope="row"><?php echo($key+1); ?></th>
			      <td><?php echo $value['exam_code']; ?></td>
			      <td><?php echo $value['exam_name']; ?></td>
			      <td><?php echo $value['score']; ?></td>
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