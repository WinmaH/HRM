<?php

/**
 * Created by PhpStorm.
 * User: acer
 * Date: 2/18/2018
 * Time: 8:39 PM
 */
class Hrm_dashboard_model extends CI_Model
{
    function get_tot_employee_count(){

        $query=$this->db->query("SELECT * FROM employee");
        return $query->num_rows();
    }

    function get_new_employee_count($year,$month){
        $query=$this->db->query(" SELECT * from employee WHERE Register_year='$year' AND Register_month='$month' ");
        return$query->num_rows();

    }


}