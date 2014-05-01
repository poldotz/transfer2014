<?php include_partial('global/services_navbar',array('selected'=>'booking')); ?>
<?php use_stylesheet('dataTables/jquery.dataTables.css','last') ?>
<?php use_javascript('dataTables/jquery.dataTables.min.js') ?>
<?php use_javascript('dataTables/jquery.dataTables.filterDelay.js') ?>


    <div class="main-container">
        <?php include_partial('global/navbar_mini'); ?>
        <div class="row-fluid">
        <?php include_partial('booking_form',array('form'=>$form)); ?>
        </div>
        <div class="row-fluid">
            <div class="span12">
                <?php include_partial('booking_list') ?>
            </div>
        </div>
    </div>
