<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Times extends CI_Controller {

	public function index()
	{
		$this->load->view('welcome_message');
	}

	public function getUserTimes()
	{
//        $this->load->model('Time_model');
//        $data['cis_username'] = 'xxxx99';
//        $data['page_title'] = 'My Volunteering';
//        // need to access the cis id of currently logged in user -- $_SERVER['REMOTE_USER']
//        $data['times'] = $this->Time_model->getTimeForCIS('1');
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
