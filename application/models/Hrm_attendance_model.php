<?php

/**
 * Created by PhpStorm.
 * User: acer
 * Date: 3/8/2018
 * Time: 1:05 PM
 */
class Hrm_attendance_model extends CI_Model
{
public function  get_attendance_count($year,$month,$day){

    $query=$this->db->query("SELECT * FROM attendance NATURAL JOIN person WHERE Present_Year='$year' AND Present_Month='$month' AND Present_Date='$day'");
    return $query->num_rows();
}

public function get_employee_attendance_count($year,$month,$day){
    $id=$this->session->userdata('username');
    $query=$this->db->query("SELECT * FROM attendance NATURAL JOIN person WHERE Present_Year='$year' AND Present_Month='$month' AND Present_Date='$day' AND User_ID='$id'");
    return $query->num_rows();
}
    public function get_attendance_details($year,$month,$day,$offset=0, $count=500){
        $this->db->limit($count, $offset);
        $query=$this->db->query("SELECT * from attendance NATURAL JOIN person WHERE Present_Year='$year' AND Present_Month='$month' AND Present_Date='$day'");
        $row=$query->result_array();
        return $row;

    }
    public function enter_attendance($params){
       // $this->db->where('User_ID');
        $this->db->insert('attendance',$params);
    }
    public function has_record($params){
        $query=$this->db->get_where('attendance',$params);
        return $query->num_rows();
    }
     public function get_employee_monthly_attendance($User_ID){
        $year=date('Y');
        $month=date('m');
         $query=$this->db->query("SELECT * from attendance  WHERE Present_Year='$year' AND Present_Month='$month' AND User_ID='$User_ID'");
         $row=$query->result_array();
         return $row;

     }
}