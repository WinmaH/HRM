<div class="ui left fixed inverted vertical menu" id="sidebar">

    <div class="item">
        Hello <?=$this->session->userdata('username'); ?> !

    </div>
    <div class="ui divider"></div>



    <?php if($this->aauth->is_admin()){ ?>
        <a class="item" href="<?php echo base_url('Login/view_dashboard'); ?>"><i class="block layout icon"></i>Dashboard</a>
        <a class="item" href="<?php echo base_url('Hrm_employee'); ?>"><i class="Add User icon"></i>Employee</a>
        <a class="item" href="<?php echo base_url('Hrm_attendance/load'); ?>"><i class="Checkmark Box icon"></i>Attendance</a>
        <a class="item" href="<?php echo base_url('Hrm_salary/index'); ?>"><i class="Dollar icon"></i>Salary Payments</a>
        <a class="item" href="<?php echo base_url('Hrm_salary/pay_sheet_form'); ?>"><i class="Newspaper icon"></i>Pay Sheets</a>
        <a class="item" href="<?php echo base_url('Hrm_Notification/show_admin_not'); ?>"><i class="Announcement icon"></i>Leave Notifications</a>
        <a class="item" href="<?php echo base_url('Hrm_training/load'); ?>"><i class="chart line icon"></i>Training Programs</a>
        <a class="item" href="<?php echo base_url('Hrm_rates/load'); ?>"><i class="tasks icon"></i>Rates</a>
        <a class="item" href="<?php echo base_url('Hrm_promotions/load_previous_details'); ?>"><i class="angle double up icon"></i>Employee Promotions</a>

    <?php }

    else{?>
        <a class="item" href="<?php echo base_url('Login/view_employee_dashboard'); ?>"><i class="block layout icon"></i>Dashboard</a>
        <a class="item" href="<?php echo base_url('Hrm_employee/full/'.$this->session->userdata('username')); ?>"><i class="user outline icon"></i>Personal Details</a>
        <a class="item" href="<?php echo base_url('Hrm_employee/edit/'.$this->session->userdata('username')); ?>"><i class="pencil alternate icon"></i>Edit</a>
        <a class="item" href="<?php echo base_url('Hrm_salary/own_salary'); ?>"><i class="Dollar icon"></i>Salary</a>
        <a class="item" href="<?php echo base_url('Hrm_attendance/monthly_attendance/'.$this->session->userdata('username')); ?>"><i class="Checkmark Box icon"></i>Attendance</a>
        <a class="item" href="<?php echo base_url('Hrm_leaves/apply'); ?>"><i class="Remove User icon"></i>Leave</a>
        <a class="item" href="<?php echo base_url('Hrm_leaves/view/'.$this->session->userdata('username')); ?>"><i class="chart bar outline icon"></i>Leave History</a>
        <a class="item" href="<?php echo base_url('Hrm_Notification/show_employee_not'); ?>"><i class="Announcement icon"></i>Notifications</a>

    <?php }?>

    <a class="item" href="<?php  echo base_url('Hrm_settings/view'); ?>"><i class="settings icon"></i> Account Settings</a>
    <a class="item" href="<?php  echo base_url('Login/login1'); ?>">Logout</a>

</div>