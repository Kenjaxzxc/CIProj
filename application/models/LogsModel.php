<?php

class LogsModel extends CI_Model
{
	private $table = 'logs';

	public function userLogs($logsData)
	{
		$query = $this->db->insert($this->table,$logsData);

		return $query;
	}

	public function all_logs()
	{
		$this->db->select('*, logs.date as logsdate, students.fname as sfname, students.lname as slname');
		$this->db->from($this->table);
		$this->db->join('students', 'logs.account_id = students.account_id', 'left');
		$this->db->join('teachers', 'logs.account_id = teachers.account_id', 'left');
		$this->db->join('accounts', 'logs.account_id = accounts.account_id', 'left');
		$this->db->join('sections', 'teachers.section_id = sections.section_id OR students.section_id = sections.section_id', 'left');
		$this->db->join('subjects', 'teachers.subject_id = subjects.subject_id OR students.subject_id = subjects.subject_id', 'left');

		$query = $this->db->get();
		
		return $query;
	}

}