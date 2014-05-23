<!DOCTYPE html>

  <head>
    <?php include_http_metas() ?>
    <?php include_metas() ?>
    <?php include_title() ?>
    <link rel="shortcut icon" href="<?php echo $sf_request->getUriPrefix().$sf_request->getRelativeUrlRoot() ?>/favicon.ico" />

    <?php include_stylesheets() ?>
    <?php include_javascripts() ?>
  </head>
  <body>
  <!-- header bar -->
    <?php include_partial('global/header',array('sf_user'=>$sf_user)) ?>
    <!-- dashboard div open-->
    <?php if (has_slot('container_open')): ?>
        <?php include_slot('container_open') ?>
    <?php else: ?>
    <div class="container-fluid">
        <div class="dashboard-wrapper">
    <?php endif; ?>

    <!-- contenuto pagina corrente -->
    <?php echo $sf_content ?>


        <!-- dashboard div close-->
    <?php if (has_slot('container_close')): ?>
        <?php include_slot('container_close') ?>
    <?php else: ?>
        </div>
    </div>
    <?php endif; ?>

  </body>
</html>
