<?php 

if ( !isset($_SESSION['auth']) ) {
	header('Location: ' . BASEURL . '/login');
	exit();
} ?>