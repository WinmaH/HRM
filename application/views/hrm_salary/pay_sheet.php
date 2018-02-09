<div class="ui grid">

    <div class="sixteen wide column">




        <?php if(isset($err)){

            echo ' <div class="ui error message">
            <i class="close icon"></i>
            <div class="header">
                Error.......
            </div>
            <ul class="list">
                <li>'. $err.'</li>

            </ul>
        </div>';

        }
        ?>

        <div class="ui segments">
            <div class="ui segment">
                <h3 class="ui header">Generate Pay Sheet</h3>
            </div>
            <div class="ui segment">
                <?php echo form_open_multipart('Hrm_employee/add_new_employee',array("class"=>"ui form")); ?>
                <div class="ui form">

                    <div class="field">
                        <label for="first_name">User Id :</label>
                        <input type="text" name="first_name" value="<?php echo $this->input->post('first_name'); ?>"  id="first_name" />
                    </div>



                    <div class="field">
                        <label for="last_name">Year:</label>
                        <input type="text" name="year" value="<?php echo $this->input->post('year'); ?>"  id="year" />
                    </div>


                    <div class="field">
                        <label for="month">Month:</label>
                        <select name="month">
                            <option>January</option>
                            <option>February</option>
                            <option>March</option>
                            <option>April</option>
                            <option>May</option>
                            <option>June</option>
                            <option>July</option>
                            <option>August</option>
                            <option>September</option>
                            <option>October</option>
                            <option>November</option>
                            <option>December</option>
                        </select>
                    </div>

                    <button type="submit" class="ui primary button">Generate </button>

                </div>
                <?php echo form_close(); ?>
            </div>
        </div>
    </div>
</div>





