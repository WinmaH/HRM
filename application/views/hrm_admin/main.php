<?php
$data['title']="hrm_admin Window";

$this->load->view('hrm_templates/header',$data);
$this->load->view('hrm_layouts/side_bars',$data);
?>


<p> Welcome <?php echo $user_name?>  </p>



<?php
$this->load->view('hrm_templates/footer');
?>