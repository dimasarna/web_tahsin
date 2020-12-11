<div class="container mt-4">
	<div class="row">
		<?php foreach ($data as $arr) : ?>
		<div class="col">
			<div class="card" style="width: 18rem;">
			  <div class="card-body">
			    <h5 class="card-title"><?php echo $arr["question"]; ?></h5>
			    <h6 class="card-subtitle mb-2 text-muted">Kunci : <?php echo $arr['answer']; ?></h6>
			    <p class="card-text">
			    	<?php echo (empty($arr["choice_a"]) ? "" : "a. $arr[choice_a]<br>") ?>
			    	<?php echo (empty($arr["choice_b"]) ? "" : "b. $arr[choice_b]<br>") ?>
			    	<?php echo (empty($arr["choice_c"]) ? "" : "c. $arr[choice_c]<br>") ?>
			    	<?php echo (empty($arr["choice_d"]) ? "" : "d. $arr[choice_d]<br>") ?>
			    </p>
			    <a href="<?php echo BASEURL; ?>/ujian/delete_soal/<?php echo $arr["rel_id"] ?>" class="card-link">Hapus</a>
			  </div>
			</div>
		</div>
		<?php endforeach; ?>
		<div class="col">
			<div class="card" style="width: 18rem;">
			  <div class="card-body">
			    <!-- Button trigger modal -->
				<button type="button" class="btn btn-primary btn-block" data-toggle="modal" data-target="#formModal">
				  Tambah Soal
				</button>
			  </div>
			</div>
		</div>
	</div>
</div>