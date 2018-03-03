<link rel="stylesheet" href="<?php echo base_url('assets/css/calendar.min.css'); ?>" />
<script src="<?php echo base_url('assets/js/calendar.min.js'); ?>"></script>


<?php
$addi=($params2['additional']/20)*(20-$params2['no_pay_days']);
$et=($addi+$params2['basic'])*$params2['etf']/100;
$ep=($addi+$params2['basic'])*$params2['epf']/100;
$id=$params1['id'];
$month=$params1['month'];
$year=$params1['year'];

?>

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
                <h3 class="ui header">Salary Payment</h3>
                <h4 class="ui header"> <?php echo " ".$params1['name']."-".$params1['id']." ".$params1['month']." ".$params1['year'];?></h4>
            </div>
            <div class="ui segment">
                <?php echo form_open_multipart('Hrm_salary/complete/'.$id.'/'.$month.'/'.$year,array("class"=>"ui form")); ?>
                <div class="ui form">



                    <div class="two fields">
                        <div class="field">
                            <label for="cutoffs">No Pay Leaves taken:</label>
                            <input type="number" name="no_pay" value="<?php echo $params2['no_pay_days'];?>"  id="last_name"  readonly/>
                        </div>

                    </div>

                    <div class="two fields">
                        <div class="field">
                            <label for="advances">Basic:</label>
                            <div class="ui right labeled input">
                                <label for="amount" class="ui label">Rs</label>
                                <input type="number" name="advances" value="<?php echo $params2['basic']; ?>"  id="last_name"  readonly/>
                                <div class="ui basic label">.00</div>
                            </div>
                        </div>



                        <div class="field">

                            <label for="cutoffs"> Additional Salary considering the leaves taken:</label>
                            <div class="ui right labeled input">
                                <label for="amount" class="ui label">Rs</label>
                                <input type="number" name="additional" value="<?php echo ($params2['additional']/28)*(28-$params2['no_pay_days']) ?>"  id="last_name" readonly/>
                                <div class="ui basic label">.00</div>
                            </div>

                        </div>
                    </div>



                    <div class="two fields">
                        <div class="field">
                            <label for="advances">Advances for the Month:</label>
                            <div class="ui right labeled input">
                                <label for="amount" class="ui label">Rs</label>
                                <input type="number" name="advances" value="<?php echo $params1['advances']; ?>"  id="last_name" readonly/>
                                <div class="ui basic label">.00</div>
                            </div>

                        </div>

                        <div class="field">
                            <label for="cutoffs">Cut-offs for the Month:</label>
                            <div class="ui right labeled input">
                                <label for="amount" class="ui label">Rs</label>
                                <input type="number" name="cutoffs" value="<?php echo $params1['cutoffs']; ?>"  id="last_name" readonly/>
                                <div class="ui basic label">.00</div>
                            </div>
                        </div>
                    </div>

                    <div class="two fields">
                        <div class="field">
                            <label for="month">ETF Allocation:</label>
                            <div class="ui right labeled input">
                                <label for="amount" class="ui label">Rs</label>
                                <input type="text" name="etf" value="<?php echo $et;?>"  id="last_name" readonly/>
                                <div class="ui basic label">.00</div>
                            </div>

                        </div>
                        <div class="field">
                            <label for="year">EPF Allocation:</label>
                            <div class="ui right labeled input">
                                <label for="amount" class="ui label">Rs</label>
                                <input type="number" name="epf" value="<?php  echo $ep;?>"  id="last_name" readonly/>
                                <div class="ui basic label">.00</div>
                            </div>

                        </div>

                    </div>


                    <div class="two fields">
                        <div class="field">
                            <label for="month">Total Salary for the Month:</label>

                            <div class="ui right labeled input">
                                <label for="amount" class="ui label">Rs</label>
                                <input type="text" name="total" value="<?php echo $addi+$params2['basic']-$ep-$et+$params1['advances']-$params1['cutoffs'];?>"  id="last_name" readonly/>
                                <div class="ui basic label">.00</div>
                            </div>
                        </div>
                    </div>



                    <button type="submit" class="ui primary button">Complete Payment</button>

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




