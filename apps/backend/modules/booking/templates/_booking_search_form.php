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
        <?php include_partial('search_button_widget'); ?>
        <div style="padding: 5px;" class="widget-body">
            <form id="booking_form" action="<?php echo url_for('booking/') ?> method="post" <?php $form->isMultipart() and print 'enctype="multipart/form-data" ' ?>>
                <?php echo $form->renderHiddenFields() ?>
                <?php include_partial('bookingSearchFields',array('form'=>$form)) ?>
                <hr style="margin: 0px; border-top-color: #000000 "/>
                <?php include_partial('arrivalFields',array('form'=>$form)) ?>
                <hr style="margin: 0px; border-top-color: #000000 "/>
                <?php include_partial('departureFields',array('form'=>$form)) ?>
            </form>
        </div>
    </div>
</div>
<script type="text/javascript">


    $('#search_booking_form').on('click',function(){
        $form = $('#booking_form');

        var datastring = $form.serialize();

        $.ajax({
            type: "POST",
            url: "<?php echo url_for('booking/search')?>",
            data: datastring,
            success: function(response){
                reloadTableOnSearch(response,'<?php echo url_for('booking/search')?>');
            }
        });

    });

    $('#new_search_form').on('click',function(){
        document.location.href = '<?php echo url_for('booking/search') ?>'
    });

    $('#back_booking_form').on('click',function(){
        document.location.href = '<?php echo url_for('booking/'.($form->getObject()->isNew() ? 'index' : 'copy?id='.$form->getObject()->getId())) ?>'
    });

    function reloadTableOnSearch(data,sNewSource){
        table = $('#booking_search_list').dataTable();
        oSettings = table.fnSettings();

        if ( sNewSource !== undefined && sNewSource !== null ) {
            oSettings.sAjaxSource = sNewSource;
        }

        table.fnClearTable(oSettings);

        for (var i=0; i<data.aaData.length; i++)
        {
            table.oApi._fnAddData(oSettings, data.aaData[i]);
        }

        oSettings.aiDisplay = oSettings.aiDisplayMaster.slice();
        oSettings.oFeatures.bServerSide = false;
        table.fnDraw();
        return;
    }
</script>