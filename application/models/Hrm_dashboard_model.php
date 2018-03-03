<?php

/**
 * Created by PhpStorm.
 * User: acer
 * Date: 2/18/2018
 * Time: 8:39 PM
 */
class Hrm_dashboard_model extends CI_Model
{
    //total no of employees registered in the system
    function get_tot_employee_count(){
        $query=$this->db->query("SELECT * FROM employee");
        return $query->num_rows();
    }
    //get new employees who are registered this month
    function get_new_employee_count($year,$month){
        $query=$this->db->query(" SELECT * from employee WHERE Register_year='$year' AND Register_month='$month' ");
        return$query->num_rows();

    }
    //get the total amount of salary paid for this month
    function get_tot_salary_this_month($year,$month,$basic){
        $query=$this->db->query(" SELECT * from salary WHERE Year='$year' AND Month='$month' ");
        $result=$query->result_array();
        $tot=0;
        foreach ($result as $r){
            $tot=$tot+$r['Normal_Salary']+$r['Amount_advances']-$r['Other_cutoffs']-$r['Amount_ETF']-$r['Amount_EPF']+$basic;
        }
        RETURN $tot;
    }
    function get_male_employee_count(){
        $query=$this->db->query(" SELECT * from employee natural join person WHERE Gender='Male' ");
        return$query->num_rows();
    }


}