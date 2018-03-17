
<div class="ui basic modal">
    <div class="ui icon header">
        <i class="question icon"></i>
        Confirmation Message
    </div>
    <div class="content">
        <p>Are you Sure that you want to promote this employee?</p>
    </div>
    <div class="actions">

        <a href="<?php echo site_url('Hrm_promotions/edit/'.$params1.'/'.$params2.'/'.$params3); ?>" class="ui inverted green button" ><i class="Check Circle icon"></i>Yes </a>

        <a href="<?php echo site_url('Hrm_promotions/load_previous_details'); ?>" class="ui inverted red button" ><i class="Remove icon"></i>No</a>
    </div>
</div>

<script>
    $(function() {
        $('.ui.basic.modal')
            .modal('show')
        ;
    });
</script>