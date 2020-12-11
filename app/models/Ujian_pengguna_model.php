<?php 

/**
  * Ujian_pengguna Model
  */
 class Ujian_pengguna_model
 {
 	private $db;

 	public function __construct()
 	{
 		$this->db = new Database;
 	}

 	public function getKelas($id)
 	{
		$this->db->query('SELECT * FROM class_user_rel INNER JOIN classes USING(class_id) WHERE class_user_rel.user_id=:id');
 		$this->db->bind('id', $id);
 		$this->db->execute();
 		return $this->db->resultSet();
 	}

 	public function getUjian($user_id, $class_id)
 	{
		$this->db->query('SELECT class_exam_rel.class_id, class_user_rel.user_id, exams.exam_id, exams.exam_code, exams.exam_name FROM class_exam_rel INNER JOIN class_user_rel USING(class_id) INNER JOIN exams USING(exam_id) LEFT JOIN history ON class_exam_rel.class_id=history.class_id AND class_exam_rel.exam_id=history.exam_id AND class_user_rel.user_id=history.user_id WHERE class_user_rel.user_id=:user_id AND class_exam_rel.class_id=:class_id AND history.history_id IS NULL');
 		$this->db->bind('user_id', $user_id);
 		$this->db->bind('class_id', $class_id);
 		$this->db->execute();
 		return $this->db->resultSet();
 	}

 	public function getSoal($id)
 	{
		$this->db->query('SELECT * FROM exam_question_rel INNER JOIN questions USING(question_id) WHERE exam_question_rel.exam_id=:id');
 		$this->db->bind('id', $id);
 		$this->db->execute();
 		return $this->db->resultSet();
 	}

 	public function joinKelas($data)
 	{
 		$query = "SELECT * FROM classes WHERE class_code=:code";
 		$this->db->query($query);
 		$this->db->bind('code', $data["code"]);
 		$this->db->execute();
 		$result = $this->db->rowCount();
 		if ($result > 0) {
 			$buffer = $this->db->single();
 			$query = "INSERT INTO class_user_rel VALUES ('', :class_id, :user_id)";
	 		$this->db->query($query);
	 		$this->db->bind('class_id', $buffer['class_id']);
	 		$this->db->bind('user_id', $data['user_id']);
	 		$this->db->execute();
	 		return $this->db->rowCount();
 		} else return $result;
 	}

 	public function tokenVerif($data)
 	{
 		$query = "SELECT * FROM exams WHERE exam_id=:exam_id AND token=:code";
 		$this->db->query($query);
 		$this->db->bind('exam_id', $data["exam_id"]);
 		$this->db->bind('code', $data["code"]);
 		$this->db->execute();
 		return $this->db->rowCount();
 	}

 	public function inputScore($data)
 	{
 		$query = "INSERT INTO history VALUES ('', :class_id, :exam_id, :user_id, :score)";
 		$this->db->query($query);
 		$this->db->bind('class_id', $data["class_id"]);
 		$this->db->bind('exam_id', $data["exam_id"]);
 		$this->db->bind('user_id', $data["user_id"]);
 		$this->db->bind('score', $data["score"]);
 		$this->db->execute();
 		return $this->db->rowCount();
 	}
 } ?>