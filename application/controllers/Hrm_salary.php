<?php


class Hrm_salary extends CI_Controller
{
    function __construct()
    {
        parent::__construct();

        $this->load->model('Hrm_salary_model');
        $this->load->model('Hrm_leave_model');
        $this->load->model('Hrm_employee_model');

        $this->load->library("Aauth");
        $this->load->library('pdf_report');

        if(!$this->aauth->is_loggedin()) redirect('/login');
    }

    function pay_sheet_form(){
        $data['user']=$data['user']=$this->Hrm_employee_model->get_employee();
        $data['_view'] = 'hrm_paysheets/index';
        $this->load->view('hrm_layouts/main',$data);
    }

    function generate_sheet(){
        $year = $this->input->post('year');
        $month= $this->input->post('month');

        $emp=$this->input->post('emp');
        $arr=explode(" ",$emp);
        $User_ID=$arr[sizeof($arr)-1];

        $result=$this->Hrm_salary_model->has_record($User_ID,$year,$month);
        if($result==1){
            // get the particular record and pass the details to the pdf generator file
            $user=$this->Hrm_salary_model->get_particular_salary($User_ID,$year,$month);
            $employee=$this->Hrm_employee_model->get_user($User_ID);
            $data['first']=$employee['FirstName'];
            $data['second']=$employee['MiddleName'];
            $data['last']=$employee['LastName'];
            $data['designation']=$employee['Designation'];
            $advances=$user['Amount_advances'];
            $data['advances']=$advances;
            $cutoffs=$user['Other_cutoffs'];
            $data['cutoffs']=$cutoffs;
            $etf=$user['Amount_ETF'];
            $data['etf']=$etf;
            $epf=$user['Amount_EPF'];
            $data['epf']=$epf;
            $normal=$user['Normal_Salary'];
            $basic=$this->Hrm_salary_model->get_basic();
            $data['salary']=$normal+$basic;
            $data['final']=$normal+$basic+$advances-$cutoffs-$etf-$epf;
            $data['year']=$year;
            $data['month']=$month;
            $data['day']= date("Y-m-d");



            $this->load->view('hrm_paysheets/view',$data);

        } else{
            // generate eror message as salary is not paid
            $data['err']="Sorry your request cannot be proceed. Employee is not paid for the particular month !";
            $data['_view'] = 'hrm_layouts/fail';
            $this->load->view('hrm_layouts/main',$data);
        }


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
        $data['basic']=$this->Hrm_salary_model->get_basic();
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

    function pay_form($id,$name,$err=null){
        $data['id']=$id;
        $data['name']=$name;

        if(isset($err)){
            $data['err']=$err;
        }
        $data['_view']='hrm_salary/pay_form';
        $this->load->view('hrm_layouts/main',$data);

    }

    function get_basic_details(){
        $this->load->library('form_validation');
        $this->form_validation->set_rules("cutoffs","Cut-offs","required");
        $this->form_validation->set_rules("advances","Advances","required");
        $this->form_validation->set_rules("month","Month","required");
        $this->form_validation->set_rules("year","Year","required");

        $id= $this->input->post('emp_id');
        $name=$this->input->post('first_name');

        if($this->form_validation->run()){
            $params1=array(
            'id'=> $this->input->post('emp_id'),
            'name'=>$this->input->post('first_name'),
            'cutoffs'=> $this->input->post('cutoffs'),
            'advances'=>$this->input->post('advances'),
            'month'=> $this->input->post('month'),
            'year'=>$this->input->post('year')
            );
            $this->complete_payment($params1);


        } else{
            $err=validation_errors();
            //$data['err']=$err;
            $this->pay_form($id,$name,$err);
        }

    }

    function complete_payment($params1){

        $id=$params1['id'];
        $month=$params1['month'];
        $year=$params1['year'];

        //get the etf epf rates, leave details of the employee

        $taken_half= $this->Hrm_leave_model->get_taken_half($id,$month,$year);
        $taken_full=$this->Hrm_leave_model->get_taken_full($id,$month,$year);

        $max_half=$this->Hrm_leave_model->get_half();
        $max_full=$this->Hrm_leave_model->get_full();

        $no_pay_days=0;

        if($taken_half>$max_half){
            $no_pay_days+=0.5;
        }
        if($taken_full>$max_full){
            $no_pay_days+=1;
        }

        $basic=$this->Hrm_salary_model->get_basic();
        $epf=$this->Hrm_salary_model->get_epf();
        $etf=$this->Hrm_salary_model->get_etf();

        $monthly=$this->Hrm_salary_model->get_monthly_salary($id);

        $additional=$monthly-$basic;
        $params2=array(
            'no_pay_days'=>$no_pay_days,
            'epf'=>$epf,
            'etf'=>$etf,
            'basic'=>$basic,
            'additional'=>$additional
        );
        $data['params1']=$params1;
        $data['params2']=$params2;
        $data['_view']='hrm_salary/complete_form';
        $this->load->view('hrm_layouts/main',$data);
    }

    function complete($id,$month,$year){
        $params1=array(
            'User_ID'=>$id,
            'Year'=>$year,
            'Month'=>$month,
            'Amount_advances'=>$this->input->post('advances'),
            'Other_cutoffs'=>$this->input->post('cutoffs'),
            'Normal_Salary'=>$this->input->post('additional'),
            'Amount_ETF'=>$this->input->post('etf'),
            'Amount_EPF'=>$this->input->post('epf'),
            'Paid'=>true
        );

        $value=$this->Hrm_salary_model->check($id,$month,$year);

        if($value==null){
            $this->Hrm_salary_model->salary_payment($params1);
            $data['success']="Payment details were recoded Successfully!";
            $data['_view']='hrm_layouts/success';
            $this->load->view('hrm_layouts/main',$data);
        }
        else{
            $data['success']="The Employee is already paid !";
            $data['_view']='hrm_layouts/fail';
            $this->load->view('hrm_layouts/main',$data);
        }



    }

    function own_salary(){
        $User_ID=$this->session->userdata('username');
        $data['user']=$this->Hrm_salary_model->get_last_salary($User_ID);
        $data['basic']=$this->Hrm_salary_model->get_basic();
        $data['_view']='hrm_salary/employee_salary';
        $this->load->view('hrm_layouts/main',$data);

    }

    function load_payment_history(){
        $data['_view']='hrm_salary/payment_history_form';
        $this->load->view('hrm_layouts/main',$data);
    }

    function view_records(){
        $this->load->library('form_validation');
        $this->form_validation->set_rules("year","Year","required|exact_length[4]");
        $year= $this->input->post('year');
        $month=$this->input->post('month');

            $page=1;
            $per_page = 25;
            $count = $this->Hrm_salary_model->get_salary_paid_count($year,$month);

            $pages = ceil($count/$per_page);

            $data['clients'] = $this->Hrm_salary_model->get_paged_salary($year,$month,($page-1)*$per_page, $per_page);
            $data['pages'] = $pages;
            $data['page'] = $page;
            $data['basic']=$this->Hrm_salary_model->get_basic();
            $data['taken_full']=$month;
            $data['_view'] = 'hrm_salary/payment_history';
            $this->load->view('hrm_layouts/main',$data);



    }

}