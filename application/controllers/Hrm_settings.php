<?php

/**
 * Created by PhpStorm.
 * User: acer
 * Date: 3/3/2018
 * Time: 9:52 PM
 */
class Hrm_settings extends CI_Controller
{

    function backup() {
        $this->load->dbutil();
        $prefs = array(
            'format'      => 'zip',
            'filename'    => 'hrm_backup.sql'
        );
        $backup =$this->dbutil->backup($prefs);
        $db_name = 'backup-on-'. date("Y-m-d-H-i-s") .'.zip';
        $save = 'files/'.$db_name;

        $this->load->helper('file');
        write_file($save, $backup);

        $this->load->helper('download');
        force_download($db_name, $backup);
    }

    function view($err=null){
        $data['err']=$err;
        $data['_view'] = 'hrm_settings/view';
        $data['admin']=$this->aauth->is_admin();
        $this->load->view('hrm_layouts/main',$data);
    }

    function change_pass(){
        $this->load->library('form_validation');
        $this->form_validation->set_rules("password","Password","required|min_length[6]");
        $this->form_validation->set_rules("cpassword","Confirm Password","required|matches[password]");

        if($this->form_validation->run()){
        $password =	   $this->input->post('password');
        $cpassword =	$this->input->post('cpassword');
             $user_id = $this->aauth->get_user_id();
            $result=$this->aauth->update_user($user_id , FALSE , $password , FALSE );
            if($result){
               $success="Successfully updated Password!";
               $data['success']=$success;
               $data['_view']='hrm_layouts/success';
                $this->load->view('hrm_layouts/main',$data);;
            } else{
                $err="Password update failed!";
                $this->view($err);
            }

    }else{
            $err=validation_errors();
            $this->view($err);
        }
    }

}