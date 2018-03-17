<?php

/**
 * Created by PhpStorm.
 * User: acer
 * Date: 2/15/2018
 * Time: 12:21 AM
 */
class Hrm_Notification extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();
        $this->load->model('Hrm_leave_model');

    }

    // get admin notifications
    public function show_admin_not(){
        $data['title']="Notifications";
        $data['_view']='leaves/admin_notification';
        $data['user']=$this->Hrm_leave_model->get_admin_leave();
        $this->load->view('hrm_templates/header',$data);
        $this->load->view('hrm_layouts/main',$data);
        $this->load->view('hrm_templates/footer');
    }


    public function show_employee_not(){
        $data['title']="Notifications";
        $data['_view']='leaves/employee_notification';
        $data['user']=$this->Hrm_leave_model->get_employee_leave();
        $this->load->view('hrm_templates/header',$data);
        $this->load->view('hrm_layouts/main',$data);
        $this->load->view('hrm_templates/footer');
    }


    public function notify($Leave_ID,$Status){
        $params1=array('Leave_ID' => $Leave_ID,
                       'Status' => $Status);
        $this->Hrm_leave_model->notify($params1);

    }

     public function accept($Leave_ID,$ID){
         $params1=array('Checked' => true,
             'ID' => $ID);
         $params2=array('Leave_ID'=>$Leave_ID,
             'Approved'=>true);
         $this->Hrm_leave_model->approve($Leave_ID,$ID,$params1,$params2);
         $this->notify($Leave_ID,true);
         $this->show_admin_not();
     }






     public function reject($Leave_ID,$ID){
         $params1=array('Checked' => true,
                        'ID' => $ID);
         $params2=array('Leave_ID'=>$Leave_ID,
                        'Approved'=>false);

         $this->Hrm_leave_model->reject($Leave_ID,$ID,$params1,$params2);
         $this->notify($Leave_ID,false);
         $this->show_admin_not();

     }

     public function employee_mark($ID){
         $params1=array('Checked' => true);
         $this->Hrm_leave_model->employee_mark($ID,$params1);
         $this->show_employee_not();
     }

}