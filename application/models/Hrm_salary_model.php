<?php

/**
 * Created by PhpStorm.
 * User: acer
 * Date: 2/7/2018
 * Time: 7:28 PM
 */
class Hrm_salary_model extends CI_Model
{

//get employees who are paid thismonth
function get_salary_paid_count($year,$month){
    $query=$this->db->query("SELECT * FROM salary WHERE Year='$year' AND Month='$month'");
    return $query->num_rows();
}

function get_paged_salary($year,$month,$count,$offset){
    $this->db->limit($count, $offset);
    $query=$this->db->query("SELECT * from salary WHERE Year='$year' AND Month='$month'");
    return $query->result_array();

}

function get_salary_not_paid_count($year,$month){
    $query=$this->db->query("SELECT * FROM employee WHERE User_ID NOT IN (SELECT User_ID FROM salary WHERE Year='$year' AND Month='$month')");
    return$query->num_rows();
}

    function get_paged_not_salary($year,$month,$count,$offset){
        $this->db->limit($count, $offset);
        $query=$this->db->query("SELECT * FROM employee NATURAL JOIN person WHERE User_ID NOT IN (SELECT User_ID FROM salary WHERE Year='$year' AND Month='$month')");

        return $query->result_array();

    }

    //get etf rate
    function get_etf(){
        $query=$this->db->query("SELECT * FROM etf");
        $etf=$query->result_array();
        foreach ($etf as $e){
            $v=$e['Rate'];
        }
        RETURN $v;

    }

    // get epf rate
    function get_epf(){
        $query=$this->db->query("SELECT * FROM epf");
        $epf=$query->result_array();
        foreach ($epf as $e){
            $v=$e['Rate'];
        }
        RETURN $v;
    }

    function get_monthly_salary($id){
        $query=$this->db->query("SELECT * FROM employee WHERE User_ID='$id'");
        $epf=$query->result_array();
        foreach ($epf as $e){
            $v=$e['Salary'];
        }
        RETURN $v;

    }
    function get_basic(){
        $query=$this->db->query("SELECT * FROM basic");
        $epf=$query->result_array();
        foreach ($epf as $e){
            $v=$e['Basic_salary'];
        }
        RETURN $v;


    }
    //insert into paid salary details
    function salary_payment($params1){
        $this->db->insert('salary',$params1);
        return $this->db->insert_id();
    }
    //check whether the employee is paid for this month
    function check($id,$month,$year){
        $query=$this->db->query("SELECT * FROM salary WHERE User_ID='$id' AND Year='$year' AND Month='$month'");
        return $query->result_array();
    }

}