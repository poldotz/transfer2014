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
    <?php include_component('areaRateTable','rateTableHeader',array('customer_id'=>$customer->getId(),'active'=>'areas')); ?>
    <div class="tab-content">
        <div id="area" class="tab-pane active">
            <div class="row-fluid">
                <div class="span12 right-align-text">
                     <?php include_component('areaRateTable','areaCustomer',array('customer_id'=>$customer->getId(),'area_id'=>$area->getId())); ?>
                </div>
            </div>
            <div class="row-fluid">
                <div class="span12">
                    <form action="<?php echo url_for('areaRateTable/save')?>" method="post">
                            <div class="form-actions"><button type="submit" class="btn btn-success">Salva</button>
                                <?php echo link_to('Torna alla lista','@customer',array('class'=>'btn btn-info')) ?>
                            </div>
                        <input type="hidden" name="customer_id" value="<?php echo  $customer->getId() ?>" />
                        <input type="hidden" name="area_id" value="<?php echo  $area->getId() ?>" />

                        <table class="table table-bordered table-striped">
                            <thead>
                            <th>Categoria Mezzo</th>
                            <th>Tariffa</th>
                            </thead>
                            <tbody>
                            <?php foreach($form->getFormFieldSchema() as $collectionField): ?>
                            <?php if(get_class($collectionField) == 'sfFormFieldSchema'): ?>
                                <tr>
                                    <?php foreach( $collectionField as  $field ): ?>
                                    <?php if($field->getName() == "id"): ?>
                                        <?php echo $field->render(); ?>
                                    <?php endif; ?>
                                    <?php if($field->getName() == "area_id"): ?>
                                        <?php echo $field->render(); ?>
                                    <?php endif; ?>
                                    <?php if($field->getName() == "customer_id"): ?>
                                            <?php echo $field->render(); ?>
                                    <?php endif; ?>
                                        <?php if($field->getName() == "vehicle_type_id"): ?>
                                            <td class="span4">
                                                <?php $vehicle_type = VehicleTypePeer::retrieveByPK($field->getValue()); ?>
                                                <?php echo $vehicle_type->getName() ?>
                                                <?php echo $field->render(); ?>
                                            </td>
                                        <?php endif; ?>
                                        <?php if($field->getName() == "cost"): ?>
                                            <td class="span4" style="vertical-align: middle">
                                                <?php echo $field->render(); ?>
                                                <?php echo $vehicle_type->getPerPerson() ? " (a persona) ": ""  ?>
                                            </td>
                                        <?php endif; ?>
                                    <?php endforeach; ?>
                                </tr>
                            <?php else: ?>
                                <?php echo $collectionField->render() ?>
                            <?php endif; ?>
                            <?php endforeach; ?>
                            </tbody>
                        </table>
                            <div class="form-actions"><button type="submit" class="btn btn-success">Salva</button>
                                <?php echo link_to('Torna alla lista','@customer',array('class'=>'btn btn-info')) ?>
                            </div>
                    </form>
                    <br/>
                </div>
            </div>
         </div>
    </div>
</div>
