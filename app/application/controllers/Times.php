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
                $volunteer['fullname'] . ' has requested a shift at ' . $cause . ' from ' . $this->input->post('shiftApplicationDateTimeStart') . ' to ' . $this->input->post('shiftApplicationDateTimeEnd') . '. They have commented: "' . $this->input->post('shiftApplicationComment') . '".' ,
                mdate($format)
            );


            // Send email to volunteer recording their submission
            $this->load->model('Email_model');
            
            $substitutions = array(
                '<Manager Name>' => $manager['fullname'],
                '<Volunteer Name>' => $volunteer['fullname']
                '<Time Start>' => $this->input->post('shiftApplicationDateTimeStart'),
                '<Time End>' => $this->input->post('shiftApplicationDateTimeEnd'),
                '<Cause Organisation>' => $cause['organisation']
            );

            $this->Email_model->sendEmail('3_volunteer_shift_request', $volunteer['email'], $substitutions);

            // Send email to manager to respond to activity time
            $substitutions = array(
                '<Manager Name>' => $manager['fullname'],
                '<Volunteer Name>' => $volunteer['fullname']
                '<Time Start>' => $this->input->post('shiftApplicationDateTimeStart'),
                '<Time End>' => $this->input->post('shiftApplicationDateTimeEnd'),
                '<Cause Organisation>' => $cause['organisation']
            );

            $this->Email_model->sendEmail('8_manager_shift_request', $manager['email'], $substitutions);




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
            $this->load->model('User_model');
            $this->load->model('Cause_model');
            $this->load->model('Notification_model');

            // send notification to manager
            // need to make notification type a template
            // easier to edit/maintain
            $this->load->helper('date');
            $format = "%Y-%m-%d %h:%i %A";

            // get time row of given time ID
            $time = $this->Time_model->getTimeByID('' . $this->input->post('shiftCancelSelect'));

            print_r($time[0]);
            $causeID = $time[0]['causeID'];

            // get cause by its ID
            $cause = $this->Cause_model->getCauseByID($causeID);

            // get cis id of manager of user
            $manager = $this->User_model->getManager($_SERVER['REMOTE_USER']);
            $managerID = $manager['username'];

            // create the notification
            $this->Notification_model->createNotification(
                $managerID,
                'Activity cancelled',
                'User ' . $_SERVER['REMOTE_USER'] . ' has cancelled a shift at ' . $cause . ' from ' . $time[0]['start'] . ' to ' . $time[0]['finish'] . '.',
                mdate($format)
            );

            // delete time row
            $this->Time_model->deleteTime($this->input->post('shiftCancelSelect'));

            $this->session->set_flashdata('message', 'Time cancelled!');
            $this->Audit_model->insertLog('ALTER', 'Time cancelled!');

            $this->load->helper('url');
            //redirect(site_url('/my_volunteering'));
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

            $this->Time_model->changeTimeStatus('shiftResponseSelect', $this->input->post('shiftResponseRadios'));


            // send notification to managee to let them know the response from their manager
            // need to make notification type a template
            // easier to edit/maintain
            $this->load->helper('date');
            $format = "%Y-%m-%d %h:%i %A";

            $this->load->model('User_model');
            $this->load->model('Cause_model');
            $this->load->model('Notification_model');

            $time = $this->Time_model->getTimeByID($this->input->post('shiftResponseSelect'));
            $managee = $time['cisID'];
            $cause = $this->Cause_model->getCauseByID($time['causeID']);

            $this->Notification_model->createNotification(
                $managee,
                'Manager responded to activity application',
                'Your manager has ' . $this->input->post('shiftResponseRadios') . ' your shift at ' . $cause . ' from ' . $time['start'] . ' to ' . $time['end'] . '.',
                mdate($format)
            );


            // TODO send email to managee to let them know the response from their manager


            $this->session->set_flashdata('message', 'Response sent!');
            $this->Audit_model->insertLog('ALTER', 'Activity response sent!');

            $this->load->helper('url');
            redirect(site_url('/manager'));
        }
    }



}
