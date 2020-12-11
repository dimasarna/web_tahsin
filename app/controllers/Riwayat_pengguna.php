<?php 

/**
  * Controller Riwayat_pengguna
  */
 class Riwayat_pengguna extends Controller
 {
 	public function index()
 	{
 		$buffer = $this->model('Riwayat_pengguna_model')->getKelas($_SESSION['user_information']['user_id']);

 		if ( !empty($buffer) ) {
 			$data = $buffer;
 			foreach ($data as $key => $value) {
	 			$data2[$key] = $this->model('Riwayat_pengguna_model')->getUjian($_SESSION['user_information']['user_id'], $value["class_id"]);
	 		}
 		} else {
 			$data = [];
 			$data2 = [];
 		}
	 		
		$this->view('templates/header', ['judul' => 'Riwayat Ujian', 'level' => $_SESSION['user_information']['level']]);
 		$this->viewMultiDataGroup('riwayat_pengguna/index', $data, $data2);
 		$this->view('templates/footer');
 	}
 } ?>