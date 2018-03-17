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
                <h3 class="ui header">Edit Rates</h3>
            </div>
            <div class="ui segment">
                <?php echo form_open_multipart('Hrm_rates/edit',array("class"=>"ui form")); ?>
                <div class="ui form">

                    <div class="two fields">
                        <div class="field">
                            <label for="first_name">Basic Salary:</label>
                            <div class="ui right labeled input">
                                <label for="amount" class="ui label">Rs</label>
                            <input type="number" name="basic" value="<?php echo $basic; ?>"  id="first_name" />
                                <div class="ui basic label">.00</div>
                            </div>
                        </div>
                    </div>
                    <div class="two fields">
                        <div class="field">
                            <label for="middle_name">ETF Rate:</label>
                            <div class="ui right labeled input">
                            <input type="number" name="etf" value="<?php echo $etf; ?>"  id="middle_name" />
                                <div class="ui basic label">%</div>
                            </div>
                        </div>



                    <div class="field">
                        <label for="last_name">EPF Rate:</label>
                        <div class="ui right labeled input">
                        <input type="number" name="epf" value="<?php echo $epf; ?>"  id="last_name" />
                            <div class="ui basic label">%</div>
                        </div>
                    </div>
                    </div>

                    <button type="submit" class="ui primary button">Edit</button>

                </div>
                <?php echo form_close(); ?>
            </div>
        </div>
    </div>
</div>


