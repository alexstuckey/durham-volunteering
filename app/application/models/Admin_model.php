<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Admin_model extends CI_Model {


    //Loads the database using the ../config/database.php file
    public function __construct()	{
        $this->load->database();
    }

    //Queries database with SQL query where the argument $CISID = cisID database column.
    //The results are stored in an array which can be accessed with $query[n]['column name']
    //Where n is the position in the array.

    public function isDisabled()
    {
        $query = $this->db->get('disabled');

        return $query->row_array();
    }

    public function updateWebsiteStatus($websiteEnabled){

        if($websiteEnabled==True){

            $data = array(
                'id' => 1,
                'disabled' => 0,
            );


            $this->db->where('id', 1);
            $this->db->update('disabled', $data);

        }

        if($websiteEnabled==False){

            $data = array(
                'id' => 1,
                'disabled' => 1,
            );


            $this->db->where('id', 1);
            $this->db->update('disabled', $data);

        }
    }

    public function getPersonalDeclaration()
    {
        $this->db->where('settingName', 'personalDeclaration');
        $query = $this->db->get('settings');
        $declaration = $query->row_array();

        if (!empty($declaration)) {
            return $declaration['settingValue'];
        } else {
            return NULL;
        }
    }

    public function setPersonalDeclaration($declaration)
    {
        $this->db->where('settingName', 'personalDeclaration');
        $this->db->set('settingValue', $declaration);
        $this->db->update('settings');
    }


}
