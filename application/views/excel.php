<?php
    $data['title']="Excel";
    $this->load->view('hrm_templates/header',$data);
?>


<body>
<div>

    <?php echo form_open_multipart('Excel_handler/load',array("class"=>"ui form")); ?>
    <div class="ui-form">

        <div class="field">
            <label for="name">Choose the file</label>
            <input type="file" name="file_input" />
        </div>



        <button type="submit" class="ui primary button" name="sub" >Save</button>


    </div>
    <?php echo form_close(); ?>


</div>

</body>

<?php
$this->load->view('hrm_templates/footer');
?>


