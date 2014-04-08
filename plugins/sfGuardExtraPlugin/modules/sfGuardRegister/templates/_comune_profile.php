<?php
/**
 * Created by JetBrains PhpStorm.
 * User: poldotz
 * Date: 30/05/13
 * Time: 2.28
 * To change this template use File | Settings | File Templates.
 */
?>
<div class="control-group <?php ($form['provincia']->hasError() || $form['comune']->hasError()) ? print('error') : print(''); ?>">
    <div class="span2">
        <?php echo $form['comune']->renderLabel('Comune',array('class'=>'control-label')); ?>
        </div>
        <div class="span10" style="padding-right: 5px;">
            <?php echo $form['comune']->render(array('class'=>'span12')) ?>
            <?php if($form['comune']->hasError()): ?>
                <span class="help-inline"><?php echo $form['comune']->getError() ?></span>
            <?php endif; ?>
            </div>
        </div>
    </div>
</div>