<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Example_model extends CI_Model
{
	public $table = 'tbl_employees';

	public function getAllEmployees()
	{
		$query = $this->db->get($this->table, 2);
		return $query->result();
	}

	public function getAllEmployeesArray()
	{
		$query = $this->db->get($this->table);
		return $query->result_array();
	}


	public function insert($data)
	{
		$result = $this->db->insert($this->table, $data);
		return $result;
	}

	public function update($data, $employee_id)
	{

		$result = $this->db->where('id', $employee_id)->update($this->table, $data);
		return $result;
	}
}
