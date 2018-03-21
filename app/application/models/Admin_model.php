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
        $query = $this->db->get('emailTemplates');

        return $query->result_array();
    }

    public function isDisabled()
    {
        $query = $this->db->get('disabled');

        return $query->result_array()[0];
    }

    public function updateEmailTemplates($emailName,$emailContent)
    {

        $something = $this->input->post('something');

        $data = array($emailName => $emailContent);


        $this->db->where('emailName', $emailName);

        $this->db->replace('emailTemplates', $data);

    }

    public function updateWebsiteStatus($websiteStatus){

        if($websiteStatus==True){

            $data = array(
                'id' => 1,
                'disabled' => 0,
            );


            $this->db->where('id', 1);
            $this->db->update('disabled', $data);

        }

        if($websiteStatus==False){

            $data = array(
                'id' => 1,
                'disabled' => 1,
            );


            $this->db->where('id', 1);
            $this->db->update('disabled', $data);

        }
    }


}
