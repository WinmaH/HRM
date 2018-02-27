

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

        <?php if(isset($success)){



            echo ' <div class="ui success message">
            <i class="close icon"></i>
            
            <div class="header">
            Successful !
            </div>
                <p>'; echo nl2br($success); echo '<p>
  
            
        </div>';

        }
        ?>





        <div class="ui segments">

            <div class="ui segment">


                <div class="ui four statistics">
                    <div class="red statistic">
                        <div class="value">
                            <?php echo $taken_half; ?>
                        </div>
                        <div class="label">
                            Taken Half Day Leaves
                        </div>
                    </div>
                    <div class=" red statistic">
                        <div class="value">
                            <?php echo $taken_full;?>
                        </div>
                        <div class="label">
                                Taken Full Day Leaves
                        </div>
                    </div>
                    <div class=" green statistic">
                        <div class="value">
                            <?php echo ($max_half-$taken_half);?>
                        </div>
                        <div class="label">
                                Remaining Half Day Leaves
                        </div>
                    </div>

                    <div class=" green statistic">
                        <div class="value">
                            <?php echo  ($max_full-$taken_full);?>
                        </div>
                        <div class="label">
                                Remaining Full Day Leaves
                        </div>
                    </div>

                </div>

            </div>
        </div>

        <div class="ui segments">

            <div class="ui segment">
                <h3 class="ui header">Apply For Leaves</h3>
            </div>
            <div class="ui segment">
                <?php echo form_open_multipart('Hrm_leaves/apply_leave',array("class"=>"ui form")); ?>
                <div class="ui form">


                    <div class="two fields">
                        <div class="field" >
                            <label for="started_date">Started Date</label>
                            <div class="ui calender input left icon  " >
                                <i class="calendar icon"></i>
                                <input type="text" name="start" value="<?php echo $this->input->post('start'); ?>" class="form-control" id="started_date" />
                            </div>
                        </div>

                        <div class="field">
                            <label for="end_date">End Date</label>
                            <div class="ui calender input left icon " >
                                <i class="calendar icon"></i>
                                <input type="text" name="end" value="<?php echo $this->input->post('end'); ?>" class="form-control" id="end_date" />
                            </div>
                        </div>
                    </div>


                    <div class="two fields">
                        <div class="field">
                            <label for="religion">Leave Type:</label>
                            <select name="type" class="ui dropdown">
                                <option>Full</option>
                                <option>Half</option>
                            </select>

                        </div>
                        <div class="field">

                            <label for="nationality">Reason:</label>

                            <select name="reason" class="ui dropdown">
                                <option>Medical</option>
                                <option>Official</option>
                                <option>Private</option>
                                <option>Other</option>
                            </select>

                        </div>
                    </div>







                    <div class="field">
                        <label for="description">Description:</label>
                        <input type="text" name="description" value="<?php echo $this->input->post('description'); ?>"  id="description" />
                    </div>

                    <button type="submit" class="ui primary button">Apply</button>


        </div>
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




