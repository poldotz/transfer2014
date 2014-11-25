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
    <div class="row-fluid">
        <div class="span12">

            <?php echo $customerAreaForm->render(); ?>

            <form action="<?php echo url_for('areaRateTable/save')?>" method="post">
                <button type="submit" class="btn btn-success">Salva</button>
                <br/><br/>
                <table class="table table-bordered table-striped">
                    <thead>
                    <th>Zona</th>
                    <th>Categoria Mezzo</th>
                    <th>Tariffa</th>
                    </thead>
                    <tbody>
                    <?php foreach($form->getFormFieldSchema() as $collectionField): ?>
                    <?php if(get_class($collectionField) == 'sfFormFieldSchema'): ?>
                        <tr>
                            <?php foreach( $collectionField as  $field ): ?>
                            <?php if($field->getName() == "customer_id"): ?>
                                    <?php echo $field->render(); ?>
                            <?php endif; ?>
                                <?php if($field->getName() == "area_id"): ?>
                                    <td class="span4">
                                        <?php $area = AreaPeer::retrieveByPK($field->getValue()); ?>
                                        <?php echo $area->getName() ?>
                                        <?php echo $field->render(); ?>
                                    </td>
                                <?php endif; ?>
                                <?php if($field->getName() == "vehicle_type_id"): ?>
                                    <td class="span4">
                                        <?php $vehicle_type = VehicleTypePeer::retrieveByPK($field->getValue()); ?>
                                        <?php echo $vehicle_type->getName() ?>
                                        <?php echo $vehicle_type->getPerPerson() ? " (a persona) ": ""  ?>
                                        <?php echo $field->render(); ?>
                                    </td>
                                <?php endif; ?>
                                <?php if($field->getName() == "cost"): ?>
                                    <td class="span4">
                                        <?php echo $field->render(); ?>
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
            </form>
        </div>
    </div>
</div>
