<?php
$data['title']='HRM';
$this->load->view('hrm_templates/header',$data);
?>

<?php

     $this->load->view('hrm_layouts/side_bars');
if(isset($designation)){
    $data['designation']=$designation;
}
if(isset($basic)){
    $data['basic']=$basic;
}

if(isset($err)){
    $data['err']=$err;
}
if(isset($user)){
    $data['user']=$user;
}

?>
<div class="main-content">
    <?php	if(isset($_view) && $_view)
        $this->load->view($_view,$data);
    ?>
</div>

    <div class="main-content">
        <?php	if(isset($_view1) && $_view1)
            $this->load->view($_view1,$data);
        ?>
    </div>



<?php
$this->load->view('hrm_templates/footer',$data);
?>