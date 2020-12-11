<div class="container mt-4">
	<div class="card" style="width: 18rem;">
	  <div class="card-body">
	    <h5 class="card-title"><?php echo $data['name']; ?></h5>
	    <h6 class="card-subtitle mb-2 text-muted"><?php echo $data['email']; ?></h6>
	    <p class="card-text">
	    	<?php echo $data['phone_number']; ?>
	    </p>
	    <a href="<?php echo BASEURL; ?>/pengguna" class="card-link">Kembali</a>
	  </div>
	</div>
</div>