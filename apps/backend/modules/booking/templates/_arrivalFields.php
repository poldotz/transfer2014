<?php
/**
 * Created by PhpStorm.
 * User: poldotz
 * Date: 27/04/14
 * Time: 9.12
 */
?>
<h6 style="margin: 5px" class="text-info center-align-text">ARRIVO</h6>
<fieldset>
    <div class="control-group">
        <div style="margin-left: 0px;" class="controls">
            <div class="row-fluid">
                <div class="span4 form-inline">
                    <div class="control-group <?php echo $form['arrival']['day']->hasError() ? 'error' : ''; ?>">
                    <label>Data:</label>
                            <?php echo $form['arrival']['day']->render(array('class'=>'span3')); ?>
                        </div>
                </div>
                <div class="span4 input-left-top-margins" required>
                    <div class="control-group <?php echo $form['arrival']['locality_from']->hasError() ? 'error' : ''; ?>">
                        <?php echo $form['arrival']['locality_from']->render(array('class'=>"input-block-level",'required')) ?>
                    </div>
                </div>

                <div class="span4 input-left-top-margins">
                    <div class="control-group <?php echo $form['arrival']['locality_to']->hasError() ? 'error' : ''; ?>">
                        <?php echo $form['arrival']['locality_to']->render(array('class'=>"input-block-level",'required')) ?>
                    </div>
                </div>

            </div>
        </div>
    </div>
    <div class="control-group">
        <div style="margin-left: 0px;" class="controls">
            <div class="row-fluid">
                <div class="span2 input-left-top-margins" required>
                    <?php echo $form['arrival']['flight']->render(array('class'=>"input-block-level","placeholder"=>"Sigla")) ?>
                </div>
                <div class="span1 input-left-top-margins" required>
                    <div class="input-append bootstrap-timepicker form-inline">
                        <div class="control-group <?php echo $form['arrival']['hour']->hasError() ? 'error' : ''; ?>">
                            <?php echo $form['arrival']['hour']->render(array('class'=>"span9")) ?>
                        </div>
                    </div>
                </div>
                <div class="span1"></div>
                <div class="span4 input-left-top-margins" required>
                    <?php echo $form['arrival']['driver_id']->render(array('class'=>"input-block-level")) ?>
                </div>
                <div class="span3 form-inline" required>
                    <label>Pagamento:</label>
                    <?php echo $form['arrival']['payment_method_id']->render() ?>
                </div>
            </div>
        </div>
    </div>
    <div class="control-group">
        <div style="margin-left: 0px;" class="controls">
            <div class="row-fluid">
                <div class="span8 input-left-top-margins" required>
                    <?php echo $form['arrival']['note']->render(array('class'=>"input-block-level","placeholder"=>"Nota")) ?>
                </div>
                <div class="span2 form-inline" required>
                    <label class="radio inline">
                        <?php echo $form['arrival']['cancelled']->render() ?>

                        <?php if($form['arrival']['cancelled']->getValue() == 1): ?>
                            <div class="label label-important">Annullato</div>
                        <?php else: ?>
                            Annulla
                        <?php endif; ?>
                    </label>
                </div>
            </div>
        </div>
    </div>
</fieldset>