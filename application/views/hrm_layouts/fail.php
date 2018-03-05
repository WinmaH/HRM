<div class="ui grid">

    <div class="sixteen wide column">

        <?php if(isset($err)){



            echo ' <div class="ui error message">
            <i class="close icon"></i>
            
            <div class="header">
            Error !
            </div>
                <p>'; echo nl2br($err); echo '<p>
  
            
        </div>';

        } ?>


    </div>
</div>