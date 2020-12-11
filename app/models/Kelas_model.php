<?php 

/**
  * Kelas Model
  */
 class Kelas_model
 {
 	private $db;

 	public function __construct()
 	{
 		$this->db = new Database;
 	}
 	
 	public function getData()
 	{
		$this->db->query('SELECT * FROM classes');
 		$this->db->execute();
 		return $this->db->resultSet();
 	}

 	public function getDataById($id)
 	{
		$this->db->query('SELECT * FROM classes WHERE class_id=:id');
 		$this->db->bind('id', $id);
 		$this->db->execute();
 		return $this->db->single();
 	}

 	public function addData($data)
 	{
 		$query = "INSERT INTO classes VALUES ('', :code, :name)";
 		$this->db->query($query);
 		$this->db->bind('code', $data['code']);
 		$this->db->bind('name', $data['name']);
 		$this->db->execute();
 		return $this->db->rowCount();
 	}

 	public function deleteData($id)
 	{
 		$rowAffected = 0;
 		$query = "DELETE FROM classes WHERE class_id=:id";
 		$this->db->query($query);
 		$this->db->bind('id', $id);
 		$this->db->execute();
 		$rowAffected += $this->db->rowCount();
 		$query = "DELETE FROM class_user_rel WHERE class_id=:id";
 		$this->db->query($query);
 		$this->db->bind('id', $id);
 		$this->db->execute();
 		$rowAffected += $this->db->rowCount();
 		$query = "DELETE FROM class_exam_rel WHERE class_id=:id";
 		$this->db->query($query);
 		$this->db->bind('id', $id);
 		$this->db->execute();
 		$rowAffected += $this->db->rowCount();
 		return $rowAffected;
 	}

 	public function updateData($data)
 	{
 		$query = "UPDATE classes SET class_code=:code, class_name=:name WHERE class_id=:id";
 		$this->db->query($query);
 		$this->db->bind('code', $data['code']);
 		$this->db->bind('name', $data['name']);
 		$this->db->bind('id', $data['id']);
 		$this->db->execute();
 		return $this->db->rowCount();
 	}

 	public function searchData($data)
 	{
 		$query = "SELECT * FROM classes WHERE class_name LIKE :keyword";
 		$this->db->query($query);
 		$this->db->bind('keyword', "%$data[keyword]%");
 		$this->db->execute();
 		return $this->db->resultSet();
 	}
 } ?>