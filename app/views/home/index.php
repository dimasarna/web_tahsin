<div class="container mt-4">
	<div class="jumbotron">
	  <h1 class="display-4">Hello <?php echo $data['name']; ?>!</h1>
	  <p class="lead">Berikut info tentang anda :
	  	<br>
	  	Nama : <?php echo $data['name']; ?>
	  	<br>
	  	Email : <?php echo $data['email']; ?>
	  	<br>
	  	Nomor Telepon : <?php echo $data['phone_number']; ?>
	  </p>
	  <a class="btn btn-primary disabled" href="<?php echo BASEURL; ?>/akun/ubah-info" role="button" aria-disabled="true">Ubah Info</a>
	  <a class="btn btn-danger" href="<?php echo BASEURL; ?>/login/logout" role="button">Logout</a>
	  <hr class="my-4">
	  <p>&copy; 2020 Mutqin Foundation.</p>
	</div>
</div>