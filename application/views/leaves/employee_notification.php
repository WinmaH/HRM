<div class="ui grid">
    <div class="sixteen wide column">
        <div class="ui segments">
            <div class="ui segment">
                <h3 class="ui header">Notifications</h3>
            </div>
            <div class="ui segment">
                <table class="ui celled table">

                    <?php foreach($user as $u){
                        ?>

                        <?php if($u['Status']==false){?>

                    <tr>
                        <td>
                            <div class="ui unstackable items">
                                <div class="item">

                                    <div class="content">

                                        <div class="ui red message"> <i class="Frown icon"></i>Sorry !Your request on the following leave was rejected.</div>

                                        <div class="description">
                                            <p>Leave Start Date: <?php echo $u['Start_Year']."/".$u['Start_Month']."/".$u['Start_Date'];?></p>
                                            <p>Leave End Date: <?php echo $u['End_Year']."/".$u['End_Month']."/".$u['End_Date'];?></p>
                                            <p>Leave Reason : <?php echo $u['Reason'];?></p>
                                            <p>Leave Type: <?php echo $u['Type'];?></p>
                                        </div>
                                        <div class="extra">
                                                   <?php echo $u['Description'];?>
                                        </div>

                                        <a href="<?php echo site_url('Hrm_Notification/employee_mark/'.$u['ID']); ?>" class="ui inverted blue button" ><i class="Check Circle icon"></i>Mark as Read </a>
                                    </div>
                                </div>
                            </div>

                        </td>
                    </tr>
                            <?php }?>

                    <?php if($u['Status']==true){?>

                        <tr>
                        <td>
                            <div class="ui unstackable items">
                                <div class="item">

                                    <div class="content">

                                        <div class="ui green message"> <i class="Smile icon"></i>Your request on the following leave was accepted.</div>

                                        <div class="description">
                                            <p>Leave Start Date: <?php echo $u['Start_Year']."/".$u['Start_Month']."/".$u['Start_Date'];?></p>
                                            <p>Leave End Date: <?php echo $u['End_Year']."/".$u['End_Month']."/".$u['End_Date'];?></p>
                                            <p>Leave Reason : <?php echo $u['Reason'];?></p>
                                            <p>Leave Type: <?php echo $u['Type'];?></p>
                                        </div>
                                        <div class="extra">
                                                  <?php echo $u['Description'];?>
                                        </div>

                                        <a href="<?php echo site_url('Hrm_Notification/employee_mark/'.$u['ID']); ?>" class="ui inverted blue button" ><i class="Check Circle icon"></i>Mark as Read </a>
                                    </div>
                                </div>
                            </div>
                        </td>

                        </tr>
                        <?php }?>

                    <?php } ?>
                </table>
            </div>
        </div>
    </div>
</div>

