<?php
/**
 * Created by PhpStorm.
 * User: poldotz
 * Date: 04/05/14
 * Time: 10.26
 */
?>
    <div class="span12 form-inline">
        <div class="control-group">
            <form action="<?php echo url_for('arrival/updateDay') ?>" method="post">
                <label>Cambia data: </label>
                <?php echo $form['arrival']['id']->render(); ?>
                <?php echo $form['arrival']['day_update']->render(array('class'=>'input-small','readonly')); ?>
                <button type="submit" value="ok" class="btn btn-success">OK</button>
            </form>
        </div>
        <hr/>
    </div>
    <script type="text/javascript">
        $("#booking_arrival_day_update").datepicker({
            showOn: "button",
            buttonImage: "/images/calendar.gif",
            buttonImageOnly: true,
            dateFormat: 'dd-mm-yy'

        }).addClass("embed");

        $('#edit_day').click(function(){
            if($( "#edit_day_container").hasClass('hidden')){
                $( "#edit_day_container").removeClass('hidden');
            }
            else{
                $( "#edit_day_container").addClass('hidden');
            }
        });
    </script>
