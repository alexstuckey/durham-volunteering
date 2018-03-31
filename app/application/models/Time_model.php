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

        $query = $this->db->get('times');

        return $query->result_array();
    }

    // Inserts into 'time' table in the database.
    public function createTime($CISID, $start, $end, $causeID, $comment, $status, $teamChallenge = False)
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

            $this->db->insert('times', $data);
        }

    }

    // delete time row where row id = $TimeID
    public function deleteTime($timeID)
    {
        $this->db->where('timeID', $timeID);
        $this->db->delete('times');
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
        $this->db->where('teamChallenge', False);

        $query = $this->db->get('times');

        return $query->result_array();
    }


    // Returns an array of Time Rows to which the causeID is associated
    public function getTimeForCause($causeID)
    {
        $this->db->where('causeID', $causeID);

        $query = $this->db->get('times');

        return $query->result_array();
    }

    // Duplicate the original, and re-attach to the db
    public function joinTeamChallenge($CISID, $timeID, $status = 'pending')
    {
        $this->db->where('timeID', $timeID);
        $query = $this->db->get('times');
        $originalTime = $query->row_array();

        if (!empty($originalTime)) {
            $data = array(
                'cisID' => $CISID,
                'start' => $originalTime['start'],
                'finish' => $originalTime['finish'],
                'causeID' => $originalTime['causeID'],
                'status' => $status,
                'comment' => $originalTime['comment'],
                'teamChallenge' => False
            );

            $this->db->insert('times', $data);
        }
    }

    public function getTeamChallenges()
    {
        $this->db->where('teamChallenge', True);
        $query = $this->db->get('times');

        return $query->result_array();
    }


    //Returns an array of CisIDs on a TeamChallenge
    public function getParticipantsOfTeamChallenge($timeID)
    {

        $this->db->where('timeID', $timeID);

        $query = $this->db->get('times');

        $searchQuery=$query->row_array();

        unset($searchQuery['timeID']);
        unset($searchQuery['cisID']);
        unset($searchQuery['comment']);
        unset($searchQuery['status']);
        unset($searchQuery['teamChallenge']);

        $this->db->like($searchQuery);

        $results=$this->db->get('times');

        $results=$results->result_array();


        $cisArray=array();

        foreach ($results as $value){

            array_push($cisArray,$value['cisID']);

        }

        return $cisArray;

    }

}
