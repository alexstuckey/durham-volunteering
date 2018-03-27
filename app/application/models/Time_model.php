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
    public function createTime($CISID, $start, $end, $causeID, $comment, $status,$teamChallenge=False)
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
                'teamChallenge' => $teamChallenge
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

    public function deleteTime($timeID)
    {

        $this->db->where('timeID', $timeID);
        $this->db->delete('time');
    }

    // Returns an array of Time Rows to which the causeID is associated
    public function getTimeForCause($causeID)
    {


        $this->db->where('causeID', $causeID);

        $query = $this->db->get('time');

        return $query->result_array();

    }

    //Get all teamChallenges
    public function getTeamChallenges()
    {

        $this->db->where('teamChallenge', 1);

        $query = $this->db->get('time');

        return $query->result_array();

    }



    public function joinTeamChallenge($timeID,$joiningCisID)

    {
        $this->db->where('timeID', $timeID);

        $query = $this->db->get('time');

        $result=$query->row_array();

        $searchQuery=$result;

        unset($searchQuery['timeID']);
        unset($searchQuery['comment']);
        unset($searchQuery['status']);
        unset($searchQuery['teamChallenge']);

        $searchQuery['cisID']=$joiningCisID;

        $this->load->model('Time_model');

        $this->db->like($searchQuery);

        $found=$this->db->get('time');

        if($found->num_rows())
        {

            return 0;
        }

        else{
            $this->Time_model->createTime($joiningCisID, $result['start'], $result['finish'], $result['causeID'], $result['comment'], $result['status']);
            return 1;
        }

    }

    //Returns an array of CisIDs on a TeamChallenge
    public function getParticipantsOfTeamChallenge($timeID)
    {

        $this->db->where('timeID', $timeID);

        $query = $this->db->get('time');

        $searchQuery=$query->row_array();

        unset($searchQuery['timeID']);
        unset($searchQuery['cisID']);
        unset($searchQuery['comment']);
        unset($searchQuery['status']);
        unset($searchQuery['teamChallenge']);

        $this->db->like($searchQuery);

        $results=$this->db->get('time');

        $results=$results->result_array();


        $cisArray=array();

        foreach ($results as $value){

            array_push($cisArray,$value['cisID']);

        }

        return $cisArray;

    }

}
