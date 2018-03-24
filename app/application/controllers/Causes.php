<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Causes extends CI_Controller {

	public function index()
	{
		$this->load->view('welcome_message');
	}

	public function causeByID($causeID)
	{
		$data['cis_username'] = 'xxxx99';
		$data['active'] = 'volunteering';

		$this->load->model('cause_model');
		$data['cause'] = $this->cause_model->getCauseByID($causeID);

		$data['page_title'] = 'Cause: ' . $data['cause']['organisation'];

		$this->load->view('header', $data);

		// place content body chunks within content_open and content_close */
		$this->load->view('content_open', $data);
		$this->load->view('leftside', $data);

		// place central column html form chunks within centre_column_open and center_column_close 
		$this->load->view('center_column_open', $data);
        $this->load->view('cause_select', $data);
        $this->load->view('single_cause', $data);
		$this->load->view('center_column_close', $data);

		$this->load->view('rightside', $data);
		$this->load->view('content_close', $data);

		$this->load->view('footer', $data);
	}

	public function listAll()
	{
		echo 'Hello World!';
	}

	public function create()
	{
		if ($this->input->get_request_header("Content-Type", TRUE) == "application/json") {

			// Pass the raw_input_stream through a security filter
			$cleaned_input_stream = $this->security->xss_clean($this->input->raw_input_stream);

			// Parse the sanitised string into an associative array
			$requestPayload = json_decode($cleaned_input_stream, TRUE);
			// Checking for errors in parsing
			if ($requestPayload === null
			    && json_last_error() !== JSON_ERROR_NONE) {
				$response = array('error' => "incorrect JSON input" );
				print(json_encode($response));
			}

			if (array_key_exists("organisation", $requestPayload)
			 && array_key_exists("typeID", $requestPayload)
			 && array_key_exists("contactName", $requestPayload)
			 && array_key_exists("contactEmail", $requestPayload)
			 && array_key_exists("contactPhone", $requestPayload)
			 && array_key_exists("notes", $requestPayload)
			) {
				var_dump($requestPayload);
				$this->load->model('Cause_model');
				$this->cause_model->createCause($requestPayload);
			} else {
				$response = array('error' => "parameters incomplete" );
				print(json_encode($response));
			}

		} else {
			// Return error, incorrect Content-Type
		}

		
	}

	public function get($causeID)
	{
		if (!is_int($causeID)) {
			// Fail
			$response = array('error' => "causeID was not an int" );
			print(json_encode($response));
		} else {
			$this->load->model('Cause_model');
			$fetchedCause = $this->cause_model->getCauseByID($causeID);

			print(json_encode($fetchedCause));
		}
	}
}
