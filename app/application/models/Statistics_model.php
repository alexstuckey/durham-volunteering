<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Statistics_model extends CI_Model {


    //Loads the database using the ../config/database.php file
    public function __construct()	{
        $this->load->database();
    }

    public function sumTimeByCause()
    {


    $query = $this->db->query("SELECT organisation, SEC_TO_TIME( SUM( TIME_TO_SEC( TIMEDIFF(finish,start) ) ) ) AS timeSum  FROM Pnbsg97_Durham_Outreach_v1.1.time JOIN causes WHERE time.causeID=causes.causeID AND status='completed' GROUP BY causes.organisation");

    return $query->result_array();

    }

    public function volunteeringTimebyDepartment()
    {

    $query = $this->db->query("SELECT departmentsName, SEC_TO_TIME( SUM( TIME_TO_SEC( TIMEDIFF(finish,start) ) ) ) AS timeSum FROM Pnbsg97_Durham_Outreach_v1.1.time join users ON time.cisID=users.cisID join departments ON users.departmentID=departments.ID WHERE status='completed' group by departmentsName");

    return $query->result_array();

    }

    public function volunteeringTimePersonal($CISID)

    {
        $query = $this->db->query("SELECT cisID, SEC_TO_TIME( SUM( TIME_TO_SEC( TIMEDIFF(finish,start) ) ) ) AS timeSum FROM Pnbsg97_Durham_Outreach_v1.1.time WHERE cisID=" . $CISID ."AND status='completed' ");

        $data= $query->result_array();

        return $data;

    }

    public function totalHoursVolunteered()
    {
        $query = $this->db->query("SELECT SEC_TO_TIME( SUM( TIME_TO_SEC( TIMEDIFF(finish,start) ) ) ) AS timeSum FROM Pnbsg97_Durham_Outreach_v1.1.time WHERE status='completed' ");
        $data= $query->row_array();


        return $data;

    }

    public function totalVolunteers()
    {
        $query = $this->db->query("SELECT count(*) FROM Pnbsg97_Durham_Outreach_v1.1.users");
        $data= $query->row_array();

        return $data;

    }

    public function getFavouriteCause($cisID)
    {
        $query = $this->db->query("SELECT cisID, organisation, SEC_TO_TIME( SUM( TIME_TO_SEC( TIMEDIFF(finish,start) ) ) ) AS timeSum  FROM Pnbsg97_Durham_Outreach_v1.1.time JOIN causes WHERE time.causeID=causes.causeID AND status='completed' AND ". $cisID . "=time.cisID  GROUP BY causes.organisation order by timeSum desc limit 1");

        $data= $query->row_array(); 

        return $data;
    }

    public function positionWithinDepartment($cisID)
    {

        $this->load->model('User_model');

        $department=$this->User_model->getDepartment($cisID);

        $query = $this->db->query("SELECT users.cisID,departmentsName, SEC_TO_TIME( SUM( TIME_TO_SEC( TIMEDIFF(finish,start) ) ) ) AS timeSum FROM Pnbsg97_Durham_Outreach_v1.1.time join users ON time.cisID=users.cisID join departments ON users.departmentID=departments.ID WHERE time.status='completed' AND departmentsName=\"" .$department."\" group by cisID,departmentsName ORDER BY timeSum desc");

        $data= $query->row_array();

        return $data;
    }
}
