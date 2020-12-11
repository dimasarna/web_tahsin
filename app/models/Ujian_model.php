<?php 

/**
  * Ujian Model
  */
 class Ujian_model
 {
 	private $db;

 	public function __construct()
 	{
 		$this->db = new Database;
 	}

	public function getData()
 	{
 		$this->db->query('SELECT * FROM exams');
 		$this->db->execute();
 		return $this->db->resultSet();
 	}

 	public function getDataById($id)
 	{
 		$this->db->query('SELECT * FROM exams WHERE exam_id=:id');
 		$this->db->bind('id', $id);
 		$this->db->execute();
 		return $this->db->single();
 	}

 	public function addData($data)
 	{
 		$query = "INSERT INTO exams VALUES ('', :code, :name, :token)";
 		$this->db->query($query);
 		$this->db->bind('code', $data['code']);
 		$this->db->bind('name', $data['name']);
 		$this->db->bind('token', $data['token']);
 		$this->db->execute();
 		return $this->db->rowCount();
 	}

 	public function deleteData($id)
 	{
 		$rowAffected = 0;
 		$query = "DELETE FROM exams WHERE exam_id=:id";
 		$this->db->query($query);
 		$this->db->bind('id', $id);
 		$this->db->execute();
 		$rowAffected += $this->db->rowCount();
 		$query = "DELETE FROM exam_question_rel WHERE exam_id=:id";
 		$this->db->query($query);
 		$this->db->bind('id', $id);
 		$this->db->execute();
 		$rowAffected += $this->db->rowCount();
 		$query = "DELETE FROM class_exam_rel WHERE exam_id=:id";
 		$this->db->query($query);
 		$this->db->bind('id', $id);
 		$this->db->execute();
 		$rowAffected += $this->db->rowCount();
 		return $rowAffected;
 	}

 	public function updateData($data)
 	{
 		$query = "UPDATE exams SET exam_code=:code, exam_name=:name, token=:token WHERE exam_id=:id";
 		$this->db->query($query);
 		$this->db->bind('code', $data['code']);
 		$this->db->bind('name', $data['name']);
 		$this->db->bind('token', $data['token']);
 		$this->db->bind('id', $data['id']);
 		$this->db->execute();
 		return $this->db->rowCount();
 	}

 	public function getSoalById($id)
 	{
 		$this->db->query('SELECT * FROM questions INNER JOIN exam_question_rel ON questions.question_id=exam_question_rel.question_id WHERE exam_id=:id');
 		$this->db->bind('id', $id);
 		$this->db->execute();
 		return $this->db->resultSet();
 	}

 	public function addSoal($data)
 	{
 		$query = "INSERT INTO exam_question_rel VALUES ('', :exam_id, :question_id)";
 		$this->db->query($query);
 		$this->db->bind('exam_id', $data['exam_id']);
 		$this->db->bind('question_id', $data['question_id']);
 		$this->db->execute();
 		return $this->db->rowCount();
 	}

 	public function deleteSoal($id)
 	{
 		$query = "DELETE FROM exam_question_rel WHERE rel_id=:id";
 		$this->db->query($query);
 		$this->db->bind('id', $id);
 		$this->db->execute();
 		return $this->db->rowCount();
 	}

 	public function getKelasById($id)
 	{
 		$this->db->query('SELECT * FROM classes INNER JOIN class_exam_rel ON classes.class_id=class_exam_rel.class_id WHERE exam_id=:id');
 		$this->db->bind('id', $id);
 		$this->db->execute();
 		return $this->db->resultSet();
 	}

 	public function addKelas($data)
 	{
 		$query = "INSERT INTO class_exam_rel VALUES ('', :class_id, :exam_id)";
 		$this->db->query($query);
 		$this->db->bind('class_id', $data['class_id']);
 		$this->db->bind('exam_id', $data['exam_id']);
 		$this->db->execute();
 		return $this->db->rowCount();
 	}

 	public function deleteKelas($id)
 	{
 		$query = "DELETE FROM class_exam_rel WHERE rel_id=:id";
 		$this->db->query($query);
 		$this->db->bind('id', $id);
 		$this->db->execute();
 		return $this->db->rowCount();
 	}
 } ?>