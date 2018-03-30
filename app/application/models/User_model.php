<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class User_model extends CI_Model
{


    // Loads the database using the ../config/database.php file
    public function __construct()
    {
        $this->load->database();
    }


    // Returns the CIS user details
    public function getUserByCIS($cisID)
    {
        $this->load->model('CIS_model');

        return $this->CIS_model->get_user_details_by_cisID($cisID);
    }

    public function getUserByEmail($email)
    {
        $this->load->model('CIS_model');

        return $this->CIS_model->get_user_details_by_email($email);
    }



    public function getFullnameByUsername($CISID)
    {
        $this->db->where('cisID', $CISID);

        $query = $this->db->get('users');

        $result = $query->row_array();

        return ($result['firstName'] . ' ' . $result['secondName']);
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
        $query = $this->db->get('users');
        $user = $query->row_array();

        $manager = $this->getUserByCIS($user['manager']);

        return $manager;
    }


    public function getManagerStatus($CISID)
    {
        $this->db->where('cisID', $CISID);

        $query = $this->db->get('users');

        $result = $query->row_array();

        return $result['managerStatus'];
    }

    // Returns an array of CisIDs of whom the $CISID is the manager.
    public function getManagees($CISID)
    {
        $this->db->where('manager', $CISID);
        $query = $this->db->get('users');

        $result = $query->result_array();

        return $result;
    }

    public function getDepartment($CISID)
    {
        $this->db->where('cisID', $CISID);

        $this->db->join('departments', 'users.departmentID=departments.id');

        $query = $this->db->get('users');

        $result = $query->row_array();

        return $result['departmentsName'];
    }

    // Creates user, with a default onboarding status of 1
    public function createUser($CISID)
    {
        if (!$this->doesUserExist($CISID)) {
            $data = array(
                'cisID' => $CISID,
                'onBoarding' => 1,
                'managerStatus' => 'none'
            );

            $this->db->insert('users', $data);
        }

    }

    public function updateUser ($CISID, $data)
    {

        $this->db->where('cisID', $CISID);
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

    public function doesUserExist($username)
    {
        $this->db->where('cisID', $username);

        $query = $this->db->get('users');

        $result = $query->row_array();

        if (empty($result)) {
            return FALSE;
        } else {
            return TRUE;
        }
    }

    public function setManager($CISID, $managerEmailAddress, $status)
    {

        $managerData = $this->getUserByEmail($managerEmailAddress);
        if (!empty($managerData['username'])) {
            $managerUsername = $managerData['username'];

            $this->db->where('cisID', $CISID);

            $data = array(
                'manager' => $managerUsername,
                'managerStatus' => strtolower($status)
            );
            $this->db->update('users', $data);
        } else {
            // Manager doesn't exist
            return FALSE;
        }

    }

}
