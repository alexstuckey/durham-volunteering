<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Onboarding extends CI_Controller {

	public function welcome()
	{
		if (!$this->user_model->doesUserExist($_SERVER['REMOTE_USER'])) {
			// First access by user, normally redirect, but already there.
			// redirect
		}

		$user_fetch = $this->user_model->getUserByCIS($_SERVER['REMOTE_USER']);
		$data['user'] = $user_fetch[0];

		$this->load->view('onboarding_1_welcome', $data);

		$this->user_model->setOnboardingStatus($_SERVER['REMOTE_USER'], 1);
	}

	public function step_details()
	{
		if (!$this->user_model->doesUserExist($_SERVER['REMOTE_USER'])) {
			// First access by user, normally redirect, but already there.
			$this->load->helper('url');
			redirect('/onboard/welcome');
		}

		$user_fetch = $this->user_model->getUserByCIS($_SERVER['REMOTE_USER']);
		$data['user'] = $user_fetch[0];

		$data['active'] = 'enter_details';
		
		$this->load->view('onboarding_steps', $data);

		$this->user_model->setOnboardingStatus($_SERVER['REMOTE_USER'], 2);
	}

	public function enter_details_form()
	{
		if (!$this->user_model->doesUserExist($_SERVER['REMOTE_USER'])) {
			// First access by user, normally redirect, but already there.
			$this->load->helper('url');
			redirect('/onboard/welcome');
		}

		$user_fetch = $this->user_model->getUserByCIS($_SERVER['REMOTE_USER']);
		$data['user'] = $user_fetch[0];

		$this->load->view('onboarding_3_enter_details_form', $data);

		$this->user_model->setOnboardingStatus($_SERVER['REMOTE_USER'], 3);
	}

	public function send_details()
	{
		if (!$this->user_model->doesUserExist($_SERVER['REMOTE_USER'])) {
			// First access by user, normally redirect, but already there.
			$this->load->helper('url');
			redirect('/onboard/welcome');
		}

		$user_fetch = $this->user_model->getUserByCIS($_SERVER['REMOTE_USER']);
		$data['user'] = $user_fetch[0];

		// Form logic
		// Validate
		$this->load->library('form_validation');

		$this->form_validation->set_rules('inputFirstName', 'First Name', 'required');
		$this->form_validation->set_rules('inputLastName', 'Last Name', 'required');

		if ($this->form_validation->run() == FALSE) {
			$this->load->view('onboarding_3_enter_details_form', $data);
		} else {

			$data['active'] = 'nominate_manager';
			$this->load->view('onboarding_steps', $data);

			$this->user_model->setOnboardingStatus($_SERVER['REMOTE_USER'], 4);
		}
		
	}

	public function enter_nominate_manager_form()
	{
		if (!$this->user_model->doesUserExist($_SERVER['REMOTE_USER'])) {
			// First access by user, normally redirect, but already there.
			$this->load->helper('url');
			redirect('/onboard/welcome');
		}

		$user_fetch = $this->user_model->getUserByCIS($_SERVER['REMOTE_USER']);
		$data['user'] = $user_fetch[0];

		$this->load->view('onboarding_5_nominate_manager_form', $data);

		$this->user_model->setOnboardingStatus($_SERVER['REMOTE_USER'], 5);
	}

	public function send_nominate_manager()
	{
		if (!$this->user_model->doesUserExist($_SERVER['REMOTE_USER'])) {
			// First access by user, normally redirect, but already there.
			$this->load->helper('url');
			redirect('/onboard/welcome');
		}

		$user_fetch = $this->user_model->getUserByCIS($_SERVER['REMOTE_USER']);
		$data['user'] = $user_fetch[0];

		$data['active'] = 'get_started';
		$this->load->view('onboarding_steps', $data);

		$this->user_model->setOnboardingStatus($_SERVER['REMOTE_USER'], 6);
	}
}
