<?php

/**
 * Created by PhpStorm.
 * User: acer
 * Date: 1/31/2018
 * Time: 8:21 PM
 */
class Admin extends CI_Controller
{
    public function index(){
        parent::__construct();
        $this->load->view('hrm_admin/main');
    }

}