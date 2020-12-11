<?php 

/**
  * Flash Message Handler
  */
 class Flasher
 {
 	public static function setFlash($message, $action, $style)
 	{
 		$_SESSION['flash'] = [
 			'message' => $message,
 			'action' => $action,
 			'style' => $style
 		];
 	}

 	public static function flash()
 	{
 		if ( isset($_SESSION['flash']) ) {
 			echo '<div class="alert alert-' . $_SESSION['flash']['style'] . ' alert-dismissible fade show" role="alert">
				  <strong>' . $_SESSION['flash']['action'] . '!</strong> ' . $_SESSION['flash']['message'] . '
				  <button type="button" class="close" data-dismiss="alert" aria-label="Close">
				    <span aria-hidden="true">&times;</span>
				  </button>
				</div>';
			unset($_SESSION['flash']);
 		}
 	}
 } ?>