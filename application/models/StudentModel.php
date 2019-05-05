<?php

class StudentModel extends CI_Model
{
	private $table = 'students';

	public function registerStudent($studentData)
	{
		$query = $this->db->insert($this->table,$studentData);
		
		return $query;
	}

	public function all_students()
	{
		$query = $this->db->get($this->table);

		return $query;
	}

	public function all_students_section()
	{
		$this->db->select('students.*, sections.section_name, subjects.subject_name, accounts.username, grades.grade');
		$this->db->from($this->table);
		$this->db->join('sections', 'students.section_id = sections.section_id', 'left');
		$this->db->join('subjects', 'students.subject_id = subjects.subject_id', 'left');
		$this->db->join('accounts', 'students.account_id = accounts.account_id', 'left');
		$this->db->join('grades', 'students.student_id = grades.student_id', 'left');

		$query = $this->db->get();
		
		return $query;
	}

	public function updatePass($studentData,$account_id)
	{
		$this->db->set($studentData);
		$this->db->where('account_id', $account_id);
		$this->db->update('accounts');
		return true;
	}

}