<?php
/**
 * Created by PhpStorm.
 * User: poldotz
 * Date: 04/05/14
 * Time: 10.26
 */
?>

<div id="set_driver_container" class="row-fluid hidden center-align-text">
    <div class="span12 form-inline">
        <div class="control-group">
            <form action="<?php echo ('arrival/setDriver') ?>" id="set_arrival_driver" method="post">
                    <?php echo $form['driver_id']->render() ?>
                <button type="submit" value="ok" class="btn btn-success">OK</button>
            </form>
        </div>
    </div>
</div>