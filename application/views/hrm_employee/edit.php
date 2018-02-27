<?php
if(isset($user)){
foreach ($user as $u) {
    $first = $u['FirstName'];
    $middle = $u['MiddleName'];
    $last = $u['LastName'];
    $id = $u['User_ID'];
    $day = $u['Birthday'];
    $nic = $u['NIC'];
    $post = $u['PostBox'];
    $street = $u['Street'];
    $city = $u['City'];
    $gender = $u['Gender'];
    $tp = $u['TP'];
    $email = $u['E_mail'];
    $nationality = $u['Nationality'];
    $religion = $u['Religion'];
    $blood = $u['BloodGroup'];
    $salary = $u['Salary'];
    $des = $u['Designation'];
    $image = 'files/' . $u['Image'];
    $cv='files/' . $u['CV'];
    $User_ID=$u['User_ID'];
}
}
?>

<div class="ui grid">
    <div class="sixteen wide column">
        <?php if(isset($err)){

            echo ' <div class="ui error message">
            <i class="close icon"></i>
            <div class="header">
                Error.......
            </div>
            <ul class="list">
                <li>'. $err.'</li>

            </ul>
        </div>';

        }
        ?>

        <div class="ui segments">
            <div class="ui segment">
                <h3 class="ui header">Edit Employee Details</h3>
            </div>
            <div class="ui segment">
                <?php echo form_open_multipart('Hrm_employee/edit_employee/'.$User_ID,array("class"=>"ui form")); ?>
                <div class="ui form">

                    <div class="two fields">
                    <div class="field">
                        <label for="first_name">First Name:</label>
                        <input type="text" name="first_name" value="<?php echo $first; ?>"  id="first_name" />
                    </div>

                    <div class="field">
                        <label for="middle_name">Middle Name:</label>
                        <input type="text" name="middle_name" value="<?php echo $middle; ?>"  id="middle_name" />
                    </div>

                    </div>

                    <div class="field">
                        <label for="last_name">Last Name:</label>
                        <input type="text" name="last_name" value="<?php echo $last; ?>"  id="last_name" />
                    </div>



                    <div class="two fields">
                    <div class="field">
                        <label for="gender">Gender:</label>
                        <select name="gender" data-value="<?php echo $gender?>" class="ui dropdown"  >
                            <option value="Male" <?php if($gender=='Male'):?>selected="selected"<?php endif;?>> Male </option>
                            <option value="Female" <?php if($gender=='Female'):?>selected="selected"<?php endif;?>> Female </option>
                        </select>

                    </div>

                    <div class="field">
                        <label for="birthday">Birthday:</label>
                        <input type="date" name="birthday" value="<?php echo $day; ?>"  id="birthday" />
                    </div>

                    </div>

                    <div class="field">
                        <label for="nic">NIC:</label>
                        <input type="text" name="nic" value="<?php echo $nic; ?>"  id="nic" />
                    </div>

                    <div class="two fields">

                    <div class="field">
                        <label for="postbox">Post Box:</label>
                        <input type="text" name="postbox" value="<?php echo $post; ?>"  id="postbox" />
                    </div>
                    <div class="field">
                        <label for="name">Street:</label>
                        <input type="text" name="street" value="<?php echo $street; ?>"  id="street" />
                    </div>

                    </div>

                    <div class="field">
                        <label for="name">City:</label>
                        <input type="text" name="city" value="<?php echo $city; ?>"  id="city" />
                    </div>


                    <div class="two fields">
                    <div class="field">
                        <label for="name">Mobile no:</label>
                        <input type="number" name="mobile" value="<?php echo $tp; ?>"  id="mobile" />
                    </div>



                    <div class="field">
                        <label for="email">Email:</label>
                        <input type="text" name="email" value="<?php echo $email; ?>"  id="email" />
                    </div>
                    </div>


                    <div class="two fields">

                    <div class="field">
                        <label for="email">Nationality:</label>
                        <select name="nationality">
                            <option> Sri lankan </option>
                            <option> Other </option>
                        </select>
                    </div>

                    <div class="field">
                        <label for="email">Religion:</label>
                        <select name="religion" class="ui dropdown">
                            <option value="Buddhism" <?php if($religion=='Buddhism'):?>selected="selected"<?php endif;?>>Buddhism</option>
                            <option value="Hinduism" <?php if($religion=='Hinduism'):?>selected="selected"<?php endif;?>>Hinduism</option>
                            <option value="Islam" <?php if($religion=='Islam'):?>selected="selected"<?php endif;?> >Islam</option>
                            <option value="Christian" <?php if($religion=='Christian'):?>selected="selected"<?php endif;?>>Christian</option>
                            <option value="Other" <?php if($religion=='Other'):?>selected="selected"<?php endif;?>>Other</option>
                        </select>
                    </div>
                    </div>
                    <div class="field">
                        <label for="email">Blood Group:</label>
                        <select name="bloodgroup" class="ui dropdown">
                            <option value="A-" <?php if($blood=='A-'):?>selected="selected"<?php endif;?>>A-</option>
                            <option value="A+" <?php if($blood=='A+'):?>selected="selected"<?php endif;?>>A+</option>
                            <option value="B-" <?php if($blood=='B-'):?>selected="selected"<?php endif;?> >B-</option>
                            <option value="B+" <?php if($blood=='B+'):?>selected="selected"<?php endif;?>>B+</option>
                            <option value="AB" <?php if($blood=='AB-'):?>selected="selected"<?php endif;?>>AB-</option>
                            <option value="AB+" <?php if($blood=='AB+'):?>selected="selected"<?php endif;?>>AB+</option>
                            <option value="O-" <?php if($blood=='O-'):?>selected="selected"<?php endif;?>>O-</option>
                            <option value="O+" <?php if($blood=='O+'):?>selected="selected"<?php endif;?>>0+</option>
                        </select>
                    </div>

                    <div class="field">
                        <label for="email">Designation:</label>

                        <select name="designation" class="ui dropdown">
                            <?php foreach($designation as $d){ ?>
                                <option value="<?php echo $d['Title'];?>" <?php if($des==$d['Title']):?>selected="selected"<?php endif;?>><?php echo $d['Title'];?></option>
                            <?php }?>
                        </select>

                    </div>

                    <button type="submit" class="ui primary button">Edit</button>

                </div>
                <?php echo form_close(); ?>
            </div>
        </div>
    </div>
</div>





