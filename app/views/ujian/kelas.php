<div class="container mt-4">
	<div class="row">
		<div class="col-12">
			<?php Flasher::flash(); ?>
		</div>
	</div>
	<div class="row">
		<div class="col-12">
			<div class="dropdown">
			  <button class="btn btn-secondary dropdown-toggle" type="button" id="dropdownMenuButton" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
			    Pilih Ujian
			  </button>
			  <div class="dropdown-menu" aria-labelledby="dropdownMenuButton">
			  	<?php foreach ($data as $arr) : ?>
			    <a class="dropdown-item" href="<?php echo BASEURL; ?>/ujian/kelas/<?php echo $arr['exam_id']; ?>"><?php echo $arr['exam_name']; ?></a>
				<?php endforeach; ?>
			  </div>
			</div>
		</div>
	</div>
</div>