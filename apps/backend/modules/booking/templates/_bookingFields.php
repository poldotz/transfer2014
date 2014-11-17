<?php
/**
 * Created by PhpStorm.
 * User: poldotz
 * Date: 04/14
 * Time: 17.14
 */
?>
<h6 style="margin: 5px" class="center-align-text">DATI GENERALI</h6>
<fieldset>
    <div class="control-group">
        <div style="margin-left: 0px;" class="controls">
            <div class="row-fluid">
                <div class="span2">
                 <span class="label label-inverse" style="font-size: 14px; font-weight: bolder">
                        Progressivo: <?php echo $form['number']->getValue() ?>
                </span>
                </div>
                <div class="span3">
                  <span class="label label-inverse" style="font-size: 14px; font-weight: bolder">

                        Data Registrazione: <?php echo format_date($form['booking_date']->getValue(),"I"); ?>
                  </span>
                </div>
                <div class="span3 input-left-top-margins" required>
                    <?php echo $form['rif_file']->render(array('class'=>"input-block-level",'placeholder'=>"Rif.File",'title'=>"Rif.File")) ?>
                </div>
                <div class="span4 input-left-top-margins">
                    <?php echo $form['contact']->render(array('class'=>"input-block-level",'placeholder'=>"Referente",'title'=>"Referente")) ?>
                </div>
            </div>
        </div>
    </div>
    <div class="control-group">
        <div style="margin-left: 0px;" class="controls">
            <div class="row-fluid">
                <div class="span2">
                    <div class="control-group <?php echo $form['customer_type_id']->hasError() ? 'error' : ''; ?>">
                    <?php echo $form['customer_type_id']->render(array('class'=>"input-block-level",'required')) ?>
                    </div>
                </div>
                <div class="span3 input-left-top-margins">
                    <?php if($form->getObject()->getCustomerId() || $form['customer_type_id']->getValue()): ?>
                        <div class="control-group <?php echo $form['customer_id']->hasError() ? 'error' : ''; ?>" id="customer_id">
                            <?php echo $form['customer_id']->render(array('class'=>"input-block-level",'required')) ?>
                        </div>
                    <?php else:  ?>
                    <div  class="control-group <?php echo $form['customer_id']->hasError() ? 'error' : ''; ?>" id="customer_id" style="display: none"></div>
                    <?php endif; ?>
                </div>
                <div class="span3 input-left-top-margins"required>
                    <div class="control-group <?php echo $form['vehicle_type_id']->hasError() ? 'error' : ''; ?>">
                        <?php echo $form['vehicle_type_id']->render(array('class'=>"input-block-level",'required')) ?>
                    </div>
                    </div>
                <div class="span2 input-left-top-margins">
                    <div class="control-group <?php echo $form['adult']->hasError() ? 'error' : ''; ?>">
                        <?php echo $form['adult']->render(array('class'=>"input-block-level",'required',"maxlength"=>"2","pattern"=>"\d","placeholder"=>"Adulti")) ?>
                    </div>
                </div>
                <div class="span1 input-left-top-margins">
                    <?php echo $form['reduced']->render(array('class'=>"input-block-level",'required',"maxlength"=>"2","pattern"=>"\d","placeholder"=>"Ridotti")) ?>
                </div>
                <div class="span1 input-left-top-margins">
                    <?php echo $form['child']->render(array('class'=>"input-block-level",'required',"maxlength"=>"2","pattern"=>"\d","placeholder"=>"Bambini")) ?>
                </div>
            </div>
        </div>
    </div>
</fieldset>

<script type="text/javascript">
        $('#booking_customer_type_id').change(function(){
        if($(this).val() > 0){
            var customer_type_id = $('#booking_customer_type_id').val();
            //$('#loading-indicator').show();
            $.ajax({
                url: "<?php echo url_for('booking/selectCustomer')?>",
                type: "post",
                cache:false,
                data: "customer_type_id="+customer_type_id,
                success: function (HTML){
                    if (HTML>""){
                        $('#customer_id').html(HTML);
                        $('#customer_id').show();
                        //$('#loading-indicator').hide();
                    }
                    return false;
                }
            });

        }
    });
</script>
