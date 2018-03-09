<div class="ui grid">
    <div class="sixteen wide column">
        <div class="ui segments">
            <div class="ui segment">
                <h3 class="ui header">Attendance <?php echo date('Y-m-d');?></h3>
            </div>
            <div class="ui segment">
                <table class="ui celled table">
                    <thead>
                    <tr>
                        <th>Employee ID</th>
                        <th>First Name</th>
                        <th>Last Name</th>
                        <th>Arrival Time</th>
                    </tr>
                    </thead>

                    <?php foreach($clients as $c){ ?>
                        <tr>
                            <td><?php echo $c['User_ID']; ?></td>
                            <td><?php echo $c['FirstName'];; ?></td>
                            <td><?php echo $c['MiddleName']; ?></td>
                            <td><?php echo $c['present_Hour'].":".$c['Present_Minute'].":".$c['Present_Second']; ?></td>

                        </tr>
                    <?php } ?>

                </table>
            </div>
            <div class="ui segment">
                <?php for($i=1; $i<$pages+1; $i++) {  ?>
                    <a class="ui <?=$i==$page? 'teal':''?> label" href="<?=base_url('client/'.$i); ?>">
                        <?php echo $i;?>
                    </a>
                <?php } ?>
            </div>


        </div>
        <div class="ui segments">
            <div class="ui segment">
                <?php echo form_open_multipart('Hrm_attendance/read',array("class"=>"ui form")); ?>
                <div class="ui form">

                    <div class="two fields">
                    <div class="field">
                        <label for="attendance">Attendance Sheet:</label>
                        <div class="ui  input">
                            <input type="file" name="attendance" value="<?php echo $this->input->post('attendance'); ?>"  id="attendance" />
                        </div>

                    </div>
                        <div class="ui left pointing label">
                            Please enter the excel sheet containing attendance
                        </div>
                </div>
                    <button type="submit" class="ui primary button">Enter</button>
                </div>
                <?php echo form_close(); ?>
            </div>

        </div>



    </div>
</div>