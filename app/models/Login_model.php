<?php 

/**
  * Login Model
  */
 class Login_model
 {
 	private $db;

 	public function __construct()
 	{
 		$this->db = new Database;
 	}

 	public function verifCred($data)
 	{
 		$this->db->query('SELECT credential_id FROM credentials WHERE username=:username AND password=:password');
 		$this->db->bind('username', $data['username']);
 		$this->db->bind('password', $data['password']);
 		$this->db->execute();
 		return $this->db->rowCount();
 	}

 	public function getCredId($data)
 	{
 		$this->db->query('SELECT credential_id FROM credentials WHERE username=:username AND password=:password');
 		$this->db->bind('username', $data['username']);
 		$this->db->bind('password', $data['password']);
 		$this->db->execute();
 		return $this->db->single();
 	}

 	public function getDataById($id)
 	{
 		$this->db->query('SELECT * FROM users_information WHERE credential_id=:id');
 		$this->db->bind('id', $id);
 		$this->db->execute();
 		return $this->db->single();
 	}
 } ?>