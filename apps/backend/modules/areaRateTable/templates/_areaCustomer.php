<?php
/**
 * Created by PhpStorm.
 * User: lpodda
 * Date: 5/5/14
 * Time: 5:38 PM
 */
?>
<div class="row-fluid">
    <div class="span12">
        <form action="<?php echo $urlForm ?>" method="Post" class="form-inline">
            <?php echo $customerAreaForm->renderHiddenFields() ?>
            <?php echo $customerAreaForm['area_id']->renderRow(); ?>
            <button class="btn btn-primary" type="submit" >SELEZIONA</button>
        </form>
    </div>
</div>