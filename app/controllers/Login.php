<?php 

/**
  * Controller Login
  */
 class Login extends Controller
 {
  public function index()
  {
    $data['judul'] = "Login";
    $data['tahun'] = date('Y');
    $this->view('login/index', $data);
    $this->view('templates/footer');
  }

  public function auth()
  {
    $data['username'] = filter_input(INPUT_POST, 'username', FILTER_SANITIZE_STRING);
    $data['password'] = md5(filter_input(INPUT_POST, 'password', FILTER_SANITIZE_STRING));

    if ( $this->model('Login_model')->verifCred($data) > 0 ) {
      $buffer = $this->model('Login_model')->getCredId($data);
      $buffer = $this->model('Login_model')->getDataById($buffer['credential_id']);
      $_SESSION['auth'] = true;
      $_SESSION['user_information']['user_id'] = $buffer['user_id'];
      $_SESSION['user_information']['credential_id'] = $buffer['credential_id'];
      $_SESSION['user_information']['name'] = $buffer['name'];
      $_SESSION['user_information']['email'] = $buffer['email'];
      $_SESSION['user_information']['phone_number'] = $buffer['phone_number'];
      $_SESSION['user_information']['level'] = $buffer['level'];
      header('Location: ' . BASEURL . '/home');
      exit;
    } else {
      Flasher::setFlash('Username atau password yang anda masukkan salah.', 'Failed', 'danger');
      header('Location: ' . BASEURL . '/login');
      exit;
    }

  }

  public function logout()
  {
    session_unset();
    session_destroy();
    header('Location: ' . BASEURL . '/login');
    exit;
  }
 } ?>