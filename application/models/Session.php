<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Session extends CI_Model{

	public function create($post)
	{
		return $this->db->query("SELECT * FROM users WHERE email = ?", array($post['email']))->row_array();
	}
}