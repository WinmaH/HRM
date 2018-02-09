<?php

defined('BASEPATH') OR exit('No direct script access allowed');
/**
 * Created by PhpStorm.
 * User: acer
 * Date: 1/27/2018
 * Time: 11:46 PM
 */
class Login extends CI_Controller
{
    public function index()
    {
       // $this->load->view('hrm_user/user_login');
        parent::__construct();
        $this->load->library("Aauth");
        $this->login1();



    }


    public function login1(){


        $user = $this->input->post('username');
        $pass = $this->input->post('password');
        $data=array('user_name'=>$user);
        $remember = ($this->input->post('remember')=='on') ? true: false;



        if(($user!=null) && ($pass!=null)){
            $this->load->model('user_model');

            //$id=$this->aauth->get_user_id($user);

            $result = $this->user_model->login($user , $pass,$remember);

            if($result){
               // redirect();
                $this->load->view('hrm_admin/main',$data);
            }else{
                $data = array('failed' => 1 );
                $this->load->view('hrm_user/user_login',$data);
            }

        }else{
            $data = array('failed' => 0 );
            $this->load->view('hrm_user/user_login',$data);
        }

    }


}