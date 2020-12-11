<!DOCTYPE html>
<html>
<head>
  <title>Halaman <?php echo $data['judul']; ?></title>
  <link rel="stylesheet" type="text/css" href="<?php echo BASEURL; ?>/css/bootstrap.css">
</head>
<body>
  <div class="container mt-4">
    <div class="row">
      <div class="col-12">
        <?php Flasher::flash(); ?>
      </div>
    </div>
    <div class="card text-center">
      <div class="card-header">
        <h5>Login Area</h5>
      </div>
      <div class="card-body">
        <form action="<?php echo BASEURL; ?>/login/auth" method="post">
          <div class="input-group mb-3">
            <div class="input-group-prepend">
              <span class="input-group-text" id="basic-addon1">Username</span>
            </div>
            <input type="text" class="form-control" name="username" aria-label="Username" aria-describedby="basic-addon1">
          </div>
          <div class="input-group mb-3">
            <div class="input-group-prepend">
              <span class="input-group-text" id="basic-addon1">Password</span>
            </div>
            <input type="password" class="form-control" name="password" aria-label="Password" aria-describedby="basic-addon1">
          </div>
          <button type="submit" class="btn btn-primary btn-block">Login</button>
        </form>
      </div>
      <div class="card-footer text-muted">
        &copy; <?php echo $data['tahun']; ?> <a href="https://mutqinfoundation.com/">mutqinfoundation.com</a>
      </div>
    </div>
  </div>