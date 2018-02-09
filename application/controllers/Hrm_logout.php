<?php

/**
 * Created by PhpStorm.
 * User: acer
 * Date: 2/2/2018
 * Time: 11:38 AM
 */
class Hrm_logout extends CI_Controller
{
    public function index()
    {
        // $this->load->view('hrm_user/user_login');
        parent::__construct();
        $this->load->library("Aauth");
        $this->aauth->logout();
        redirect('h_logout');


    }

}