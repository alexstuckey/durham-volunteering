<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Notification extends CI_Controller {


    public function createNotificationSubmit()
    {
        // call model - /createNotification
        $this->load->model('Notification_model');

        $this->Notification_model->createNotification(
            $_SERVER['REMOTE_USER'],
            'title',
            'blurb',
            'time'
        );

        //$this->Audit_model->insertLog('CREATE', 'Notification created.');

    }

    public function deleteNotificationSubmit()
    {
        // call model - /deleteNotification
        $this->load->model('Notification_model');

        $this->Notification_model->deleteNotification(
            $this->input->post('notificationDismiss')
        );

        //$this->Audit_model->insertLog('DELETE', 'Notification deleted.');



    }
}