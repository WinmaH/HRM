<div class="ui grid">
    <div class="sixteen wide column">
        <div class="ui segments">
            <div class="ui segment">
                <h3 class="ui header">Employees Promotions</h3>
            </div>
            <div class="ui segment">
                <table class="ui celled table">
                    <thead>
                    <tr>
                        <th>User Name</th>
                        <th>First Name</th>
                        <th>Middle Name</th>
                        <th>Last Name</th>

                        <th>Designation</th>
                        <th>Additional Salary</th>
                        <th>Actions</th>
                    </tr>
                    </thead>
                    <?php foreach($clients as $c){ ?>
                        <tr>
                            <td><?php echo $c['User_ID']; ?></td>
                            <td><?php echo $c['FirstName']; ?></td>
                            <td><?php echo $c['MiddleName']; ?></td>
                            <td><?php echo $c['LastName']; ?></td>
                            <td><?php echo $c['Designation']; ?></td>
                            <td ><?php echo 'Rs.'.($c['Salary']-$basic).'.00'; ?></td>
                            <td>
                                <a href="<?php echo site_url('Hrm_promotions/promote/'.$c['User_ID'].'/'.$c['FirstName'].'/'.($c['Salary']-$basic)); ?>" class="ui inverted purple button" >Promote</a>

                            </td>

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
    </div>
</div>