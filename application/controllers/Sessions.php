<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Sessions extends CI_Controller {

	public function __construct()
	{
		parent::__construct();
		$this->load->model('Session');
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
		$this->form_validate();
		if($this->form_validation->run() === FALSE)
		{
			$this->load->view('Sessions/login_and_register');
		}
	}

	public function create()
	{
		$user_info = $this->Session->create($this->input->post());
		if($user_info && password_verify($this->input->post('password'), $user_info['password']) === TRUE)
		{
			$user_info = array('user_id' => $user_info['id'],
							   'name' => $user_info['name'],
							   'alias' => $user_info['alias'],
							   'email' => $this->input->post('email'),
							   'is_logged_in' => TRUE);
			$this->session->set_userdata($user_info);
			redirect("/Books/index");
		}
		else
		{
			$this->session->set_flashdata('error', "<p style='color: red;'>Email and/or password provided were incorrect</p>");
			redirect("/");
		}
	}
	public function destroy()
	{
		$this->session->sess_destroy();
		redirect('/');
	}
}