<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Onboarding extends CI_Controller {

	public function welcome()
	{
		$data['cis_username'] = 'xxxx99';
		$this->load->view('onboarding_1_welcome', $data);
	}
}
