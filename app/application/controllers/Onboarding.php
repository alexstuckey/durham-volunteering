<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Onboarding extends CI_Controller {

	public function welcome()
	{
        $this->load->model('User_model');
		if (!$this->User_model->doesUserExist($_SERVER['REMOTE_USER'])) {
			// First access by user, normally redirect, but already there.
			// redirect
		}

		$data['user'] = $this->User_model->getUserByCIS($_SERVER['REMOTE_USER']);

		$this->load->view('onboarding_1_welcome', $data);

		$this->User_model->setOnboardingStatus($_SERVER['REMOTE_USER'], 1);
	}

	public function step_details()
	{
        $this->load->model('User_model');
		if (!$this->User_model->doesUserExist($_SERVER['REMOTE_USER'])) {
			// First access by user, normally redirect, but already there.
			$this->load->helper('url');
			redirect('/onboard/welcome');
		}

		$data['user'] = $this->User_model->getUserByCIS($_SERVER['REMOTE_USER']);

		$data['active'] = 'enter_details';
		
		$this->load->view('onboarding_steps', $data);

		$this->User_model->setOnboardingStatus($_SERVER['REMOTE_USER'], 2);
	}

	public function enter_details_form()
	{
        $this->load->model('User_model');
		if (!$this->User_model->doesUserExist($_SERVER['REMOTE_USER'])) {
			// First access by user, normally redirect, but already there.
			$this->load->helper('url');
			redirect('/onboard/welcome');
		}

		$data['user'] = $this->User_model->getUserByCIS($_SERVER['REMOTE_USER']);

		$this->load->helper('form');

		$this->load->view('onboarding_3_enter_details_form', $data);


		$this->User_model->setOnboardingStatus($_SERVER['REMOTE_USER'], 3);
	}

	public function send_details()
	{
        $this->load->model('User_model');
		if (!$this->User_model->doesUserExist($_SERVER['REMOTE_USER'])) {
			// First access by user, normally redirect, but already there.
			$this->load->helper('url');
			redirect('/onboard/welcome');
		}

		$data['user'] = $this->User_model->getUserByCIS($_SERVER['REMOTE_USER']);

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

			$userChanges = array(
				'firstName' => $this->input->post('inputFirstName'),
				'secondName' => $this->input->post('inputLastName')
			);

            $this->User_model->updateUser($_SERVER['REMOTE_USER'], $userChanges);

			$this->User_model->setOnboardingStatus($_SERVER['REMOTE_USER'], 4);
		}
		
	}

	public function enter_nominate_manager_form()
	{
        $this->load->model('User_model');
		if (!$this->User_model->doesUserExist($_SERVER['REMOTE_USER'])) {
			// First access by user, normally redirect, but already there.
			$this->load->helper('url');
			redirect('/onboard/welcome');
		}

		$data['user'] = $this->User_model->getUserByCIS($_SERVER['REMOTE_USER']);

		$this->load->helper('form');

		$this->load->view('onboarding_5_nominate_manager_form', $data);

		$this->User_model->setOnboardingStatus($_SERVER['REMOTE_USER'], 5);
	}

	public function send_nominate_manager()
	{
        $this->load->model('User_model');
		if (!$this->User_model->doesUserExist($_SERVER['REMOTE_USER'])) {
			// First access by user, normally redirect, but already there.
			$this->load->helper('url');
			redirect('/onboard/welcome');
		}

		$data['user'] = $this->User_model->getUserByCIS($_SERVER['REMOTE_USER']);

		// Form logic
		// Validate
		$this->load->library('form_validation');

		$this->form_validation->set_rules('inputEmailAddress', 'Email address', 'required');
		$this->form_validation->set_rules('inputComment', 'Comment', 'required');

		if ($this->form_validation->run() == FALSE) {
			$this->load->view('onboarding_5_nominate_manager_form', $data);
		} else {

			$data['active'] = 'get_started';
			$this->load->view('onboarding_steps', $data);



            $this->User_model->setManager($_SERVER['REMOTE_USER'], $data);

			$this->User_model->setOnboardingStatus($_SERVER['REMOTE_USER'], 6);
		}

	}


}
