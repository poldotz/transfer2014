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
                        <?php echo $form['departure']['departure_time']->render(array('class'=>"span11")) ?>
                    </div>
                </div>
                <div class="span1" style="margin-left: 70px;" required >
                    <div class="input-append bootstrap-timepicker form-inline">
                        <div class="control-group <?php echo $form['departure']['hour']->hasError() ? 'error' : ''; ?>">
                            <?php echo $form['departure']['hour']->render(array('class'=>"span11")) ?>
                        </div>
                    </div>
                </div>
                <div style="margin-left: 70px; margin-right: 0px;" class="span1">
                   <?php echo $form['departure']['pick_up']->render() ?>
                    <?php if($form['departure']['pick_up']->getValue() == 1): ?>
                        <div class="label label-important">PK</div>
                    <?php else: ?>
                        <div class="label label-inverse">PK</div>
                    <?php endif; ?>


                </div>
                <div class="span3 input-left-top-margins" required>
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
                    url: '<?php echo url_for('booking/pickUp')?>',
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