<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Notifications_Model extends CI_Model {


    //Loads the database using the ../config/database.php file
    public function __construct()	{
        $this->load->database();
    }

    public function getNotifications($cisID)
    {

        $this->db->where('userID', $cisID);

        $query = $this->db->get('notifications');

        $result = $query->result_array();

        return $result;

    }

    public function createNotification($data)
    {
        return $this->db->insert('notifications', $data);


    }

    public function deleteNotification($notificationID)
    {
        $this->db->where('notificationID', $notificationID);
        return $this->db->delete('notifications');
    }


}
