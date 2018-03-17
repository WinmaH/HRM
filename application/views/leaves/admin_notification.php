<div class="ui grid">
    <div class="sixteen wide column">
        <div class="ui segments">
            <div class="ui segment">
                <h3 class="ui header">Leave Applications</h3>
            </div>
            <div class="ui segment">
                <table class="ui celled table">
                    <thead>
                    <tr>
                        <th>Leave Details</th>
                        <th></th>


                    </tr>
                    </thead>

                    <?php foreach($user as $u){
                        $image='files/'.$u['Image'];
                        ?>

                        <tr>
                            <td>

                                <div class="ui unstackable items">
                                    <div class="item">
                                        <div class="image">
                                            <img src="<?=base_url($image)?>">
                                        </div>
                                        <div class="content">
                                            <a class="header"> <?php echo $u['FirstName']." ".$u['MiddleName']." ".$u['LastName']?></a>
                                            <div class="meta">
                                                <span>Employee</span>
                                            </div>
                                            <div class="description">
                                                <p>Leave Start Date: <?php echo $u['Start_Year']."/".$u['Start_Month']."/".$u["Start_Date"];?></p>
                                                <p>Leave End Date: <?php echo $u['End_Year']."/".$u['End_Month']."/".$u["End_Date"];?></p>
                                                <p>Leave Reason : <?php echo $u['Reason'];?></p>
                                                <p>Leave Type: <?php echo $u['Type'];?></p>
                                            </div>
                                            <div class="extra">
                                                  <?php echo $u['Description']?>
                                            </div>
                                        </div>
                                    </div>
                                </div>

                            </td>


                            <td>

                                <a href="<?php echo site_url('Hrm_leaves/view/'.$u['User_ID']); ?>" class="ui inverted blue button" ><i class="Search icon"></i>View Leave History</a>
                                <a href="<?php echo site_url('Hrm_Notification/accept/'.$u['Leave_ID'].'/'.$u['ID']); ?>" class="ui inverted green button" ><i class="Plus icon"></i>Accept</a>
                                <a href="<?php echo site_url('Hrm_Notification/reject/'.$u['Leave_ID'].'/'.$u['ID']); ?>" class="ui inverted red button" ><i class="Remove icon"></i>Reject</a>

                            </td>


                        </tr>
                    <?php } ?>








                </table>
            </div>

            <?php $page=1;
                  $pages=1;?>
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