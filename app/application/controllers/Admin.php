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

    }

    public function departments()
    {


        $this->load->view('admin_1_departments');
    }

    public function notification()
    {
        $this->load->view('admin_2_notification');
    }

    public function emails()
    {
        $this->load->view('admin_3_emails');
    }

    public function settings()
    {
        $this->load->view('admin_4_settings');
    }

    public function turnResultsIntoAssociative($results)

    {
        $field_data=array();


        foreach ($results as $arr){

        foreach ($arr as $key => $value){

            $field_data[$key]=$value;
            
        }

        }

        return $field_data;

    }


    public function edit_email1()
    {
        $this->load->model('Admin_model');
        $emailTemplates = $this->Admin_model->returnEmailTemplates();

        $data=$this->turnResultsIntoAssociative($emailTemplates);

        $this->load->view('admin_1_edit_email',$data);


    }

    public function edit_email2()
    {
        $this->load->model('Admin_model');
        $emailTemplates = $this->Admin_model->returnEmailTemplates();

        $data=$this->turnResultsIntoAssociative($emailTemplates);

        $this->load->view('admin_5_edit_email',$data);


    }

    public function edit_email3()
    {
        $this->load->model('Admin_model');
        $emailTemplates = $this->Admin_model->returnEmailTemplates();

        $data=$this->turnResultsIntoAssociative($emailTemplates);

        $this->load->view('admin_3_edit_email',$data);


    }

    public function edit_email4()
    {
        $this->load->model('Admin_model');
        $emailTemplates = $this->Admin_model->returnEmailTemplates();

        $data=$this->turnResultsIntoAssociative($emailTemplates);

        $this->load->view('admin_4_edit_email',$data);


    }

    public function edit_email5()
    {
        $this->load->model('Admin_model');
        $emailTemplates = $this->Admin_model->returnEmailTemplates();

        $data=$this->turnResultsIntoAssociative($emailTemplates);

        $this->load->view('admin_5_edit_email',$data);


    }


    public function update_email()

    {

        $this->load->model('Admin_model');

        $editedEmail = $this->input->post('completed');

        $emailName=$editedEmail['emailName'];
        $emailContent=$editedEmail['emailContent'];

        $this->Admin_model->updateEmailTemplates($emailName,$emailContent);

    }

}
