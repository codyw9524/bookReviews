<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Books extends CI_Controller{

	public function __construct()
	{
		parent::__construct();
		$this->load->model('Book');
	}
	
	public function index()
	{
		// $this->output->enable_profiler(TRUE);
		$this->load->model('Review');
		$reviews = $this->Review->get_three_reviews();
		$all_reviews = $this->Review->get_reviews_grouped_by_book_title();
		$this->load->view('Books/books_home', array('reviews' => $reviews, 'all_reviews' => $all_reviews));
	}
	public function add()
	{
		$authors = $this->Book->show_authors();
		$this->load->view('Books/add_book', array('authors' => $authors));
	}
	public function add_book()
	{
		$this->Book->create($this->input->post());
		$this->add_review();
	}
	public function add_review()
	{
		$this->load->model('Review');
		if($this->input->post('add_book_and_review'))
		{
			$book_id = $this->Book->show($this->input->post());
			$this->Review->create($this->input->post(), $book_id['id']);
			redirect("/Books/show_book/" . $book_id['id']);
		}
		else if($this->input->post('review_only'))
		{
			$this->Review->create($this->input->post(), $this->input->post('review_only'));
			redirect("/Books/show_book/" . $this->input->post('review_only'));
		}
	}
	public function show_book()
	{
		$this->load->model('Review');
		$books = $this->Book->show_by_id($this->uri->segment(3));
		$reviews = $this->Review->get_reviews_by_book_id($this->uri->segment(3));
		$this->load->view('Books/book_page', array("reviews" => $reviews, 'books' => $books));
	}
}
