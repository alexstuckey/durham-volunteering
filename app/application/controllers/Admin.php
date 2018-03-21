<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Admin extends CI_Controller
{

    public function index()
    {
        $data['cis_username'] = 'xxxx99';
        $data['active'] = 'admin';
        $data['active_admin'] = 'settings';
        $data['page_title'] = 'Admin index';
        $this->load->view('header', $data);
        /* place content body chunks within content_open and content_close */
        $this->load->view('content_open', $data);

        $this->load->view('admin_sidebar', $data);
        // $this->load->view('admin_test', $data);

        $this->load->model('Departments_model');
        print_r($this->Departments_model->getDepartmentsListWithCount());

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

    }

    public function departments()
    {
        $data['cis_username'] = 'xxxx99';
        $data['active'] = 'admin';
        $data['active_admin'] = 'departments';
        $data['page_title'] = 'Admin: departments';

        $this->load->library('form_validation');
        $this->load->library('session');
        $data['message'] = $this->session->flashdata('message');

        $this->load->model('Departments_model');
        $data['departments'] = $this->Departments_model->getDepartmentsListWithCount();

        $this->load->view('header', $data);
        /* place content body chunks within content_open and content_close */
        $this->load->view('content_open', $data);

        $this->load->view('admin_sidebar', $data);
        $this->load->view('admin_1_departments', $data);

        $this->load->view('content_close', $data);
        $this->load->view('footer', $data);
    }

    public function departmentAdd()
    {

        $this->load->library('form_validation');
        $this->form_validation->set_rules('newName', 'Department Name', 'trim|required|max_length[45]');
        $this->form_validation->set_error_delimiters('<p class="alert alert-danger"><strong>Error: </strong>', '</p>');

        $this->load->library('session');
        if ($this->form_validation->run() == FALSE) {
            $this->session->set_flashdata('error', validation_errors());

            $this->departments();
        } else {
            $this->load->model('Departments_model');

            $this->Departments_model->newDepartment($this->input->post('newName'));

            $this->session->set_flashdata('message', 'New department created!');

            $this->departments();

        }

    }

    public function departmentEdit()
    {

        $this->load->library('form_validation');
        $this->form_validation->set_rules('newName', 'Department Name', 'trim|required|max_length[45]');
        $this->form_validation->set_error_delimiters('<p class="alert alert-danger"><strong>Error: </strong>', '</p>');

        $this->load->library('session');
        if ($this->form_validation->run() == FALSE) {
            $this->session->set_flashdata('error', validation_errors());

            $this->departments();
        } else {
            $this->load->model('Departments_model');

            $this->Departments_model->editDepartment($this->input->post('id'), $this->input->post('newName'));

            $this->session->set_flashdata('message', 'Department renamed to ' . $this->input->post('newName') . '!');

            $this->departments();

        }

    }

    public function notification()
    {
        $data['cis_username'] = 'xxxx99';
        $data['active'] = 'admin';
        $data['active_admin'] = 'notification';
        $data['page_title'] = 'Admin: notification';
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
        $data['page_title'] = 'Admin: email templates';

        $this->load->model('Admin_model');
        $data['email_templates'] = $this->Admin_model->returnEmailTemplates();

        $this->load->library('form_validation');
        $this->load->library('session');
        $data['message'] = $this->session->flashdata('message');

        $this->load->view('header', $data);
        /* place content body chunks within content_open and content_close */
        $this->load->view('content_open', $data);

        $this->load->view('admin_sidebar', $data);
        $this->load->view('admin_3_emails', $data);

        $this->load->view('content_close', $data);
        $this->load->view('footer', $data);

    }

    public function emailsEdit()
    {
        $this->load->library('form_validation');
        $this->form_validation->set_rules('emailContent', 'Email Body', 'trim|required');
        $this->form_validation->set_error_delimiters('<p class="alert alert-danger"><strong>Error: </strong>', '</p>');

        $this->load->library('session');
        if ($this->form_validation->run() == FALSE) {
            $this->session->set_flashdata('error', validation_errors());

            $this->emails();
        } else {
            $this->load->model('Admin_model');

            $this->Admin_model->updateEmailTemplates($this->input->post('emailName'), $this->input->post('emailContent'));

            $this->session->set_flashdata('message', 'Email body updated!');

            $this->emails();

        }
    }

    public function settings()
    {
        $data['cis_username'] = 'xxxx99';
        $data['active'] = 'admin';
        $data['active_admin'] = 'settings';
        $data['page_title'] = 'Admin: settings';
        $this->load->view('header', $data);
        /* place content body chunks within content_open and content_close */
        $this->load->view('content_open', $data);

        $this->load->view('admin_sidebar', $data);
        $this->load->view('admin_4_settings', $data);

        $this->load->view('content_close', $data);
        $this->load->view('footer', $data);

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


    public function disableEnable()
    {
        $this->load->model('Admin_model');
        $websiteEnabled = $this->input->post('websiteEnabled');
        $this->Admin_model->updateWebsiteStatus($websiteEnabled);


        $data['cis_username'] = 'xxxx99';
        $data['active'] = 'admin';
        $data['active_admin'] = 'edit_email';
        $data['page_title'] = 'Admin: edit email';
        $this->load->view('header', $data);
        /* place content body chunks within content_open and content_close */
        $this->load->view('content_open', $data);

        $this->load->view('admin_sidebar', $data);
        $this->load->view('admin_5_edit_email', $data);

        $this->load->view('content_close', $data);
        $this->load->view('footer', $data);
    }
}
