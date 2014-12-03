<?php
/**
 * Created by PhpStorm.
 * User: lpodda
 * Date: 5/5/14
 * Time: 5:38 PM
 */
?>
<?php include_partial('global/configuration_navbar',array('selected'=>'customer')); ?>
<div class="main-container" xmlns="http://www.w3.org/1999/html">
    <h4>Gestionie Tariffa <?php echo $customer->getName() ?></h4>
    <?php include_component('areaRateTable','rateTableHeader',array('customer_id'=>$customer->getId(),'active'=>'parameters')); ?>
    <div class="tab-content">
        <div id="parameters" class="tab-pane active">
            <div class="row-fluid">
                <div class="span12">
                </div>
            </div>
         </div>
    </div>
</div>
