<div class="ui grid">
    <div class="sixteen wide column">
        <div class="ui segments">
            <div class="ui segment">
                <h3 class="ui header">Employees</h3>
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
                        <th>NIC</th>
                        <th>Contact</th>


                        <th>Email</th>

                        <th>CV</th>
                        <th>Actions</th>
                        <th>Full Details</th>
                    </tr>
                    </thead>
                    <?php foreach($clients as $c){ ?>
                        <tr>
                            <td><?php echo $c['User_ID']; ?></td>
                            <td><?php echo $c['FirstName']; ?></td>
                            <td><?php echo $c['MiddleName']; ?></td>
                            <td><?php echo $c['LastName']; ?></td>
                            <td><?php echo $c['Designation']; ?></td>
                            <td><?php echo $c['NIC']; ?></td>
                            <td><?php echo $c['TP']; ?></td>


                            <td><?php echo $c['E_mail']; ?></td>

                            <td>
                            <a href="<?php echo site_url('Hrm_employee/open/'.$c['User_ID']); ?>" class="ui inverted blue button" >View</a>
                            </td>
                            <td>
                                <a href="<?php echo site_url('Hrm_employee/edit/'.$c['User_ID']); ?>" class="ui inverted purple button" >Edit</a>

                            </td>

                            <td>
                                <a href="<?php echo site_url('Hrm_employee/full/'.$c['User_ID']); ?>" class="ui inverted green button" >View</a>

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
            <div class="ui segment">
                <a href="<?php echo site_url('Hrm_employee/add'); ?>" class="ui primary labeled icon button"><i class="address book icon"></i> Add new Employee</a>
            </div>
        </div>
    </div>
</div>