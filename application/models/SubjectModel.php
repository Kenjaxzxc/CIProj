<?php
class SubjectModel extends CI_Model	{

	private $table = 'subjects';

	public function checkSubjectName($subjectData)
	{
		$query = $this->db->get_where($this->table,$subjectData);

		return $query;
	}

	public function createSubject($subjectData)
	{
		$query = $this->db->insert($this->table,$subjectData);

		return $query;
	}

	public function all_subjects()
	{
		$query = $this->db->get($this->table);

		return $query;
	}

}