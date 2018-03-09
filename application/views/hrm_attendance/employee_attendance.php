<div class="ui grid">
    <div class="sixteen wide column">
        <div class="ui segments">
            <div class="ui segment">
                <h3 class="ui header">Attendance <?php  $m=date('m');

                    $array=array('01'=>'January','02'=>'February','03'=>'March','04'=>'April','05'=>'May','06'=>'June','07'=>'July','08'=>'August','09'=>'September','10'=>'October','11'=>'November','12'=>'December');
                    $month=$array[$m]; echo date('Y') ;  echo '-'.$month; ?></h3>
            </div>
            <div class="ui segment">
                <table class="ui celled table">
                    <thead>
                    <tr>
                        <th>Date</th>
                        <th>Arrival Time</th>
                    </tr>
                    </thead>

                    <?php foreach($clients as $c){ ?>
                        <tr>
                            <td><?php echo $c['Present_Year'].'-'.$c['Present_Month'].'-'.$c['Present_Date']; ?></td>
                            <td><?php echo $c['present_Hour'].":".$c['Present_Minute'].":".$c['Present_Second']; ?></td>

                        </tr>
                    <?php } ?>

                </table>
            </div>


        </div>



    </div>
</div>