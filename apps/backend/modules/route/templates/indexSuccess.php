<?php include_partial('global/configuration_navbar',array('selected'=>'locality')); ?>

<div class="main-container">
    <div class="row-fluid">
        <div class="span12 form-inline ">
            <?php //echo button_to('Nuovo','route/new',array('class'=>"btn btn-info", "style"=>'float:left; margin: 5px;')) ?>
            <form action="<?php echo url_for('route/search')?>" method="post" cla>
                <div class="control-group">
                 <label>Localit&agrave; di partenza: </label>
                <?php echo $form['locality_from']->render() ?>
                <input type="submit" value="cerca"/>
                </div>
            </form>
        </div>
    </div>
    <br/>