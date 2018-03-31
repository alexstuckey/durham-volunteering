<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Notification extends CI_Controller {


    public function deleteNotificationSubmit()
    {
        // call model - /deleteNotification
        $this->load->model('Notification_model');

        $this->Notification_model->deleteNotification(
            $this->input->post('notificationDismiss')
        );

        //$this->Audit_model->insertLog('DELETE', 'Notification deleted.');

        $this->load->helper('url');
        redirect(site_url('/home'));

    }
}