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
        //load helpers and libraries.
        $this->load->model('Hrm_employee_model');
        $this->load->library("Aauth");
        $this->load->helper('email');
        $this->load->library('unit_test');
       // $this->output->enable_profiler(TRUE);
       if(!$this->aauth->is_loggedin()) redirect('/login');

    }

    //prompt the basic employee details
    function index($page = 1)
    {
        $per_page = 25;
        $count = $this->Hrm_employee_model->get_employee_count();
        $pages = ceil($count/$per_page);
        $data['clients'] = $this->Hrm_employee_model->get_paged_employee(($page-1)*$per_page, $per_page);
        $data['pages'] = $pages;
        $data['page'] = $page;
        $data['_view'] = 'hrm_employee/index';
        $this->load->view('hrm_layouts/main',$data);
    }

    //prompts new employee form
    function add(){
        $data['_view'] = 'hrm_employee/add';
        $data['designation']=$this->Hrm_employee_model->get_designation();
        $data['basic']=$this->Hrm_employee_model->get_basic();
        $this->load->view('hrm_layouts/main',$data);
    }

    function add_employee($Program_ID){
        $data['_view']='hrm_training/add_employee';
        $this->load->view('hrm_layouts/main',$data);
    }

    //get employee details and create a new employee
    function add_new_employee(){

        // bench marks

        $this->benchmark->mark('FormValidation_start');
        //set form validation rules
        $this->load->library('form_validation');
        $this->form_validation->set_rules("email","Email","trim|required|valid_email");
        $this->form_validation->set_rules("first_name","First Name","required");
        $this->form_validation->set_rules("last_name","Last Name","required");
        $this->form_validation->set_rules("gender","Gender","required");
        $this->form_validation->set_rules("birthday","Birthday","required");
        $this->form_validation->set_rules("nationality","nationality","required");
        $this->form_validation->set_rules("bloodgroup","D","required");
        //$this->form_validation->set_rules("nic","Identity Card","required|greater_than_equal_to[10]|less_than_equal_to[12]");
        $this->form_validation->set_rules("postbox","Post Box","required");
        $this->form_validation->set_rules("city","City","required");
        $this->form_validation->set_rules("mobile","Mobile Number","required|exact_length[10]");
        $this->form_validation->set_rules("additional","Additional Fee","required");

        $this->benchmark->mark('FormValidation_end');

        if($this->form_validation->run()){
            // if there are no errors add to the database
            $err="";
            $cv='';
            $image='';


            try {
                //upload cv
                if (!empty($_FILES['cv']['name'])) {

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
                //upload image
                if (!empty($_FILES['image']['name'])) {

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


                if ($cv == '') {
                    $err = $err . "Enter a pdf document for the cv \n";

                }

                if ($image == '') {
                    $err = $err . "Enter an image \n";

                }


                if ($err != "") {

                    //prompt back the form with error messages
                    $data['_view'] = 'hrm_employee/add';
                    $data['designation'] = $this->Hrm_employee_model->get_designation();
                    $data['basic'] = $this->Hrm_employee_model->get_basic();
                    $data['err'] = $err;
                    $this->load->view('hrm_layouts/main', $data);

                } else {
                    $first_name = $this->input->post('first_name');
                    $email = $this->input->post('email');
                    $tp=$this->input->post('mobile');
                    // build a new id to the new employee which is also used as the registration number
                    $cnt = $this->Hrm_employee_model->count_employee();
                    $pre = substr($first_name, 0, 1);
                    $len = strlen($cnt);
                    $_id1 = str_repeat('0', 4 - $len);
                    $year = date('Y');
                    $month=date('m');
                    $day=date('d');
                    $id = $year . $_id1 . $cnt . $pre;


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


                        'User_ID' => $id,
                        //'password' => '1234',
                        'Type' => 'E',
                        'Image' => $image
                    );
                    $params2 = array(
                        'User_ID' => $id,
                        'Designation' => $this->input->post('designation'),
                        'CV' => $cv,
                        'Register_year' => $year,
                        'Register_month' => $month,
                        'Register_date'=>$day,

                        'Salary' => ($this->input->post('basic') + $this->input->post('additional'))

                    );
                    //add new employee and create new user

                    $result=$this->Hrm_employee_model->check_employee($email,$tp);
                    if($result==0){
                        //$this->add_employee_to_database($params1,$params2);

                        //bench marks
                        $this->benchmark->mark('CreateUser_start');

                        $this->Hrm_employee_model->add_employee($params1, $params2);
                        $this->aauth->create_user($email, '123456', $id);
                        $this->index();

                        $this->benchmark->mark('CreateUser_end');
                    } else{
                        $data['err']="A user is already registered with the same email or mobile number";
                        $data['_view']='hrm_layouts/fail';
                        $this->load->view('hrm_layouts/main', $data);

                    }


                }

            } catch (Exception $e){
                $data['_view'] = 'hrm_employee/add';
                $data['designation'] = $this->Hrm_employee_model->get_designation();
                $data['basic'] = $this->Hrm_employee_model->get_basic();
                $data['err'] = $e;
                $this->load->view('hrm_layouts/main', $data);
            }

        } else{

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

    //open the cv of the particular employee
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
         //bench marks

         $this->benchmark->mark('GetUserDetails_start');

         $user=$this->Hrm_employee_model->get_single_user($User_ID);

         $this->benchmark->mark('GetUserDetails_end');
         $data['user']=$user;
         $data['_view']='hrm_employee/full_details';
         $this->load->view('hrm_layouts/main',$data);

     }

     function edit($User_ID,$err=null){
         //bench marks

         $this->benchmark->mark('GetPreviousDetails_start');

         $user=$this->Hrm_employee_model->get_single_user($User_ID);
         $data['user']=$user;
         $data['err']=$err;
         $data['_view']='hrm_employee/edit';
         $data['designation']=$this->Hrm_employee_model->get_designation();
         $this->load->view('hrm_layouts/main',$data);

         $this->benchmark->mark('GetPreviousDetails_end');

     }

     function edit_employee($User_ID){

         $this->load->library('form_validation');

         //bench marks
         $this->benchmark->mark('ValidateNewDetails_start');

         $this->form_validation->set_rules("email","Email","trim|required|valid_email");
         $this->form_validation->set_rules("first_name","First Name","required");
         $this->form_validation->set_rules("last_name","Last Name","required");
         $this->form_validation->set_rules("gender","Gender","required");
         $this->form_validation->set_rules("birthday","Birthday","required");
         // $this->form_validation->set_rules("nic","Identity Card","required|greater_than_equal_to[10]|less_than_equal_to[12]");
          $this->form_validation->set_rules("postbox","Post Box","required");
         $this->form_validation->set_rules("city","City","required");
         $this->form_validation->set_rules("mobile","Mobile Number","required|exact_length[9]");

         $this->benchmark->mark('ValidateNewDetails_start');

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

             );
             $params2=array(
                 //'User_ID'=>$User_ID,
                 'Designation' => $this->input->post('designation')

             );

             //bench marks

             $this->benchmark->mark('EditNewDetails_start');
             $this->Hrm_employee_model->edit_employee($params1,$params2,$User_ID);
             $this->index();
             $this->benchmark->mark('EditNewDetails_end');

         } else{
             $err=validation_errors();
             $data['err']=$err;
             $this->edit($User_ID,$err);
         }

     }
    //code to get the basic salary of an employee
    function get_basic(){
        return $this->Hrm_employee_model->get_basic();
    }
    //code to get the list of designation
    function get_designation(){
        return  $this->Hrm_employee_model->get_designation();

    }

    // code for unit tests
     public function test(){

         $answer=$this->get_basic();
         $ans=0;
         foreach ($answer as $a){
             $ans=$a['Basic_salary'];
         }
         $expected=45000;
         $test_name = 'Test case for getting basic salary';
         $this->unit->run($ans,$expected,$test_name);

         $answer=$this->get_designation();
         $answ=array();
         foreach ($answer as $a){
             $ans=$a['Title'];
             array_push($answ,$ans);
         }
         $expected=array('Department-Head','Executive-officer','HR-Manager','Normal-Employee','Senior-Employee');
         $test_name = 'Test case for getting Designation List';
         $this->unit->run($answ,$expected,$test_name);

         echo $this->unit->report();

     }

}