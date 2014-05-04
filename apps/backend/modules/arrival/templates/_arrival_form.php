<?php
/**
 * Created by PhpStorm.
 * User: poldotz
 * Date: 02/05/14
 * Time: 8.35
 */
?>

<?php use_helper('Date'); ?>

<div id="arrival_container" class="span12" style="margin-bottom: 0px;">
    <div class="widget">
        <?php include_partial('arrival_button_widget',array('form'=>$form)); ?>
        <div style="padding: 5px;" class="widget-body">
            <?php if(!$form->getObject()->isNew()):?>
                <form id="arrival_form" action="<?php echo url_for('arrival/update?id='.$form->getObject()->getId()) ?>" method="post" <?php $form->isMultipart() and print 'enctype="multipart/form-data" ' ?>>
                    <?php echo $form->renderHiddenFields() ?>
                    <?php include_partial('arrivalFields',array('form'=>$form))?>
                </form>
                <?php else: ?>
                    <h3 class="center-align-text">Nessun Arrivo trovato con i parametri selezionati.</h3>
                <?php endif; ?>
        </div>
    </div>
</div>
<script type="text/javascript">
    $('#save_arrival_form').on('click',function(){

        $form = $('#arrival_form');
        $form.submit();
    });
</script>