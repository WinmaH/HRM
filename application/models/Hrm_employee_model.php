<?php

/**
 * Created by PhpStorm.
 * User: acer
 * Date: 2/1/2018
 * Time: 3:40 PM
 */
class Hrm_employee_model extends CI_Model
{

    //query to get the employee details
    function get_employees()

    {
        $query=$this->db->query("SELECT * from person NATURAL JOIN  employee");
        $row=$query->row_array();
        return $row;
    }

    function get_employee()

    {
        $query=$this->db->query("SELECT * from person NATURAL JOIN  employee");
        $row=$query->result_array();
        return $row;
    }

    function check_employee($email,$tp){
        $query=$this->db->query("SELECT * from person WHERE TP='$tp' AND E_mail='$email'");
        return $query->num_rows();
    }

    //query to get the employee count
    function get_employee_count()

    {
        $query=$this->db->query("SELECT * from person NATURAL JOIN  employee");
        return $query->num_rows();
    }

    function get_paged_employee($offset=0, $count=500)
    {
        $this->db->limit($count, $offset);
        $query=$this->db->query("SELECT * from person NATURAL JOIN  employee");
        return $query->result_array();
    }

    function get_designation(){
        $query=$this->db->query("SELECT * FROM designation");
        return $query->result_array();
    }

    // query to get the basic salary
    function get_basic(){
        $query=$this->db->query("SELECT * FROM basic");
        return $query->result_array();
    }

    function add_employee($params1,$params2){
        $this->db->insert('person',$params1);
        $this->db->insert('employee',$params2);
        return $this->db->insert_id();
    }


    //query to edit details
    function edit_employee($params1,$params2,$User_ID){
        $this->db->where('User_ID',$User_ID);
        $this->db->update('person',$params1);

        $this->db->where('User_ID',$User_ID);
        $this->db->update('employee',$params2);
    }

    function count_employee(){
        return $this->db->count_all_results('person');
    }

    /**
     * @param $User_ID
     */

    //get the employee cv on request
    function get_cv($User_ID){
        $this->db->select('CV');
        $this->db->from('employee');
        $this->db->where('employee.User_ID', $User_ID);
        $query= $this->db->get();
        $result=$query->result_array();
        foreach ($result as $r){
            $cv=$r['CV'];
        }
        RETURN $cv;
    }

    //get details of a single user
    function get_single_user($User_ID){
        $query=$this->db->query(" SELECT * from person natural join employee where person.User_ID='$User_ID' ");
        return $query->result_array();

    }

}