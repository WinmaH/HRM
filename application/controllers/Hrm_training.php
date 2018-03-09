<?php

/**
 * Created by PhpStorm.
 * User: acer
 * Date: 2/27/2018
 * Time: 7:05 PM
 */
class Hrm_training extends CI_Controller
{

    function __construct()
    {
        parent::__construct();

        $this->load->model('Hrm_training_model');
        $this->load->model('Hrm_employee_model');
    }
    public function load($page=1){
        $per_page = 25;
        $count = $this->Hrm_training_model->get_program_count();

        $pages = ceil($count/$per_page);
        $data['clients']=$this->Hrm_training_model->get_program_details(($pages-1)*$per_page,$per_page);
        $data['_view'] = 'hrm_training/index';
        $data['page']=$page;
        $data['pages']=$pages;
        $this->load->view('hrm_layouts/main',$data);
    }

    public function add_to_training($Program_ID){
        $emp=$this->input->post('emp');
        $arr=explode(" ",$emp);
        $User_ID=$arr[sizeof($arr)-1];
        $params=array(
          'Program_ID'=>$Program_ID,
            'User_ID'=>$User_ID
        );

        //check whether the same person is entered more than once
        $count=$this->Hrm_training_model->has_record($Program_ID,$User_ID);
        if($count==0){
           $this->Hrm_training_model->participate_employee($params);
           $this->get_employee($Program_ID);
        } else{
            $err="Employee is already participating !";
            $this->get_employee($Program_ID,$err);
        }
    }
    public function remove($User_ID,$Program_ID){
        $this->Hrm_training_model->remove_employee($User_ID,$Program_ID);
        $this->get_employee($Program_ID);

    }
    public function add($err=null){
        $data['err']=$err;
        $data['_view'] = 'hrm_training/add';
        $this->load->view('hrm_layouts/main',$data);

    }

//view the list of employees already registered and add button to add new employee
    public function get_employee($Program_ID,$err=null,$page=1){
        $per_page = 25;
        $count = $this->Hrm_training_model->get_program_count();
        $data['designation']=$this->Hrm_training_model->get_program_title($Program_ID);
        $data['user']=$this->Hrm_employee_model->get_employee();
        $pages = ceil($count/$per_page);
        $data['err']=$err;
       $data['clients']= $this->Hrm_training_model->get_employee($Program_ID,($pages-1)*$per_page,$per_page);
        $data['page']=$page;
        $data['pages']=$pages;
        $data['Program_ID']=$Program_ID;
       $data['_view']='hrm_training/add_employee';
        $this->load->view('hrm_layouts/main',$data);
    }

    public function new_training_program(){

        $this->load->library('form_validation');
        $this->form_validation->set_rules("title","Title","required");
        $this->form_validation->set_rules("date","Date","required");
        $this->form_validation->set_rules("venue","Venue","required");
        $this->form_validation->set_rules("des","Description","required");

        if($this->form_validation->run()){

            $date1= new DateTime($this->input->post('date'));
            $today=date("Y-m-d") ;
            if($today>$date1){
                $err="Training program date should be ahead of today";
                $this->add($err);
            } else{
                $date=$this->input->post('date');
                $title=$this->input->post('title');
                $venue=$this->input->post('venue');
                $description=$this->input->post('des');
                $params=array(
                    'Title'=>$title,
                    'Description'=>$description,
                    'Program_Date'=>$date,
                    'Venue'=>$venue
                );
                $result=$this->Hrm_training_model->add($params);
                if($result==0){
                    $err="Error occured ! please retry ";
                } else{
                    $this->load();
                }


            }

        }else{
            $err=validation_errors();
            $this->add($err);

        }



    }
}