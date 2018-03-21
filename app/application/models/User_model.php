<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class User_model extends CI_Model
{


    // Loads the database using the ../config/database.php file
    public function __construct()
    {
        $this->load->database();
    }


    //Returns an associative array with all the data associated with a given user


    public function getUserByCIS($cisID)
    {
        $this->db->select('*');
        $this->db->from('users');
        $this->db->where('users.cisID', $cisID);

        $this->db->join('admins', 'admins.cisID=users.cisID');
        $this->db->join('onBoardingProcess', 'onBoardingProcess.cisID=users.cisID');
        $this->db->join('management', 'management.cisID=users.cisID');


        $query = $this->db->get();

        $data = $query->result_array();

        return $data;



//        foreach ($data[0] as $key => $value)
//        {
//            print("Key: $key; Value: $value");
//        }




    }


    // Queries the database with SQL query where the argument $CISID = cisID database column.
    // Checks if the value in the isAdmin field = 1, if so returns 1. If not, returns 0.
    public function isAdmin($CISID)
    {


        $query = $this->db->get_where('admins', array('cisID' => $CISID));

        $result = $query->result_array();

        $isAdmin = $result[0]['isAdmin'];


        if ($isAdmin == "1") {

            return 1;
        } else {

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

        $result = $query->result_array();


        if (sizeof($result) >= 1) {

            return 1;
        } else {

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

    // Returns an array of CisIDs of whom the $CISID is the manager.
    public function getManagees($CISID)
    {
        $this->db->where('managersCisID', $CISID);

        $this->db->join('users', 'users.cisID=management.cisID');

        $query = $this->db->get('management');

        $result = $query->result_array();

        return $result;
    }

    public function createUser($data)
    {
        $this->db->insert('users', $data);
    }

    public function updateUser($data)
    {

        $this->db->where('cisID', $data['cisID']);
        $this->db->update('users', $data);
    }

    // Updates the onboarding status for a particular user
    public function setOnboardingStatus($CISID, $newStatus)
    {

        $this->db->where('cisID', $CISID);

        $data = array(
            'onBoarding' => $newStatus,
        );
        $this->db->update('users', $data);

    }

    function get_user_details($userEmail) {

        mysql_connect("mysql.dur.ac.uk","nobody","");

        mysql_select_db("Pdcl0www_userdata");

        $getuserdata = mysql_query("SELECT * FROM UserDetails 

                              WHERE email = '".addslashes($userEmail)."'");

        if (mysql_num_rows($getuserdata) == 0) {

            return false;

        } else {

            return mysql_fetch_assoc($getuserdata);

        }

    }


    public function setManager($CISID, $managerEmailAddress)
    {

        $managerData=$this->get_user_details($managerEmailAddress);
        $managerUsername=$managerData['username'];

        $this->db->where('cisID', $CISID);

        $data = array(
            'manager' => $managerUsername,
        );
        $this->db->update('users', $data);

    }


}
