<?php include_partial('global/services_navbar',array('selected'=>'departure')); ?>
<?php use_stylesheet('dataTableNew/jquery.dataTables.min.css','last') ?>
<?php use_stylesheet('dataTableNew/dataTables.tableTools.min.css','last') ?>
<?php use_stylesheet('dataTableNew/dataTables.scroller.min.css','last') ?>
<?php use_javascript('dataTableNew/jquery.dataTables.min.js') ?>
<?php use_javascript('dataTableNew/dataTables.scroller.min.js') ?>
<?php use_javascript('dataTableNew/dataTables.tableTools.min.js') ?>

<div class="main-container">
    <?php include_partial('global/navbar_mini'); ?>
    <div class="row-fluid">
        <?php include_partial('departure_form',array('form'=>$form)); ?>
    </div>
    <?php include_component('departure','drivers') ?>
    <div class="row-fluid">
        <div class="span12">
            <?php include_partial('departure_list') ?>
        </div>
    </div>
</div>