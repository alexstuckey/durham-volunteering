<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class TeamChallenge extends CI_Controller
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

            // Send email to manager and managee
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


    public function createTeamChallengeFormSubmit()
    {
        $this->load->library('form_validation');
        $this->form_validation->set_rules('teamChallengeApplicationDateTimeStart', 'Team Challenge Start Time', 'trim|required');
        $this->form_validation->set_rules('teamChallengeApplicationDateTimeEnd', 'Team Challenge End Time', 'trim|required');
        $this->form_validation->set_rules('teamChallengeApplicationCause', 'Team Challenge Cause', 'trim|required');
        $this->form_validation->set_rules('teamChallengeApplicationComment', 'Team Challenge Comment', 'trim|required');
        $this->form_validation->set_error_delimiters('<p class="alert alert-danger"><strong>Error: </strong>', '</p>');

        $this->load->library('session');
        if ($this->form_validation->run() == FALSE) {
            $this->session->set_flashdata('error', validation_errors());

            $this->load->helper('url');
            redirect(site_url('/team_challenge'));
        } else {
            $this->load->model('Time_model');
            $this->Time_model->createTime(
                $_SERVER['REMOTE_USER'],
                $this->input->post('teamChallengeApplicationDateTimeStart'),
                $this->input->post('teamChallengeApplicationDateTimeEnd'),
                $this->input->post('teamChallengeApplicationCause'),
                $this->input->post('teamChallengeApplicationComment'),
                'pending',
                1
            );

            // send notification to manager
            $this->load->helper('date');
            $format = "%Y-%m-%d %h:%i %A";

            $this->load->model('User_model');
            $this->load->model('Notification_model');
            $this->load->model('Cause_model');

            $manager = $this->User_model->getManager($_SERVER['REMOTE_USER']);
            $volunteer = $this->User_model->getUserByCIS($_SERVER['REMOTE_USER']);
            $managerCIS = $manager['username'];
            $cause = $this->Cause_model->getCauseByID('' . $this->input->post('teamChallengeApplicationCause'));
            $start = $this->input->post('teamChallengeApplicationDateTimeStart');
            $finish = $this->input->post('teamChallengeApplicationDateTimeEnd');
            $comment = $this->input->post('teamChallengeApplicationComment');

            $this->Notification_model->createNotification(
                $managerCIS,
                'New Team Challenge application',
                $volunteer['fullname'] . ' has requested a Team Challenge at ' . $cause . ' from ' . $start . ' to ' . $finish . 'with description: "' . $comment . '".' ,
                mdate($format)
            );

            // Send email to volunteer recording their submission
            $this->load->model('Email_model');

            $substitutions = array(
                '<Manager Name>' => $manager['fullname'],
                '<Volunteer Name>' => $volunteer['fullname'],
                '<Time Start>' => $this->input->post('teamChallengeApplicationDateTimeStart'),
                '<Time End>' => $this->input->post('teamChallengeApplicationDateTimeEnd'),
                '<Cause Organisation>' => $cause['organisation']
            );

            $this->Email_model->sendEmail('3_volunteer_shift_request', $volunteer['email'], $substitutions);

            // Send email to manager to respond to activity time
            $substitutions = array(
                '<Manager Name>' => $manager['fullname'],
                '<Volunteer Name>' => $volunteer['fullname'],
                '<Time Start>' => $this->input->post('teamChallengeApplicationDateTimeStart'),
                '<Time End>' => $this->input->post('teamChallengeApplicationDateTimeEnd'),
                '<Cause Organisation>' => $cause['organisation']
            );

            $this->Email_model->sendEmail('8_manager_shift_request', $manager['email'], $substitutions);


            $this->session->set_flashdata('message', 'New Team Challenge request entered!');
            $this->Audit_model->insertLog('ALTER', 'New Team Challenge entered!');

            $this->load->helper('url');
            redirect(site_url('/team_challenge'));

        }
    }
}