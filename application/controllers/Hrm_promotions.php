<?php

/**
 * Created by PhpStorm.
 * User: acer
 * Date: 3/10/2018
 * Time: 2:07 PM
 */
class Hrm_promotions extends CI_Controller
{
    function __construct()
    {
        parent::__construct();

        $this->load->model('Hrm_salary_model');
        $this->load->model('Hrm_employee_model');

        if(!$this->aauth->is_loggedin()) redirect('/login');
    }
    function load_previous_details(){
        $page=1;
        $per_page = 25;
        $count = $this->Hrm_employee_model->get_employee_count();
        $pages = ceil($count/$per_page);
        $data['clients'] = $this->Hrm_employee_model->get_paged_employee(($page-1)*$per_page, $per_page);
        $data['basic']=$this->Hrm_salary_model->get_basic();
        $data['pages'] = $pages;
        $data['page'] = $page;

        $data['_view'] = 'hrm_promotions/index';
        $this->load->view('hrm_layouts/main',$data);
    }

    function promote($User_ID,$name,$current_salary,$err=null){
        $data['err']=$err;
        $data['_view'] = 'hrm_promotions/form';
        $data['id']=$User_ID;
        $data['name']=$name;
        $data['basic']=$current_salary;
        $data['designation']=$this->Hrm_employee_model->get_designation();
        $this->load->view('hrm_layouts/main',$data);
    }

    function edit_designation($id,$name,$salary){
        $this->load->library('form_validation');
        $this->form_validation->set_rules("additional","Additional Salary","required");
        if($this->form_validation->run()){
            $basic=$this->Hrm_salary_model->get_basic();
                $data['params1']=$id;
                $data['params2']=$this->input->post('designation');
                $data['params3']=$this->input->post('additional')+$basic;
            $data['_view'] = 'hrm_promotions/re_confirm';
            $this->load->view('hrm_layouts/main',$data);
           // $this->Hrm_employee_model->update_designation($id,$params);
           // $this->load_previous_details();
        } else{
            $err=validation_errors();
            $this->promote($id,$name,$salary,$err);
        }


    }
    function edit($id,$designation,$additional){
        $params=array(
            'Designation'=>$designation,
            'Salary'=>$additional);
        $this->Hrm_employee_model->update_designation($id,$params);
        $this->load_previous_details();
    }


}