<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Reviews extends CI_Controller{

	public function __construct()
	{
		parent::__construct();
		$this->load->model('Review');
	}

	public function destroy()
	{
		$this->Review->destroy($this->uri->segment(3));
		redirect("/Books/show_book/" . $this->uri->segment(4));
	}
}