<div class="ui grid">
    <div class="sixteen wide column">
        <div class="ui segments">

            <div class="ui segment">

                <!-- display the major content information on the top-->

                <div class="ui four statistics">
                    <div class="statistic">
                        <div class="value">
                            <img src="<?=base_url('assets/img/emp.png' )?>" class="ui circular inline image">
                            1
                        </div>
                        <div class="label">
                            Employees
                        </div>
                    </div>
                    <div class="statistic">
                        <div class="value">
                            <img src="<?=base_url('assets/img/application.jpg' )?>" class="ui circular inline image">1

                        </div>
                        <div class="label">
                            Leave Notifications
                        </div>
                    </div>
                    <div class="statistic">
                        <div class="value">
                            <img src="<?=base_url('assets/img/salary.png' )?>" class="ui circular inline image">yes
                        </div>
                        <div class="label">
                            Salary Paid
                        </div>
                    </div>
                    <div class="statistic">
                        <div class="value">
                            <img src="<?=base_url('assets/img/training.png' )?>" class="ui circular inline image">1
                        </div>
                        <div class="label">
                            Training Programs
                        </div>
                    </div>
                </div>

            </div>
        </div>


        <!-- display the major content information on the middle-->
        <div class="ui segments">
            <div class="ui segment">

                <div class="ui grid">

                    <div class="eight wide column">
                        <div class="ui items">
                            <div class="item">
                                <div class="ui small image">
                                    <img src="<?=base_url('assets/img/etf.png' )?>">
                                </div>
                                <div class=" content">
                                    <div class="header">ETF</div>
                                    <div class="meta">
                                        <span class="price">Percentage from the Salary</span>
                                    </div>
                                    <div class="description">
                                        <p>
                                        <div class="ui statistic">
                                            <div class="value">
                                                <?php echo $etf;?>%
                                            </div>
                                            <div class="label">
                                                Current Rate
                                            </div>
                                        </div>
                                        </p>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>


                    <div class="eight wide column">
                        <div class="ui items">
                            <div class="item">
                                <div class="ui small image">
                                    <img src="<?=base_url('assets/img/epf.png' )?>">
                                </div>
                                <div class="content">
                                    <div class="header">EPF</div>
                                    <div class="meta">
                                        <span class="price">Percentage from the Salary</span>
                                    </div>
                                    <div class="description">
                                        <p>
                                        <div class="ui statistic">
                                            <div class="value"><?php echo $epf;?>%
                                            </div>
                                            <div class="label">
                                                Current Rate
                                            </div>
                                        </div>
                                        </p>
                                    </div>
                                </div>
                            </div
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <div class="ui segment">
            <div class="ui three stackable cards">
                <div class="ui red raised card">
                    <div class="content">
                        <div class="header">Last Leave Request</div>
                        <div class="meta">
                            <span class="category">Applied leaves</span>
                        </div>
                        <div class="description">

                            <p> Leave Type :<?php echo $basic['Type'];?> </p>
                            <p> Reason : <?php  echo $basic['Reason'];?></p>
                            <p> Description : <?php  echo $basic['Description'];?></p>
                            <div class="ui  red label">
                                Start Date
                                <div class="detail"><?php echo $basic['Start_Year'].'-'.$basic['Start_Month']."-".$basic['Start_Date'];?></div>
                            </div>

                            <div class="ui  red label">
                                End Date
                                <div class="detail"><?php echo $basic['End_Year'].'-'.$basic['End_Month']."-".$basic['End_Date'];?></div>
                            </div>
                        </div>
                    </div>
                    <div class="extra content">
                        <div class="right floated author">
                            <img class="ui avatar image" src="<?=base_url('assets/img/gender.png' )?>"> Gender
                        </div>
                    </div>
                </div>

                <div class="ui blue raised card">
                    <div class="content">
                        <div class="header">Attendance</div>
                        <div class="meta">
                            <span class="category">Attendance this month</span>
                        </div>
                        <div class="description">

                            <div class="ui blue label">
                                Present
                                <div class="detail">10</div>
                            </div>

                            <div class="ui blue label">
                                On Leave
                                <div class="detail">1</div>
                            </div>
                        </div>
                    </div>
                    <div class="extra content">
                        <div class="right floated author">
                            <img class="ui avatar image" src="<?=base_url('assets/img/attendance.png' )?>"> Attendance
                        </div>
                    </div>
                </div>

                <div class="ui green raised card">
                    <div class="content">
                        <div class="header">Last Training Program Details</div>
                        <div class="meta">
                            <span class="category"><?php echo $params1['Title'];?></span>
                        </div>
                        <div class="description">

                            <p> Date: <?php echo $params1['Program_Date'];?> </p>
                            <p> Venue : <?php echo $params1['Venue']?></p>
                            <p> Description :<?php echo $params1['Description'];?>
                            </p>
                            <div class="ui green label">
                                Employee Partcipation
                                <div class="detail">1</div>
                            </div>
                        </div>
                    </div>
                    <div class="extra content">
                        <div class="right floated author">
                            <img class="ui avatar image" src="<?=base_url('assets/img/train.jpg' )?>"> Training Programs
                        </div>
                    </div>
                </div>
            </div>
        </div>


    </div>
</div>