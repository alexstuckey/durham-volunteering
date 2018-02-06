<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Home extends CI_Controller {

	public function homepage()
	{
		$data['cis_username'] = 'xxxx99';
		$this->load->view('header', $data);

		/* place content body chunks within content_open and content_close */
        $this->load->view('content_open', $data);
        $this->load->view('leftside', $data);

        /* place central column html form chunks within centre_column_open and center_column_close */
        $this->load->view('center_column_open', $data);
        $this->load->view('notifications', $data);
        $this->load->view('volunteering', $data);
        $this->load->view('manager_approve_deny', $data);
        $this->load->view('other_section', $data);
        $this->load->view('center_column_close', $data);


        $this->load->view('rightside', $data);
        $this->load->view('content_close', $data);

		$this->load->view('footer', $data);
	}

}
