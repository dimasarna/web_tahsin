<?php require_once '../app/config/auth.php'; ?>
<!DOCTYPE html>
<html>
<head>
	<title>Halaman <?php echo $data['judul']; ?></title>
	<link rel="stylesheet" type="text/css" href="<?php echo BASEURL; ?>/css/bootstrap.css">
</head>
<body>
<nav class="navbar navbar-expand-lg navbar-light bg-light">
  <a class="navbar-brand" href="<?php echo BASEURL; ?>">Mutqin Foundation</a>
  <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNavDropdown" aria-controls="navbarNavDropdown" aria-expanded="false" aria-label="Toggle navigation">
    <span class="navbar-toggler-icon"></span>
  </button>
  <div class="collapse navbar-collapse" id="navbarNavDropdown">
    <ul class="navbar-nav">
      <li class="nav-item">
        <a class="nav-link" href="<?php echo BASEURL; ?>">Home</a>
      </li>
      <?php if ($data['level'] == 1) { ?>
      <li class="nav-item">
        <a class="nav-link" href="<?php echo BASEURL; ?>/kelas">Kelas</a>
      </li>
      <li class="nav-item dropdown">
        <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
          Pengguna
        </a>
        <div class="dropdown-menu" aria-labelledby="navbarDropdown">
          <a class="dropdown-item" href="<?php echo BASEURL; ?>/pengguna">Pengguna</a>
          <a class="dropdown-item" href="<?php echo BASEURL; ?>/pengguna/kelas">Pengguna-Kelas</a>
        </div>
      </li>
      <li class="nav-item">
        <a class="nav-link" href="<?php echo BASEURL; ?>/soal">Soal</a>
      </li>
      <li class="nav-item dropdown">
        <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
          Ujian
        </a>
        <div class="dropdown-menu" aria-labelledby="navbarDropdown">
          <a class="dropdown-item" href="<?php echo BASEURL; ?>/ujian">Ujian</a>
          <a class="dropdown-item" href="<?php echo BASEURL; ?>/ujian/soal">Ujian-Soal</a>
          <a class="dropdown-item" href="<?php echo BASEURL; ?>/ujian/kelas">Ujian-Kelas</a>
        </div>
      </li>
      <?php } else { ?>
      <li class="nav-item">
        <a class="nav-link" href="<?php echo BASEURL; ?>/ujian_pengguna">Ujian</a>
      </li>
      <li class="nav-item">
        <a class="nav-link" href="<?php echo BASEURL; ?>/riwayat_pengguna">Riwayat</a>
      </li>
     <?php } ?>
    </ul>
  </div>
</nav>