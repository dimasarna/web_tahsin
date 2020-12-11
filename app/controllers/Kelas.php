<?php 

/**
  * Controller Kelas
  */
 class Kelas extends Controller
 {
 	public function index()
 	{
 		$data = $this->model('Kelas_model')->getData();
 		$this->view('templates/header', ['judul' => 'Kelas', 'level' => $_SESSION['user_information']['level']]);
 		$this->view('kelas/index', $data);
 		$this->view('templates/footer');
 	}

 	public function add()
 	{
 		if ( $this->model('Kelas_model')->addData($_POST) > 0 ) {
 			Flasher::setFlash('Data kelas berhasil diinput.', 'Success', 'success');
 			header('Location: ' . BASEURL . '/kelas');
 			exit;
 		} else {
 			Flasher::setFlash('Data kelas gagal diinput.', 'Failed', 'danger');
 			header('Location: ' . BASEURL . '/kelas');
 			exit;
 		}
 	}

 	public function delete($id)
 	{
 		if ( $this->model('Kelas_model')->deleteData($id) > 0 ) {
 			Flasher::setFlash('Data kelas berhasil dihapus.', 'Success', 'success');
 			header('Location: ' . BASEURL . '/kelas');
 			exit;
 		} else {
 			Flasher::setFlash('Data kelas gagal dihapus.', 'Failed', 'danger');
 			header('Location: ' . BASEURL . '/kelas');
 			exit;
 		}
 	}
	
	public function update()
 	{
 		if ( $this->model('Kelas_model')->updateData($_POST) > 0 ) {
 			Flasher::setFlash('Data kelas berhasil diubah.', 'Success', 'success');
 			header('Location: ' . BASEURL . '/kelas');
 			exit;
 		} else {
 			Flasher::setFlash('Data kelas gagal diubah.', 'Failed', 'danger');
 			header('Location: ' . BASEURL . '/kelas');
 			exit;
 		}
 	}

 	public function getdata()
 	{
 		echo json_encode($this->model('Kelas_model')->getDataById($_POST['id']));
 	}

 	public function search()
 	{
 		$data = $this->model('Kelas_model')->searchData($_POST);
	 	$this->view('templates/header', ['judul' => 'Kelas', 'level' => $_SESSION['user_information']['level']]);
	 	$this->view('kelas/index', $data);
	 	$this->view('templates/footer');
 	}
 } ?>