<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Onboarding extends CI_Controller {

	public function welcome()
	{
		$data['cis_username'] = 'xxxx99';
		$this->load->view('onboarding_1_welcome', $data);
	}

	public function flow()
	{
		$data['cis_username'] = 'xxxx99';
		$data['active'] = 'enter_details';
		$this->load->view('onboarding_steps', $data);
	}

	public function enter_details_form()
	{
		$data['cis_username'] = 'xxxx99';
		$this->load->view('onboarding_3_enter_details_form', $data);
	}
}
