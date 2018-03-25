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

// Inserts into 'time' table in the database.
    public function createTime($CISID, $start, $end, $causeID, $comment, $status)
    {
        $this->db->where('causeID', $causeID);
        $query = $this->db->get('causes');
        $cause = $query->row_array();

        $causeExists = False;

        if(!empty($cause))
        {
            $causeExists = True;
        }


        if ($causeExists) {
            $data = array(
                'cisID' => $CISID,
                'start' => $start,
                'finish' => $end,
                'causeID' => $causeID,
                'status' => $status,
                'comment' => $comment,
                'teamChallenge' => False
            );

            $this->db->insert('time', $data);
        }

    }

    public function changeTimeStatus($timeID, $status)
    {
        $this->db->where('timeID', $timeID);
        $data = array(
            'status' => $status
        );
        $this->db->update('disabled', $data);
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

    public function getTeamChallenges()
    {


        $this->db->where('teamChallenge', 1);

        $query = $this->db->get('time');

        return $query->result_array();

    }




}
