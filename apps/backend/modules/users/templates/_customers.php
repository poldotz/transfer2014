<?php
/**
 * Created by PhpStorm.
 * User: lpodda
 * Date: 5/27/14
 * Time: 3:09 PM
 */

?>
<div class="control-group">
    <label class="control-label"><?php echo $form['customer_type_id']->renderLabel() ?></label>
    <div class="controls">
        <?php echo $form['customer_type_id']->renderError() ?>
        <?php echo $form['customer_type_id'] ?>
    </div>
</div>
<?php if($form['customer_type_id']->getValue()): ?>
    <div class="control-group <?php echo $form['customer_id']->hasError() ? 'error' : ''; ?>" id="customer_id">
        <label class="control-label"><?php echo $form['customer_id']->renderLabel() ?></label>
        <?php echo $form['customer_id']->render(array('required')) ?>
    </div>
<?php else:  ?>
    <div  class="control-group <?php echo $form['customer_id']->hasError() ? 'error' : ''; ?>" id="customer_id" style="display: none"></div>
<?php endif; ?>



<script type="text/javascript">
    $('#sf_guard_user_customer_type_id').change(function(){
        if($(this).val() > 0){
            var customer_type_id = $('#sf_guard_user_customer_type_id').val();
            //$('#loading-indicator').show();
            $.ajax({
                url: "<?php echo url_for('users/selectCustomer')?>",
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