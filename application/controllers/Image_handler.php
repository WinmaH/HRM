<?php

/**
 * Created by PhpStorm.
 * User: acer
 * Date: 2/7/2018
 * Time: 8:49 AM
 */
class Image_handler extends CI_Controller
{
    function load(){

       $this->load->view('hrm_templates/header');
       $this->load->view('hrm_layouts/side_bars');
        $this->load->view('view');
    }

}