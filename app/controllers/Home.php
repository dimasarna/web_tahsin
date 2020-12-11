<?php 

/**
  * Controller Home
  */
 class Home extends Controller
 {
 	public function index()
 	{
		$data['name'] = $_SESSION['user_information']['name'];
		$data['email'] = $_SESSION['user_information']['email'];
		$data['phone_number'] = $_SESSION['user_information']['phone_number'];
		$data['level'] = $_SESSION['user_information']['level'];
 		$this->view('templates/header', ['judul' => 'Home', 'level' => $data['level']]);
 		$this->view('home/index', $data);
 		$this->view('templates/footer');
 	}
 } ?>