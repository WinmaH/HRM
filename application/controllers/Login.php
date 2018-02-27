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

    function __construct()
    {
        parent::__construct();

        $this->load->model('Hrm_dashboard_model');
        $this->load->model('Hrm_salary_model');
        $this->load->library("Aauth");

    }

    public function index()
    {
       // $this->load->view('hrm_user/user_login');
       // parent::__construct();
       // $this->load->library("Aauth");
       // $this->load->model('Hrm_dashboard_model');
        $this->login1();



    }
    public function view_dashboard(){
        $data['tot_emp']=$this->Hrm_dashboard_model->get_tot_employee_count();
        $year = date('Y');
        $month=date('m');
        $array=array('01'=>'January','02'=>'February','03'=>'March','04'=>'April','05'=>'May','06'=>'June','07'=>'July','08'=>'August','09'=>'September','10'=>'October','11'=>'November','12'=>'December');
        $m=$array[$month];

        $data['new_emp']=$this->Hrm_dashboard_model->get_new_employee_count($year,$month);
        $data['salary_paid']=$this->Hrm_salary_model->get_salary_paid_count($year,$m);


        $data['_view']='hrm_dashboard/view';
        $this->load->view('hrm_layouts/main',$data);
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
               $this->view_dashboard();
               // $this->load->view('hrm_admin/main',$data);
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