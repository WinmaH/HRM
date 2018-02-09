<?php

/**
 * Created by PhpStorm.
 * User: acer
 * Date: 1/28/2018
 * Time: 6:07 PM
 */
class Login extends CI_model{

    public function __construct() {
        parent::__construct();
        $this->load->library("Aauth");

    }


    public function login($identifier, $pass, $remember){
        return $this->aauth->login($identifier, $pass, $remember);
    }




}