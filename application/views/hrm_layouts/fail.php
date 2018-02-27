<div class="ui grid">

    <div class="sixteen wide column">

        <?php if(isset($success)){



            echo ' <div class="ui error message">
            <i class="close icon"></i>
            
            <div class="header">
            Error !
            </div>
                <p>'; echo nl2br($success); echo '<p>
  
            
        </div>';

        } ?>


    </div>
</div>