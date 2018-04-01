<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Team_Challenge extends CI_Controller
{
    public function joinTeamChallengeFormSubmit()
    {
        $this->load->library('form_validation');
        $this->form_validation->set_rules('joinChallengeButton', 'Team Challenge', 'trim|required');
        $this->form_validation->set_error_delimiters('<p class="alert alert-danger"><strong>Error: </strong>', '</p>');

        $this->load->library('session');
        if ($this->form_validation->run() == FALSE) {
            $this->session->set_flashdata('error', validation_errors());

            $this->load->helper('url');
            redirect(site_url('/team_challenge'));
        } else {

            // join team challenge
            $this->load->model('Time_model');
            $this->Time_model->joinTeamChallenge(
                $_SERVER['REMOTE_USER'],
                $this->input->post('joinChallengeButton')
            );

            // notify manager
            $this->load->helper('date');
            $format = "%Y-%m-%d %h:%i %A";

            $this->load->model('User_model');
            $this->load->model('Notification_model');
            $this->load->model('Cause_model');

            $manager = $this->User_model->getManager($_SERVER['REMOTE_USER']);
            $volunteer = $this->User_model->getUserByCIS($_SERVER['REMOTE_USER']);
            $time = $this->Time_model->getTimeByID($this->input->post('joinChallengeButton'));
            $managerCIS = $manager['username'];
            $causeID = $time['causeID'];
            $cause = $this->Cause_model->getCauseByID($causeID);

            $this->Notification_model->createNotification(
                $managerCIS,
                'Join team challenge application',
                $volunteer['fullname'] . ' has requested to join the team challenge at ' . $cause['organisation'] . ' from ' . $time['start'] . ' to ' . $time['finish'] . '.' ,
                mdate($format)
            );

            // Send email to managee to let them know the response from their manager
            $volunteer = $this->User_model->getUserByCIS($time['cisID']);
            $manager = $this->User_model->getManager($time['cisID']);

            $this->load->model('Email_model');
            $substitutions = array(
                '<Manager Name>' => $manager['fullname'],
                '<Volunteer Name>' => $volunteer['fullname'],
                '<Time Start>' => $time['start'],
                '<Time End>' => $time['finish'],
                '<Cause Organisation>' => $cause['organisation']
            );


            $this->Email_model->sendEmail('3_volunteer_shift_request', $volunteer['email'], $substitutions);
            $this->Email_model->sendEmail('8_manager_shift_request', $manager['email'], $substitutions);

            $this->session->set_flashdata('message', 'Join challenge request sent!');
            $this->Audit_model->insertLog('ALTER', 'Join challenge request!');

            $this->load->helper('url');
            redirect(site_url('/team_challenge'));

        }
    }
}