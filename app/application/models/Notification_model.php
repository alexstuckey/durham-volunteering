<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Notification_model extends CI_Model {

    //Loads the database using the ../config/database.php file
    public function __construct()	{
        $this->load->database();
    }

    public function getUserNotifications($cisID)
    {
        $this->db->where('userID', $cisID);

        $query = $this->db->get('notifications');

        return $query->result_array();
    }

    public function createNotification($cisID, $title, $blurb, $time)
    {
        $data = array(
            'userID' => $cisID,
            'title' => $title,
            'blurb' => $blurb,
            'time' => $time,
        );

        $this->db->insert('notifications', $data);
    }

    public function deleteNotification($notificationID)
    {
        $this->db->where('notificationID', $notificationID);
        $this->db->delete('notifications');
    }
}
