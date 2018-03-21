<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Admin extends CI_Controller
{

    public function index()
    {
        $data['cis_username'] = 'xxxx99';
        $data['active'] = 'admin';
        $data['active_admin'] = 'settings';
        $this->load->view('header', $data);
        /* place content body chunks within content_open and content_close */
        $this->load->view('content_open', $data);

        $this->load->view('admin_sidebar', $data);
        $this->load->view('admin_test', $data);

        $this->load->view('content_close', $data);
        $this->load->view('footer', $data);
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
        $data['cis_username'] = 'xxxx99';
        $data['active'] = 'admin';
        $data['active_admin'] = 'departments';
        $this->load->view('header', $data);
        /* place content body chunks within content_open and content_close */
        $this->load->view('content_open', $data);

        $this->load->view('admin_sidebar', $data);
        $this->load->view('admin_1_departments', $data);

        $this->load->view('content_close', $data);
        $this->load->view('footer', $data);
    }

    public function notification()
    {
        $data['cis_username'] = 'xxxx99';
        $data['active'] = 'admin';
        $data['active_admin'] = 'notification';
        $this->load->view('header', $data);
        /* place content body chunks within content_open and content_close */
        $this->load->view('content_open', $data);

        $this->load->view('admin_sidebar', $data);
        $this->load->view('admin_2_notification', $data);

        $this->load->view('content_close', $data);
        $this->load->view('footer', $data);

    }

    public function emails()
    {
        $data['cis_username'] = 'xxxx99';
        $data['active'] = 'admin';
        $data['active_admin'] = 'email_templates';
        $this->load->view('header', $data);
        /* place content body chunks within content_open and content_close */
        $this->load->view('content_open', $data);

        $this->load->view('admin_sidebar', $data);
        $this->load->view('admin_3_emails', $data);

        $this->load->view('content_close', $data);
        $this->load->view('footer', $data);

    }

    public function settings()
    {
        $data['cis_username'] = 'xxxx99';
        $data['active'] = 'admin';
        $data['active_admin'] = 'settings';
        $this->load->view('header', $data);
        /* place content body chunks within content_open and content_close */
        $this->load->view('content_open', $data);

        $this->load->view('admin_sidebar', $data);
        $this->load->view('admin_4_settings', $data);

        $this->load->view('content_close', $data);
        $this->load->view('footer', $data);

    }

    public function edit_email()
    {
        $data['cis_username'] = 'xxxx99';
        $data['active'] = 'admin';
        $data['active_admin'] = 'edit_email';
        $this->load->view('header', $data);
        /* place content body chunks within content_open and content_close */
        $this->load->view('content_open', $data);

        $this->load->view('admin_sidebar', $data);
        $this->load->view('admin_5_edit_email', $data);

        $this->load->view('content_close', $data);
        $this->load->view('footer', $data);

    }
}
