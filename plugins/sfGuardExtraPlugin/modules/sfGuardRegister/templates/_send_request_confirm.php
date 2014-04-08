<?php use_helper('I18N') ?>

<?php echo 'Gentile ' ?> <?php echo "<strong>".$sfGuardUserProfile->getFirstName(). " ".$sfGuardUserProfile->getLastName()."</strong><br/>" ?>,

<?php echo "abbiamo ricevuto la tua richiesta di iscrizione a <strong>MySme</strong>, clicca qui:<br/> " ?>

<?php echo url_for('@sf_guard_register_confirm?key='.$sfGuardUser->getPassword().'&id='.$sfGuardUser->getId(), true) ?>

<?php echo "<br/><strong>per completare la registrazione</strong> e poter ricevere quindi la <strong>Fidelity Card SME</strong><br/>."?>

<?php echo "Con <strong>Fidelity MySme</strong>, potrai  controllare il <strong>saldo punti, vedere i tuoi acquisti e gli scontrini, spendere i tuoi punti</strong> sul <strong>negozio Online.</strong><br/>" ?>

<?php echo "Entra nel mondo <strong>Mysme</strong>, digita nel browser del tuo computer: <strong>MySme.it</strong>" ?>

<?php echo 'I tuoi dati di accesso:<br/>' ?>

<?php echo __('Email') ?>: <?php echo $sfGuardUser->getUsername()."<br/>" ?>

<?php echo __('Password') ?>: <?php echo $password."<br/><br/>" ?>


<?php echo 'A presto!<br/>'; ?>

<?php echo 'MySME<br/>'; ?>
