<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Times extends CI_Controller {

    public function index()
    {
        $this->load->view('welcome_message');
    }

    public function createFormSubmit()
    {
        $this->load->library('form_validation');
        $this->form_validation->set_rules('shiftApplicationDateTimeStart', 'Shift Start Time', 'trim|required');
        $this->form_validation->set_rules('shiftApplicationDateTimeEnd', 'Shift End Time', 'trim|required');
        $this->form_validation->set_rules('shiftApplicationCause', 'Shift Cause', 'trim|required');
        $this->form_validation->set_rules('shiftApplicationComment', 'Shift Comment', 'trim');
        $this->form_validation->set_error_delimiters('<p class="alert alert-danger"><strong>Error: </strong>', '</p>');

        $this->load->library('session');
        if ($this->form_validation->run() == FALSE) {
            $this->session->set_flashdata('error', validation_errors());

            $this->load->helper('url');
            redirect(site_url('/my_volunteering/activities'));
        } else {

            $this->load->model('Time_model');

            $this->Time_model->createTime(
                $_SERVER['REMOTE_USER'],
                $this->input->post('shiftApplicationDateTimeStart'),
                $this->input->post('shiftApplicationDateTimeEnd'),
                $this->input->post('shiftApplicationCause'),
                $this->input->post('shiftApplicationComment'),
                'pending'
            );

            $this->session->set_flashdata('message', 'New time entered!');
            $this->Audit_model->insertLog('ALTER', 'New time entered!');

            $this->load->helper('url');
            redirect(site_url('/my_volunteering'));
        }
    }


    public function deleteFormSubmit()
    {
        $this->load->library('form_validation');
        $this->form_validation->set_rules('shiftCancelSelect', 'Shift', 'required');
        $this->form_validation->set_rules('shiftCancelComment', 'Comment', 'trim');
        $this->form_validation->set_error_delimiters('<p class="alert alert-danger"><strong>Error: </strong>', '</p>');

        $this->load->library('session');
        if ($this->form_validation->run() == FALSE) {
            $this->session->set_flashdata('error', validation_errors());

            $this->load->helper('url');
            redirect(site_url('/my_volunteering/activities'));
        } else {
            $this->load->model('Time_model');

            $this->Time_model->deleteTime('shiftCancelSelect');

            $this->session->set_flashdata('message', 'Time cancelled!');
            $this->Audit_model->insertLog('ALTER', 'Time cancelled!');

            $this->load->helper('url');
            redirect(site_url('/my_volunteering'));
        }
    }


    public function confirmDenyFormSubmit()
    {
        $this->load->library('form_validation');
        $this->form_validation->set_rules('shiftResponseSelect', 'Shift', 'required');
        $this->form_validation->set_rules('shiftResponseRadios', 'Response', 'required');
        $this->form_validation->set_rules('shiftResponseComment', 'Comment', 'Trim');

        $this->form_validation->set_error_delimiters('<p class="alert alert-danger"><strong>Error: </strong>', '</p>');

        $this->load->library('session');
        if ($this->form_validation->run() == FALSE) {
            $this->session->set_flashdata('error', validation_errors());

            $this->load->helper('url');
            redirect(site_url('/manager'));
        } else {
            $this->load->model('Time_model');

            $this->Time_model->changeTimeStatus('shiftResponseSelect', 'shiftResponseRadios');

            $this->session->set_flashdata('message', 'Response sent!');
            $this->Audit_model->insertLog('ALTER', 'Activity response sent!');

            $this->load->helper('url');
            redirect(site_url('/manager'));
        }
    }



}
