<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Home extends CI_Controller {

	public function homepage()
	{
        $data['cis_username'] = 'xxxx99';
        $data['active'] = 'home';
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
        // load time model
        $this->load->model('Time_model');

        $data['cis_username'] = 'xxxx99';
        $data['active'] = 'volunteering';
        $data['page_title'] = 'My Volunteering';

        // populate times array with data accessed from database with time model for logged in user -- $_SERVER['REMOTE_USER']
        $data['times'] = $this->Time_model->getTimeForCIS('1');

        $this->load->view('header', $data);

        /* place content body chunks within content_open and content_close */
        $this->load->view('content_open', $data);
        $this->load->view('leftside', $data);

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
        $data['cis_username'] = 'xxxx99';
        $data['active'] = 'volunteering';
        $data['page_title'] = 'Activities';
        $this->load->view('header', $data);

        $this->load->model('Cause_model');
        $data['causes'] = $this->Cause_model->getAllCauses();

        /* place content body chunks within content_open and content_close */
        $this->load->view('content_open', $data);
        $this->load->view('leftside', $data);

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
        $data['cis_username'] = 'xxxx99';
        $data['active'] = 'manager';
        $data['page_title'] = 'Activities';
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
        $data['cis_username'] = 'xxxx99';
        $data['active'] = 'manager';
        $data['page_title'] = 'Causes';
        $this->load->view('header', $data);

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
        $data['cis_username'] = 'xxxx99';
        $data['active'] = 'other';
        $data['page_title'] = 'Statistics';
        $this->load->view('header', $data);

        /* place content body chunks within content_open and content_close */
        $this->load->view('content_open', $data);
        $this->load->view('leftside', $data);

        /* place central column html form chunks within centre_column_open and center_column_close */
        $this->load->view('center_column_open', $data);
        $this->load->view('statistics', $data);
        $this->load->view('center_column_close', $data);

        $this->load->view('rightside', $data);
        $this->load->view('content_close', $data);

        $this->load->view('footer', $data);
    }

}
