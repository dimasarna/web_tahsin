<?php 

/**
  * Controller Ujian
  */
 class Ujian extends Controller
 {
 	public function index()
 	{
 		$data = $this->model('Ujian_model')->getData();
	 	$this->view('templates/header', ['judul' => 'Ujian', 'level' => $_SESSION['user_information']['level']]);
	 	$this->view('ujian/index', $data);
	 	$this->view('templates/footer');
 	}

 	public function add()
 	{
 		if ( $this->model('Ujian_model')->addData($_POST) > 0 ) {
 			Flasher::setFlash('Data ujian berhasil diinput.', 'Success', 'success');
 			header('Location: ' . BASEURL . '/ujian');
 			exit;
 		} else {
 			Flasher::setFlash('Data ujian gagal diinput.', 'Failed', 'danger');
 			header('Location: ' . BASEURL . '/ujian');
 			exit;
 		}
 	}

 	public function delete($id)
 	{
 		if ( $this->model('Ujian_model')->deleteData($id) > 0 ) {
 			Flasher::setFlash('Data ujian berhasil dihapus.', 'Success', 'success');
 			header('Location: ' . BASEURL . '/ujian');
 			exit;
 		} else {
 			Flasher::setFlash('Data ujian gagal dihapus.', 'Failed', 'danger');
 			header('Location: ' . BASEURL . '/ujian');
 			exit;
 		}
 	}

 	public function update()
 	{
 		if ( $this->model('Ujian_model')->updateData($_POST) > 0 ) {
 			Flasher::setFlash('Data ujian berhasil diubah.', 'Success', 'success');
 			header('Location: ' . BASEURL . '/ujian');
 			exit;
 		} else {
 			Flasher::setFlash('Data ujian gagal diubah.', 'Failed', 'danger');
 			header('Location: ' . BASEURL . '/ujian');
 			exit;
 		}
 	}

 	public function getdata()
 	{
 		echo json_encode($this->model('Ujian_model')->getDataById($_POST['id']));
 	}

 	public function soal($id = [])
 	{
 		if (empty($id)) {
 			$data = $this->model('Ujian_model')->getData();
 			$this->view('templates/header', ['judul' => 'Ujian-Soal', 'level' => $_SESSION['user_information']['level']]);
		 	$this->view('ujian/soal', $data);
		 	$this->view('templates/footer');
 		} else {
	 		$data = $this->model('Ujian_model')->getData();
		 	$this->view('templates/header', ['judul' => 'Ujian-Soal', 'level' => $_SESSION['user_information']['level']]);
		 	$this->view('ujian/soal', $data);
		 	$data = $this->model('Ujian_model')->getSoalById($id);
		 	$this->view('ujian/soal_info', $data);
		 	$data = $this->model('Soal_model')->getData();
		 	$this->view('ujian/soal_modal', $data);
		 	$this->view('templates/footer');
	 	}
 	}

 	public function add_soal()
 	{
 		if ( $this->model('Ujian_model')->addSoal($_POST) > 0 ) {
 			Flasher::setFlash('Tambah soal berhasil.', 'Success', 'success');
 			header('Location: ' . BASEURL . '/ujian/soal');
 			exit;
 		} else {
 			Flasher::setFlash('Tambah soal gagal.', 'Failed', 'danger');
 			header('Location: ' . BASEURL . '/ujian/soal');
 			exit;
 		}
 	}

 	public function delete_soal($id)
 	{
 		if ( $this->model('Ujian_model')->deleteSoal($id) > 0 ) {
 			Flasher::setFlash('Soal berhasil dihapus.', 'Success', 'success');
 			header('Location: ' . BASEURL . '/ujian/soal');
 			exit;
 		} else {
 			Flasher::setFlash('Soal gagal dihapus.', 'Failed', 'danger');
 			header('Location: ' . BASEURL . '/ujian/soal');
 			exit;
 		}
 	}

 	public function kelas($id = [])
 	{
 		if (empty($id)) {
 			$data = $this->model('Ujian_model')->getData();
 			$this->view('templates/header', ['judul' => 'Ujian-Kelas', 'level' => $_SESSION['user_information']['level']]);
		 	$this->view('ujian/kelas', $data);
		 	$this->view('templates/footer');
 		} else {
	 		$data = $this->model('Ujian_model')->getData();
		 	$this->view('templates/header', ['judul' => 'Ujian-Kelas', 'level' => $_SESSION['user_information']['level']]);
		 	$this->view('ujian/kelas', $data);
		 	$data = $this->model('Ujian_model')->getKelasById($id);
		 	$this->view('ujian/kelas_info', $data);
		 	$data = $this->model('Kelas_model')->getData();
		 	$this->view('ujian/kelas_modal', $data);
		 	$this->view('templates/footer');
	 	}
 	}

 	public function add_kelas()
 	{
 		if ( $this->model('Ujian_model')->addKelas($_POST) > 0 ) {
 			Flasher::setFlash('Tambah kelas berhasil.', 'Success', 'success');
 			header('Location: ' . BASEURL . '/ujian/kelas');
 			exit;
 		} else {
 			Flasher::setFlash('Tambah kelas gagal.', 'Failed', 'danger');
 			header('Location: ' . BASEURL . '/ujian/kelas');
 			exit;
 		}
 	}

 	public function delete_kelas($id)
 	{
 		if ( $this->model('Ujian_model')->deleteKelas($id) > 0 ) {
 			Flasher::setFlash('Kelas berhasil dihapus.', 'Success', 'success');
 			header('Location: ' . BASEURL . '/ujian/kelas');
 			exit;
 		} else {
 			Flasher::setFlash('Kelas gagal dihapus.', 'Failed', 'danger');
 			header('Location: ' . BASEURL . '/ujian/kelas');
 			exit;
 		}
 	}
 } ?>