<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class User extends CI_Controller {

	public function index()
	{
		echo 'Invalid URL';
	}

	public function get($userCISID)
	{
		echo 'Hello CIS, ' . $userCISID . '!';
	}

}
