<?php

/**
 * Created by PhpStorm.
 * User: acer
 * Date: 2/18/2018
 * Time: 10:34 PM
 */
class Hrm_leave_model extendS CI_Model
{
    public function get_taken_half($user_ID,$year,$month){


        $query=$this->db->query("SELECT * FROM leaves WHERE Start_Year='$year' AND  Start_Month= '$month' AND User_ID='$user_ID' AND Type='Half'");
        $rows=$query->result_array();
        $tot=0;

        foreach($rows as $r){
            $tot=$tot+($r['End_Date']-$r['Start_Date']+1)*1+ ($r['Start_Month']-$r['End_Month'])*30+($r['Start_Year']-$r['End_Year'])*365;
        }
    return $tot;
    }

    public function get_taken_full($user_ID,$year,$month){


        $query=$this->db->query("SELECT * FROM leaves WHERE Start_Year='$year' AND  Start_Month= '$month' AND User_ID='$user_ID' AND Type='Full'");
        $rows=$query->result_array();
        $tot=0;

        foreach($rows as $r){
            $tot=$tot+($r['End_Date']-$r['Start_Date']+1)*1+ ($r['Start_Month']-$r['End_Month'])*30+($r['Start_Year']-$r['End_Year'])*365;
        }
        return $tot;
    }

    public function  get_max_half(){
        $query=$this->db->query("SELECT * FROM leavedetails");
        $rows=$query->result_array();
        $max=0;

        foreach($rows as $r){
            $max=$r['Max_Nopay_half'];
        }
        return $max;


    }

    public function get_max_full(){
        $query=$this->db->query("SELECT * FROM leavedetails");
        $rows=$query->result_array();
        $max=0;

        foreach($rows as $r){
            $max=$r['Max_Nopay_full'];
        }
        return $max;
    }


    public function  get_half(){
        $query=$this->db->query("SELECT * FROM leavedetails");
        $rows=$query->result_array();
        $max=0;

        foreach($rows as $r){
            $max=$r['Max_half'];
        }
        return $max;


    }

    public function get_full(){
        $query=$this->db->query("SELECT * FROM leavedetails");
        $rows=$query->result_array();
        $max=0;

        foreach($rows as $r){
            $max=$r['Max_full'];
        }
        return $max;
    }




    public function add_leave($params1,$params2){
        $this->db->insert('leaves',$params1);
        $this->db->insert('adminleavenotifications',$params2);

    }


    public function get_admin_leave(){

        $query=$this->db->query("SELECT leaves.Type,FirstName,MiddleName,LastName,Start_Year,Start_Month,Start_Date,End_Year,End_Month,End_Date,Reason,Description,Image,Leave_ID,ID from Leaves  JOIN Person ON  leaves.User_ID=Person.User_ID NATURAL JOIN AdminLeaveNotifications where Checked=FALSE");
        return $query->result_array();
    }

    public function get_employee_leave(){
        $id=$this->session->userdata('username');
        $query=$this->db->query("SELECT *FROM employeeleavenotifications NATURAL JOIN leaves where User_ID='$id' and Checked=false");
        return $query->result_array();
    }

    public function reject($Leave_ID,$ID,$params1,$params2){

        $this->db->where('ID',$ID);
        $this->db->update('adminleavenotifications',$params1);

        $this->db->where('Leave_ID',$Leave_ID);
        $this->db->update('leaves',$params2);

    }


    public function approve($Leave_ID,$ID,$params1,$params2){

        $this->db->where('ID',$ID);
        $this->db->update('adminleavenotifications',$params1);


        $this->db->where('Leave_ID',$Leave_ID);
        $this->db->update('leaves',$params2);

    }

    public function notify($params1){
        $this->db->insert('employeeleavenotifications',$params1);
    }

    public function employee_mark($ID,$params1){
        $this->db->where('ID',$ID);
        $this->db->update('employeeleavenotifications',$params1);
    }





}