<?php
/**
 * Created by PhpStorm.
 * User: poldotz
 * Date: 02/05/14
 * Time: 8.35
 */
?>

<?php use_helper('Date'); ?>

<div id="departure_container" class="span12" style="margin-bottom: 0px;">
    <div class="widget">
        <?php include_partial('departure_button_widget',array('form'=>$form)); ?>
        <div style="padding: 5px;" class="widget-body">
            <?php if(!$form->getObject()->isNew()):?>
                <div id="edit_day_container" class="row-fluid hidden center-align-text">
                    <?php include_partial('editDay',array('form'=>$form)); ?>
                </div>
                <form id="departure_form" action="<?php echo url_for('departure/update?id='.$form->getObject()->getId()) ?>" method="post" <?php $form->isMultipart() and print 'enctype="multipart/form-data" ' ?>>
                    <?php echo $form->renderHiddenFields() ?>
                    <?php include_partial('departureFields',array('form'=>$form))?>
                </form>
                <?php else: ?>
                    <h3 class="center-align-text">Nessuna Partenza trovato con i parametri selezionati.</h3>
                <?php endif; ?>
        </div>
    </div>
</div>
<script type="text/javascript">
    $('#save_departure_form').on('click',function(){

        $form = $('#departure_form');
        $form.submit();
    });
</script>