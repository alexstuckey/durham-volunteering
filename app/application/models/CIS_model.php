<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class CIS_model extends CI_Model
{
    public function __construct()
    {
        
    }

    // Generalises email and username, by running both from one
    // Allows for additional work to be done without clogging up code
    private function get_user_general($field, $value)
    {
        $dbDurhamNative = $this->load->database('durhamNative', TRUE);

        $dbDurhamNative->select('*');
        $dbDurhamNative->from('UserDetails');

        $dbDurhamNative->where($field, $value);

        $query = $dbDurhamNative->get();

        $user = $query->row_array();

        if (!empty($user)) {
            list($firstnamesplit)=explode(',', $user['firstnames']);
            $user['fullname'] = ucwords(strtolower($firstnamesplit . ' ' . $user['surname']));
        }

        return $user;
    }


    public function get_user_details_by_email($userEmail)
    {
        return $this->get_user_general('email', $userEmail);
    }

    public function get_user_details_by_cisID($cisID)
    {
        return $this->get_user_general('username', $cisID);
    }
}
