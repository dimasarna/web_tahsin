<?php 

/**
  * Soal Model
  */
 class Soal_model
 {
 	private $db;

 	public function __construct()
 	{
 		$this->db = new Database;
 	}

	public function getData()
 	{
 		$this->db->query('SELECT * FROM questions');
 		$this->db->execute();
 		return $this->db->resultSet();
 	}

 	public function getDataById($id)
 	{
 		$this->db->query('SELECT * FROM questions WHERE question_id=:id');
 		$this->db->bind('id', $id);
 		$this->db->execute();
 		return $this->db->single();
 	}

 	public function addData($data)
 	{
 		$rowAffected = 0;
 		$query = "INSERT INTO questions VALUES ('', :question, :choice_a, :choice_b, :choice_c, :choice_d, :answer)";
 		$this->db->query($query);
 		$this->db->bind('question', $data['question']);
 		$this->db->bind('choice_a', $data['choice_a']);
 		$this->db->bind('choice_b', $data['choice_b']);
 		$this->db->bind('choice_c', $data['choice_c']);
 		$this->db->bind('choice_d', $data['choice_d']);
 		$this->db->bind('answer', $data['answer']);
 		$this->db->execute();
 		$rowAffected += $this->db->rowCount();
 		return $rowAffected;
 	}

 	public function deleteData($id)
 	{
 		$rowAffected = 0;
 		$query = "DELETE FROM questions WHERE question_id=:id";
 		$this->db->query($query);
 		$this->db->bind('id', $id);
 		$this->db->execute();
 		$rowAffected += $this->db->rowCount();
 		return $rowAffected;
 	}

 	public function updateData($data)
 	{
 		$query = "UPDATE questions SET question=:question, choice_a=:choice_a, choice_b=:choice_b, choice_c=:choice_c, choice_d=:choice_d, answer=:answer WHERE question_id=:id";
 		$this->db->query($query);
 		$this->db->bind('question', $data['question']);
 		$this->db->bind('choice_a', $data['choice_a']);
 		$this->db->bind('choice_b', $data['choice_b']);
 		$this->db->bind('choice_c', $data['choice_c']);
 		$this->db->bind('choice_d', $data['choice_d']);
 		$this->db->bind('answer', $data['answer']);
 		$this->db->bind('id', $data['id']);
 		$this->db->execute();
 		return $this->db->rowCount();
 	}

 	public function searchData($data)
 	{
 		$query = "SELECT * FROM questions WHERE question LIKE :keyword";
 		$this->db->query($query);
 		$this->db->bind('keyword', "%$data[keyword]%");
 		$this->db->execute();
 		return $this->db->resultSet();
 	}
 } ?>