<?php use_helper('I18N') ?>
<?php echo __('La tua password è stata resettata,di seguito i tuoi nuovi parametri d\'accesso') ?>:

<?php echo __('Username') ?>: <?php echo $sfGuardUser->getUsername() ?>

<?php echo __('Password') ?>: <?php echo $password ?>
