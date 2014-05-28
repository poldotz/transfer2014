<?php
/**
 * Created by PhpStorm.
 * User: poldotz
 * Date: 01/05/14
 * Time: 8.25
 */
?>

<div class="widget-header">
            <div class="title">
                <button id="save_booking_form" class="btn btn-small btn-success" type="button">
    Salva
                </button>
                <button id="new_booking_form" class="btn btn-small btn-info" type="button">
    Nuovo
                </button>
                <button id="copy_booking_form" class="btn btn-small btn-warning input-top-margin" type="button">
    Clona
                </button>
                <button id="search_booking_form" class="btn btn-small  btn-inverse input-top-margin" type="button">
    Filtra
                </button>
            </div>
        </div>

<script type="text/javascript">
    $('#save_booking_form').on('click',function(){

        $form = $('#booking_form');
        $form.submit();
    });

    $('#new_booking_form').on('click',function(){
        document.location.href = '<?php echo url_for('booking/index') ?>';
    });

    $('#copy_booking_form').on('click',function(){
        document.location.href = '<?php echo url_for('booking/'.($form->getObject()->isNew() ? 'index' : 'copy?id='.$form->getObject()->getId())) ?>';
    });

    $('#search_booking_form').on('click',function(){
        document.location.href = '<?php echo url_for('booking/search') ?>';
    });
</script>
