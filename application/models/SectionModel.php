<?php
class SectionModel extends CI_Model	{

	private $table = 'sections';

	public function checkSectionName($sectionData)
	{
		$query = $this->db->get_where($this->table,$sectionData);

		return $query;
	}

	public function createSection($sectionData)
	{
		$query = $this->db->insert($this->table,$sectionData);

		return $query;
	}

	public function all_sections()
	{
		$query = $this->db->get($this->table);

		return $query;
	}

}