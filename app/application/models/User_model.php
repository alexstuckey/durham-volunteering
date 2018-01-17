<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class User_model extends CI_Model {


    //Loads the database using the ../config/database.php file
    public function __construct()	{
        $this->load->database();
    }

    //Queries database with SQL query where the argument $CISID = cisID database column.
    //The results are stored in an array which can be accessed with $query[n]['column name']
    //Where n is the position in the array.
    public function getUserByCIS($CISID)
    {
            $this->db->where('cisID', $cisID);

            $query = $this->db->get('users');

            return $query->result_array();
    }


    // Queries the database with SQL query where the argument $CISID = cisID database column.
    // Checks if the value in the isAdmin field = 1, if so returns 1. If not, returns 0.
    public function isAdmin($CISID)
    {


        $query = $this->db->get_where('admins', array('cisID' => $CISID));

        $result=$query->result_array();

        $isAdmin = $result[0]['isAdmin'];


        if($isAdmin=="1"){

            return 1;
        }
        else{

            return 0;
        }


    }


    // Queries the database with SQL query where the argument $CISID = managersCisID database column.
    // An array of CisID user names is returned - if the size of this array is greater or equal to 1
    // Then the CISID is a manager of at least 1 person and returns 1 - else returns 0.
    public function isManager($CISID)
    {
        $this->db->where('managersCisID', $CISID);

        $query = $this->db->get('management');

        $result=$query->result_array();


        if(sizeof($result)>=1)
        {

            return 1;
        }

        else {

            return 0;
        }
    }

    // Matches cisIDs to the management table and returns the managersCisID
    public function getManager($CISID)
    {
        $this->db->where('cisID', $CISID);

        $query = $this->db->get('management');

        $result = $query->result_array();

        $managersCisID = $result[0]['managersCisID'];

        return $managersCisID;
    }

    //Returns an array of CisIDs of whom the $CISID is the manager.
    public function getManagees($CISID)
    {
        $this->db->where('managersCisID', $CISID);

        $query = $this->db->get('management');

        $result = $query->result_array();

        return $result;
    }


}
