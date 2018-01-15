<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Time_model extends CI_Model {

    //Loads the database using the ../config/database.php file
    public function __construct()	{
        $this->load->database();
    }

    //Returns a time row when the argument givens matches the timeID.
    public function getTimeByID($timeID)
    {
        $this->db->where('timeID', $timeID);

        $query = $this->db->get('time');

        return $query->result_array();
    }

//  Takes an array of the form
//  $data = array(
// 'cisID' => 'cisID',
// 'start' => 'start Time',
// 'finish' => 'finish Time',
// 'causeID' => 'causeID'
// );
// Inserts into 'time' table in the database.
    public function createTime($data)
    {

            $this->db->insert('time', $data);

    }

    // Returns an array of Time Rows to which the CisID is associated
    public function getTimeForCIS($CISID)
    {


        $this->db->where('cisID', $CISID);

        $query = $this->db->get('time');

        return $query->result_array();


    }

    // Returns an array of Time Rows to which the causeID is associated
    public function getTimeForCause($causeID)
    {


        $this->db->where('causeID', $causeID);

        $query = $this->db->get('time');

        return $query->result_array();

    }

}
