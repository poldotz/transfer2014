<?php use_stylesheets_for_form($form) ?>
<?php use_javascripts_for_form($form) ?>

<form action="<?php echo url_for('rateTable/'.($form->getObject()->isNew() ? 'create' : 'update').(!$form->getObject()->isNew() ? '?id='.$form->getObject()->getId() : '')) ?>" method="post" <?php $form->isMultipart() and print 'enctype="multipart/form-data" ' ?>>
<?php if (!$form->getObject()->isNew()): ?>
<input type="hidden" name="sf_method" value="put" />
<?php endif; ?>
  <table>
    <tfoot>
      <tr>
        <td colspan="2">
          <?php echo $form->renderHiddenFields(false) ?>
          &nbsp;<a href="<?php echo url_for('rateTable/index') ?>">Back to list</a>
          <?php if (!$form->getObject()->isNew()): ?>
            &nbsp;<?php echo link_to('Delete', 'rateTable/delete?id='.$form->getObject()->getId(), array('method' => 'delete', 'confirm' => 'Are you sure?')) ?>
          <?php endif; ?>
          <input type="submit" value="Save" />
        </td>
      </tr>
    </tfoot>
    <tbody>
      <?php echo $form->renderGlobalErrors() ?>
      <tr>
        <th><?php echo $form['customer_id']->renderLabel() ?></th>
        <td>
          <?php echo $form['customer_id']->renderError() ?>
          <?php echo $form['customer_id'] ?>
        </td>
      </tr>
      <tr>
        <th><?php echo $form['rate_id']->renderLabel() ?></th>
        <td>
          <?php echo $form['rate_id']->renderError() ?>
          <?php echo $form['rate_id'] ?>
        </td>
      </tr>
      <tr>
        <th><?php echo $form['vehicle_type_id']->renderLabel() ?></th>
        <td>
          <?php echo $form['vehicle_type_id']->renderError() ?>
          <?php echo $form['vehicle_type_id'] ?>
        </td>
      </tr>
      <tr>
        <th><?php echo $form['cost']->renderLabel() ?></th>
        <td>
          <?php echo $form['cost']->renderError() ?>
          <?php echo $form['cost'] ?>
        </td>
      </tr>
      <tr>
        <th><?php echo $form['created_at']->renderLabel() ?></th>
        <td>
          <?php echo $form['created_at']->renderError() ?>
          <?php echo $form['created_at'] ?>
        </td>
      </tr>
      <tr>
        <th><?php echo $form['updated_at']->renderLabel() ?></th>
        <td>
          <?php echo $form['updated_at']->renderError() ?>
          <?php echo $form['updated_at'] ?>
        </td>
      </tr>
      <tr>
        <th><?php echo $form['version']->renderLabel() ?></th>
        <td>
          <?php echo $form['version']->renderError() ?>
          <?php echo $form['version'] ?>
        </td>
      </tr>
      <tr>
        <th><?php echo $form['version_created_at']->renderLabel() ?></th>
        <td>
          <?php echo $form['version_created_at']->renderError() ?>
          <?php echo $form['version_created_at'] ?>
        </td>
      </tr>
      <tr>
        <th><?php echo $form['version_created_by']->renderLabel() ?></th>
        <td>
          <?php echo $form['version_created_by']->renderError() ?>
          <?php echo $form['version_created_by'] ?>
        </td>
      </tr>
    </tbody>
  </table>
</form>
