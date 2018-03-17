<div class="ui grid">
    <div class="sixteen wide column">
        <div class="ui segments">
            <div class="ui segment">
                <h3 class="ui header">Leave History</h3>
            </div>
            <div class="ui segment">
                <table class="ui celled table">
                    <thead>
                    <tr>
                        <th>Start Date</th>
                        <th>End Date</th>
                        <th>Leave Type</th>
                        <th>Leave Reason</th>
                        <th>Details</th>
                    </tr>
                    </thead>

                    <?php foreach($clients as $c){ ?>
                        <tr>
                            <td><?php echo $c['Start_Year'].'-'.$c['Start_Month'].'-'.$c['Start_Date'];?></td>
                            <td><?php echo $c['End_Year'].'-'.$c['End_Month'].'-'.$c['End_Date'];?></td>
                            <td><?php echo $c['Type'];?></td>
                            <td><?php echo $c['Reason'];?></td>
                            <td><?php echo $c['Description'];?></td>
                        </tr>
                    <?php }
                    ?>

                </table>
            </div>


        </div>



    </div>
</div>