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
                <h3 class="ui header">Employee Salary Payment</h3>
            </div>
            <div class="ui segment">
                <?php echo form_open_multipart('Hrm_salary/get_basic_details',array("class"=>"ui form")); ?>
                <div class="ui form">




                        <div class="field">
                            <label for="emp_id">Employee ID:</label>
                            <input type="text" name="emp_id" value="<?php echo $id; ?>"  id="middle_name" readonly />
                        </div>

                        <div class="field">
                            <label for="first_name">First Name:</label>
                            <input type="text" name="first_name" value="<?php echo $name; ?>"  id="first_name"  readonly/>
                        </div>



                    <div class="two fields">

                    <div class="field">
                        <label for="advances">Advances for the Month:</label>
                        <div class="ui right labeled input">
                            <label for="amount" class="ui label">Rs</label>
                            <input type="number" name="advances" value="<?php echo $this->input->post('advances'); ?>"  id="last_name" />
                            <div class="ui basic label">.00</div>
                        </div>

                    </div>

                    <div class="field">
                        <label for="cutoffs">Cut-offs for the Month:</label>
                        <div class="ui right labeled input">
                            <label for="amount" class="ui label">Rs</label>
                            <input type="number" name="cutoffs" value="<?php echo $this->input->post('cutoffs'); ?>"  id="last_name" />
                            <div class="ui basic label">.00</div>
                        </div>

                    </div>
                    </div>

                    <div class="two fields">
                        <div class="field">
                            <label for="month">Month:</label>
                            <select name="month" class="ui dropdown">
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

                        <div class="field">
                            <label for="year">Year:</label>
                            <input type="number" name="year" value="<?php echo date('Y'); ?>"  id="last_name" />
                        </div>

                    </div>


                    <button type="submit" class="ui primary button">Preview Salary Details</button>

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




