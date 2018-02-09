<?php  
    $this->load->view('hrm_templates/header');
    $this->load->view('layout/sidebar');  
?>

<div class="main-content">
	<?php  
		$this->load->view($view, $data);
	?>
</div>

<?php
    $this->load->view('hrm_templates/footer');
?>