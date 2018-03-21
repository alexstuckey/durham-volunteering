<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Departments_model extends CI_Model {


    //Loads the database using the ../config/database.php file
    public function __construct()	{
        $this->load->database();
    }


    // Returns an array of deparments, with their id and name
    public function getDepartmentsList()
    {
        $this->db->select('name');
        $this->db->from('departments');

        $query = $this->db->get();

        $data=$query->result_array();

        return $data;

    }

    // Returns an array of deparments, with their id, name, and count of members
    public function getDepartmentsListWithCount()


    {
        $this->db->select('departments.id, departments.departmentsName, COUNT(users.departmentID) as total');
        $this->db->from('departments');

        $this->db->join('users','departments.id=users.departmentID', 'left');

        $this->db->group_by('departmentsName');
        $this->db->order_by('departments.departmentsName', 'asc');


        $query = $this->db->get();

        $data = $query->result_array();

        return $data;
    }


    // Makes a new department, with the given name
    public function newDepartment($name)
    {
        $data = array('departmentsName' => $name);

        $this->db->insert('departments', $data);
    }

    // Edits a department, by an id to change it's name
    public function editDepartment($id, $name)
    {
        $data = array('departmentsName' => $name);

        $this->db->where('id', $id);
        $this->db->update('departments', $data);
    }


}
