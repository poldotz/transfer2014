<?php
/**
 * Created by PhpStorm.
 * User: poldotz
 * Date: 02/05/14
 * Time: 8.38
 */
?>

<div class="widget-header">
    <div class=" form-inline">
        <form style="display: inline" action="<?php echo url_for('arrival/changeDate') ?>" method="post">
        Arrivi del:
            <?php echo $form['arrival']['day_change']->render(array('class'=>'input-small','readonly')); ?>
        </form>&nbsp;&nbsp;&nbsp;
        <?php if(!$form->getObject()->isNew()): ?>
            <a id="set_driver" href="#" title="Inserimento Autisti" class="btn btn-small btn-info"/>

                <span class="fs1" aria-hidden="true" data-icon="&#xe075;"></span>

            </a>
            <a href="#" title="Cambia Data" class="btn btn-small btn-warning2"/>
            <span class="fs1" aria-hidden="true" data-icon="&#xe052;"></span>
            </a>
            <a href="#" title="Invia Email" class="btn btn-small btn-success"/>
            <span class="fs1" aria-hidden="true" data-icon=" &#xe040;"></span>
            </a>
            <div class="pull-right">
                <button id="save_arrival_form" class="btn btn-small btn-primary" type="button">SALVA</button>
            </div>
        <?php endif; ?>
    </div>
</div>
<script type="text/javascript">
    $("#booking_arrival_day_change").on("change", function(event) {
        $(this).parents('form').submit();
    } );
</script>
<script type="text/javascript">
    $("#booking_arrival_day_change").datepicker({
        showOn: "button",
        buttonImage: "/images/calendar.gif",
        buttonImageOnly: true,
        dateFormat: 'dd-mm-yy'

    }).addClass("embed");
</script>