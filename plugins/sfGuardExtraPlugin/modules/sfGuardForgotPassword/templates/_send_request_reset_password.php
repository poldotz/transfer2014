<?php use_helper('I18N') ?>

<?php echo 'Ciao' ?> <?php echo $sfGuardUser->getUsername() ?>,

<?php echo 'Fai click nel link di seguito e ti verrà spedita una nuova password a questo indirizzo email:' ?>

<?php echo url_for('@sf_guard_forgot_password_reset_password?key='.$sfGuardUser->getPassword().'&id='.$sfGuardUser->getId(), true) ?>

<?php echo 'MySME'; ?>
