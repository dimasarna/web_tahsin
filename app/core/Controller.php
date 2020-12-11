<?php 

/**
  * Parent Class
  */
 class Controller
 {
 	public function view($view, $data = [])
 	{
 		require_once '../app/views/' . $view . '.php';
 	}

 	public function viewMultiDataGroup($view, $data = [], $data2 = [])
 	{
 		require_once '../app/views/' . $view . '.php';
 	}

 	public function model($model)
 	{
 		require_once '../app/models/' . $model . '.php';
 		return new $model;
 	}
 } ?>