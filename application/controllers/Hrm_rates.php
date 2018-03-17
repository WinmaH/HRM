<?php

/**
 * Created by PhpStorm.
 * User: acer
 * Date: 3/17/2018
 * Time: 10:21 AM
 */

class Hrm_rates extends CI_Controller
{
    function __construct()
    {
        parent::__construct();

        $this->load->model('Hrm_salary_model');


        if(!$this->aauth->is_loggedin()) redirect('/login');
    }



    function load($err=null){
        $data['epf']=$this->Hrm_salary_model->get_epf();
        $data['etf']=$this->Hrm_salary_model->get_etf();
        $data['err']=$err;
        $data['basic']=$this->Hrm_salary_model->get_basic();
        $data[ '_view']='hrm_rates/index';
        $this->load->view('hrm_layouts/main',$data);
    }

    function update($params1,$params2,$params3){

        $params1=array(
            'Basic_salary'=>$params1);
        $params2=array(
            'Rate'=>$params2);
        $params3=array(
            'Rate'=>$params3);
        $this->Hrm_salary_model->edit($params1,$params2,$params3);
        $data['success']='Successfully updated the rates';
        $data[ '_view']='hrm_layouts/success';
        $this->load->view('hrm_layouts/main',$data);
    }

    function edit(){
        $this->load->library('form_validation');
        $this->form_validation->set_rules("basic","Basic Salary","required");
        $this->form_validation->set_rules("etf","ETF Rate","required|less_than[20]");
        $this->form_validation->set_rules("epf","EPF Rate","required|less_than[20]");
        if($this->form_validation->run()){
            $params1=$this->input->post('basic');
            $params2=$this->input->post('etf');
            $params3=$this->input->post('epf');
            $data['params1']=$params1;
            $data['params2']=$params2;
            $data['params3']=$params3;
            $data['success']='Successfully updated the rates';
            $data[ '_view']='hrm_rates/re_confirm';
            $this->load->view('hrm_layouts/main',$data);

        } else{
            $err=validation_errors();
            $this->load($err);
        }
    }

}