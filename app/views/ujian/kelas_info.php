<div class="container mt-4">
	<div class="row">
		<?php foreach ($data as $arr) : ?>
		<div class="col">
			<div class="card" style="width: 18rem;">
			  <div class="card-body">
			    <h5 class="card-title"><?php echo $arr["class_code"]; ?></h5>
			    <p class="card-text"><?php echo $arr["class_name"]; ?></p>
			    <a href="<?php echo BASEURL; ?>/ujian/delete_kelas/<?php echo $arr["rel_id"] ?>" class="card-link">Hapus</a>
			  </div>
			</div>
		</div>
		<?php endforeach; ?>
		<div class="col">
			<div class="card" style="width: 18rem;">
			  <div class="card-body">
			    <!-- Button trigger modal -->
				<button type="button" class="btn btn-primary btn-block" data-toggle="modal" data-target="#formModal">
				  Tambah Kelas
				</button>
			  </div>
			</div>
		</div>
	</div>
</div>