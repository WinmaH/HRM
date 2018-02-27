<?php

/**
 * Created by PhpStorm.
 * User: acer
 * Date: 2/7/2018
 * Time: 8:49 AM
 */
class Image_handler extends CI_Controller
{

    public function __construct()
    {
        parent::__construct();
        $this->load->library('pdf_report');
    }

    public function index(){
        //$data['title']="Salary Sheet";
        $data['_view']='leaves/employee_notification';
        $this->load->view('hrm_layouts/main',$data);

        $this->load->view('hrm_templates/header',$data);

        //$data['designation']=$this->Hrm_employee_model->get_designation();

        //$this->load->view('hrm_templates/footer');


    }

}