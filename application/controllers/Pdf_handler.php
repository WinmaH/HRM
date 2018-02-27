<?php

/**
 * Created by PhpStorm.
 * User: acer
 * Date: 2/6/2018
 * Time: 11:28 PM
 */
class Pdf_handler extends CI_Controller
{


    public function index()
    {
        // $this->load->view('hrm_user/user_login');

        $this->load->library("Aauth");
        $this->view();



    }
    function view(){

       // $file = './files/Application_for_membership7.pdf';
        //$filename = 'Application_for_membership7.pdf';
        //header('Content-type: application/pdf');
        //header('Content-Disposition: inline; filename="' . $filename . '"');
        //header('Content-Transfer-Encoding: binary');
        //header('Accept-Ranges: bytes');
        //@readfile($file);




        $txt="My name is winma.\n\n winma";
        echo nl2br($txt);
        $txt=$txt."My name is Neelanjana";
        print_r($txt);

       // $this->aauth->create_user('chandramali@gmail.com','123456','chandramali');
        //echo $this->aauth->get_user_id('chandramali@gmail.com');
        //$date = "2010-08-12";
        //$d = date_parse_from_format("Y-m-d", $date);
        //echo $d["month"];
    }

}