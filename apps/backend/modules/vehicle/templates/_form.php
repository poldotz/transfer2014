<?php use_stylesheets_for_form($form) ?>
<?php use_javascripts_for_form($form) ?>

<form action="<?php echo url_for('vehicle/'.($form->getObject()->isNew() ? 'create' : 'update').(!$form->getObject()->isNew() ? '?id='.$form->getObject()->getId() : '')) ?>" method="post" <?php $form->isMultipart() and print 'enctype="multipart/form-data" ' ?>>
<?php if (!$form->getObject()->isNew()): ?>
<input type="hidden" name="sf_method" value="put" />
<?php endif; ?>
  <table>
    <tfoot>
      <tr>
        <td colspan="2">
          <?php echo $form->renderHiddenFields(false) ?>
          &nbsp;<a href="<?php echo url_for('vehicle/index') ?>">Indietro</a>
          <?php if (!$form->getObject()->isNew()): ?>
            &nbsp;<?php //echo link_to('Delete', 'vehicle/delete?id='.$form->getObject()->getId(), array('method' => 'delete', 'confirm' => 'Are you sure?')) ?>
          <?php endif; ?>
          <input type="submit" value="SALVA" />
        </td>
      </tr>
    </tfoot>
    <tbody>
      <?php echo $form->renderGlobalErrors() ?>
      <tr>
        <th><?php echo $form['vehicle_type_id']->renderLabel() ?></th>
        <td>
          <?php echo $form['vehicle_type_id']->renderError() ?>
          <?php echo $form['vehicle_type_id'] ?>
        </td>
      </tr>
      <tr>
        <th><?php echo $form['model']->renderLabel() ?></th>
        <td>
          <?php echo $form['model']->renderError() ?>
          <?php echo $form['model'] ?>
        </td>
      </tr>
      <tr>
        <th><?php echo $form['plate_number']->renderLabel() ?></th>
        <td>
          <?php echo $form['plate_number']->renderError() ?>
          <?php echo $form['plate_number'] ?>
        </td>
      </tr>
      <tr>
        <th><?php echo $form['frame_number']->renderLabel() ?></th>
        <td>
          <?php echo $form['frame_number']->renderError() ?>
          <?php echo $form['frame_number'] ?>
        </td>
      </tr>
      <tr>
        <th><?php echo $form['mileage']->renderLabel() ?></th>
        <td>
          <?php echo $form['mileage']->renderError() ?>
          <?php echo $form['mileage'] ?>
        </td>
      </tr>
      <tr>
        <th><?php echo $form['note']->renderLabel() ?></th>
        <td>
          <?php echo $form['note']->renderError() ?>
          <?php echo $form['note'] ?>
        </td>
      </tr>
    </tbody>
  </table>
</form>
