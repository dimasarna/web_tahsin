<?php 

/**
  * Controller Soal
  */
 class Soal extends Controller
 {
 	public function index()
 	{
 		$data = $this->model('Soal_model')->getData();
	 	$this->view('templates/header', ['judul' => 'Soal', 'level' => $_SESSION['user_information']['level']]);
	 	$this->view('soal/index', $data);
	 	$this->view('templates/footer');
 	}

 	public function add()
 	{
 		if ( $this->model('Soal_model')->addData($_POST) > 0 ) {
 			Flasher::setFlash('Data soal berhasil diinput.', 'Success', 'success');
 			header('Location: ' . BASEURL . '/soal');
 			exit;
 		} else {
 			Flasher::setFlash('Data soal gagal diinput.', 'Failed', 'danger');
 			header('Location: ' . BASEURL . '/soal');
 			exit;
 		}
 	}

 	public function delete($id)
 	{
 		if ( $this->model('Soal_model')->deleteData($id) > 0 ) {
 			Flasher::setFlash('Data soal berhasil dihapus.', 'Success', 'success');
 			header('Location: ' . BASEURL . '/soal');
 			exit;
 		} else {
 			Flasher::setFlash('Data soal gagal dihapus.', 'Failed', 'danger');
 			header('Location: ' . BASEURL . '/soal');
 			exit;
 		}
 	}

 	public function update()
 	{
 		if ( $this->model('Soal_model')->updateData($_POST) > 0 ) {
 			Flasher::setFlash('Data soal berhasil diubah.', 'Success', 'success');
 			header('Location: ' . BASEURL . '/soal');
 			exit;
 		} else {
 			Flasher::setFlash('Data soal gagal diubah.', 'Failed', 'danger');
 			header('Location: ' . BASEURL . '/soal');
 			exit;
 		}
 	}

 	public function getdata()
 	{
 		echo json_encode($this->model('Soal_model')->getDataById($_POST['id']));
 	}

 	public function search()
 	{
 		$data = $this->model('Soal_model')->searchData($_POST);
	 	$this->view('templates/header', ['judul' => 'Soal', 'level' => $_SESSION['user_information']['level']]);
	 	$this->view('soal/index', $data);
	 	$this->view('templates/footer');
 	}
 } ?>