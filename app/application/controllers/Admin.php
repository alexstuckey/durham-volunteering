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
        $this->Audit_model->insertLog('ACCESS', 'Accessing admin: departments');
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
            $this->Audit_model->insertLog('ALTER', 'New department created: ' . $this->input->post('newName'));

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
            $this->Audit_model->insertLog('ALTER', 'Department ' . $this->input->post('id') . ' renamed to: ' . $this->input->post('newName'));

            $this->departments();

        }

    }

    public function notification()
    {
        $this->Audit_model->insertLog('ACCESS', 'Accessing admin: notification');
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
        $this->Audit_model->insertLog('ACCESS', 'Accessing admin: email templates');
        $data['cis_username'] = 'xxxx99';
        $data['active'] = 'admin';
        $data['active_admin'] = 'email_templates';
        $data['page_title'] = 'Admin: email templates';

        $this->load->model('Email_model');
        $data['email_templates'] = $this->Email_model->getAllEmailTemplates();

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
        $this->form_validation->set_rules('emailSubject', 'Email Subject', 'trim|required|max_length[255]');
        $this->form_validation->set_rules('emailContent', 'Email Body', 'trim|required');
        $this->form_validation->set_error_delimiters('<p class="alert alert-danger"><strong>Error: </strong>', '</p>');

        $this->load->library('session');
        if ($this->form_validation->run() == FALSE) {
            $this->session->set_flashdata('error', validation_errors());

            $this->emails();
        } else {
            $this->load->model('Email_model');

            $this->Email_model->updateEmailTemplate($this->input->post('emailName'), $this->input->post('emailSubject'), $this->input->post('emailContent'));

            $this->session->set_flashdata('message', 'Email updated!');
            $this->Audit_model->insertLog('ALTER', 'Email ' . $this->input->post('emailName') . ' edited.');

            $this->emails();

        }
    }

    public function declaration()
    {
        $this->Audit_model->insertLog('ACCESS', 'Accessing admin: departments');
        $data['cis_username'] = 'xxxx99';
        $data['active'] = 'admin';
        $data['active_admin'] = 'declaration';
        $data['page_title'] = 'Admin: declaration';

        $this->load->library('form_validation');
        $this->load->library('session');
        $data['message'] = $this->session->flashdata('message');

        $this->load->model('Admin_model');
        $data['declaration'] = $this->Admin_model->getPersonalDeclaration();

        $this->load->view('header', $data);
        /* place content body chunks within content_open and content_close */
        $this->load->view('content_open', $data);

        $this->load->view('admin_sidebar', $data);
        $this->load->view('admin_8_declaration', $data);

        $this->load->view('content_close', $data);
        $this->load->view('footer', $data);
    }

    public function declarationEdit()
    {

        $this->load->library('form_validation');
        $this->form_validation->set_rules('inputPersonalDeclaration', 'Personal Declaration', 'trim|required');
        $this->form_validation->set_error_delimiters('<p class="alert alert-danger"><strong>Error: </strong>', '</p>');

        $this->load->library('session');
        if ($this->form_validation->run() == FALSE) {
            $this->session->set_flashdata('error', validation_errors());

            $this->declaration();
        } else {
            $this->load->model('Admin_model');

            $this->Admin_model->setPersonalDeclaration($this->input->post('inputPersonalDeclaration'));

            $this->session->set_flashdata('message', 'Edited the Personal Declaration!');
            $this->Audit_model->insertLog('ALTER', 'Edited the Personal Declaration.');

            $this->declaration();
        }

    }

    public function settings()
    {
        $this->Audit_model->insertLog('ACCESS', 'Accessing admin: settings');
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

    public function audit()
    {
        $this->Audit_model->insertLog('ACCESS', 'Accessing admin: audit');
        $data['cis_username'] = 'xxxx99';
        $data['active'] = 'admin';
        $data['active_admin'] = 'audit';
        $data['page_title'] = 'Admin: audit';
        $this->load->view('header', $data);
        /* place content body chunks within content_open and content_close */
        $this->load->view('content_open', $data);

        $data['trail'] = $this->Audit_model->getWholeAuditTrail();

        $this->load->view('admin_sidebar', $data);
        $this->load->view('admin_7_audit', $data);

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
