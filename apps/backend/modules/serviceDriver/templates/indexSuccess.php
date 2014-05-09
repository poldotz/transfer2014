<?php include_partial('global/services_navbar',array('selected'=>'service_driver')); ?>
<?php use_stylesheet('dataTableNew/jquery.dataTables.min.css','last') ?>
<?php use_stylesheet('dataTableNew/dataTables.tableTools.min.css','last') ?>
<?php use_stylesheet('dataTableNew/dataTables.scroller.min.css','last') ?>
<?php use_javascript('dataTableNew/jquery.dataTables.min.js') ?>
<?php use_javascript('dataTableNew/dataTables.scroller.min.js') ?>
<?php use_javascript('dataTableNew/dataTables.tableTools.min.js') ?>
<?php slot('container_open') ?>
    <div class="container-fluid">
        <?php include_component('serviceDriver','driversServices') ?>
        <div style="margin-left: 190px;" class="dashboard-wrapper">
<?php end_slot(); ?>
<div class="main-container">
    <?php include_partial('global/navbar_mini'); ?>
    <div class="row-fluid">
        <div class="span12">
            <div class="widget">
                <div class="widget-header">
                    <div class="center-align-text form-inline">
                        Servizi del:
                        <form style="display: inline" action="<?php echo url_for('serviceDriver/changeDate') ?>" method="post">
                            Servizi del:
                            <?php echo $form['day_change']->render(array('class'=>'input-small','readonly')); ?>
                        </form>
                    </div>
                </div>
                <div id="service_driver_list"class="widget-body">
                <?php include_partial('driverServiceList',array('driverServices'=>$driverServices)) ?>
                </div>
            </div>
        </div>
    </div>
</div>

<script type="text/javascript">
    $("#day_change").on("change", function(event) {
        $(this).parents('form').submit();
    } );
</script>
<script type="text/javascript">
    $("#day_change").datepicker({
        showOn: "button",
        buttonImage: "/images/calendar.gif",
        buttonImageOnly: true,
        dateFormat: 'dd-mm-yy'

    }).addClass("embed");
    </script>