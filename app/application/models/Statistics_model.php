<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Statistics_model extends CI_Model {


    //Loads the database using the ../config/database.php file
    public function __construct()	{
        $this->load->database();
    }

    public function sumTimeByCause()
    {
        $query = $this->db->query("SELECT organisation, SEC_TO_TIME( SUM( TIME_TO_SEC( TIMEDIFF(finish,start) ) ) ) AS timeSum  FROM times JOIN causes WHERE times.causeID=causes.causeID AND status='completed' GROUP BY causes.organisation");

        return json_encode($query->result_array());
    }

    public function volunteeringTimebyDepartment()
    {
        $query = $this->db->query("SELECT departmentsName, SEC_TO_TIME( SUM( TIME_TO_SEC( TIMEDIFF(finish,start) ) ) ) AS timeSum FROM times join users ON times.cisID=users.cisID join departments ON users.departmentID=departments.ID WHERE status='completed' group by departmentsName");

        return json_encode($query->result_array());
    }

    public function volunteeringTimePersonal($CISID)
    {
        $query = $this->db->query("SELECT cisID, SEC_TO_TIME( SUM( TIME_TO_SEC( TIMEDIFF(finish,start) ) ) ) AS timeSum FROM times WHERE cisID='" . $CISID ."' AND status='confirmed' ");

        $data= $query->result_array();

        return json_encode($data);
    }

    public function totalHoursVolunteered()
    {

        $query = $this->db->query("SELECT SEC_TO_TIME( SUM( TIME_TO_SEC( TIMEDIFF(finish,start) ) ) ) AS timeSum FROM times WHERE status='confirmed' ");

        $data= $query->row_array();

        return json_encode($data);
    }

    public function totalVolunteers()
    {
        $query = $this->db->query("SELECT count(*) FROM users");

        $data= $query->row_array();

        return json_encode($data);
    }

    public function getFavouriteCause($cisID)
    {
        $query = $this->db->query("SELECT cisID, organisation, SEC_TO_TIME( SUM( TIME_TO_SEC( TIMEDIFF(finish,start) ) ) ) AS timeSum  FROM times JOIN causes WHERE times.causeID=causes.causeID AND status='confirmed' AND times.cisID='" . $cisID . "'  GROUP BY causes.organisation order by timeSum desc limit 1");

        $data = $query->row_array();

        return json_encode($data);
    }

    public function positionWithinDepartment($cisID)
    {
        $this->load->model('User_model');

        $department=$this->User_model->getDepartment($cisID);

        $query = $this->db->query("SELECT users.cisID,departmentsName, SEC_TO_TIME( SUM( TIME_TO_SEC( TIMEDIFF(finish,start) ) ) ) AS timeSum FROM times join users ON times.cisID=users.cisID join departments ON users.departmentID=departments.ID WHERE times.status='confirmed' AND departmentsName=\"" .$department."\" group by cisID,departmentsName ORDER BY timeSum desc");

        $data= $query->row_array();

        return json_encode($data);
    }
}
