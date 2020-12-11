<?php require_once '../app/config/auth.php'; ?>
<!DOCTYPE html>
<html>
<head>
	<title>Halaman <?php echo $data['judul']; ?></title>
	<link rel="stylesheet" type="text/css" href="<?php echo BASEURL; ?>/css/bootstrap.css">
</head>
<body style="display: none;">
<data id="classId" value="<?php echo $_SESSION['temp_info']['class_id']; ?>"></data>
<data id="examId" value="<?php echo $_SESSION['temp_info']['exam_id']; ?>"></data>
<data id="userId" value="<?php echo $_SESSION['user_information']['user_id']; ?>"></data>
<nav class="navbar navbar-light bg-light shadow-sm p-3 mb-5 bg-white rounded">
  <span class="navbar-text mx-auto text-center text-dark"><h3 id="question" data-id="">Empty</h3></span>
</nav>
<div class="container mt-n4">
  <div class="d-flex flex-row-reverse bd-highlight">
    <div class="pb-2 bd-highlight"><button type="button" class="pl-4 pr-4 btn btn-info font-weight-bold" id="next">Skip</button></div>
  </div>
  <div class="row" >
    <div class="col">
    	<button type="button" class="btn btn-danger btn-lg btn-block pt-4 pb-4 h-100" id="choice_a">Empty</button>
    </div>
    <div class="col pl-0">
    	<button type="button" class="btn btn-primary btn-lg btn-block pt-4 pb-4 h-100" id="choice_b">Empty</button>
    </div>
    <div class="w-100 mt-2"></div>
    <div class="col">
    	<button type="button" class="btn btn-warning btn-lg btn-block pt-4 pb-4 h-100" id="choice_c">Empty</button>
    </div>
    <div class="col pl-0">
    	<button type="button" class="btn btn-success btn-lg btn-block pt-4 pb-4 h-100" 
    	id="choice_d">Empty</button>
    </div>
  </div>
  <div class="progress mt-4" style="height: 25px;">
    <div class="progress-bar" role="progressbar" style="width: 100%; min-width: 25px;" aria-valuenow="100" aria-valuemin="0" aria-valuemax="100"></div>
  </div>
</div>
<script src="https://code.jquery.com/jquery-3.4.1.min.js" integrity="sha256-CSXorXvZcTkaix6Yvo6HppcZGetbYMGWSFlBw8HfCJo=" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js" integrity="sha384-Q6E9RHvbIyZFJoft+2mJbHaEWldlvI9IOYy5n3zV9zzTtmI3UksdQRVvoxMfooAo" crossorigin="anonymous"></script>
<script src="<?php echo BASEURL; ?>/js/bootstrap.js"></script>
<script src="<?php echo BASEURL; ?>/js/script.js"></script>
<script src="<?php echo BASEURL; ?>/js/quiz.js"></script>
</body>
</html>