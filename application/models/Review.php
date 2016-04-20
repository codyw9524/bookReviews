<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Review extends CI_Model{

	public function get_three_reviews()
	{
		return $this->db->query("SELECT
								users.id as 'users.id',
							    books.id as 'books.id',
							    reviews.id as 'reviews.id',
							    users.alias,
							    books.title,
							    reviews.content,
							    reviews.stars,
							    reviews.created_at
							    FROM users
							    JOIN reviews ON users.id = reviews.user_id
							    JOIN books ON books.id = reviews.book_id
							    ORDER BY reviews.id DESC
							    LIMIT 3;")->result_array();
	}

	public function create($post, $book_id)
	{
		$query = "INSERT INTO reviews (content, stars, book_id, user_id, created_at, updated_at) VALUES (?, ?, ?, ?, NOW(), NOW())";
		$values = array($post['review'], $post['rating'], $book_id, $this->session->userdata('user_id'));
		$this->db->query($query, $values);
	}
	public function get_reviews_by_book_id($book_id)
	{
		$query = "SELECT
					users.id as 'users.id',
					books.id as 'books.id',
					reviews.id as 'reviews.id',
					users.alias,
					books.title,
					books.author,
					reviews.content,
					reviews.stars,
					reviews.created_at
					FROM users
					JOIN reviews ON users.id = reviews.user_id
					JOIN books ON books.id = reviews.book_id
					WHERE books.id = ?;";
		$values = array($book_id);
		return $this->db->query($query, $values)->result_array();
	}
	public function get_reviews_grouped_by_book_title()
	{
		return $this->db->query("SELECT reviews.id as 'reviews.id', books.title, books.id as 'books.id' FROM reviews JOIN books ON books.id = reviews.book_id GROUP BY books.title ORDER BY reviews.id DESC")->result_array();
	}
	public function number_of_reviews_by_id($user_id)
	{
		return $this->db->query("SELECT users.id as 'users.id', reviews.id as 'reviews.id' FROM users JOIN reviews ON users.id = reviews.user_id WHERE users.id = ?", array($user_id))->result_array();
	}
	public function books_reviewed_by_user_id($user_id)
	{
		return $this->db->query("SELECT users.id as 'users.id', reviews.id as 'reviews.id', books.id as 'books.id', books.title, users.name FROM users JOIN reviews ON users.id = reviews.user_id JOIN books ON books.id = reviews.book_id WHERE users.id = ? GROUP BY books.title", array($user_id))->result_array();
	}
	public function destroy($review_id)
	{
		$this->db->query("DELETE FROM reviews WHERE id = ?", array($review_id));
	}

}