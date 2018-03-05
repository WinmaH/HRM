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
                <h3 class="ui header">Training Program Details</h3>
            </div>
            <div class="ui segment">
                <table class="ui celled table">
                    <thead>
                    <tr>
                        <th>First Name</th>
                        <th>Middle Name</th>
                        <th>Last Name</th>
                        <th>Gender</th>
                        <th>TP</th>
                        <th>Email</th>
                    </tr>
                    </thead>

                    <?php foreach($clients as $c){ ?>
                        <tr>
                            <td><?php echo $c['FirstName']; ?></td>
                            <td><?php echo $c['MiddleName'];; ?></td>
                            <td><?php echo $c['LastName']; ?></td>
                            <td><?php echo $c['Gender']; ?></td>
                            <td><?php echo  $c['TP'];?> </td>
                            <td><?php  echo $c['E_mail'];?></td>
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
        <div class="ui segments">
            <div class="ui segment">
                <?php echo form_open_multipart('Hrm_training/add_to_training/'.$Program_ID,array("class"=>"ui form")); ?>
                <div class="ui form">
                    <div class="four fields">
                        <div class="field">
                            <label for="email">Select Employee :</label>
                            <select  name="employee" class="ui dropdown">
                                <?php foreach($user as $u){ ?>
                                    <option><?php echo $u['FirstName']."   ".$u['LastName']."   ".$u['User_ID'];?></option>
                                <?php }?>
                            </select>
                        </div>
                    </div>
                    <button type="submit" class="ui primary button">Add</button>
                </div>
                <?php echo form_close(); ?>
            </div>

        </div>


        </div>
    </div>
</div>

<script>
    $('.ui.dropdown')
        .dropdown();
</script>