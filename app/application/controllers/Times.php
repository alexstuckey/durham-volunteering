<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Times extends CI_Controller {

    public function index()
    {
        $this->load->view('welcome_message');
    }

    function is_date_valid($shiftApplicationDateTimeEnd, $shiftApplicationDateTimeStart) {

        if ($shiftApplicationDateTimeStart <  $shiftApplicationDateTimeEnd) {

            $interval = date_diff(date_create($shiftApplicationDateTimeStart), date_create($shiftApplicationDateTimeEnd));
            $minutes = $interval->format('%h') * 60 . $interval->format('%i');

            if (30 <= $minutes) {
                return TRUE;
            }
        }
        $this->form_validation->set_message('is_date_valid', 'The Shift must be at least 30 minutes long.');
        return FALSE;
    }

    public function createFormSubmit()
    {
        $this->load->helper('url');
        $this->load->library('form_validation');
        $this->form_validation->set_rules('shiftApplicationDateTimeStart', 'Shift Start Time', 'trim|required');
        $this->form_validation->set_rules('shiftApplicationDateTimeEnd', 'Shift End Time', 'trim|required|callback_is_date_valid['.$this->input->post('shiftApplicationDateTimeStart').']');
        $this->form_validation->set_rules('shiftApplicationCause', 'Shift Cause', 'trim|required');
        $this->form_validation->set_rules('shiftApplicationComment', 'Shift Comment', 'trim');
        $this->form_validation->set_error_delimiters('<p class="alert alert-danger"><strong>Error: </strong>', '</p>');

        $this->load->library('session');
        if ($this->form_validation->run() == FALSE) {
            $this->session->set_flashdata('error', validation_errors());

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


            // send notification to manager
            // need to make notification type a template
            // easier to edit/maintain
            $this->load->helper('date');
            $format = "%Y-%m-%d %h:%i %A";

            $this->load->model('User_model');
            $this->load->model('Notification_model');
            $this->load->model('Cause_model');

            $manager = $this->User_model->getManager($_SERVER['REMOTE_USER']);
            $volunteer = $this->User_model->getUserByCIS($_SERVER['REMOTE_USER']);
            $managerCIS = $manager['username'];
            $cause = $this->Cause_model->getCauseByID('' . $this->input->post('shiftApplicationCause'));

            $this->Notification_model->createNotification(
                $managerCIS,
                'New activity application',
                $volunteer['fullname'] . ' requested a volunteering request at ' . $cause . ' from ' . $this->input->post('shiftApplicationDateTimeStart') . ' to ' . $this->input->post('shiftApplicationDateTimeEnd') . '. They have commented: "' . $this->input->post('shiftApplicationComment') . '".' ,
                mdate($format)
            );


            // Send email to volunteer recording their submission
            $this->load->model('Email_model');
            
            $substitutions = array(
                '<Manager Name>' => $manager['fullname'],
                '<Volunteer Name>' => $volunteer['fullname'],
                '<Time Start>' => $this->input->post('shiftApplicationDateTimeStart'),
                '<Time End>' => $this->input->post('shiftApplicationDateTimeEnd'),
                '<Cause Organisation>' => $cause['organisation']
            );

            $this->Email_model->sendEmail('3_volunteer_shift_request', $volunteer['email'], $substitutions);

            // Send email to manager to respond to activity time
            $substitutions = array(
                '<Manager Name>' => $manager['fullname'],
                '<Volunteer Name>' => $volunteer['fullname'],
                '<Time Start>' => $this->input->post('shiftApplicationDateTimeStart'),
                '<Time End>' => $this->input->post('shiftApplicationDateTimeEnd'),
                '<Cause Organisation>' => $cause['organisation'],
                '<Respond Link>' => site_url('/manager'),
                '<Comment>' => $this->input->post('shiftApplicationComment')
            );

            $this->Email_model->sendEmail('8_manager_shift_request', $manager['email'], $substitutions);




            $this->session->set_flashdata('message', 'New time entered!');
            $this->Audit_model->insertLog('ALTER', 'New time entered!');

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
            $this->load->model('User_model');
            $this->load->model('Cause_model');
            $this->load->model('Notification_model');

            // send notification to manager
            // need to make notification type a template
            // easier to edit/maintain
            $this->load->helper('date');
            $format = "%Y-%m-%d %h:%i %A";

            // get time row of given time ID
            $time = $this->Time_model->getTimeByTimeID('' . $this->input->post('shiftCancelSelect'));

            $causeID = $time['causeID'];

            // get cause by its ID
            $cause = $this->Cause_model->getCauseByID($causeID);

            // get cis id of manager of user
            $manager = $this->User_model->getManager($_SERVER['REMOTE_USER']);
            $managerID = $manager['username'];

            // create the notification
            $this->Notification_model->createNotification(
                $managerID,
                'Activity cancelled',
                'User ' . $_SERVER['REMOTE_USER'] . ' has cancelled a volunteering request at ' . $cause . ' from ' . $time['start'] . ' to ' . $time['finish'] . '.',
                mdate($format)
            );

            // delete time row
            $this->Time_model->deleteTime($this->input->post('shiftCancelSelect'));

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

            $this->Time_model->changeTimeStatus($this->input->post('shiftResponseSelect'), $this->input->post('shiftResponseRadios'));


            // send notification to managee to let them know the response from their manager
            // need to make notification type a template
            // easier to edit/maintain
            $this->load->helper('date');
            $format = "%Y-%m-%d %h:%i %A";

            $this->load->model('User_model');
            $this->load->model('Cause_model');
            $this->load->model('Notification_model');

            $time = $this->Time_model->getTimeByTimeID($this->input->post('shiftResponseSelect'));
            $managee = $time['cisID'];
            $cause = $this->Cause_model->getCauseByID($time['causeID']);

            $this->Notification_model->createNotification(
                $managee,
                'Manager responded to activity application',
                'Your manager has ' . $this->input->post('shiftResponseRadios') . ' your shift at ' . $cause['organisation'] . ' from ' . $time['start'] . ' to ' . $time['finish'] . '.',
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
                '<Cause Organisation>' => $cause['organisation'],
                '<Comment>' => $this->input->post('shiftResponseComment')
            );

            if ($this->input->post('shiftResponseRadios') == 'confirmed') {
                // Confirmed
                $this->Email_model->sendEmail('5_volunteer_shift_approval', $volunteer['email'], $substitutions);

            } else {
                // Denied
                $this->Email_model->sendEmail('6_volunteer_shift_denial', $volunteer['email'], $substitutions);
            }

            $this->session->set_flashdata('message', 'Response sent!');
            $this->Audit_model->insertLog('ALTER', 'Activity response sent!');

            $this->load->helper('url');
            redirect(site_url('/manager'));
        }
    }

    public function deleteTime($timeID)
    {
        $this->load->model('Time_model');

        $data=$this->Time_model->deleteTime($timeID);
    }

    public function getPastEvents($CISID)
    {
        $this->load->model('Time_model');

        $data=$this->Time_model->getPastEvents($CISID);
    }

    public function getUpcomingEvents($CISID)
    {
        $this->load->model('Time_model');

        $data=$this->Time_model->getUpcomingEvents($CISID);
    }

    public function getOnGoingTeamChallenges()
    {
        $this->load->model('Time_model');

        $data=$this->Time_model->getOngoingTeamChallenges();

    }
}
