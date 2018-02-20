<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Admin extends CI_Controller
{

    public function index()
    {
        echo 'Found';
    }


//    Returns an associative array with all the relevant data for the admin page, including email templates and if the website
//    is disabled. The keys for the emails are: welcomeVolunteer,onBoardingComplete,volunteerShiftRequest,volunteerShiftReminder,volunteerShiftApproval
//    volunteerShiftDenial,managerNomination, managerShiftRequest and websiteDisabled for if the website is deactivated or not.
    public function dashboard()
    {


        $this->load->model('Admin_model');
        $emailTemplates = $this->Admin_model->returnEmailTemplates();
        $disabled=$this->Admin_model->isDisabled();
        $data=array_merge($emailTemplates[0],$disabled);

//        $this->load->view('adminpage', $data);




    }

    public function departments()
    {
        $this->load->view('admin_1_departments');
    }

    public function notifcation()
    {
        $this->load->view('admin_2_notifcation');
    }

    public function emails()
    {
        $this->load->view('admin_3_emails');
    }

    public function settings()
    {
        $this->load->view('admin_4_settings');
    }

    public function edit_email()
    {
        $this->load->view('admin_5_edit_email');
    }
}
