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
                <h3 class="ui header">New Position Details of <?php echo $id.'-'.$name;?></h3>
            </div>
            <div class="ui segment">
                <?php echo form_open_multipart('Hrm_promotions/edit_designation/'.$id.'/'.$name.'/'.$basic,array("class"=>"ui form")); ?>
                <div class="ui form">

                    <div class="two fields">
                        <div class="field">
                            <label for="email">Designation:</label>

                            <select name="designation" class="ui dropdown">
                                <?php foreach($designation as $d){ ?>
                                    <option><?php echo $d['Title'];?></option>
                                <?php }?>
                            </select>

                        </div>
                        <div class="field">
                            <label for="email">Additional Salary:</label>
                            <div class="ui right labeled input">
                                <label for="amount" class="ui label">Rs</label>
                                <input type="text" name="additional" value="<?php echo  $basic;?>"  id="additional" />
                                <div class="ui basic label">.00</div>
                            </div>
                        </div>

                    </div>

                    <button type="submit" class="ui primary button">Promote</button>

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

</script>




<script type="text/javascript">
    $(function() {

        //autocomplete
        $(".ui teal button").popup({
            on: 'click'
        });

    });
</script>




