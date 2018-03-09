<?php

/**
 * Created by PhpStorm.
 * User: acer
 * Date: 3/1/2018
 * Time: 10:51 PM
 */
class Hrm_training_model extends CI_Model
{
    public function get_program_details($offset=0, $count=500){
        $this->db->limit($count, $offset);
        $query=$this->db->query("SELECT * from trainingprogram");
        $row=$query->result_array();
        return $row;
    }
    public function get_program_count(){
        $query=$this->db->query("SELECT * from trainingprogram");
        return $query->num_rows();
    }

    public function remove_employee($User_ID,$Program_ID){
        $params=array('User_ID'=>$User_ID,
        'Program_ID'=>$Program_ID);
        $this->db->where($params);
        $this->db->delete('participate');
    }

    public function get_program_title($Program_ID){
        $query=$this->db->query("SELECT * FROM trainingprogram where Program_ID='$Program_ID'");
        $row=$query->row_array();
        return $row;
    }
    public function add($params){
        $this->db->insert('trainingprogram',$params);
        return $this->db->insert_id();
    }
    public function get_employee($Program_ID,$offset=0,$count=500){
        $this->db->limit($count, $offset);
        $query=$this->db->query("SELECT * FROM participate NATURAL JOIN person WHERE Program_ID='$Program_ID'");
        $row=$query->result_array();
        return $row;
    }
    public function participate_employee($params){
        $this->db->insert('participate',$params);
        return $this->db->insert_id();
    }

    public function has_record($Program_ID,$User_ID){
        $query=$this->db->query("SELECT * from participate WHERE Program_ID='$Program_ID' AND User_ID='$User_ID'");
        return $query->num_rows();
    }

    function get_last_record()

    {
        $query=$this->db->query("SELECT * FROM trainingprogram ORDER BY Program_ID DESC LIMIT 1");
        $row=$query->row_array();
        return $row;
    }

}