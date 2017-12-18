<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class User_model extends CI_Model {

        public function getUserByCIS($CISID)
        {
                $query = $this->db->get('', 10);
                return $query->result();
        }

        public function isAdmin($CISID)
        {
                $this->title    = $_POST['title']; // please read the below note
                $this->content  = $_POST['content'];
                $this->date     = time();

                $this->db->insert('entries', $this);

                return true;
        }

        public function isManager($CISID)
        {
                // SAMPLE DB CODE
                $query = $this->db->get('', 10);
                return $query->result();
        }

        public function getManager($CISID)
        {
                // Returns the CIS user id of their manager
                // if no manager, return false


                // SAMPLE DB CODE
                $query = $this->db->get('', 10);
                return $query->result();
        }

        public function getManagees($CISID)
        {
                // returns array of user IDs managed by this user
                // return false if not a manager

                // SAMPLE DB CODE
                $query = $this->db->get('', 10);
                return $query->result();
        }

}
