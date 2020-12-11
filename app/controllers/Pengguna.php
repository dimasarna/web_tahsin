<?php 

/**
  * Controller Pengguna
  */
 class Pengguna extends Controller
 {
 	public function index()
 	{
 		$data = $this->model('Pengguna_model')->getData();
	 	$this->view('templates/header', ['judul' => 'Pengguna', 'level' => $_SESSION['user_information']['level']]);
	 	$this->view('pengguna/index', $data);
	 	$this->view('templates/footer');
 	}

 	public function detail($id)
 	{
 		$data = $this->model('Pengguna_model')->getDataById($id);
 		$this->view('templates/header', ['judul' => 'Detail Pengguna', 'level' => $_SESSION['user_information']['level']]);
	 	$this->view('pengguna/detail', $data);
	 	$this->view('templates/footer');
 	}

 	public function add()
 	{
 		if ( $this->model('Pengguna_model')->addData($_POST) > 1 ) {
 			Flasher::setFlash('Data pengguna berhasil diinput.', 'Success', 'success');
 			header('Location: ' . BASEURL . '/pengguna');
 			exit;
 		} else {
 			Flasher::setFlash('Data pengguna gagal diinput.', 'Failed', 'danger');
 			header('Location: ' . BASEURL . '/pengguna');
 			exit;
 		}
 	}

 	public function delete($id)
 	{
 		if ( $this->model('Pengguna_model')->deleteData($id) > 1 ) {
 			Flasher::setFlash('Data pengguna berhasil dihapus.', 'Success', 'success');
 			header('Location: ' . BASEURL . '/pengguna');
 			exit;
 		} else {
 			Flasher::setFlash('Data pengguna gagal dihapus.', 'Failed', 'danger');
 			header('Location: ' . BASEURL . '/pengguna');
 			exit;
 		}
 	}

 	public function update()
 	{
 		if ( $this->model('Pengguna_model')->updateData($_POST) > 0 ) {
 			Flasher::setFlash('Data pengguna berhasil diubah.', 'Success', 'success');
 			header('Location: ' . BASEURL . '/pengguna');
 			exit;
 		} else {
 			Flasher::setFlash('Data pengguna gagal diubah.', 'Failed', 'danger');
 			header('Location: ' . BASEURL . '/pengguna');
 			exit;
 		}
 	}

 	public function getdata()
 	{
 		echo json_encode($this->model('Pengguna_model')->getDataById($_POST['id']));
 	}

 	public function search()
 	{
 		$data = $this->model('Pengguna_model')->searchData($_POST);
	 	$this->view('templates/header', ['judul' => 'Pengguna', 'level' => $_SESSION['user_information']['level']]);
	 	$this->view('pengguna/index', $data);
	 	$this->view('templates/footer');
 	}

 	public function kelas($id = [])
 	{
 		if (empty($id)) {
 			$data = $this->model('Pengguna_model')->getData();
		 	$this->view('templates/header', ['judul' => 'Pengguna-Kelas', 'level' => $_SESSION['user_information']['level']]);
		 	$this->view('pengguna/kelas', $data);
		 	$this->view('templates/footer');
 		} else {
 			$data = $this->model('Pengguna_model')->getData();
		 	$this->view('templates/header', ['judul' => 'Pengguna-Kelas', 'level' => $_SESSION['user_information']['level']]);
		 	$this->view('pengguna/kelas', $data);
		 	$data = $this->model('Pengguna_model')->getKelasById($id);
		 	$this->view('pengguna/kelas_info', $data);
		 	$data = $this->model('Kelas_model')->getData();
		 	$this->view('pengguna/modal', $data);
		 	$this->view('templates/footer');
 		}
 	}

 	public function add_kelas()
 	{
 		if ( $this->model('Pengguna_model')->addKelas($_POST) > 0 ) {
 			Flasher::setFlash('Tambah kelas berhasil.', 'Success', 'success');
 			header('Location: ' . BASEURL . '/pengguna/kelas');
 			exit;
 		} else {
 			Flasher::setFlash('Tambah kelas gagal.', 'Failed', 'danger');
 			header('Location: ' . BASEURL . '/pengguna/kelas');
 			exit;
 		}
 	}

 	public function delete_kelas($id)
 	{
 		if ( $this->model('Pengguna_model')->deleteKelas($id) > 0 ) {
 			Flasher::setFlash('Kelas berhasil dihapus.', 'Success', 'success');
 			header('Location: ' . BASEURL . '/pengguna/kelas');
 			exit;
 		} else {
 			Flasher::setFlash('Kelas gagal dihapus.', 'Failed', 'danger');
 			header('Location: ' . BASEURL . '/pengguna/kelas');
 			exit;
 		}
 	}
 } ?>