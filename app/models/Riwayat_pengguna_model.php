<?php 

/**
  * Riwayat_pengguna Model
  */
 class Riwayat_pengguna_model
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
		$this->db->query('SELECT * FROM class_exam_rel INNER JOIN class_user_rel USING(class_id) INNER JOIN exams USING(exam_id) LEFT JOIN history ON class_exam_rel.class_id=history.class_id AND class_exam_rel.exam_id=history.exam_id AND class_user_rel.user_id=history.user_id WHERE class_user_rel.user_id=:user_id AND class_exam_rel.class_id=:class_id AND history.history_id IS NOT NULL');
 		$this->db->bind('user_id', $user_id);
 		$this->db->bind('class_id', $class_id);
 		$this->db->execute();
 		return $this->db->resultSet();
 	}
 } ?>