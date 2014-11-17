<?php include_partial('global/configuration_navbar',array('selected'=>'rate')); ?>

<div class="main-container">
    <div class="row-fluid">
        <div class="span12 form-inline ">
            <?php //echo button_to('Nuovo','route/new',array('class'=>"btn btn-info", "style"=>'float:left; margin: 5px;')) ?>
            <form action="<?php echo url_for('rateTable/search')?>" method="post">
                <div class="control-group">
                    <label>Cliente: </label>
                    <?php echo $form['customer_id']->render() ?>
                    <input type="submit" value="cerca"/>
                </div>
            </form>
        </div>
    </div>
    <br/>