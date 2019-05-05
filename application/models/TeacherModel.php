<?php

class TeacherModel extends CI_Model
{
	private $table = 'teachers';

	public function registerTeacher($teacherData)
	{
		$query = $this->db->insert($this->table,$teacherData);
		
		return $query;
	}

	public function all_teachers()
	{
		$query = $this->db->get($this->table);

		return $query;
	}

	public function all_teachers_section()
	{
		$this->db->select('teachers.*, sections.section_name, subjects.subject_name, accounts.username');
		$this->db->from($this->table);
		$this->db->join('sections', 'teachers.section_id = sections.section_id', 'left');
		$this->db->join('subjects', 'teachers.subject_id = subjects.subject_id', 'left');
		$this->db->join('accounts', 'teachers.account_id = accounts.account_id', 'left');

		$query = $this->db->get();
		
		return $query;
	}

	public function getGrade($subID,$studID)
	{
		$data = array(
			'subject_id'=>$subID,
			'student_id'=>$studID
		);
		$this->db->select('grade');
		$this->db->from('grades');
		$this->db->where($data);

		return $this->db->get()->result_array();
	}

	public function addGrade($data)
	{
		$query = $this->db->insert('grades',$data);
		
		return $query;
	}

	public function editGrade($id,$newGrade)
	{
		$this->db->set('grade', $newGrade);
		$this->db->where('student_id', $id);
		$this->db->update('grades');

		return true;
	}

	public function selectQueryBuilder($table,$field,$data)
	{
		$this->db->select($field)->from($table)->where($data);
		return $this->db->get()->result_array();
	}

	public function updateStudent($studentData)
	{
		$account_id = $this->input->post('studid');
		$this->db->set($studentData);
		$this->db->where('account_id', $account_id);
		$this->db->update('students');
		return true;
	}

	public function updatePass($studentData,$account_id)
	{
		$this->db->set($studentData);
		$this->db->where('account_id', $account_id);
		$this->db->update('accounts');
		return true;
	}

}