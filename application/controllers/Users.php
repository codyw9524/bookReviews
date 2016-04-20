<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Users extends CI_Controller{

	public function __construct()
	{
		parent::__construct();
		$this->load->model('User');
	}

	function form_validate(){
		$this->load->library('form_validation');
		$this->form_validation->set_rules('name', 'Name', 'required');
		$this->form_validation->set_rules('alias', 'Alias', 'required');
		$this->form_validation->set_rules('email', 'E-mail', 'trim|required|valid_email|is_unique[users.email]');
		$this->form_validation->set_rules("password", "Password", "required|min_length[8]");
		$this->form_validation->set_rules("pass_confirm", "Confirmation", "required|matches[password]");
	}

	public function index()
	{
		$user = $this->User->show($this->uri->segment(3));
		$this->load->model('Review');
		$reviews = $this->Review->number_of_reviews_by_id($this->uri->segment(3));
		$books = $this->Review->books_reviewed_by_user_id($this->uri->segment(3));
		$this->load->view('Users/user_profile', array('user' => $user, 'reviews' => $reviews, 'books' => $books));
	}
	public function create()
	{
		$this->form_validate();
		if($this->form_validation->run() === FALSE)
		{
			$this->load->view('/Sessions/login_and_register');
		}
		else
		{
			$this->User->create($this->input->post());
			$this->session->set_flashdata('registration_confirmed', "<p style='color: green;'>Thank you for registering.  You may now log in</p>");
			redirect("/");
		}
	}
}