<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class CIS_model extends CI_Model
{
    public function __construct()
    {
        $this->load->database('durhamNative', TRUE);
    }


    public function get_user_details($userEmail)
    {

        $this->db->select('*');
        $this->db->from('UserDetails ');
        $this->db->where('email', $userEmail);

        $query = $this->db->get();

        $data = $query->result_array();

        return $data['username'];

    }
}