<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Statistics extends CI_Controller {

    public function sumTimeByCause()
    {
        $this->load->model('Statistics_model');

        print(json_encode($this->Statistics_model->sumTimeByCause()));
    }

    public function volunteeringTimePersonal($cisID)
    {
        $this->load->model('Statistics_model');

        $data=$this->Statistics_model->volunteeringTimePersonal($cisID);
    }

    public function totalHoursVolunteered()
    {
        $this->load->model('Statistics_model');

        $data=$this->Statistics_model->totalHoursVolunteered();

    }

    public function getFavouriteCause($cisID)
    {
        $this->load->model('Statistics_model');

        $data=$this->Statistics_model->getFavouriteCause($cisID);

    }

    public function positionWithinDepartment($cisID)
    {
        $this->load->model('Statistics_model');

        $data=$this->Statistics_model->positionWithinDepartment($cisID);

    }


}
