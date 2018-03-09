
<div class="ui grid">
    <div class="sixteen wide column">

        <div class="ui segment">
            <h3 class="ui header"><?php echo " Salary Details ". $user['Year']." ".$user['Month'];?></h3>
        </div>


        <div class="ui celled grid" align="center">
            <div class=" row">
                <div class="fourteen wide column">
                    <table class="ui teal celled table">
                        <thead>
                        <tr>
                            <th  class="ten wide">Particulars</th>
                            <th class="three wide">Amount in Rs.</th>

                        </tr>

                        </thead>

                        <tbody>


                        <tr>
                            <td><div class="ui teal ribbon label">Basic Salary</div></td>
                            <td><?php echo $basic.".00";?></td>

                        </tr>

                        <tr>
                            <td>
                                <div class="ui teal ribbon label">Additional Salary</div>
                            </td>
                            <td><?php echo $user['Normal_Salary'].".00";?></td>

                        </tr>
                        <tr>
                            <td><div class="ui teal ribbon label">Advances</div></td>
                            <td ><?php echo $user['Amount_advances'].".00";?></td>

                        </tr>
                        <tr>
                            <td><div class="ui teal ribbon label">Cut-offs</div></td>
                            <td><?php echo $user['Other_cutoffs'].".00";?></td>
                        </tr>
                        <tr>
                            <td><div class="ui teal ribbon label">ETF Amount</div></td>
                            <td><?php echo $user['Amount_ETF'].".00";?></td>
                        </tr>
                        <tr>
                            <td><div class="ui teal ribbon label">EPF Amount</div></td>
                            <td><?php echo $user['Amount_EPF'].".00";?></td>
                        </tr>


                        <tr>
                            <td><div class="ui  green ribbon label">Total Paid</div></td>
                            <td> <?php echo ((int)$basic+(int)$user['Normal_Salary']+(int)$user['Amount_advances']-(int)$user['Other_cutoffs']-(int)$user['Amount_ETF']-(int)$user['Amount_EPF']).".00";?></td>
                        </tr>


                        </tbody>

                    </table>

                </div>
            </div>





        </div>



    </div>

</div>