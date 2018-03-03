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
                <h3 class="ui header">New Training Program</h3>
            </div>
            <div class="ui segment">
                <?php echo form_open_multipart('Hrm_training/new_training_program',array("class"=>"ui form")); ?>
                <div class="ui form">

                    <div class="two fields">
                    <div class="field">
                        <label for="emp_id">Title:</label>
                        <input type="text" name="title" value="<?php echo $this->input->post('title'); ?>"  id="title" />
                    </div>

                    <div class="field">
                        <label for="birthday">Date:</label>
                        <div class="ui calender input left icon  " >
                            <i class="calendar icon"></i>
                            <input type="text" name="date" value="<?php echo $this->input->post('date'); ?>"  id="date" />
                        </div>
                    </div>

                    </div>
                    <div class="field">
                        <label for="first_name">Venue:</label>
                        <input type="text" name="venue" value="<?php echo $this->input->post('venue'); ?>"  id="venue"/>
                    </div>

                    <div class="field">
                        <label for="first_name">Description:</label>
                        <input type="text" name="des" value="<?php echo $this->input->post('des'); ?>"  id="des"/>
                    </div>



                    <button type="submit" class="ui primary button">Add</button>

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




