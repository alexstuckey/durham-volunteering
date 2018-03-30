<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Statistics_model extends CI_Model {


    //Loads the database using the ../config/database.php file
    public function __construct()	{
        $this->load->database();
    }

    //Returns an ORDERED array with each causes and it's total hours. Starts with the cause with the most hours.

    public function sumTimeByCause()
    {

        $query = $this->db->query("SELECT organisation, SEC_TO_TIME( SUM( TIME_TO_SEC( TIMEDIFF(finish,start) ) ) ) AS timeSum  FROM times JOIN causes WHERE times.causeID=causes.causeID AND status='confirmed' GROUP BY causes.organisation ORDER BY timeSum DESC ");

        return $query->result_array();

    }

    //Returns an ORDERED array with each department and it's total hours. Starts with the department with the most hours.
    public function volunteeringTimebyDepartment()
    {

        $query = $this->db->query("SELECT departmentsName, SEC_TO_TIME( SUM( TIME_TO_SEC( TIMEDIFF(finish,start) ) ) ) AS timeSum FROM times join users ON times.cisID=users.cisID join departments ON users.departmentID=departments.ID WHERE status='confirmed' group by departmentsName ORDER BY timeSum DESC");

        return $query->result_array();

    }

    //Returns your personal count of hours as a string
    public function volunteeringTimePersonal($CISID)

    {
        $query = $this->db->query("SELECT cisID, SEC_TO_TIME( SUM( TIME_TO_SEC( TIMEDIFF(finish,start) ) ) ) AS timeSum FROM times WHERE cisID=" . $CISID ." AND status='confirmed' ");

        $data= $query->result_array();

        return (string) $data[0]['timeSum'];

    }

    //Returns the total number of hours volunteered across all users as a string
    public function totalHoursVolunteered()
    {
        $query = $this->db->query("SELECT SEC_TO_TIME( SUM( TIME_TO_SEC( TIMEDIFF(finish,start) ) ) ) AS timeSum FROM times WHERE status='confirmed' ");
        $data= $query->row_array();

        return (string) $data['timeSum'];
    }

    //Returns a string of the number of volunteers
    public function totalVolunteers()
    {
        $query = $this->db->query("SELECT count(*) FROM users");
        $data= $query->row_array();

        return (string) $data['count(*)'];

    }

    //Returns a string of your favourite cause name
    public function getFavouriteCause($cisID)
    {
        $query = $this->db->query("SELECT cisID, organisation, SEC_TO_TIME( SUM( TIME_TO_SEC( TIMEDIFF(finish,start) ) ) ) AS timeSum  FROM times JOIN causes WHERE times.causeID=causes.causeID AND status='confirmed' AND ". $cisID . "=times.cisID  GROUP BY causes.organisation order by timeSum desc limit 1");

        $data= $query->row_array();

        return (string) $data['organisation'];
    }

    //Returns an array(YOUR POSITION, TOTAL IN DEPARTMENT)
    public function positionWithinDepartment($cisID)
    {

        $this->load->model('User_model');

        $department=$this->User_model->getDepartment($cisID);

        $query = $this->db->query("SELECT users.cisID,departmentsName, SEC_TO_TIME( SUM( TIME_TO_SEC( TIMEDIFF(finish,start) ) ) ) AS timeSum FROM times join users ON times.cisID=users.cisID join departments ON users.departmentID=departments.ID WHERE times.status='confirmed' AND departmentsName=\"" .$department."\" group by cisID,departmentsName ORDER BY timeSum DESC");

        $data= $query->result_array();

        $total = sizeof($data);


        $i = 1;

        foreach ($data as $arr)
        {
            if ($arr['cisID']==$cisID){
                break;
            }

            $i+=1;

        }

        $return = array($i,$total);

        return $return;
    }
}
