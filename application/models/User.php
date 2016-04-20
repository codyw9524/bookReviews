<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class User extends CI_Model{

	public function create($post)
	{
		$query = "INSERT INTO users (name, alias, email, password, created_at, updated_at) VALUES (?, ?, ?, ?, NOW(), NOW())";
		$values = array($post['name'], $post['alias'], $post['email'], password_hash($post['password'], PASSWORD_DEFAULT));
		$this->db->query($query, $values);
	}
	public function show($user_id)
	{
		return $this->db->query("SELECT * FROM users WHERE id = ?", array($user_id))->row_array();
	}
}