<?php

/**
 * Created by PhpStorm.
 * User: acer
 * Date: 2/2/2018
 * Time: 11:47 PM
 */
class Excel_handler extends CI_Controller
{
    public function index(){


        $this->load->library('Excel');
        $this->load->helper('file');
        $file='./files/Book1.xlsx';
        $obj=PHPExcel_IOFactory::load($file);
        //print_r($obj);
        $cell_collection=$obj->getActiveSheet()->getCellCollection();

        foreach ($cell_collection as $cell){
            $column=$obj->getActiveSheet()->getCell($cell)->getColumn();
            $row=$obj->getActiveSheet()->getCell($cell)->getRow();
            $data_value=$obj->getActiveSheet()->getCell($cell)->getValue();


            echo  $data_value;

            if($row==1){


            }else{

            }
        }
        $this->load->view('excel');




    }




    public function load(){
        if(isset($_POST['sub'])){

        $file=$this->input->post('file_input');








            //Path of files were you want to upload on localhost (C:/xampp/htdocs/ProjectName/files/)
            $configUpload['upload_path'] = FCPATH.'./files/';
            $configUpload['allowed_types'] = 'xls|xlsx|csv';
            $configUpload['max_size'] = '5000';
            $this->load->library('upload', $configUpload);
            $this->upload->do_upload('file_input');
            $upload_data = $this->upload->data(); //Returns array of containing all of the data related to the file you uploaded.

            $file_name = $upload_data['file_name']; //uploded file name
            $extension=$upload_data['file_ext'];    // uploded file extension

            echo $file_name;
            echo $extension;



            $this->load->library('Excel');

            $obj=PHPExcel_IOFactory::load(FCPATH.'files/'.$file_name);
            //print_r($obj);
            $cell_collection=$obj->getActiveSheet()->getCellCollection();

            foreach ($cell_collection as $cell){
                $column=$obj->getActiveSheet()->getCell($cell)->getColumn();
                $row=$obj->getActiveSheet()->getCell($cell)->getRow();
                $data_value=$obj->getActiveSheet()->getCell($cell)->getValue();


                echo  $data_value;}

            unlink('./files/'.$file_name);
            //$this->load->helper("file");
            delete_files('./files/'.$file_name);
















        /**if($file!=null){
            $this->load->library('Excel');

            $obj=PHPExcel_IOFactory::load($file);
            //print_r($obj);
            $cell_collection=$obj->getActiveSheet()->getCellCollection();

            foreach ($cell_collection as $cell){
                $column=$obj->getActiveSheet()->getCell($cell)->getColumn();
                $row=$obj->getActiveSheet()->getCell($cell)->getRow();
                $data_value=$obj->getActiveSheet()->getCell($cell)->getValue();


                echo  $data_value;

                if($row==1){


                }else{

                }
            }
        }

        else{
            $data['file']="noop";
            $this->load->view('excel');


        }
         **/

    }
    }




}