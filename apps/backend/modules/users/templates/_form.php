<?php use_stylesheets_for_form($form) ?>
<?php use_javascripts_for_form($form) ?>

<form action="<?php echo url_for('users/'.($form->getObject()->isNew() ? 'create' : 'update').(!$form->getObject()->isNew() ? '?id='.$form->getObject()->getId() : '')) ?>" method="post" <?php $form->isMultipart() and print 'enctype="multipart/form-data" ' ?>>
<?php if (!$form->getObject()->isNew()): ?>
<input type="hidden" name="sf_method" value="put" />
<?php endif; ?>
    <fieldset>
      <?php echo $form->renderGlobalErrors() ?>
      <div class="control-group">
          <label class="control-label"><?php echo $form['username']->renderLabel() ?></label>
          <div class="controls">
              <?php echo $form['username']->renderError() ?>
              <?php echo $form['username'] ?>
          </div>
      </div>
      <div class="control-group">
          <label class="control-label"><?php echo $form['password']->renderLabel() ?></label>
          <div class="controls">
              <?php echo $form['password']->renderError() ?>
              <?php echo $form['password'] ?>
          </div>
      </div>
      <div class="control-group">
          <label class="control-label"><?php echo $form['password_again']->renderLabel() ?></label>
          <div class="controls">
              <?php echo $form['password_again']->renderError() ?>
              <?php echo $form['password_again'] ?>
          </div>
      </div>
      <div class="control-group">
          <label class="control-label"><?php echo $form['internal_user_groups']->renderLabel() ?></label>
          <div class="controls">
              <?php echo $form['internal_user_groups']->renderError() ?>
              <?php echo $form['internal_user_groups'] ?>
          </div>
      </div>

      <?php if(!$form->getObject()->isNew() && in_array('Cliente',$form->getObject()->getGroupNames())): ?>
          <div id="customer_div">
            <?php include_partial('customers',array('form'=>$form)) ?>
          </div>
      <?php else: ?>
          <div id="customer_div" style="display: none"></div>
      <?php endif; ?>
      <div class="control-group">
          <label class="control-label"><?php echo $form['is_active']->renderLabel() ?></label>
          <div class="controls">
              <?php echo $form['is_active']->renderError() ?>
              <?php echo $form['is_active'] ?>
          </div>
      </div>
      <div class="control-group">
          <label class="control-label"><?php echo $form['first_name']->renderLabel() ?></label>
          <div class="controls">
              <?php echo $form['first_name']->renderError() ?>
              <?php echo $form['first_name'] ?>
          </div>
      </div>
      <div class="control-group">
          <label class="control-label"><?php echo $form['last_name']->renderLabel() ?></label>
          <div class="controls">
              <?php echo $form['last_name']->renderError() ?>
              <?php echo $form['last_name'] ?>
          </div>
      </div>
      <div class="control-group">
          <label class="control-label"><?php echo $form['email']->renderLabel() ?></label>
          <div class="controls">
              <?php echo $form['email']->renderError() ?>
              <?php echo $form['email'] ?>
          </div>
      </div>
      <div class="control-group">
          <label class="control-label"><?php echo $form['phone']->renderLabel() ?></label>
          <div class="controls">
              <?php echo $form['phone']->renderError() ?>
              <?php echo $form['phone'] ?>
          </div>
      </div>
      <div class="form-actions">
          <?php echo $form->renderHiddenFields(false) ?>
          &nbsp;<a href="<?php echo url_for('users/index') ?>">Indietro</a>
          <?php if (!$form->getObject()->isNew()): ?>
              &nbsp;<?php //echo link_to('Delete', 'vehicle/delete?id='.$form->getObject()->getId(), array('method' => 'delete', 'confirm' => 'Are you sure?')) ?>
          <?php endif; ?>
          <input type="submit" value="SALVA" />
      </div>
    </fieldset>
</form>
<script type="text/javascript">
    $('#sf_guard_user_internal_user_groups').on('change',function(e){
        if($(this).val()){
            $('#customer_div').load('<?php echo url_for("users/customers") ?>',{ group_type: $(this).val()},function() {
                $('#customer_div').show();
            });
        }
    });
</script>