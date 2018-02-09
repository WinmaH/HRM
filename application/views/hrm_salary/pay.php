<div class="ui grid">
    <div class="sixteen wide column">
        <div class="ui segments">
            <div class="ui segment">
                <h3 class="ui header">Employees to be paid this month</h3>
            </div>
            <div class="ui segment">
                <table class="ui celled table">
                    <thead>
                    <tr>
                        <th>User ID</th>
                        <th>First Name</th>
                        <th>Middle Name</th>
                        <th>Last Name </th>
                        <th>Basic Salary</th>
                        <th>Pay </th>

                    </tr>
                    </thead>

                    <?php foreach($clients as $c){ ?>
                        <tr>

                            <td><?php echo $c['User_ID']; ?></td>
                            <td><?php echo $c['FirstName']; ?></td>
                            <td><?php echo $c['MiddleName']; ?></td>
                            <td><?php echo $c['LastName']; ?></td>
                            <td><?php echo 'Rs. '.$c['Salary'].'.00/='; ?></td>
                            <td>
                                <a href="<?php echo site_url('Hrm_employee/open/'.$c['User_ID']); ?>" class="ui inverted yellow button" ><i class="Thumbs Up icon"></i>Pay</a>
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





