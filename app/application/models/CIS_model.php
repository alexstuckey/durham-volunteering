<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class CIS_model extends CI_Model
{
    public function __construct()
    {
        
    }


    public function get_user_details_by_email($userEmail)
    {
        $dbDurhamNative = $this->load->database('durhamNative', TRUE);

        $dbDurhamNative->select('*');
        $dbDurhamNative->from('UserDetails');
        $dbDurhamNative->where('email', $userEmail);

        $query = $dbDurhamNative->get();

        $data = $query->row_array();

        list($firstnamesplit)=explode(',', $data['firstnames']);
        $data['fullname'] = ucwords(strtolower($firstnamesplit . ' ' . $data['surname']));

        return $data;
    }

    public function get_user_details_by_cisID($cisID)
    {
        $dbDurhamNative = $this->load->database('durhamNative', TRUE);

        $dbDurhamNative->select('*');
        $dbDurhamNative->from('UserDetails');
        $dbDurhamNative->where('username', $cisID);

        $query = $dbDurhamNative->get();

        $data = $query->row_array();

        list($firstnamesplit)=explode(',', $data['firstnames']);
        $data['fullname'] = ucwords(strtolower($firstnamesplit . ' ' . $data['surname']));

        return $data;
    }
}
