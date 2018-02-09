<?php

/**
 * Created by PhpStorm.
 * User: acer
 * Date: 1/28/2018
 * Time: 10:41 AM
 */
class User_model extends CI_model
{

    /**
     * User_model constructor.
     */
    public function __construct() {
        parent::__construct();
       $this->load->library("Aauth");


    }

    public function login($identifier, $pass, $remember){

        return $this->aauth->login($identifier, $pass, $remember);


    }

}