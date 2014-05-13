<?php use_stylesheets_for_form($form) ?>
<?php use_javascripts_for_form($form) ?>

<form action="<?php echo url_for('rate/'.($form->getObject()->isNew() ? 'create' : 'update').(!$form->getObject()->isNew() ? '?id='.$form->getObject()->getId() : '')) ?>" method="post" <?php $form->isMultipart() and print 'enctype="multipart/form-data" ' ?>>
<?php if (!$form->getObject()->isNew()): ?>
<input type="hidden" name="sf_method" value="put" />
<?php endif; ?>
  <table>
    <tfoot>
      <tr>
        <td colspan="2">
          <?php echo $form->renderHiddenFields(false) ?>
          &nbsp;<a href="<?php echo url_for('rate/index') ?>">Indietro</a>
          <?php if (!$form->getObject()->isNew()): ?>
            &nbsp;<?php echo link_to('Delete', 'rate/delete?id='.$form->getObject()->getId(), array('method' => 'delete', 'confirm' => 'Are you sure?')) ?>
          <?php endif; ?>
          <input type="submit" value="SALVA" />
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
        <th><?php echo $form['description']->renderLabel() ?></th>
        <td>
          <?php echo $form['description']->renderError() ?>
          <?php echo $form['description'] ?>
        </td>
      </tr>
      <tr>
        <th><?php echo $form['day']->renderLabel() ?></th>
        <td>
          <?php echo $form['day']->renderError() ?>
          <?php echo $form['day'] ?>
        </td>
      </tr>
      <tr>
        <th><?php echo $form['hour_from']->renderLabel() ?></th>
        <td>
          <?php echo $form['hour_from']->renderError() ?>
          <?php echo $form['hour_from']->render(array('style'=>'width:80px;')) ?>
        </td>
      </tr>
      <tr>
        <th><?php echo $form['hour_to']->renderLabel() ?></th>
        <td>
          <?php echo $form['hour_to']->renderError() ?>
          <?php echo $form['hour_to']->render(array('style'=>'width:80px;')) ?>
        </td>
      </tr>
      <tr>
        <th><?php echo $form['surcharge']->renderLabel() ?></th>
        <td>
          <?php echo $form['surcharge']->renderError() ?>
          <?php echo $form['surcharge'] ?>%
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
