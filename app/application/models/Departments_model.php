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

    }

    // Returns an array of deparments, with their id, name, and count of members
    public function getDepartmentsListWithCount()
    {

    }


    // Makes a new department, with the given name
    public function newDepartment($newName)
    {

    }

    // Edits a department, by an id to change it's name
    public function editDepartment($id, $newName)
    {

    }


}
