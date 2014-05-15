<?php
/**
 * Created by PhpStorm.
 * User: poldotz
 * Date: 02/05/14
 * Time: 8.42
 */
?>
<fieldset>
    <div class="control-group">
        <div style="margin-left: 0px;" class="controls">
            <div class="row-fluid">
                <div class="span2">
                 <span class="label label-inverse" style="font-size: 14px; font-weight: bolder">
                     Progressivo: <?php echo $form['number']->getValue() ?>
                 </span>
                </div>
                <div style="margin-left: 5px; margin-right: 25px;" class="span2">
                  <span class="label label-inverse" style="font-size: 14px; font-weight: bolder">
                    Data Reg.: <?php echo $form['booking_date']->getValue() ?>
                  </span>
                </div>
                <div class="span3">
                    <?php echo $form['customer_type_id']->render(array('class'=>"input-block-level",'required')) ?>
                </div>
                <div class="span4 input-left-top-margins">
                    <?php if($form->getObject()->getCustomerId() || $form['customer_type_id']->getValue()): ?>
                        <div class="control-group <?php echo $form['customer_id']->hasError() ? 'error' : ''; ?>" id="customer_id">
                            <?php echo $form['customer_id']->render(array('class'=>"input-block-level",'required')) ?>
                        </div>
                    <?php else:  ?>
                        <div  class="control-group <?php echo $form['customer_id']->hasError() ? 'error' : ''; ?>" id="customer_id" style="display: none"></div>
                    <?php endif; ?>
                </div>
            </div>
        </div>
    </div>
    <div class="control-group">
        <div style="margin-left: 0px;" class="controls">
            <div class="row-fluid">
                <div class="span4 input-left-top-margins">
                    <?php echo $form['contact']->render(array('class'=>"input-block-level",'placeholder'=>"Referente",'title'=>"Referente")) ?>
                </div>
                <div class="span3 input-left-top-margins"required>
                    <div class="control-group <?php echo $form['vehicle_type_id']->hasError() ? 'error' : ''; ?>">
                        <?php echo $form['vehicle_type_id']->render(array('class'=>"input-block-level",'required')) ?>
                    </div>
                </div>
                <div class="span3 input-left-top-margins"required>
                    <div class="control-group <?php echo $form['adult']->hasError() ? 'error' : ''; ?>">
                        <?php echo $form['adult']->render(array('class'=>"input-block-level",'required',"maxlength"=>"2","pattern"=>"\d","placeholder"=>"Adulti")) ?>
                    </div>                 </div>
                <div class="span2 input-left-top-margins">
                    <?php echo $form['child']->render(array('class'=>"input-block-level",'required',"maxlength"=>"2","pattern"=>"\d","placeholder"=>"Bambini")) ?>
                </div>
            </div>
        </div>
    </div>
    <div class="control-group">
        <div style="margin-left: 0px;" class="controls">
            <div class="row-fluid">

                <div class="span4 input-left-top-margins" required>
                    <div class="control-group <?php echo $form['departure']['locality_from']->hasError() ? 'error' : ''; ?>">
                        <?php echo $form['departure']['locality_from']->render(array('class'=>"input-block-level",'required')) ?>
                    </div>

                </div>

                <div class="span3 input-left-top-margins">
                    <div class="control-group <?php echo $form['departure']['locality_to']->hasError() ? 'error' : ''; ?>">
                        <?php echo $form['departure']['locality_to']->render(array('class'=>"input-block-level",'required')) ?>
                    </div>
                </div>
                <div class="span2 input-left-top-margins" required>
                    <?php echo $form['departure']['flight']->render(array('class'=>"input-block-level","placeholder"=>"Sigla")) ?>
                </div>
                <div style="margin-left: 5px;" class="span1 input-left-top-margins" required>
                    <div class="input-append bootstrap-timepicker form-inline">
                        <?php echo $form['departure']['departure_time']->render(array('class'=>"span9")) ?>
                    </div>
                </div>
                <div style="margin-left: 40px; margin-right: 0px;" class="span1">
                    <div class="input-append bootstrap-timepicker form-inline">
                        <div class="control-group <?php echo $form['departure']['hour']->hasError() ? 'error' : ''; ?>">
                            <?php echo $form['departure']['hour']->render(array('class'=>"span9")) ?>
                        </div>
                    </div>
                </div>
                <div style="margin-left: 40px; margin-right: 0px;" class="span1">
                    <?php echo $form['departure']['pick_up']->render() ?>

                    <?php if($form['departure']['pick_up']->getValue() == 1): ?>
                        <div class="label label-important">PK</div>
                    <?php else: ?>
                        PK
                    <?php endif; ?>
                </div>
            </div>
        </div>
    </div>
    <div class="control-group">
        <div style="margin-left: 0px;" class="controls">
            <div class="row-fluid">
                <div style="margin-left: 0px;" class="span4 input-left-top-margins" required>
                    <?php echo $form['departure']['driver_id']->render(array('class'=>"input-block-level")) ?>
                </div>
                <div class="span3 form-inline" required>
                    <label>Pagamento:</label>
                    <?php echo $form['departure']['payment_method_id']->render() ?>
                </div>
                <div class="span4 input-left-top-margins" required>
                    <?php echo $form['departure']['note']->render(array('class'=>"input-block-level","placeholder"=>"Nota")) ?>
                </div>
                <div class="span1 form-inline" required>
                    <label class="radio inline">
                        <?php echo $form['departure']['cancelled']->render() ?>

                        <?php if($form['departure']['cancelled']->getValue() == 1): ?>
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

<script type="text/javascript">
    $('#booking_departure_departure_time_hour').change(function(){
        var hour = this.value;
        var minute = $('#booking_departure_hour_minute').val();
        var locality_from  = $('#booking_departure_locality_from').val();
        var locality_to = $('#booking_departure_locality_to').val();
        var pickUp = $('#booking_departure_pick_up').prop('checked');
        if(pickUp === false){
            if(hour && minute && locality_from && locality_to){
                $.ajax({
                    url: '<?php echo url_for('booking/pickUp')?>',
                    data: {hour: hour, minute: minute, locality_from: locality_from, locality_to: locality_to,pickUp: pickUp},
                    method: "post",
                    dataType: "json"
                })
                    .done(function(response){
                        if(response.taxi_service){
                            $('#booking_departure_departure_time_hour').hide();
                            $('#booking_departure_departure_time_minute').hide();
                            $('#booking_departure_pick_up').hide();
                        }
                        else{
                            $('#booking_departure_departure_time_hour').show()
                            $('#booking_departure_departure_time_minute').show();
                            $('#booking_departure_pick_up').show();
                        }
                        var hour = $('#booking_departure_hour_hour').val(response.departureHour);
                        var minute = $('#booking_departure_hour_minute').val(response.departureMinute);

                    })
                    .fail(function(msg){
                        bootbox.alert("errore:" + msg);
                    });

            }
        }
    });

    $('#booking_departure_departure_time_minute').change(function(){
        var hour = $('#booking_departure_departure_time_hour').val();
        var minute = this.value;
        var locality_from  = $('#booking_departure_locality_from').val();
        var locality_to = $('#booking_departure_locality_to').val();
        var pickUp = $('#booking_departure_pick_up').prop('checked');
        if(pickUp === false){
            if(hour && minute && locality_from && locality_to){
                $.ajax({
                    url: '<?php echo url_for('departure/pickUp')?>',
                    data: {hour: hour, minute: minute, locality_from: locality_from, locality_to: locality_to,pickUp: pickUp},
                    method: "post",
                    dataType: "json"
                })
                    .done(function(response){
                        var hour = $('#booking_departure_hour_hour').val(response.departureHour);
                        var minute = $('#booking_departure_hour_minute').val(response.departureMinute);

                    })
                    .fail(function(msg){
                        bootbox.alert("errore:" + msg);
                    });
            }
        }
    });
</script>