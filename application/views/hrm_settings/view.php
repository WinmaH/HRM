<div class="ui grid">
    <div class="eight wide column">


        <div class="ui segments">
            <div class="ui segment">

                <?php if(isset($err)){
                    echo ' <div class="ui error message">
            <i class="close icon"></i>
            
            <ul class="list">
                <li>'; echo nl2br($err); echo '</li>

            </ul>
        </div>';

                }
                ?>
                <h3 class="ui header">Change Password</h3>
            </div>
            <div class="ui segment">
                <?php echo form_open_multipart('Hrm_settings/change_pass',array("class"=>"ui form")); ?>
                <form class="ui form">
                    <div class="field">
                        <label>Password</label>
                        <input name="password" placeholder="New Password" type="password">
                    </div>

                    <div class="field">
                        <label>Confirm-Password</label>
                        <input name="cpassword" placeholder="Confirm Password" type="password">
                    </div>

                    <button class="ui blue button" type="submit">Change Password</button>
                </form>
                <?php echo form_close(); ?>
            </div>
        </div>
    </div>

    <?php if($admin){ ?>
    <div class="eight wide column">
        <div class="ui segments">
            <div class="ui segment">
                <h3 class="ui header">Backup</h3>
            </div>
            <div class="ui segment">
                <p>Backup your data frequently to avoid data loss in an emergency.</p>
                <a class="ui blue button" href="backup">Download</a>
            </div>
        </div>
    </div>
      <?php }?>
</div>

