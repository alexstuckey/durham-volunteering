<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Times extends CI_Controller {

	public function index()
	{
		$this->load->view('welcome_message');
	}

	public function list()
	{
		echo 'Hello World!';
	}

	public function create()
	{
		echo 'Hello World!';
	}

	public function get($timeID)
	{
		echo 'Hello time, ' . $timeID . '!';
	}
}
