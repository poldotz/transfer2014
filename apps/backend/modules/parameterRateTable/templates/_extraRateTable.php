<?php
/**
 * Created by PhpStorm.
 * User: poldotz
 * Date: 07/12/14
 * Time: 7.56
 */ ?>

<div class="row-fluid">
    <div class="span6">
        <form action="<?php echo url_for('parameterRateTable/save')?>" method="post">
            <input type="hidden" name="customer_id" value="<?php echo  $customer_id ?>" />
            <div class="widget">
                <div class="widget-header">
                    <div class="title">
                        <span class="fs1" aria-hidden="true" data-icon="&#xe098;"></span> Extra
                    </div>
                </div>
            <div class="widget-body">
            <table class="table table-bordered table-striped">
                <thead>
                <th>Nome</th>
                <th>Valore</th>
                <th>Tipologia</th>
                </thead>
                <tbody>
                <?php foreach($extraRatesForm->getFormFieldSchema() as $collectionField): ?>
                    <?php if(get_class($collectionField) == 'sfFormFieldSchema'): ?>
                        <tr>
                            <?php foreach( $collectionField as  $field ): ?>
                            <?php if($field->getName() == "customer_id"): ?>
                                    <?php echo $field->render(); ?>
                            <?php endif; ?>
                            <?php if($field->getName() == "rate_extra_id"): ?>
                                    <td>
                                    <?php $extraRate = RateExtraPeer::retrieveByPK($field->getValue()); ?>
                                    <?php echo $extraRate->getName() ?>
                                    <?php echo $field->render(); ?>
                                    </td>
                                <?php endif; ?>
                                <?php if($field->getName() == "value"): ?>
                                    <td>
                                    <?php echo $field->render(); ?>
                                    </td>
                                <?php endif; ?>
                                <?php if($field->getName() == "typology"): ?>
                                    <td>
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
                <div class="form-actions"><button type="submit" class="btn btn-success">Salva</button>
                    <?php echo link_to('Torna alla lista','@customer',array('class'=>'btn btn-info')) ?>
                </div>
        </form>
        </div>
    </div>
</div>