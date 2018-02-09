<?php

/**
 * Created by PhpStorm.
 * User: acer
 * Date: 2/1/2018
 * Time: 3:36 PM
 */
class Hrm_employee extends CI_Controller{
    function __construct()
    {
        parent::__construct();

       $this->load->model('Hrm_employee_model');
        $this->load->library("Aauth");
        $this->load->helper('email');
       if(!$this->aauth->is_loggedin()) redirect('/login');
    }

    function index($page = 1)
    {
        $per_page = 25;
        $count = $this->Hrm_employee_model->get_employee_count();

        echo $count;
        $pages = ceil($count/$per_page);

        $data['clients'] = $this->Hrm_employee_model->get_paged_employee(($page-1)*$per_page, $per_page);
        $data['pages'] = $pages;
        $data['page'] = $page;

        $data['_view'] = 'hrm_employee/index';
        $this->load->view('hrm_layouts/main',$data);
    }

    function add(){
        $data['_view'] = 'hrm_employee/add';
        $data['designation']=$this->Hrm_employee_model->get_designation();
        $data['basic']=$this->Hrm_employee_model->get_basic();
        $this->load->view('hrm_layouts/main',$data);
    }

    function add_new_employee(){


        $this->load->library('form_validation');
        $this->form_validation->set_rules("email","Email","trim|required|valid_email");
       $this->form_validation->set_rules("first_name","First Name","required");
        $this->form_validation->set_rules("last_name","Last Name","required");
        $this->form_validation->set_rules("gender","Gender","required");
        $this->form_validation->set_rules("birthday","Birthday","required");
        //$this->form_validation->set_rules("nic","Identity Card","required|greater_than_equal_to[10]|less_than_equal_to[12]");
        $this->form_validation->set_rules("postbox","Post Box","required");
        $this->form_validation->set_rules("city","City","required");
        $this->form_validation->set_rules("mobile","Mobile Number","required|exact_length[10]");
        $this->form_validation->set_rules("additional","Additional Fee","required");
       // $this->form_validation->set_rules("cv","CV","required");
        //$this->form_validation->set_rules("image","Image","required");

        if($this->form_validation->run()){
            // if there are no errors add to the database
            $cv='';
            $image='';
            if(!empty($_FILES['cv']['name'])) {

                $config['upload_path'] = './files/';
                $config['allowed_types'] = 'pdf';
                $config['file_name'] = $_FILES['cv']['name'];

                $this->load->library('upload', $config);
                $this->upload->initialize($config);

                if ($this->upload->do_upload('cv')) {
                    $uploadData = $this->upload->data();
                    $cv = $uploadData['file_name'];
                }
            }


            if(!empty($_FILES['image']['name'])) {

                $config['upload_path'] = './files/';
                $config['allowed_types'] = 'jpeg|png|jpg|gif';
                $config['file_name'] = $_FILES['image']['name'];

                $this->load->library('upload', $config);
                $this->upload->initialize($config);

                if ($this->upload->do_upload('image')) {
                    $uploadData = $this->upload->data();
                    $image = $uploadData['file_name'];
                }
            }





            if($cv==""){
                $err_cv="Enter a pdf document for the cv";
                $data['cv_err']=$err_cv;
            }

            $first_name = $this->input->post('first_name');
            $email=$this->input->post('email');



            $cnt=$this->Hrm_employee_model->count_employee();
            $pre = substr($first_name, 0, 1);
            $len=strlen($cnt);
            $_id1=str_repeat('0',4-$len);
            $year = date('Y');
            $id=$year.$_id1.$cnt.$pre;


            $params1 = array(
                'FirstName' => $this->input->post('first_name'),
            'MiddleName' => $this->input->post('middle_name'),
            'LastName' => $this->input->post('last_name'),
            'Gender' => $this->input->post('gender'),
            'Birthday' => $this->input->post('birthday'),
            'NIC' => $this->input->post('nic'),
            'PostBox' => $this->input->post('postbox'),
            'Street' => $this->input->post('street'),
            'City' => $this->input->post('city'),
            'TP' => $this->input->post('mobile'),
            'E_mail' => $this->input->post('email'),
            'Nationality' => $this->input->post('nationality'),
            'Religion' => $this->input->post('religion'),
            'BloodGroup' => $this->input->post('bloodgroup'),


                'User_ID'=>$id,
            'password'=>'1234',
            'Type'=>'E',
                'Image'=>$image
            );
            $params2=array(
                'User_ID'=>$id,
                'Designation' => $this->input->post('designation'),
                'CV'=>$cv,
                'Salary'=>($this->input->post('basic')+$this->input->post('additional'))

            );

            $this->Hrm_employee_model->add_employee($params1,$params2);
            $this->aauth->create_user($email,'123456',$id);
           // 'basic' => $this->input->post('basic'),
          //  'additional' => $this->input->post('additional'),


            die("SAVE");
        } else{
    // echo validation_errors('<div class="error">', '</div>');


            // same as the add function
            $err=validation_errors();
            $data['_view'] = 'hrm_employee/add';
            $data['designation']=$this->Hrm_employee_model->get_designation();
            $data['basic']=$this->Hrm_employee_model->get_basic();
            $data['err']=$err;
            $this->load->view('hrm_layouts/main',$data);
            // $this->add($err);
        }

    }
     function open($User_ID){
        $cv=$this->Hrm_employee_model->get_cv($User_ID);
        $file = './files/'.$cv;
         $filename = $cv;



         header('Content-type: application/pdf');
         header('Content-Disposition: inline; filename="' . $filename . '"');
         header('Content-Transfer-Encoding: binary');
         header('Accept-Ranges: bytes');
         @readfile($file);
     }

     function full($User_ID){
         $user=$this->Hrm_employee_model->get_single_user($User_ID);
         $data['user']=$user;
         $data['_view']='hrm_employee/full_details';
         $this->load->view('hrm_layouts/main',$data);

     }

     function edit($User_ID){
         $user=$this->Hrm_employee_model->get_single_user($User_ID);
        $data['user']=$user;
         $data['_view']='hrm_employee/edit';
         $data['designation']=$this->Hrm_employee_model->get_designation();
         $this->load->view('hrm_layouts/main',$data);

     }

     function edit_employee($User_ID){

         $this->load->library('form_validation');
         $this->form_validation->set_rules("email","Email","trim|required|valid_email");
         // $this->form_validation->set_rules("first_name","First Name","required");
         //$this->form_validation->set_rules("last_name","Last Name","required");
         //$this->form_validation->set_rules("gender","Gender","required");
         //$this->form_validation->set_rules("birthday","Birthday","required");
         // $this->form_validation->set_rules("nic","Identity Card","required|greater_than_equal_to[10]|less_than_equal_to[12]");
         // $this->form_validation->set_rules("postbox","Post Box","required");
         // $this->form_validation->set_rules("city","City","required");
         //$this->form_validation->set_rules("mobile","Mobile Number","required|exact_length[10]");
         //$this->form_validation->set_rules("additional","Additional Fee","required");
         //$this->form_validation->set_rules("cv","CV","required");


         if($this->form_validation->run()){
             // if there are no errors add to the database
             $first_name = $this->input->post('first_name');


             $params1 = array(
                 'FirstName' => $this->input->post('first_name'),
                 'MiddleName' => $this->input->post('middle_name'),
                 'LastName' => $this->input->post('last_name'),
                 'Gender' => $this->input->post('gender'),
                 'Birthday' => $this->input->post('birthday'),
                 'NIC' => $this->input->post('nic'),
                 'PostBox' => $this->input->post('postbox'),
                 'Street' => $this->input->post('street'),
                 'City' => $this->input->post('city'),
                 'TP' => $this->input->post('mobile'),
                 'E_mail' => $this->input->post('email'),
                 'Nationality' => $this->input->post('nationality'),
                 'Religion' => $this->input->post('religion'),
                 'BloodGroup' => $this->input->post('bloodgroup'),


                 //'User_ID'=>$User_ID,
                 'password'=>'1234',


             );
             $params2=array(
                 //'User_ID'=>$User_ID,
                 'Designation' => $this->input->post('designation')

             );

             $this->Hrm_employee_model->edit_employee($params1,$params2,$User_ID);

         } else{
             // echo validation_errors('<div class="error">', '</div>');


             // same as the add function
             $err=validation_errors();
             $data['_view'] = 'hrm_employee/add';
             $data['designation']=$this->Hrm_employee_model->get_designation();
             $data['basic']=$this->Hrm_employee_model->get_basic();
             $data['err']=$err;
             $this->load->view('hrm_layouts/main',$data);
             // $this->add($err);
         }

     }

}