<div class="ui grid">
    <div class="sixteen wide column">
        <div class="ui segments">
            <div class="ui segment">
                <h3 class="ui header">Training Program Details</h3>
            </div>
            <div class="ui segment">
                <table class="ui celled table">
                    <thead>
                    <tr>
                        <th>Title</th>
                        <th>Venue</th>
                        <th>Date</th>
                        <th>Description</th>
                        <th>Add Employees</th>
                    </tr>
                    </thead>

                    <?php foreach($clients as $c){ ?>
                        <tr>
                            <td><?php echo $c['Title']; ?></td>
                            <td><?php echo $c['Venue'];; ?></td>
                            <td><?php echo $c['Program_Date']; ?></td>
                            <td><?php echo $c['Description']; ?></td>
                            <?php if(date("Y-m-d")<= new DateTime($c['Program_Date'])){ ?>
                                <td> <a href="<?php echo site_url('Hrm_training/get_employee/'.$c['Program_ID']); ?>" class="ui inverted blue button" >Add Employee</a></td>
                            <?php } ?>
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
                <a href="<?php echo site_url('Hrm_training/add'); ?>" class="ui  blue button"><i class="address book icon"></i> New Training Program</a>
            </div>


        </div>
    </div>
</div>