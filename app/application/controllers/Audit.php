<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Audit extends CI_Controller {

    public function index()
    {
        $this->load->model('Audit_model');

        $data['trail'] = $this->Audit_model->getWholeAuditTrail();

        $this->load->view('audit_page', $data);
    }

}
