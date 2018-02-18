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

    public function returnEmailTemplates()
    {
        $this->db->where('EmailTemplates', 1);

        $query = $this->db->get('emailTemplates');

        return $query->result_array();
    }

    public function isDisabled()
    {
        $query = $this->db->get('disabled');

        return $query->result_array()[0];
    }


}
