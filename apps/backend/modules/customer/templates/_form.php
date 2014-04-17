<?php use_stylesheets_for_form($form) ?>
<?php use_javascripts_for_form($form) ?>

<form action="<?php echo url_for('customer/'.($form->getObject()->isNew() ? 'create' : 'update').(!$form->getObject()->isNew() ? '?id='.$form->getObject()->getId() : '')) ?>" method="post" <?php $form->isMultipart() and print 'enctype="multipart/form-data" ' ?>>
<?php if (!$form->getObject()->isNew()): ?>
<input type="hidden" name="sf_method" value="put" />
<?php endif; ?>
  <table>
    <tfoot>
      <tr>
        <td colspan="2">
          <?php echo $form->renderHiddenFields(false) ?>
          &nbsp;<a href="<?php echo url_for('customer/index') ?>">Indietro</a>
          <?php if (!$form->getObject()->isNew()): ?>
            &nbsp;<?php //echo link_to('Delete', 'vehicle/delete?id='.$form->getObject()->getId(), array('method' => 'delete', 'confirm' => 'Are you sure?')) ?>
          <?php endif; ?>
          <input type="submit" value="Save" />
        </td>
      </tr>
    </tfoot>
    <tbody>
      <?php echo $form->renderGlobalErrors() ?>
      <tr>
        <th><?php echo $form['name']->renderLabel() ?></th>
        <td>
          <?php echo $form['name']->renderError() ?>
          <?php echo $form['name'] ?>
        </td>
      </tr>
      <tr>
          <th><?php echo $form['customer_type_id']->renderLabel() ?></th>
          <td>
              <?php echo $form['customer_type_id']->renderError() ?>
              <?php echo $form['customer_type_id'] ?>
          </td>
      </tr>
      <tr>
          <th><?php echo $form['vat_number']->renderLabel() ?></th>
          <td>
              <?php echo $form['vat_number']->renderError() ?>
              <?php echo $form['vat_number'] ?>
          </td>
      </tr>
      <tr>
          <th><?php echo $form['tax_code']->renderLabel() ?></th>
          <td>
              <?php echo $form['tax_code']->renderError() ?>
              <?php echo $form['tax_code'] ?>
          </td>
      </tr>
      <tr>
          <th><?php echo $form['email']->renderLabel() ?></th>
          <td>
              <?php echo $form['email']->renderError() ?>
              <?php echo $form['email'] ?>
          </td>
      </tr>
      <tr>
        <th><?php echo $form['phone']->renderLabel() ?></th>
        <td>
          <?php echo $form['phone']->renderError() ?>
          <?php echo $form['phone'] ?>
        </td>
      </tr>
      <tr>
        <th><?php echo $form['fax']->renderLabel() ?></th>
        <td>
          <?php echo $form['fax']->renderError() ?>
          <?php echo $form['fax'] ?>
        </td>
      </tr>
      <tr>
        <th><?php echo $form['mobile']->renderLabel() ?></th>
        <td>
          <?php echo $form['mobile']->renderError() ?>
          <?php echo $form['mobile'] ?>
        </td>
      </tr>
      <tr>
        <th><?php echo $form['formatted_address']->renderLabel() ?></th>
        <td>
          <?php echo $form['formatted_address']->renderError() ?>
          <?php echo $form['formatted_address'] ?>
        </td>
      </tr>
    </tbody>
  </table>
</form>
