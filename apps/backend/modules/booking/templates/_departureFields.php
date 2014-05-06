<?php
/**
 * Created by PhpStorm.
 * User: poldotz
 * Date: 27/04/14
 * Time: 9.12
 */
?>
<h6 style="margin: 5px" class="text-error center-align-text">PARTENZA</h6>
<fieldset>
    <div class="control-group">
        <div style="margin-left: 0px;" class="controls">
            <div class="row-fluid">
                <div class="span4 form-inline">
                    <div class="control-group <?php echo $form['departure']['day']->hasError() ? 'error' : ''; ?>">
                    <label>Data:</label>
                        <?php echo $form['departure']['day']->render(array('class'=>'span3')); ?>
                    </div>
                </div>
                <div class="span4 input-left-top-margins" required>
                    <div class="control-group <?php echo $form['departure']['locality_from']->hasError() ? 'error' : ''; ?>">
                        <?php echo $form['departure']['locality_from']->render(array('class'=>"input-block-level",'required')) ?>
                    </div>
                </div>

                <div class="span4 input-left-top-margins">
                    <div class="control-group <?php echo $form['departure']['locality_to']->hasError() ? 'error' : ''; ?>">
                      <?php echo $form['departure']['locality_to']->render(array('class'=>"input-block-level",'required')) ?>
                    </div>
                </div>

            </div>
        </div>
    </div>
    <div class="control-group">
        <div style="margin-left: 0px;" class="controls">
            <div class="row-fluid">
                <div class="span2 input-left-top-margins" required>
                    <?php echo $form['departure']['flight']->render(array('class'=>"input-block-level","placeholder"=>"Sigla")) ?>
                </div>
                <div class="span1 input-left-top-margins" required>
                    <div class="input-append bootstrap-timepicker form-inline">
                        <div class="control-group <?php echo $form['departure']['hour']->hasError() ? 'error' : ''; ?>">
                            <?php echo $form['departure']['hour']->render(array('class'=>"span9")) ?>
                        </div>
                    </div>
                </div>
                <div class="span1 input-left-top-margins" required>
                    <div class="input-append bootstrap-timepicker form-inline">
                        <?php echo $form['departure']['departure_time']->render(array('class'=>"span9")) ?>
                    </div>
                </div>

                <div style="margin-left: 15px; margin-right: 0px;" class="span1">
                   <?php echo $form['departure']['pick_up']->render() ?>
                </div>
                <div class="span4 input-left-top-margins" required>
                    <?php echo $form['departure']['driver_id']->render(array('class'=>"input-block-level")) ?>
                </div>
                <div class="span3 form-inline" required>
                    <label>Pagamento:</label>
                    <?php echo $form['departure']['payment_method_id']->render() ?>
                </div>
            </div>
        </div>
    </div>
    <div class="control-group">
        <div style="margin-left: 0px;" class="controls">
            <div class="row-fluid">
                <div class="span8 input-left-top-margins" required>
                    <?php echo $form['departure']['note']->render(array('class'=>"input-block-level","placeholder"=>"Nota")) ?>
                </div>
                <div class="span2 form-inline" required>
                    <label class="radio inline">
                        <?php echo $form['departure']['cancelled']->render() ?> Annulla
                    </label>
                </div>
            </div>
        </div>
    </div>
</fieldset>
<script type="text/javascript">
    $('#booking_departure_hour_hour').change(function(){
        //var optionSelected = $("option:selected", this);
        var valueSelected = this.value;
        alert(valueSelected);
    });
</script>