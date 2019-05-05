<?php
class AccountModel extends CI_Model
{
	private $table = 'accounts';

	public function loginUser($loginUserData)
	{
		$query = $this->db->get_where($this->table, $loginUserData);

		return $query;
	}

	public function registerAccount($accountData)
	{
		$this->db->insert($this->table,$accountData);
		$query = $this->db->insert_id();
		return $query;//get last id
	}

	public function checkUsername($username)
	{
		$query = $this->db->get_where($this->table, $username);

		return $query;
	}
}