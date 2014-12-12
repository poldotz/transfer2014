<?php include_partial('global/configuration_navbar',array('selected'=>'rate')); ?>
<div class="main-container">
    <h4>Modifica Extra <?php echo $form->getObject()->getName() ?></h4>
    <?php include_partial('form', array('form' => $form)) ?>
</div>
