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
                <h3 class="ui header">Add New Employee</h3>
            </div>
            <div class="ui segment">
                <?php echo form_open_multipart('Hrm_employee/add_new_employee',array("class"=>"ui form")); ?>
                <div class="ui form">

                    <div class="field">
                        <label for="first_name">First Name:</label>
                        <input type="text" name="first_name" value="<?php echo $this->input->post('first_name'); ?>"  id="first_name" />
                    </div>

                    <div class="field">
                        <label for="middle_name">Middle Name:</label>
                        <input type="text" name="middle_name" value="<?php echo $this->input->post('middle_name'); ?>"  id="middle_name" />
                    </div>

                    <div class="field">
                        <label for="last_name">Last Name:</label>
                        <input type="text" name="last_name" value="<?php echo $this->input->post('last_name'); ?>"  id="last_name" />
                    </div>

                    <div class="field">
                        <label for="gender">Gender:</label>
                        <select name="gender">
                            <option> Male </option>
                            <option> Female </option>
                        </select>

                    </div>

                    <div class="field">
                        <label for="birthday">Birthday:</label>
                        <input type="date" name="birthday" value="<?php echo $this->input->post('birthday'); ?>"  id="birthday" />
                    </div>

                    <div class="field">
                        <label for="nic">NIC:</label>
                        <input type="text" name="nic" value="<?php echo $this->input->post('nic'); ?>"  id="nic" />
                    </div>

                    <div class="field">
                        <label for="postbox">Post Box:</label>
                        <input type="text" name="postbox" value="<?php echo $this->input->post('postbox'); ?>"  id="postbox" />
                    </div>
                    <div class="field">
                        <label for="name">Street:</label>
                        <input type="text" name="street" value="<?php echo $this->input->post('street'); ?>"  id="street" />
                    </div>

                    <div class="field">
                        <label for="name">City:</label>
                        <input type="text" name="city" value="<?php echo $this->input->post('city'); ?>"  id="city" />
                    </div>
                    <div class="field">
                        <label for="name">Mobile no:</label>
                        <input type="number" name="mobile" value="<?php echo $this->input->post('mobile'); ?>"  id="mobile" />
                    </div>



                    <div class="field">
                        <label for="email">Email:</label>
                        <input type="text" name="email" value="<?php echo $this->input->post('email'); ?>"  id="email" />
                    </div>

                    <div class="field">
                        <label for="email">Nationality:</label>
                        <select name="nationality">
                            <option> Sri lankan </option>
                            <option> Other </option>
                        </select>
                    </div>

                    <div class="field">
                        <label for="email">Religion:</label>
                        <select name="religion">
                            <option>Buddhism</option>
                            <option>Hinduism</option>
                            <option>Islam</option>
                            <option>Christian</option>
                            <option>Other</option>
                        </select>
                    </div>

                    <div class="field">
                        <label for="email">Blood Group:</label>
                        <select name="bloodgroup">
                            <option>A-</option>
                            <option>A+</option>
                            <option>B-</option>
                            <option>B+</option>
                            <option>AB-</option>
                            <option>AB+</option>
                            <option>O-</option>
                            <option>0+</option>
                        </select>
                    </div>

                    <div class="field">
                        <label for="email">Designation:</label>

                        <select name="designation">
                            <?php foreach($designation as $d){ ?>
                            <option><?php echo $d['Title'];?></option>
                            <?php }?>
                        </select>

                    </div>

                    <div class="field">
                        <label for="email">Basic Salary:</label>
                        <input type="text" name="basic" value="<?php foreach ($basic as $b){echo $b['Basic_salary'];} ?>"  id="basic" readonly />
                    </div>

                    <div class="field">
                        <label for="email">Additional Salary:</label>
                        <input type="text" name="additional" value="<?php  echo $this->input->post('additional');?>"  id="additional" />
                    </div>



                    <div class="field">
                        <label for="cv">CV:</label>
                        <input type="file" name="cv" value="<?php echo $this->input->post('cv'); ?>"  id="cv" />
                    </div>

                    <div class="field">
                        <label for="image">CV:</label>
                        <input type="file" name="image" value="<?php echo $this->input->post('image'); ?>"  id="image" />
                    </div>


                    <button type="submit" class="ui primary button">Save</button>

                </div>
                <?php echo form_close(); ?>
            </div>
        </div>
    </div>
</div>





