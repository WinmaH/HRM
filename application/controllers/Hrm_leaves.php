<?php

/**
 * Created by PhpStorm.
 * User: acer
 * Date: 2/15/2018
 * Time: 12:34 AM
 */
class Hrm_leaves extends CI_Controller
{

    public function __construct()
    {
        parent::__construct();
        $this->load->model('Hrm_leave_model');
        $this->load->library('session');
        $this->load->library('unit_test');
        $this->output->enable_profiler(TRUE);
    }

    //prompts the leave application

    public function apply($err=null,$success=null){
        $year=date('Y');
        $month=date('m');
        $user_ID=$this->session->userdata('username');
        $data['title']="Apply";
        $data['err']=$err;
        $data['success']=$success;
        $data['taken_half']=$this->Hrm_leave_model-> get_taken_half($user_ID,$year,$month);
        $data['taken_full']=$this->Hrm_leave_model-> get_taken_full($user_ID,$year,$month);
        $data['max_full']=$this->Hrm_leave_model->get_max_half();
        $data['max_half']=$this->Hrm_leave_model->get_max_full();
        $data['_view']='leaves/apply';
        $this->load->view('hrm_templates/header',$data);
        $this->load->view('hrm_layouts/main',$data);
        $this->load->view('hrm_templates/footer');
    }

    //prompts the leave history of the given employee
    public function view($User_ID){
        $data['clients']=$this->Hrm_leave_model->view($User_ID);
        $data['_view']='leaves/history';
        $this->load->view('hrm_layouts/main',$data);
    }

    // get the leave request details when the employee submits the leave application form
    public function apply_leave(){
        $this->load->library('form_validation');
        $this->form_validation->set_rules("start","Start Date","required");
        $this->form_validation->set_rules("end","End Date","required");
        $this->form_validation->set_rules("type","Leave Type","required");
        $this->form_validation->set_rules("reason","Reason","required");
        $this->form_validation->set_rules("description","Description","required");


        $err="";

        if($this->form_validation->run()){
            $date1= new DateTime($this->input->post('start'));
            $date2= new DateTime ($this->input->post('end'));

            $today=date("Y-m-d") ;


            if($date1<$today | $date2<$today){
                $err = $err . "Enter a date ahead to apply \n";
                $this->apply($err);
            }

            if($date1<= $date2) {

                //echo date_diff($date2,$date1);
                $first = strtotime($this->input->post('start'));
                $second = strtotime($this->input->post('end'));
                $datediff = $second - $first;
                $diff = round($datediff / (60 * 60 * 24));

                $year = date('Y');
                $month = date('m');
                $user_ID = $this->session->userdata('username');
                $remaining = 0;

                if ($this->input->post('type') == "Full") {
                    $remaining = ($this->Hrm_leave_model->get_max_full() - $this->Hrm_leave_model->get_taken_full($user_ID, $year, $month) - $diff - 1);
                }
                if ($this->input->post('type') == "Half") {
                    $remaining = ($this->Hrm_leave_model->get_max_half() - $this->Hrm_leave_model->get_taken_half($user_ID, $year, $month) - $diff - 1);
                }
                if ($remaining < 0) {
                    $err = $err . "Sorry ! your request cannot be proceed as your maximum leave limit exceeds \n";
                    $this->apply($err);
                }   else {


                    $start_year = date('Y', $first);
                    $start_month = date('m', $first);
                    $start_date = date('d', $first);

                    $end_year = date('Y', $first);
                    $end_month = date('m', $first);
                    $end_date = date('d', $first);
                    $id = uniqid();

                    $params1 = array('User_ID' => $this->session->userdata('username'),
                        'Start_Year' => $start_year,
                        'Start_Month' => $start_month,
                        'Start_Date' => $start_date,
                        'End_Year' => $end_year,
                        'End_Month' => $end_month,
                        'End_Date' => $end_date,
                        'Type' => $this->input->post('type'),
                        'Reason' => $this->input->post('reason'),
                        'Description' => $this->input->post('description'),
                        'Leave_ID' => $id
                    );

                    $params2 = array(
                        'Leave_ID' => $id,

                    );

                    try {
                        $this->Hrm_leave_model->add_leave($params1, $params2);

                        $data['success'] = "Successfully send the leave request to the Admin !";
                        $data['_view']="hrm_layouts/success";
                        $this->load->view('hrm_layouts/main',$data);
                    } catch (Exception $e) {
                        $err = $err . "Database Error occur! Please retry ! \n";
                        $this->apply($err);
                    }
                }
            } else{
                $err = $err . "Enter the end date ahead of start date \n";
                $this->apply($err);
            }

        }else{
            $err=validation_errors();
            $this->apply($err);

        }
    }



    //code for unit tests
    public function test(){

        $ans=$this->Hrm_leave_model->get_max_full() ;
        $expected=4;
        $test_name = 'Test case for getting maximum full day leave count';
        $this->unit->run($ans,$expected,$test_name);


        $ans=$this->Hrm_leave_model->get_max_half() ;
        $expected=4;
        $test_name = 'Test case for getting maximum half day leave  count';
        $this->unit->run($ans,$expected,$test_name);

        $user_ID='20180001W';
        $year=2018;
        $month=3;
        $ans=$this->Hrm_leave_model->get_taken_half($user_ID,$year,$month);;
        $expected=0;
        $test_name = 'Test case for taken maximum full day leave count of employee Winma for march';
        $this->unit->run($ans,$expected,$test_name);


        $ans=$this->Hrm_leave_model->get_taken_half($user_ID,$year,$month); ;
        $expected=0;
        $test_name = 'Test case for taken maximum half day leave count of employee Winma for march';
        $this->unit->run($ans,$expected,$test_name);


        echo $this->unit->report();

    }











}