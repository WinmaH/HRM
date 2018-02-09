<?php

/**
 * Created by PhpStorm.
 * User: acer
 * Date: 2/7/2018
 * Time: 7:28 PM
 */
class Hrm_salary_model extends CI_Model
{


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


}