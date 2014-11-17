<?php use_stylesheets_for_form($form) ?>
<?php use_javascripts_for_form($form) ?>

<form action="<?php echo url_for('vehicleType/'.($form->getObject()->isNew() ? 'create' : 'update').(!$form->getObject()->isNew() ? '?id='.$form->getObject()->getId() : '')) ?>" method="post" <?php $form->isMultipart() and print 'enctype="multipart/form-data" ' ?>>
<?php if (!$form->getObject()->isNew()): ?>
<input type="hidden" name="sf_method" value="put" />
<?php endif; ?>
    <table class="table">
        <tfoot>
        <tr>
        <td colspan="2">
          <?php echo $form->renderHiddenFields(false) ?>
          &nbsp;<a href="<?php echo url_for('vehicleType/index') ?>">Indietro</a>
          <?php if (!$form->getObject()->isNew()): ?>
            &nbsp;<?php //echo link_to('Delete', 'vehicleType/delete?id='.$form->getObject()->getId(), array('method' => 'delete', 'confirm' => 'Are you sure?')) ?>
          <?php endif; ?>
          <input type="submit" value="SALVA" />
        </td>
      </tr>
    </tfoot>
      <tbody>
      <?php if($sf_user->hasFlash('error')): ?>
          <?php echo $sf_user->getFlash('error'); ?>
      <?php endif; ?>
      <?php echo $form->renderGlobalErrors() ?>
      <tr>
          <th><?php echo $form['name']->renderLabel() ?></th>
          <td>
              <?php echo $form['name']->renderError() ?>
              <?php echo $form['name']->render(array('class'=>'input-xlarge')) ?>
          </td>
          <th><?php echo $form['per_person']->renderLabel() ?></th>
          <td>
              <?php echo $form['per_person']->renderError() ?>
              <?php echo $form['per_person'] ?>
          </td>
      </tr>
      </tbody>
  </table>
</form>
