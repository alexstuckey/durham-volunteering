<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Respond extends CI_Controller {

    // For a manager to confirm a user
    public function nomination()
    {
        $this->load->model('User_model');
        $data['manageesNominated'] = $this->User_model->getManageesNominated($_SERVER['REMOTE_USER']);

        $data['active'] = 'nomination';
        $data['hide_links'] = TRUE;
        $data['page_title'] = 'Nominations - Staff Volunteering Programme';

        $this->load->view('header', $data);
        $this->load->view('respond_nomination', $data);
        $this->load->view('footer', $data);
    }

}