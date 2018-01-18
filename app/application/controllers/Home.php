<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Home extends CI_Controller {

	public function homepage()
	{
		$data['cis_username'] = 'xxxx99';
		$this->load->view('homepage', $data);
	}

}
