<?php

/**
 * Created by PhpStorm.
 * User: acer
 * Date: 3/8/2018
 * Time: 12:33 PM
 */
class Hrm_attendance extends CI_Controller
{
    function __construct()
    {
        parent::__construct();
        //load helpers and libraries.

        $this->load->library("Aauth");
        $this->load->helper('email');
        $this->load->model('Hrm_attendance_model');
        if(!$this->aauth->is_loggedin()) redirect('/login');
    }

    function load($page=1){
        $year=date('Y');
        $month=date('m');
        $day=date('d');
        $per_page = 25;
        $count = $this->Hrm_attendance_model->get_attendance_count($year,$month,$day);
        $pages = ceil($count/$per_page);
        $data['clients']=$this->Hrm_attendance_model->get_attendance_details($year,$month,$day,($pages-1)*$per_page,$per_page);
        $data['_view'] = 'hrm_attendance/index';
        $data['page']=$page;
        $data['pages']=$pages;
        $this->load->view('hrm_layouts/main',$data);

    }

    function read(){
        $file_name="";

        if (!empty($_FILES['attendance']['name'])) {

            $config['upload_path'] = './files/';
            $config['allowed_types'] = 'xls|xlsx|csv';
            $config['file_name'] = $_FILES['attendance']['name'];
            $this->load->library('upload', $config);
            $this->upload->initialize($config);
            if ($this->upload->do_upload('attendance')) {
                $uploadData = $this->upload->data();
                $file_name = $uploadData['file_name']; //uploded file name
                $extension=$uploadData['file_ext'];    // uploded file extension

                $this->load->library('Excel');

                $obj=PHPExcel_IOFactory::load(FCPATH.'files/'.$file_name);
                //print_r($obj);
                $cell_collection=$obj->getActiveSheet()->getCellCollection();
                $id='';
                $year='';
                $month='';
                $day='';
                $hour='';
                $minute='';
                $second='';

                foreach ($cell_collection as $cell){
                    $column=$obj->getActiveSheet()->getCell($cell)->getColumn();
                    $row=$obj->getActiveSheet()->getCell($cell)->getRow();
                    $data_value=$obj->getActiveSheet()->getCell($cell)->getValue();
                    if ($column=='A'){
                        $id=$data_value;
                    } else if($column=='B'){
                        $year=$data_value;
                    } else if($column=='C'){
                        $month=$data_value;
                    } else if($column=='D'){
                        $day=$data_value;
                    }else if($column=='E'){
                        $hour=$data_value;
                    }else if($column=='F'){
                        $minute=$data_value;
                    } else if($column=='G'){
                        $second=$data_value;
                        // enter to the database
                        $params=array('User_ID'=>$id,
                            'Present_Year'=>$year,
                            'Present_Month'=>$month,
                            'Present_Date'=>$day,
                            'present_Hour'=>$hour,
                            'Present_Minute'=>$minute,
                            'Present_Second'=>$second);
                        $count=$this->Hrm_attendance_model->has_record($params);
                        if($count==1){
                            $data['err']='Duplicate Entry of Attendance for employee-'.$id.' on the date '.$year.'-'.$month.'-'.$day;
                            $data['_view'] = 'hrm_layouts/fail';
                            $this->load->view('hrm_layouts/main',$data);
                        }else{
                            
                        $this->Hrm_attendance_model->enter_attendance($params);

                        }
                    }

                  //  echo  $data_value;

                }

                unlink('./files/'.$file_name);
                //$this->load->helper("file");
                delete_files('./files/'.$file_name);
                $this->load();
            }
        }

        if($file_name==""){
            $data['err']='Enter the correct excel file to be read';
            $data['_view'] = 'hrm_layouts/fail';
            $this->load->view('hrm_layouts/main',$data);
        }


    }
    public function monthly_attendance($User_ID){
        $data['clients']=$this->Hrm_attendance_model->get_employee_monthly_attendance($User_ID);
        $data['_view'] = 'hrm_attendance/employee_attendance';

        $this->load->view('hrm_layouts/main',$data);

}

}