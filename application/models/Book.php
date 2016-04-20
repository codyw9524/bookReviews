<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Book extends CI_Model{

	public function create($post)
	{
		if($post['author_from_list'] == NULL)
		{
			$author = $post['new_author'];
		}
		else
		{
			$author = htmlspecialchars($post['author_from_list']);
		}
		$query = "INSERT INTO books (title, author, created_at, updated_at) VALUES (?, ?, NOW(), NOW())";
		$values = array(htmlspecialchars($post['title']), $author);
		$this->db->query($query, $values);
	}

	public function show($post)
	{
		return $this->db->query("SELECT * FROM books WHERE title = ?", array($post['title']))->row_array();
	}
	public function show_by_id($book_id)
	{
		return $this->db->query("SELECT * FROM books WHERE id = ?", array(htmlspecialchars($book_id)))->row_array();
	}
	public function show_authors()
	{
		return $this->db->query("SELECT author FROM books GROUP BY author")->result_array();
	}
}