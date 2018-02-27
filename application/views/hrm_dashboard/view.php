<div class="ui grid">
    <div class="sixteen wide column">
        <div class="ui segments">

        <div class="ui segment">

            <!-- display the major content information on the top-->

            <div class="ui four statistics">
                <div class="statistic">
                    <div class="value">
                        <img src="<?=base_url('assets/img/emp.png' )?>" class="ui circular inline image">
                        <?php echo $tot_emp;?>
                    </div>
                    <div class="label">
                        Employees
                    </div>
                </div>
                <div class="statistic">
                    <div class="value">
                        <img src="<?=base_url('assets/img/application.jpg' )?>" class="ui circular inline image">3

                    </div>
                    <div class="label">
                            Leave Applications
                    </div>
                </div>
                <div class="statistic">
                    <div class="value">
                        <img src="<?=base_url('assets/img/salary.png' )?>" class="ui circular inline image"><?php echo $salary_paid;?>
                    </div>
                    <div class="label">
                        Salaries Paid
                    </div>
                </div>
                <div class="statistic">
                    <div class="value">
                        <img src="<?=base_url('assets/img/training.png' )?>" class="ui circular inline image">3

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
                            <img src="<?=base_url('assets/img/em.png' )?>">
                        </div>
                        <div class=" content">
                            <div class="header">Employees</div>
                            <div class="meta">
                                <span class="price">New</span>
                            </div>
                            <div class="description">
                                <p>
                                    <div class="ui statistic">
                                      <div class="value">
                                          <?php echo $tot_emp;?>
                                      </div>
                                      <div class="label">
                                          New Recruitments
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
                            <img src="<?=base_url('assets/img/sal.png' )?>">
                        </div>
                        <div class="content">
                            <div class="header">Total Amount Paid this Month</div>
                            <div class="meta">
                                <span class="price">February</span>
                            </div>
                            <div class="description">
                                <p>
                                <div class="ui statistic">
                                    <div class="value">
                                        200,200
                                    </div>
                                    <div class="label">
                                        Rs
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
                        <div class="header">Employee Clssification by Gender</div>
                        <div class="meta">
                            <span class="category">Current Employee</span>
                        </div>
                        <div class="description">

                            <div class="ui  red label">
                                Male
                                <div class="detail">75%</div>
                            </div>

                            <div class="ui  red label">
                                Female
                                <div class="detail">25%</div>
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
                                <span class="category">Today's Attendance</span>
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
                                <span class="category">Training Program 1</span>
                            </div>
                            <div class="description">
                                <p>This training programme is for improve soft skills of the employees.
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