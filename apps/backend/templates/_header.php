<?php
/**
 * Created by PhpStorm.
 * User: poldotz
 * Date: 07/04/14
 * Time: 12.23
 */

?>
<?php if($sf_user->isAuthenticated()): ?>
<header>
    <a href="<?php echo url_for('@homepage') ?>" class="logotop">
        <!--<img width="86" height="34" alt="home" src="img/logo_mini.png">-->
    </a>
    <div id="mini-nav-left">
        <ul class="hidden-phone">
            <?php if($sf_user->hasCredential('configuration')): ?>
            <li>
                <?php echo link_to('configurazione','@users',array('class'=>'active')) ?>
            </li>
            <?php endif; ?>
            <?php if($sf_user->hasCredential('services')): ?>
            <li>
                <?php echo link_to('Servizi','@booking',array('class'=>'active')) ?>
            </li>
            <?php endif; ?>
            <?php if($sf_user->hasCredential('configuration')): ?>
            <li style="border-right: 0px solid #1a1a1a;">
                <?php include_component('general','sessionYear'); ?>
            </li>
        <?php endif; ?>
        </ul>
        <div class="clearfix"></div>
    </div>
    <div id="mini-nav">
        <ul>
            <li>
                <a href="<?php echo url_for('@users') ?>"><span class="fs1" aria-hidden="true" data-icon="&#xe072;"></span></a>
            </li>
            <li>
                <?php echo link_to('<span class="fs1" aria-hidden="true" data-icon="&#xe0b1;"></span>', "@sf_guard_signout") ?></br>
            </li>
        </ul>
        <div class="clearfix"></div>
    </div>
</header>
<?php endif; ?>