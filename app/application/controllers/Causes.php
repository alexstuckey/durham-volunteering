<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Causes extends CI_Controller {

	public function index()
	{
		$this->load->view('welcome_message');
	}

	public function listAll()
	{
		echo 'Hello World!';
	}

	public function create()
	{
		echo 'Hello World!';
	}

	public function get($causeID)
	{
		echo 'Hello cause, ' . $causeID . '!';
	}
}
