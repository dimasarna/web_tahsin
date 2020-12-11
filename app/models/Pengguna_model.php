<?php 

/**
  * Pengguna Model
  */
 class Pengguna_model
 {
 	private $db;

 	public function __construct()
 	{
 		$this->db = new Database;
 	}

	public function getData()
 	{
 		$this->db->query('SELECT * FROM users_information');
 		$this->db->execute();
 		return $this->db->resultSet();
 	}

 	public function getDataById($id)
 	{
 		$this->db->query('SELECT * FROM users_information WHERE user_id=:id');
 		$this->db->bind('id', $id);
 		$this->db->execute();
 		return $this->db->single();
 	}

 	public function addData($data)
 	{
 		$rowAffected = 0;
 		$query = "INSERT INTO credentials VALUES ('', :username, :password)";
 		$this->db->query($query);
 		$this->db->bind('username', $data['username']);
 		$this->db->bind('password', DEFAULT_PASS);
 		$this->db->execute();
 		$rowAffected += $this->db->rowCount();
 		$buffer = $this->db->lastInsertId();
 		$query = "INSERT INTO users_information VALUES ('', :credential_id, :name, :email, :phone_number, '')";
 		$this->db->query($query);
 		$this->db->bind('credential_id', $buffer);
 		$this->db->bind('name', $data['name']);
 		$this->db->bind('email', $data['email']);
 		$this->db->bind('phone_number', $data['phone_number']);
 		$this->db->execute();
 		$rowAffected += $this->db->rowCount();
 		return $rowAffected;
 	}

 	public function deleteData($id)
 	{
 		$rowAffected = 0;
 		$query = "SELECT credential_id FROM users_information WHERE user_id=:id";
 		$this->db->query($query);
 		$this->db->bind('id', $id);
 		$this->db->execute();
 		$buffer = $this->db->single();
 		$query = "DELETE FROM credentials WHERE credential_id=:id";
 		$this->db->query($query);
 		$this->db->bind('id', $buffer['credential_id']);
 		$this->db->execute();
 		$rowAffected += $this->db->rowCount();
 		$query = "DELETE FROM users_information WHERE user_id=:id";
 		$this->db->query($query);
 		$this->db->bind('id', $id);
 		$this->db->execute();
 		$rowAffected += $this->db->rowCount();
 		$query = "DELETE FROM class_user_rel WHERE user_id=:id";
 		$this->db->query($query);
 		$this->db->bind('id', $id);
 		$this->db->execute();
 		$rowAffected += $this->db->rowCount();
 		return $rowAffected;
 	}

 	public function updateData($data)
 	{
 		$query = "UPDATE users_information SET name=:name, email=:email, phone_number=:phone_number WHERE user_id=:id";
 		$this->db->query($query);
 		$this->db->bind('name', $data['name']);
 		$this->db->bind('email', $data['email']);
 		$this->db->bind('phone_number', $data['phone_number']);
 		$this->db->bind('id', $data['id']);
 		$this->db->execute();
 		return $this->db->rowCount();
 	}

 	public function searchData($data)
 	{
 		$query = "SELECT * FROM users_information WHERE name LIKE :keyword";
 		$this->db->query($query);
 		$this->db->bind('keyword', "%$data[keyword]%");
 		$this->db->execute();
 		return $this->db->resultSet();
 	}

 	public function getKelasById($id)
 	{
 		$this->db->query('SELECT * FROM classes INNER JOIN class_user_rel ON classes.class_id=class_user_rel.class_id WHERE user_id=:id');
 		$this->db->bind('id', $id);
 		$this->db->execute();
 		return $this->db->resultSet();
 	}

 	public function addKelas($data)
 	{
 		$query = "INSERT INTO class_user_rel VALUES ('', :class_id, :user_id)";
 		$this->db->query($query);
 		$this->db->bind('class_id', $data['class_id']);
 		$this->db->bind('user_id', $data['user_id']);
 		$this->db->execute();
 		return $this->db->rowCount();
 	}

 	public function deleteKelas($id)
 	{
 		$query = "DELETE FROM class_user_rel WHERE rel_id=:id";
 		$this->db->query($query);
 		$this->db->bind('id', $id);
 		$this->db->execute();
 		return $this->db->rowCount();
 	}
 } ?>