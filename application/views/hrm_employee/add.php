<link rel="stylesheet" href="<?php echo base_url('assets/css/calendar.min.css'); ?>" />
<script src="<?php echo base_url('assets/js/calendar.min.js'); ?>"></script>




<div class="ui grid">

    <div class="sixteen wide column">
        <?php if(isset($err)){



       echo ' <div class="ui error message">
            <i class="close icon"></i>
            
            <ul class="list">
                <li>'; echo nl2br($err); echo '</li>

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


                    <div class="two fields">

                    <div class="field">
                        <label for="first_name">First Name:</label>
                        <input type="text" name="first_name" value="<?php echo $this->input->post('first_name'); ?>"  id="first_name" />
                    </div>


                    <div class="field">
                        <label for="middle_name">Middle Name:</label>
                        <input type="text" name="middle_name" value="<?php echo $this->input->post('middle_name'); ?>"  id="middle_name" />
                    </div>

                    </div>

                    <div class="field">
                        <label for="last_name">Last Name:</label>
                        <input type="text" name="last_name" value="<?php echo $this->input->post('last_name'); ?>"  id="last_name" />
                    </div>


                    <div class="two fields">

                        <div class="field">
                        <label>Gender:</label>

                        <select name="gender" class="ui dropdown">
                            <option>Male</option>
                            <option>Female</option>

                        </select>

                    </div>


                    <div class="field">
                        <label for="birthday">Birthday:</label>
                        <div class="ui calender input left icon  " >
                            <i class="calendar icon"></i>
                            <input type="text" name="birthday" value="<?php echo $this->input->post('birthday'); ?>"  id="birthday" />
                        </div>
                    </div>
                    </div>

                    <div class="field">
                        <label for="nic">NIC:</label>
                        <input type="text" name="nic" value="<?php echo $this->input->post('nic'); ?>"  id="nic" />
                    </div>

                    <div class="two fields">

                    <div class="field">
                        <label for="postbox">Post Box:</label>
                        <input type="text" name="postbox" value="<?php echo $this->input->post('postbox'); ?>"  id="postbox" />
                    </div>
                    <div class="field">
                        <label for="name">Street:</label>
                        <input type="text" name="street" value="<?php echo $this->input->post('street'); ?>"  id="street" />
                    </div>

                    </div>

                    <div class="field">
                        <label for="name">City:</label>
                        <input type="text" name="city" value="<?php echo $this->input->post('city'); ?>"  id="city" />
                    </div>


                    <div class="two fields">
                    <div class="field">
                        <label>Mobile no:</label>
                        <input type="number" name="mobile" value="<?php echo $this->input->post('mobile'); ?>"  id="mobile" />
                    </div>



                    <div class="field">
                        <label for="email">Email:</label>
                        <input type="text" name="email" value="<?php echo $this->input->post('email'); ?>"  id="email" />
                    </div>
                    </div>


                    <div class="two fields">
                        <div class="field">
                            <label for="religion">Religion:</label>
                            <select name="religion" class="ui dropdown">
                                <option>Buddhism</option>
                                <option>Hinduism</option>
                                <option>Islam</option>
                                <option>Christian</option>
                                <option>Other</option>
                            </select>

                        </div>
                        <div class="field">

                            <label for="nationality">Nationaliy:</label>

                            <select name="nationality" class="ui dropdown">
                                <option>Sri lankan</option>
                                <option>Other</option>
                            </select>

                        </div>
                    </div>


                    <div class="field">
                        <label for="email">Blood Group:</label>
                        <select name="bloodgroup" class="ui dropdown">
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

                        <select name="designation" class="ui dropdown">
                            <?php foreach($designation as $d){ ?>
                            <option><?php echo $d['Title'];?></option>
                            <?php }?>
                        </select>

                    </div>



                    <div class="two fields">

                    <div class="field">
                        <label for="email">Basic Salary:</label>
                        <div class="ui right labeled input">
                            <label for="amount" class="ui label">Rs</label>
                            <input type="text" name="basic" value="<?php foreach ($basic as $b){echo $b['Basic_salary'];} ?>"  id="basic" readonly />
                            <div class="ui basic label">.00</div>
                        </div>
                    </div>



                    <div class="field">
                        <label for="email">Additional Salary:</label>
                        <div class="ui right labeled input">
                            <label for="amount" class="ui label">Rs</label>
                            <input type="text" name="additional" value="<?php  echo $this->input->post('additional');?>"  id="additional" />
                            <div class="ui basic label">.00</div>
                        </div>
                    </div>

                    </div>

                    <div class="two fields">

                    <div class="field">

                        <label for="cv">CV:</label>
                        <div class="ui input">

                        <input type="file" name="cv" value="<?php echo $this->input->post('cv'); ?>"  id="cv" />

                        </div>
                        <div class="ui pointing label">
                            Please enter a PDF document of the cv
                        </div>

                    </div>

                    <div class="field">
                        <label for="image">Image:</label>
                        <div class="ui  input">
                        <input type="file" name="image" value="<?php echo $this->input->post('image'); ?>"  id="image" />
                        </div>
                        <div class="ui pointing label">
                            Please enter an image
                        </div>


                    </div>

                    </div>
                    <button type="submit" class="ui primary button">Save</button>

                </div>
                <?php echo form_close(); ?>
            </div>
        </div>
    </div>
</div>


<script>
    $(function() {
        $('.ui.dropdown').dropdown();
    });
    $('.calender.input').calendar({
        type: 'date',
        formatter: {
            date: function (date, settings) {
                if (!date) return '';
                var day = date.getDate();
                var month = date.getMonth() + 1;
                var year = date.getFullYear();
                return year + '-' + month + '-' + day;
            }
        }});
</script>




<script type="text/javascript">
    $(function() {

        //autocomplete
        $(".ui teal button").popup({
            on: 'click'
        });

    });
</script>




