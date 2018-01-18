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

        $valid_flag=True;

        $causeExistsFlag=False;


//        $this->load->helper(array('form', 'url'));
//
//        $this->load->library('form_validation');
//
//
//        $this->form_validation->set_rules('cisID', 'Username', 'required');
//        $this->form_validation->set_rules('start', 'StartTime', 'required');
//        $this->form_validation->set_rules('finish', 'FinishTime', 'required');
//        $this->form_validation->set_rules('causeID', 'CauseID', 'required');
//
//
//        if ($this->form_validation->run() == TRUE)
//        {
//            $valid_flag=True;
//        }

        $this->db->where('causeID', $data['causeID']);

        $query = $this->db->get('causes');

        $result=$query->result_array();


        if(sizeof($result)>=1)
        {
            $causeExistsFlag=True;
        }

        if($valid_flag and $causeExistsFlag){

            $this->db->insert('time', $data);


            return True;
        }

        return False;

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
