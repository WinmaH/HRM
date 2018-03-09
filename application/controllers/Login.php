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
        $this->load->model('Hrm_training_model');
        $this->load->model('Hrm_leave_model');
        $this->load->library("Aauth");

    }

    public function index()
    {
       // $this->load->view('hrm_user/user_login');
       // parent::__construct();
       // $this->load->library("Aauth");
       // $this->load->model('Hrm_dashboard_model');


        // calls on the login function
        $this->login1();



    }
    public function view_dashboard(){
        $tot=$this->Hrm_dashboard_model->get_tot_employee_count();
        $data['tot_emp']=$tot;
        $basic=$this->Hrm_salary_model->get_basic();
        $year = date('Y');
        $month=date('m');
        $array=array('01'=>'January','02'=>'February','03'=>'March','04'=>'April','05'=>'May','06'=>'June','07'=>'July','08'=>'August','09'=>'September','10'=>'October','11'=>'November','12'=>'December');
        $m=$array[$month];
        $data['total']=$this->Hrm_dashboard_model->get_tot_salary_this_month($year,$m,$basic);
        $data['new_emp']=$this->Hrm_dashboard_model->get_new_employee_count($year,$month);
        $data['salary_paid']=$this->Hrm_salary_model->get_salary_paid_count($year,$m);
        $data['params1']=$this->Hrm_training_model->get_last_record();
       $male =$this->Hrm_dashboard_model->get_male_employee_count();
       $data['taken_full']=$this->Hrm_training_model->get_program_count();
       $data['taken_half']=$this->Hrm_leave_model->get_admin_leave_count();
       if($tot!=0){
           $male=$male*100/$tot;
       } else{
           $male=0;
       }
       $data['male']=$male;
        $data[ '_view']='hrm_dashboard/view';
        $this->load->view('hrm_layouts/main',$data);
    }
    public function view_employee_dashboard(){
        $data['params1']=$this->Hrm_training_model->get_last_record();
        $data['basic']=$this->Hrm_leave_model->get_last_record();
        $data['epf']=$this->Hrm_salary_model->get_epf();
        $data['etf']=$this->Hrm_salary_model->get_etf();

        $data['_view']='hrm_dashboard/view_employee';
        $this->load->view('hrm_layouts/main',$data);
    }


    public function login1(){

        // get the user name and password and check the validity
        $user = $this->input->post('username');
        $pass = $this->input->post('password');
        $data=array('user_name'=>$user);
        $remember = ($this->input->post('remember')=='on') ? true: false;

        if(($user!=null) && ($pass!=null)){
            $this->load->model('user_model');
            $result = $this->user_model->login($user , $pass,$remember);

            //if the user name and password is valid load the dashboard
            if($result){
                if($this->aauth->is_admin()){
                    $this->view_dashboard();
                }
                else{
                    $this->view_employee_dashboard();
                }
               //$this->view_dashboard();
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