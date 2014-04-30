<?php
/**
 * Created by PhpStorm.
 * User: poldotz
 * Date: 01/04/14
 * Time: 9.41
 */

?>
<?php use_helper('Date'); ?>

<div id="booking_container" class="span12" style="margin-bottom: 0px;">
    <div class="widget">
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
                <button class="btn btn-small  btn-inverse input-top-margin" type="button">
                    Filtra
                </button>
            </div>
        </div>
        <div style="padding: 5px;" class="widget-body">
            <form id="booking_form" action="<?php echo url_for('booking/'.($form->getObject()->isNew() ? 'create' : 'update').(!$form->getObject()->isNew() ? '?id='.$form->getObject()->getId() : '')) ?>" method="post" <?php $form->isMultipart() and print 'enctype="multipart/form-data" ' ?>>
                <?php echo $form->renderHiddenFields() ?>
                <?php include_partial('bookingFields',array('form'=>$form)) ?>
                <hr style="margin: 0px; border-top-color: #000000 "/>
                <?php include_partial('arrivalFields',array('form'=>$form)) ?>
                <hr style="margin: 0px; border-top-color: #000000 "/>
                <?php include_partial('departureFields',array('form'=>$form)) ?>
            </form>
        </div>
    </div>
</div>
<script type="text/javascript">
    $('#save_booking_form').on('click',function(){

        $form = $('#booking_form');
        $form.submit();
    });

    $('#new_booking_form').on('click',function(){
        document.location.href = '<?php echo url_for('booking/index') ?>'
    });

    $('#copy_booking_form').on('click',function(){
        document.location.href = '<?php echo url_for('booking/'.($form->getObject()->isNew() ? 'index' : 'copy?id='.$form->getObject()->getId())) ?>'
    });
</script>