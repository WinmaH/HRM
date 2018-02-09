<?php
if(isset($user)){
    foreach ($user as $u){
        $first=$u['FirstName'];
        $middle=$u['MiddleName'];
        $last=$u['LastName'];
        $id=$u['User_ID'];
        $day=$u['Birthday'];
        $nic=$u['NIC'];
        $post=$u['PostBox'];
        $street=$u['Street'];
        $city=$u['City'];
        $gender=$u['Gender'];
        $tp=$u['TP'];
        $email=$u['E_mail'];
        $nationality=$u['Nationality'];
        $religion=$u['Religion'];
        $blood=$u['BloodGroup'];
        $salary=$u['Salary'];
        $designation=$u['Designation'];
        $image='files/'.$u['Image'];
    }
}
?>

    <div class="ui grid">
        <div class="sixteen wide column">
            <div class="ui segments" align="center">
                <div class="ui segment">
                    <h3 class="ui header">Employees Full Details</h3>
                </div>
                <div class="ui segment">

                    <div class="ui card ">
                        <div class="image">
                            <img src="<?=base_url($image )?>">
                        </div>
                        <div class="content">
                            <a class="header"><?php echo $first;?></a>
                            <a class="header"><?php echo $middle;?></a>
                            <a class="header"><?php echo $last;?></a>
                            <div class="meta">
                                <span class="date"><?php  echo 'User ID : '.$id;?></span>
                            </div>
                            <div class="description">
                                <?php echo 'Birthday :'.$day;?>
                            </div>

                            <div class="description">
                                <?php  echo 'National Identity Card : '.$nic;?>
                            </div>

                            <div class="description">
                                <?php  echo 'Address: '.$post.' '.$street.' '.$city;?>
                            </div>

                            <div class="description">
                                <?php  echo 'Gender : '.$gender;?>
                            </div>

                            <div class="description">
                                <?php  echo 'Telephone : '.$tp;?>
                            </div>

                            <div class="description">
                                <?php  echo 'E-mail : '.$email;?>
                            </div>

                            <div class="description">
                                <?php  echo 'Nationality : '.$nationality;?>
                            </div>

                            <div class="description">
                                <?php  echo 'Religion : '.$religion;?>
                            </div>

                            <div class="description">
                                <?php  echo 'E-mail : '.$email;?>
                            </div>

                            <div class="description">
                                <?php  echo 'Blood Group : '.$blood;?>
                            </div>

                            <div class="description">
                                <?php  echo 'Salary : Rs.'.$salary.'.00/=';?>
                            </div>



                        </div>
                        <div class="extra content">
                            <a>
                                <i class="user icon"></i>
                               <?php echo $designation;?>
                            </a>
                        </div>
                    </div>

                </div>
            </div>


        </div>
    </div>

</div>