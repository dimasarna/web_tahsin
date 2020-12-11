<?php require_once '../app/config/auth.php'; ?>
<!DOCTYPE html>
<html>
<head>
	<title>Halaman <?php echo $data['judul']; ?></title>
	<link rel="stylesheet" type="text/css" href="<?php echo BASEURL; ?>/css/bootstrap.css">
</head>
<body>
<div class="container mt-4">
  <div class="card">
    <h5 class="card-header">Petunjuk Ujian</h5>
    <div class="card-body">
      <h5 class="card-title">Aturan</h5>
      <p class="card-text">
          <ol>
              <li>Ujian akan dimulai saat tombol start ditekan.</li>
              <li>Setiap soal akan diberikan waktu maksimal 1 menit untuk dikerjakan.</li>
              <li>Setelah soal tampil tidak diperkenankan untuk keluar dari halaman ujian atau nilai yang akan didapatkan adalah kosong.</li>
          </ol>
      </p>
      <h5 class="card-title">Saran</h5>
      <p class="card-text">
          <ol>
              <li>Gunakan browser chrome atau firefox.</li>
          </ol>
      </p>
      <a href="<?php echo BASEURL; ?>/ujian_pengguna/on" class="btn btn-primary">Start</a>
    </div>
  </div>
</div>