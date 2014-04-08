<div class="registration-wrapper">
    <div class="main-container">
        <?php echo image_tag('top_registration.png',array('width'=>"693", 'height'=>"85", 'alt'=>"Registrati")) ?>
        <?php echo image_tag('smeppo_registration.png',array('width'=>"103", 'height'=>"132", 'alt'=>"smeppo", 'class'=>"smeppo-registration")) ?>
            	<br><br>
        <div class="container-fluid">
            <?php echo link_to('<span class="fs1" aria-hidden="true" data-icon="&#xe000;"></span> HOME','@homepage'); ?>
            <div class="row-fluid">
                <div class="span12">
                    <div class="widget">
                        <div class="widget-header">
                            <div class="title">
                                <span class="fs1" aria-hidden="true" data-icon="&#xe070;"></span> RICORDA PASSWORD
                            </div>
                                <?php if($form['username_or_email']->hasError()): ?>
                                    <?php $error ="error"?>
                                <?php endif; ?>
                        </div>
                        <br>
                        <div class="widget-body">
                            <form class="form-horizontal no margin" action="<?php echo url_for('@sf_guard_password') ?>"  method="post">
                                <div class="control-group <?php $form['username_or_email']->hasError() ? print('error') : print(''); ?>">
                                    <div>
                                        <?php echo $form['username_or_email']->renderLabel('Username o Email',array('class'=>'control-label')); ?>
                                        <div class="controls controls-row">
                                            <?php echo $form['username_or_email']->render(array('class'=>'span12','placeholder'=>"username o email")) ?>
                                            <?php if($form['username_or_email']->hasError()): ?>
                                                <span class="help-inline"><?php echo $form['username_or_email']->getError() ?></span>
                                            <?php endif; ?>
                                        </div>
                                    </div>
                                </div>

                                <div class="form-actions no-margin">
                                    <?php echo $form['_csrf_token']->render() ?>
                                    <button type="submit" class="btn btn-success pull-right">
                                        Invia
                                    </button>
                                    <div class="clearfix">
                                    </div>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

