<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Onboarding extends CI_Controller {

    public function welcome()
    {
        $this->load->model('User_model');
        $this->load->helper('url');

        if ($this->User_model->isAdmin($_SERVER['REMOTE_USER'])) {
            $data['is_admin'] = TRUE;
        }


        if ($this->User_model->doesUserExist($_SERVER['REMOTE_USER']) && !$this->User_model->isAdmin($_SERVER['REMOTE_USER'])) {
            //echo site_url('/home');
        }

        $this->Audit_model->insertLog('ACCESS', 'Accessing Welcome Page');

        $data['user'] = $this->User_model->getUserByCIS($_SERVER['REMOTE_USER']);

        $data['active'] = 'welcome';
        $data['hide_links'] = TRUE;
        $data['page_title'] = 'Welcome - Staff Volunteering Programme';

        $this->load->view('header', $data);
        $this->load->view('onboarding_1_welcome', $data);
        $this->load->view('footer', $data);

        // Creates user, with a default onboarding status of 1
        $this->User_model->createUser($_SERVER['REMOTE_USER']);
    }

    public function step_details()
    {
        $this->load->model('User_model');
        if (!$this->User_model->doesUserExist($_SERVER['REMOTE_USER'])) {
            $this->Audit_model->insertLog('ACCESS DENIED', 'Onboarding: Accessing Page Denied');
            $this->Audit_model->insertLog('REDIRECT', 'Onboarding: Redirect to Welcome Page');

            $this->load->helper('url');
            redirect('/onboard/welcome');
        }

        $data['user'] = $this->User_model->getUserByCIS($_SERVER['REMOTE_USER']);

        $data['active'] = 'enter_details';
        $data['hide_links'] = TRUE;
        $data['page_title'] = 'Onboarding - Staff Volunteering Programme';

        $this->load->view('header', $data);
        $this->load->view('onboarding_steps', $data);
        $this->load->view('footer', $data);


        $this->User_model->setOnboardingStatus($_SERVER['REMOTE_USER'], 2);

        $this->Audit_model->insertLog('ALTER', 'Onboarding: status updated');
    }

    public function enter_details_form()
    {
        $this->load->model('User_model');
        if (!$this->User_model->doesUserExist($_SERVER['REMOTE_USER'])) {
            $this->load->helper('url');
            redirect('/onboard/welcome');
        }

        $data['user'] = $this->User_model->getUserByCIS($_SERVER['REMOTE_USER']);

        $this->load->model('Departments_model');
        $data['departments'] = $this->Departments_model->getDepartmentsListWithCount();
        $this->load->model('Admin_model');
        $data['declaration'] = $this->Admin_model->getPersonalDeclaration();

        $this->load->helper('form');

        $data['active'] = 'enter_details';
        $data['hide_links'] = TRUE;
        $data['page_title'] = 'Onboarding: Enter Details - Staff Volunteering Programme';

        $this->load->view('header', $data);
        $this->load->view('onboarding_3_enter_details_form', $data);
        $this->load->view('footer', $data);

        $this->User_model->setOnboardingStatus($_SERVER['REMOTE_USER'], 3);

        $this->Audit_model->insertLog('ALTER', 'Onboarding: status updated');
    }

    public function send_details()
    {
        $this->load->model('User_model');
        if (!$this->User_model->doesUserExist($_SERVER['REMOTE_USER'])) {
            $this->load->helper('url');
            redirect('/onboard/welcome');
        }

        $data['user'] = $this->User_model->getUserByCIS($_SERVER['REMOTE_USER']);

        // Form logic
        // Validate
        $this->load->library('form_validation');

        $this->form_validation->set_rules('inputFirstName', 'First Name', 'required');
        $this->form_validation->set_rules('inputLastName', 'Last Name', 'required');
        $this->form_validation->set_rules('inputPersonalDeclaration', 'Personal Declaration acceptance', 'required|in_list[Yes]');
        $this->form_validation->set_rules('inputDataProtection', 'Data Protection acceptance', 'required|in_list[Yes]');

        if ($this->form_validation->run() == FALSE) {
            $this->enter_details_form();
        } else {

            $this->Audit_model->insertLog('ALTER', 'Details updated');

            $data['active'] = 'nominate_manager';
            $data['hide_links'] = TRUE;
            $data['page_title'] = 'Onboarding - Staff Volunteering Programme';

            $this->load->view('header', $data);
            $this->load->view('onboarding_steps', $data);
            $this->load->view('footer', $data);

            $userChanges = array(
                'firstName' => $this->input->post('inputFirstName'),
                'secondName' => $this->input->post('inputLastName')
            );

            $this->User_model->updateUser($_SERVER['REMOTE_USER'], $userChanges);

            $this->User_model->setOnboardingStatus($_SERVER['REMOTE_USER'], 4);
        }
        
    }

    public function enter_nominate_manager_form()
    {
        $this->load->model('User_model');
        if (!$this->User_model->doesUserExist($_SERVER['REMOTE_USER'])) {
            $this->load->helper('url');
            redirect('/onboard/welcome');
        }

        $data['user'] = $this->User_model->getUserByCIS($_SERVER['REMOTE_USER']);

        $this->load->helper('form');

        $data['active'] = 'nominate_manager';
        $data['hide_links'] = TRUE;
        $data['page_title'] = 'Onboarding: Nominate Manager - Staff Volunteering Programme';

        $this->load->view('header', $data);
        $this->load->view('onboarding_5_nominate_manager_form', $data);
        $this->load->view('footer', $data);

        $this->User_model->setOnboardingStatus($_SERVER['REMOTE_USER'], 5);
        $this->Audit_model->insertLog('ALTER', 'Onboarding: Status Updated');

    }

    public function email_check($str)
    {
        $str = str_replace('dur.ac.uk', 'durham.ac.uk', $str);
        $this->load->model('User_model');
        $account = $this->User_model->getUserByEmail($str);
        if (empty($account)) {
            $this->form_validation->set_message('email_check', 'The {field} must be a valid Durham address.');
            return FALSE;
        } else {
            // Check whether that is the user's email
            if ($account['username'] == $_SERVER['REMOTE_USER']) {
                // Trying to set oneself as manager
                $this->form_validation->set_message('email_check', 'The {field} must not be your own.');
                return FALSE;
            } else {
                return TRUE;
            }
        }
    }

    public function send_nominate_manager()
    {
        $this->load->model('User_model');
        if (!$this->User_model->doesUserExist($_SERVER['REMOTE_USER'])) {
            $this->load->helper('url');
            redirect('/onboard/welcome');
        }

        $data['user'] = $this->User_model->getUserByCIS($_SERVER['REMOTE_USER']);

        // Form logic
        // Validate
        $this->load->library('form_validation');

        $this->form_validation->set_rules('inputEmailAddress', 'Email address', 'required|strtolower|valid_email|regex_match[/^[a-zA-Z0-9.!#$%&\'*+=?^_`{|}~-]+@dur(ham)?.ac.uk$/]|callback_email_check');
        $this->form_validation->set_rules('inputComment', 'Comment');

        if ($this->form_validation->run() == FALSE) {
            $data['active'] = 'nominate_manager';
            $data['hide_links'] = TRUE;
            $data['page_title'] = 'Onboarding: Nominate Manager - Staff Volunteering Programme';

            $this->load->view('header', $data);
            $this->load->view('onboarding_5_nominate_manager_form', $data);
            $this->load->view('footer', $data);
        } else {
            // Nominating the manager chosen
            $this->User_model->setManager($_SERVER['REMOTE_USER'], $this->input->post('inputEmailAddress'), 'nominated');
            $this->User_model->setOnboardingStatus($_SERVER['REMOTE_USER'], 6);
            $this->Audit_model->insertLog('ALTER', 'Onboarding: Manager Nominated');



            // Prepare email data
            $this->load->model('Email_model');
            $this->load->helper('url');
            $manager = $this->User_model->getManager($_SERVER['REMOTE_USER']);
            $volunteer = $this->User_model->getUserByCIS($_SERVER['REMOTE_USER']);

            // Then email that manager
            $substitutions = array(
                '<Manager Name>' => $manager['fullname'],
                '<Volunteer Name>' => $volunteer['fullname'],
                '<Respond Link>' => site_url('/respond/nomination/'),
                '<Comment>' => $this->input->post('inputComment')
            );

            $this->Email_model->sendEmail('7_manager_nomination', $manager['email'], $substitutions);

            // Then email the volunteer
            $substitutions = array(
                '<Home Link>' => site_url('/home')
            );
            
            $this->Email_model->sendEmail('1_volunteer_welcome', $volunteer['email'], $substitutions);



            // Load the waiting page
            $this->wait_nominate_manager();
        }

    }

    public function wait_nominate_manager()
    {
        $this->load->model('User_model');
        $data['manager'] = $this->User_model->getManager($_SERVER['REMOTE_USER']);

        $data['active'] = 'wait_nominate_manager';
        if ($this->User_model->getManagerStatus($_SERVER['REMOTE_USER']) == 'confirmed') {
            $data['active'] = 'get_started';
        }
        $data['hide_links'] = TRUE;
        $data['page_title'] = 'Onboarding - Staff Volunteering Programme';

        $this->load->view('header', $data);
        $this->load->view('onboarding_steps', $data);
        $this->load->view('footer', $data);
    }


}
