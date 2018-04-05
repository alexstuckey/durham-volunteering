<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Causes extends CI_Controller {

    public function allCauses()
    {
        $data['cis_username'] = 'xxxx99';
        $data['active'] = 'causes';
        $data['page_title'] = 'Causes';

        $this->load->model('Cause_model');
        $data['causes'] = $this->Cause_model->getAllCauses();

        $this->load->library('form_validation');
        $this->load->library('session');
        $data['message'] = $this->session->flashdata('message');

        $this->load->view('header', $data);

        $this->load->view('content_open', $data);
        $this->load->view('leftside', $data);

        $this->load->view('causes', $data);

        $this->load->view('content_close', $data);

        $this->load->view('footer', $data);
    }

    public function addPage()
    {
        $data['cis_username'] = 'xxxx99';
        $data['active'] = 'causes';
        $data['page_title'] = 'Causes: Add';

        $this->load->library('form_validation');
        $this->load->library('session');
        $data['message'] = $this->session->flashdata('message');

        $this->load->model('Cause_model');
        $data['causeTypes'] = $this->Cause_model->getCauseTypes();

        $this->load->view('header', $data);

        $this->load->view('content_open', $data);
        $this->load->view('leftside', $data);

        $this->load->view('cause_add', $data);

        $this->load->view('content_close', $data);

        $this->load->view('footer', $data);
    }

    public function addForm()
    {
        $this->load->library('form_validation');
        $this->form_validation->set_rules('inputOrganisationName', 'Organisation Name', 'trim|required|max_length[255]');
        $this->form_validation->set_rules('inputType', 'Organisation Type', 'required');
        $this->form_validation->set_rules('inputContactName', 'Contact Name', 'trim|required|max_length[255]');
        $this->form_validation->set_rules('inputContactEmail', 'Contant Email', 'trim|required|max_length[255]|strtolower|valid_email');
        $this->form_validation->set_rules('inputContactPhone', 'Contact Phone', 'trim|max_length[255]');
        $this->form_validation->set_rules('inputNotes', 'Notes', 'trim');

        $this->form_validation->set_error_delimiters('<p class="alert alert-danger"><strong>Error: </strong>', '</p>');

        $this->load->library('session');
        if ($this->form_validation->run() == FALSE) {
            $this->session->set_flashdata('error', validation_errors());

            $this->addPage();
        } else {
            $this->load->model('Cause_model');
            $this->Cause_model->createCause(
                $this->input->post('inputOrganisationName'),
                $this->input->post('inputType'),
                $this->input->post('inputContactName'),
                $this->input->post('inputContactEmail'),
                $this->input->post('inputContactPhone'),
                $this->input->post('inputNotes')
            );

            $this->session->set_flashdata('message', 'New cause created!');
            $this->Audit_model->insertLog('ALTER', 'New cause created: ' . $this->input->post('inputOrganisationName'));

            $this->load->helper('url');
            redirect(site_url('/causes'));
        }
    }

    public function causeByID($causeID)
    {
        $data['cis_username'] = 'xxxx99';
        $data['active'] = 'causes';

        $this->load->model('Cause_model');
        $data['causes'] = $this->Cause_model->getAllCauses();
        $data['cause'] = $this->Cause_model->getCauseByID($causeID);

        $data['page_title'] = 'Cause: ' . $data['cause']['organisation'] . ' - Staff Volunteering Programme';

        $this->load->view('header', $data);

        // place content body chunks within content_open and content_close */
        $this->load->view('content_open', $data);
        $this->load->view('leftside', $data);

        // place central column html form chunks within centre_column_open and center_column_close 
        $this->load->view('center_column_open', $data);
        $this->load->view('single_cause', $data);
        $this->load->view('center_column_close', $data);

        $this->load->view('rightside', $data);
        $this->load->view('content_close', $data);

        $this->load->view('footer', $data);
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
