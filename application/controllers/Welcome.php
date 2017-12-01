<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Welcome extends CI_Controller {

	public function index()
	{
		$_SESSION['success']='';
		$this->load->view('Welcome/index');
		$this->load->view('Welcome/asside');
		$this->load->view('Welcome/home');
		$this->load->view('Welcome/footer');
	}
}
