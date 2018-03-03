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

                <div class="ui segment">
                    <h3 class="ui header">Employee Details</h3>
                </div>


                <div class="ui celled grid">
                    <div class=" row">
                        <div class="five wide column">
                            <div class="ui card ">
                                <div class="image">
                                    <img src="<?=base_url($image )?>">
                                </div>
                                <div class="content" align="center">
                                    <a class="header"><?php echo $first;?></a>
                                    <a class="header"><?php echo $middle;?></a>
                                    <a class="header"><?php echo $last;?></a>
                                    <div class="meta">
                                        <span class="date"><?php  echo 'User ID : '.$id;?></span>
                                    </div>
                                </div>

                            </div>
                        </div>
                        <div class="ten wide column">
                            <table class="ui celled table">

                                <tbody>
                                <tr>
                                    <td>
                                        <div class="ui ribbon label">Name</div>
                                    </td>
                                    <td><?php echo $first." ".$middle." ".$last;?></td>

                                </tr>
                                <tr>
                                    <td><div class="ui ribbon label">ID</div></td>
                                    <td><?php echo $id;?></td>

                                </tr>
                                <tr>
                                    <td><div class="ui ribbon label">Bithday</div></td>
                                    <td><?php echo $day;?></td>
                                </tr>
                                <tr>
                                    <td><div class="ui ribbon label">National Identity Card</div></td>
                                    <td><?php echo $nic;?></td>
                                </tr>
                                <tr>
                                    <td><div class="ui ribbon label">Address</div></td>
                                    <td><?php echo $post.' '.$street.' '.$city;?></td>
                                </tr>

                                <tr>
                                    <td><div class="ui ribbon label">Gender</div></td>
                                    <td><?php echo $gender;?></td>
                                </tr>

                                <tr>
                                    <td><div class="ui ribbon label">Telephone</div></td>
                                    <td><?php echo $tp;?></td>
                                </tr>

                                <tr>
                                    <td><div class="ui ribbon label">E-mail</td>
                                    <td><?php echo $email;?></td>
                                </tr>

                                <tr>
                                    <td><div class="ui ribbon label">Nationality</div></td>
                                    <td><?php echo $nationality;?></td>
                                </tr>

                                <tr>
                                    <td><div class="ui ribbon label">Blood</div></td>
                                    <td><?php echo $blood;?></td>
                                </tr>

                                <tr>
                                    <td><div class="ui ribbon label">Religion</div></td>
                                    <td><?php echo $religion;?></td>
                                </tr>

                                <tr>
                                    <td><div class="ui ribbon label">Salary</div></td>
                                    <td><?php echo "Rs ".$salary.'.00/=';?></td>
                                </tr>
                                </tbody>

                            </table>

                        </div>
                    </div>





            </div>



    </div>

</div>