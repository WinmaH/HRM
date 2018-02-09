<?php


class Hrm_salary extends CI_Controller
{
    function __construct()
    {
        parent::__construct();

        $this->load->model('Hrm_salary_model');
        $this->load->library("Aauth");

        if(!$this->aauth->is_loggedin()) redirect('/login');
    }



    function index($page = 1)
    {

        $year = date('Y');
        $m=date('m');


        $array=array('01'=>'January','02'=>'February','03'=>'March','04'=>'April','05'=>'May','06'=>'June','07'=>'July','08'=>'August','09'=>'September','10'=>'October','11'=>'November','12'=>'December');
        $month=$array[$m];

        $per_page = 25;
       $count = $this->Hrm_salary_model->get_salary_paid_count($year,$month);


       $pages = ceil($count/$per_page);

        $data['clients'] = $this->Hrm_salary_model->get_paged_salary($year,$month,($page-1)*$per_page, $per_page);
        $data['pages'] = $pages;
        $data['page'] = $page;

        $data['_view'] = 'hrm_salary/index';
        $this->load->view('hrm_layouts/main',$data);
    }

    function pay($page=1){
        $year = date('Y');
        $m=date('m');

        $array=array('01'=>'January','02'=>'February','03'=>'March','04'=>'April','05'=>'May','06'=>'June','07'=>'July','08'=>'August','09'=>'September','10'=>'October','11'=>'November','12'=>'December');
        $month=$array[$m];

        $per_page = 25;
        $count = $this->Hrm_salary_model->get_salary_not_paid_count($year,$month);

        $pages = ceil($count/$per_page);

        $data['clients'] = $this->Hrm_salary_model->get_paged_not_salary($year,$month,($page-1)*$per_page, $per_page);
        $data['pages'] = $pages;
        $data['page'] = $page;



        $data['_view']='hrm_salary/pay';
        $this->load->view('hrm_layouts/main',$data);
    }

    function pay_sheet(){
        $data['_view']='hrm_salary/pay_sheet';
        $this->load->view('hrm_layouts/main',$data);

    }

}