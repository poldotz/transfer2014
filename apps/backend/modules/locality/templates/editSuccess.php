<?php use_javascript('https://maps.googleapis.com/maps/api/js?v=3.exp&libraries=places&language=it&key=AIzaSyAKXxtznoe3FkBfVC_45I_VG_8wO9dBh_c') ?>
<?php include_partial('global/configuration_navbar',array('selected'=>'locality')); ?>
<div class="main-container">
    <legend>Modifica Localit&agrave</legend>
    <?php include_partial('form', array('form' => $form)) ?>
</div>