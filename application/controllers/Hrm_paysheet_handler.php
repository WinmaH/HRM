<?php

/**
 * Created by PhpStorm.
 * User: acer
 * Date: 2/14/2018
 * Time: 11:45 PM
 */
class Hrm_paysheet_handler extends CI_Controller
{

    public function __construct()
    {
        parent::__construct();
        $this->load->library('pdf_report');
    }

    public function index(){
       // $data['title']="Pay Sheet";
       // $data['_view']='pdf';

        $this->load->view('pdf');
        //$this->load->view('hrm_templates/header',$data);

        //$this->load->view('hrm_layouts/main',$data);


        //$data['designation']=$this->Hrm_employee_model->get_designation();

      //  $this->load->view('hrm_templates/footer');


    }


}