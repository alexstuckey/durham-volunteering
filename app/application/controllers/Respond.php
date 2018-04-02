<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Respond extends CI_Controller {

    // For a manager to confirm a user
    public function nomination()
    {
        $this->load->model('User_model');
        $data['manageesNominated'] = $this->User_model->getManageesNominated($_SERVER['REMOTE_USER']);

        $data['active'] = 'nomination';
        $data['hide_links'] = TRUE;
        $data['page_title'] = 'Nominations - Staff Volunteering Programme';

        $this->load->library('form_validation');
        $this->load->library('session');
        $data['message'] = $this->session->flashdata('message');
        $data['error'] = $this->session->flashdata('error');

        $this->load->view('header', $data);
        $this->load->view('respond_nomination', $data);
        $this->load->view('footer', $data);
    }

    public function nominationReceive($verb, $volunteerCisID)
    {
        $this->load->library('session');
        $this->load->model('User_model');
        $this->load->model('Email_model');
        
        $volunteer = $this->User_model->getUserByCIS($volunteerCisID);
        $actualManager = $this->User_model->getManager($volunteerCisID);
        $actualStatus = $this->User_model->getManagerStatus($volunteerCisID);
        // Check whether there is a nomination waiting
        if (!empty($actualManager)
         && ($actualManager['username'] == $_SERVER['REMOTE_USER'])
         && ($actualStatus == 'nominated')) {

            // Get user
            $manager = $this->User_model->getUserByCIS($_SERVER['REMOTE_USER']);


            // Don't have to worry about other verbs, only these will be sent through
            $newStatus = 'denied';
            if ($verb == 'confirm') {
                $newStatus = 'confirmed';
            } else if ($verb == 'deny') {
                $newStatus = 'denied';
            }

            // Set status in db
            $this->User_model->setManager($volunteerCisID, $manager['email'], $newStatus);

            // Send email to volunteer
            $substitutions = array();
            $this->Email_model->sendEmail('9_volunteer_manager_success', $volunteer['email'], $substitutions);

            // SUCCESS
            // Set success message
            $this->session->set_flashdata('message', 'You have approved this appointment!');

        } else {
            // FAIL
            $substitutions = array();
            $this->Email_model->sendEmail('9_volunteer_manager_success', $volunteer['email'], $substitutions);

            // Set failure message
            $this->session->set_flashdata('error', 'Your response to that nomination was invalid.');

        }

        // Redirect to nomination page, with either a success or failure message.
        $this->load->helper('url');
        redirect('/respond/nomination');

    }

}