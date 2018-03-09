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
if(isset($admin)){
    $data['admin']=$admin;
}
if(isset($etf)){
    $data['etf']=$etf;
}
if(isset($epf)){
    $data['epf']=$epf;
}

if(isset($Program_ID)){
    $data['Program_ID']=$Program_ID;
}
if(isset($male)){
    $data['male']=$male;
}

if(isset($taken_half)){
    $data['taken_half']=$taken_half;
}

if(isset($taken_full)){
    $data['taken_full']=$taken_full;
}

if(isset($max_full)){
    $data['max_full']=$max_full;
}
if(isset($success)){
    $data['success']=$success;
}

if(isset($max_half)){
    $data['max_half']=$max_half;
}
if(isset($name)){
    $data['name']=$name;
}
if(isset($total)){
    $data['total']=$total;
}
if(isset($id)){
    $data['id']=$id;
}

if(isset($params1)){
    $data['params1']=$params1;
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