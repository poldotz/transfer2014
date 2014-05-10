<?php
/**
 * Created by PhpStorm.
 * User: lpodda
 * Date: 5/5/14
 * Time: 5:38 PM
 */
?>
<?php include_partial('global/configuration_navbar',array('selected'=>'locality')); ?>
<div class="main-container" xmlns="http://www.w3.org/1999/html">
    <h4>Gestionie Percorso</h4>
    <div class="row-fluid">
        <div class="span12">
        <form action="<?php echo url_for('route/save')?>" method="post">
            <input type="hidden" name="locality_from" value="<?php echo $locality_from->getId() ?>"/>
            <button type="submit" class="btn btn-success">Salva</button>
            <br/><br/>
            <table class="table table-bordered table-striped">
            <thead>
            <th>Localit&agrave</th>
            <th>Vettore</th>
            <th>Durata</th>
            <th>Distanza</th>
            </thead>
            <?php foreach($form->getFormFieldSchema() as $collectionField): ?>
                    <?php if(get_class($collectionField) == 'sfFormFieldSchema'): ?>
                    <tr>
                        <?php foreach( $collectionField as  $field ): ?>
                            <?php if($field->getName() == "locality_to"): ?>
                                <td class="span3">
                                <?php echo $locality_from->getName(); ?>
                                </td>
                                <?php $locality_to = LocalityPeer::retrieveByPK($field->getValue())->getName(); ?>
                                <td class="span3">
                                    <?php echo $locality_to; ?>
                                </td>
                            <?php endif; ?>
                            <td class="<?php echo $field->isHidden() ? 'hidden' : 'span3' ?> ">
                                <?php echo $field->render(array("class"=>"span4")); ?>
                            </td>
                        <?php endforeach; ?>
                    </tr>
                    <?php else: ?>
                        <?php echo $collectionField->render() ?>
                    <?php endif; ?>
            <?php endforeach; ?>
            </table>
        </form>
        </div>
    </div>
</div>

