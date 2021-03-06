<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Home extends CI_Controller {

    public function homepage()
    {
        $this->load->model('User_model');
        if (!$this->User_model->doesUserExist($_SERVER['REMOTE_USER'])) {
            $this->load->helper('url');
            redirect('/onboard/welcome');
        } else if ($this->User_model->isAdmin($_SERVER['REMOTE_USER'])) {
            $data['is_admin'] = TRUE;
        }

        $this->load->model('Notification_model');
        $data['notifications'] = $this->Notification_model->getUserNotifications($_SERVER['REMOTE_USER']);

        $data['cis_username'] = 'xxxx99';
        $data['active'] = 'home';
        $data['page_title'] = 'Home - Staff Volunteering Programme';
        $this->load->view('header', $data);


        /* place content body chunks within content_open and content_close */
        $this->load->view('content_open', $data);
        $this->load->view('leftside', $data);

        /* place central column html form chunks within centre_column_open and center_column_close */
        $this->load->view('center_column_open', $data);
        $this->load->view('notifications', $data);
        $this->load->view('center_column_close', $data);


        $this->load->view('rightside', $data);
        $this->load->view('content_close', $data);

        $this->load->view('footer', $data);
    }

    public function my_volunteering()
    {
        $this->load->model('User_model');
        if (!$this->User_model->doesUserExist($_SERVER['REMOTE_USER'])) {
            $this->load->helper('url');
            redirect('/onboard/welcome');
        } else if ($this->User_model->isAdmin($_SERVER['REMOTE_USER'])) {
            $data['is_admin'] = TRUE;
        }

        // load time model
        $this->load->model('Time_model');
        $this->load->model('Cause_model');

        $data['cis_username'] = 'xxxx99';
        $data['active'] = 'volunteering';
        $data['page_title'] = 'My Volunteering - Staff Volunteering Programme';

        $data['upcoming_times'] = $this->Time_model->getUpcomingEvents($_SERVER['REMOTE_USER']);
        $data['previous_times'] = $this->Time_model->getPastEvents($_SERVER['REMOTE_USER']);
        $data['causes'] = $this->Cause_model->getAllCauses();
        $data['number_of_times'] = array(
            'pending' => 0,
            'upcoming_confirmed' => 0,
            'previous_confirmed' => 0,
            'denied' => 0
        );
        foreach ($data['upcoming_times'] as $time) {
            if ($time['status'] == 'pending') {
                $data['number_of_times']['pending'] += 1;
            } elseif ($time['status'] == 'confirmed') {
                $data['number_of_times']['upcoming_confirmed'] += 1;
            } elseif ($time['status'] == 'denied') {
                $data['number_of_times']['denied'] += 1;
            }
        }

        foreach ($data['previous_times'] as $time) {
            if ($time['status'] == 'confirmed') {
                $data['number_of_times']['previous_confirmed'] += 1;
            }
        }

        $this->load->view('header', $data);

        /* place content body chunks within content_open and content_close */
        $this->load->view('content_open', $data);
        $this->load->view('leftside', $data);

        $this->load->library('session');
        $data['message'] = $this->session->flashdata('message');
        $data['error'] = $this->session->flashdata('error');

        /* place central column html form chunks within centre_column_open and center_column_close */
        $this->load->view('center_column_open', $data);
        $this->load->view('my_volunteering', $data);
        $this->load->view('center_column_close', $data);

        $this->load->view('rightside', $data);
        $this->load->view('content_close', $data);

        $this->load->view('footer', $data);
    }

    public function my_volunteering_activities()
    {
        $this->load->model('User_model');
        if (!$this->User_model->doesUserExist($_SERVER['REMOTE_USER'])) {
            $this->load->helper('url');
            redirect('/onboard/welcome');
        } else if ($this->User_model->isAdmin($_SERVER['REMOTE_USER'])) {
            $data['is_admin'] = TRUE;
        }

        $this->load->model('User_model');
        if (!$this->User_model->doesUserExist($_SERVER['REMOTE_USER'])) {
            $this->load->helper('url');
            redirect('/onboard/welcome');
        } else if ($this->User_model->isAdmin($_SERVER['REMOTE_USER'])) {
            $data['is_admin'] = TRUE;
        }

        $data['cis_username'] = 'xxxx99';
        $data['active'] = 'volunteering';
        $data['page_title'] = 'Activities - Staff Volunteering Programme';
        $this->load->view('header', $data);

        $this->load->model('Time_model');
        $this->load->model('Cause_model');

        $data['upcoming_times'] = $this->Time_model->getUpcomingEvents($_SERVER['REMOTE_USER']);
        $data['causes'] = $this->Cause_model->getAllCauses();

        $this->load->helper('date');
        $format = "%Y-%m-%dT%H:%i";
        $data['date'] = mdate($format);

        /* place content body chunks within content_open and content_close */
        $this->load->view('content_open', $data);
        $this->load->view('leftside', $data);

        $this->load->library('form_validation');
        $this->load->library('session');
        $data['message'] = $this->session->flashdata('message');
        $data['error'] = $this->session->flashdata('error');

        /* place central column html form chunks within centre_column_open and center_column_close */
        $this->load->view('center_column_open', $data);
        $this->load->view('volunteering', $data);
        $this->load->view('center_column_close', $data);

        $this->load->view('rightside', $data);
        $this->load->view('content_close', $data);

        $this->load->view('footer', $data);
    }

    public function manager_approve_deny()
    {
        $this->load->model('User_model');
        if (!$this->User_model->doesUserExist($_SERVER['REMOTE_USER'])) {
            $this->load->helper('url');
            redirect('/onboard/welcome');
        } else if ($this->User_model->isAdmin($_SERVER['REMOTE_USER'])) {
            $data['is_admin'] = TRUE;
        }

        $data['cis_username'] = 'xxxx99';
        $data['active'] = 'manager';
        $data['page_title'] = 'Respond to Applications - Staff Volunteering Programme';

        $this->load->library('form_validation');
        $this->load->library('session');
        $data['message'] = $this->session->flashdata('message');
        $data['error'] = $this->session->flashdata('error');

        $this->load->model('User_model');
        $this->load->model('Time_model');
        $this->load->model('Cause_model');

        $data['managees'] = $this->User_model->getManagees($_SERVER['REMOTE_USER']);
        $data['manageesNominated'] = $this->User_model->getManageesNominated($_SERVER['REMOTE_USER']);
        foreach ($data['managees'] as $key => $managee) {
            $data['managees'][$key]['times'] = $this->Time_model->getTimesPendingForCIS($managee['cisID']);
            $data['managees'][$key]['timesUpcoming'] = $this->Time_model->getUpcomingEvents($managee['cisID']);
        }
        
        $data['causes'] = $this->Cause_model->getAllCauses();


        $this->load->view('header', $data);

        /* place content body chunks within content_open and content_close */
        $this->load->view('content_open', $data);
        $this->load->view('leftside', $data);

        /* place central column html form chunks within centre_column_open and center_column_close */
        $this->load->view('center_column_open', $data);
        $this->load->view('manager_approve_deny', $data);
        $this->load->view('center_column_close', $data);

        $this->load->view('rightside', $data);
        $this->load->view('content_close', $data);

        $this->load->view('footer', $data);
    }

    public function single_cause()
    {
        $this->load->model('User_model');
        if (!$this->User_model->doesUserExist($_SERVER['REMOTE_USER'])) {
            $this->load->helper('url');
            redirect('/onboard/welcome');
        } else if ($this->User_model->isAdmin($_SERVER['REMOTE_USER'])) {
            $data['is_admin'] = TRUE;
        }

        $data['cis_username'] = 'xxxx99';
        $data['active'] = 'manager';
        $data['page_title'] = 'Causes - Staff Volunteering Programme';
        $this->load->view('header', $data);

        $this->load->model('Cause_model');
        $data['causes'] = $this->Cause_model->getAllCauses();

        /* place content body chunks within content_open and content_close */
        $this->load->view('content_open', $data);
        $this->load->view('leftside', $data);

        /* place central column html form chunks within centre_column_open and center_column_close */
        $this->load->view('center_column_open', $data);
        $this->load->view('cause_select', $data);
        $this->load->view('center_column_close', $data);

        $this->load->view('rightside', $data);
        $this->load->view('content_close', $data);

        $this->load->view('footer', $data);
    }

    public function statistics()
    {
        $this->load->model('User_model');
        if (!$this->User_model->doesUserExist($_SERVER['REMOTE_USER'])) {
            $this->load->helper('url');
            redirect('/onboard/welcome');
        } else if ($this->User_model->isAdmin($_SERVER['REMOTE_USER'])) {
            $data['is_admin'] = TRUE;
        }

        $data['cis_username'] = 'xxxx99';
        $data['active'] = 'other';
        $data['page_title'] = 'Statistics - Staff Volunteering Programme';
        $this->load->view('header', $data);

        $this->load->model('Statistics_model');
        $data['sumTimeByCause'] = $this->Statistics_model->sumTimeByCause();
        $data['volunteeringTimeByDepartment'] = $this->Statistics_model->volunteeringTimebyDepartment();
        $data['volunteeringTimePersonal'] = $this->Statistics_model->volunteeringTimePersonal($_SERVER['REMOTE_USER']);
        $data['totalHoursVolunteered'] = $this->Statistics_model->totalHoursVolunteered();
        $data['totalVolunteers'] = $this->Statistics_model->totalVolunteers();
        $data['getFavouriteCause'] = $this->Statistics_model->getFavouriteCause($_SERVER['REMOTE_USER']);
        $data['positionWithinDepartment'] = $this->Statistics_model->positionWithinDepartment($_SERVER['REMOTE_USER']);

        /* place content body chunks within content_open and content_close */
        //$this->load->view('content_open', $data);
        //$this->load->view('leftside', $data);

        /* place central column html form chunks within centre_column_open and center_column_close */
        //$this->load->view('center_column_open', $data);
        $this->load->view('statistics', $data);
        //$this->load->view('center_column_close', $data);

        //$this->load->view('rightside', $data);
        //$this->load->view('content_close', $data);

        $this->load->view('footer', $data);
    }

    public function team_challenge()
    {
        $this->load->model('User_model');
        if (!$this->User_model->doesUserExist($_SERVER['REMOTE_USER'])) {
            $this->load->helper('url');
            redirect('/onboard/welcome');
        } else if ($this->User_model->isAdmin($_SERVER['REMOTE_USER'])) {
            $data['is_admin'] = TRUE;
        }

        $data['cis_username'] = 'xxxx99';
        $data['active'] = 'team_challenge';
        $data['page_title'] = 'Team Challenge - Staff Volunteering Programme';
        $this->load->view('header', $data);

        $this->load->model('Time_model');
        $this->load->model('Cause_model');

        $data['teamChallenges'] = $this->Time_model->getOngoingTeamChallenges();
        $data['causes'] = $this->Cause_model->getAllCauses();

        $this->load->helper('date');
        $format = "%Y-%m-%dT%H:%i";
        $data['date'] = mdate($format);

        /* place content body chunks within content_open and content_close */
        $this->load->view('content_open', $data);
        $this->load->view('leftside', $data);

        $this->load->library('form_validation');
        $this->load->library('session');
        $data['message'] = $this->session->flashdata('message');
        $data['error'] = $this->session->flashdata('error');

        /* place central column html form chunks within centre_column_open and center_column_close */
        $this->load->view('center_column_open', $data);
        $this->load->view('team_challenge', $data);
        $this->load->view('center_column_close', $data);

        $this->load->view('rightside', $data);
        $this->load->view('content_close', $data);

        $this->load->view('footer', $data);
    }

}
