<?php 

/**
  * Controller Ujian_pengguna
  */
 class Ujian_pengguna extends Controller
 {
 	public function index()
 	{
 		$buffer = $this->model('Ujian_pengguna_model')->getKelas($_SESSION['user_information']['user_id']);

 		if ( !empty($buffer) ) {
 			$data = $buffer;
 			foreach ($data as $key => $value) {
	 			$data2[$key] = $this->model('Ujian_pengguna_model')->getUjian($_SESSION['user_information']['user_id'], $value["class_id"]);
	 		}
 		} else {
 			$data = [];
 			$data2 = [];
 		}
 		
		$this->view('templates/header', ['judul' => 'Daftar Ujian', 'level' => $_SESSION['user_information']['level']]);
 		$this->viewMultiDataGroup('ujian_pengguna/index', $data, $data2);
 		$this->view('templates/footer');
 	}

 	public function join_kelas()
 	{
 		if ( $this->model('Ujian_pengguna_model')->joinKelas($_POST) > 0 ) {
 			Flasher::setFlash('Kelas berhasil diikuti.', 'Success', 'success');
 			header('Location: ' . BASEURL . '/ujian_pengguna');
 			exit;
 		} else {
 			Flasher::setFlash('Kelas gagal diikuti.', 'Failed', 'danger');
 			header('Location: ' . BASEURL . '/ujian_pengguna');
 			exit;
 		}
 	}

 	public function getsoal()
 	{
 		echo json_encode($this->model('Ujian_pengguna_model')->getSoal($_SESSION['temp_info']['exam_id']));
 	}

 	public function start()
 	{
 		if ( $this->model('Ujian_pengguna_model')->tokenVerif($_POST) > 0 ) {
 			$_SESSION["temp_info"]["exam_stat"] = true;
 			$_SESSION["temp_info"]["class_id"] = $_POST["class_id"];
 			$_SESSION["temp_info"]["exam_id"] = $_POST["exam_id"];
 			header('Location: ' . BASEURL . '/ujian_pengguna/welcome');
 			exit;
 		} else {
 			Flasher::setFlash('Kode token tidak sesuai.', 'Failed', 'danger');
 			header('Location: ' . BASEURL . '/ujian_pengguna');
 			exit;
 		}
 	}

 	public function welcome()
 	{
 		$this->view('ujian_pengguna/welcome', ['judul' => 'Petunjuk Ujian']);
 		$this->view('templates/footer');
 	}

 	public function on()
 	{
 		if ($_SESSION["temp_info"]["exam_stat"] == true) {
 			$_SESSION["temp_info"]["exam_stat"] = false;
 			$buffer = [ "class_id" => $_SESSION["temp_info"]["class_id"],
 						"exam_id" => $_SESSION["temp_info"]["exam_id"],
 						"user_id" => $_SESSION["user_information"]["user_id"],
 						"score" => 0 ];
 		} else unset($_SESSION["temp_info"]);

 		$this->view('ujian_pengguna/on', ['judul' => 'Ujian']);
 		$this->view('templates/footer');

 		// if ( $this->model('Ujian_pengguna_model')->inputScore($buffer) > 0 ) {
 		// 	$this->view('ujian_pengguna/on', ['judul' => 'Ujian']);
 		// 	$this->view('templates/footer');
 		// } else {
 		// 	Flasher::setFlash('Terjadi masalah.', 'Failed', 'danger');
 		// 	header('Location: ' . BASEURL . '/ujian_pengguna');
 		// 	exit;
 		// }
 	}

 	public function finish($class_id, $exam_id, $user_id, $score)
 	{
 		unset($_SESSION["temp_info"]);

 		$buffer = [ "class_id" => $class_id,
 					"exam_id" => $exam_id,
 					"user_id" => $user_id,
 					"score" => $score ];

 		if ( $this->model('Ujian_pengguna_model')->inputScore($buffer) > 0 ) {
 			Flasher::setFlash('Ujian berhasil diikuti.', 'Success', 'success');
 			header('Location: ' . BASEURL . '/riwayat_pengguna');
 			exit;
 		} else {
 			Flasher::setFlash('Ujian gagal diikuti.', 'Failed', 'danger');
 			header('Location: ' . BASEURL . '/riwayat_pengguna');
 			exit;
 		}
 	}
 } ?>