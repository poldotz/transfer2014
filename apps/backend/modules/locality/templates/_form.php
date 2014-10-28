<?php use_stylesheets_for_form($form) ?>
<?php use_javascripts_for_form($form) ?>

<form action="<?php echo url_for('locality/'.($form->getObject()->isNew() ? 'create' : 'update').(!$form->getObject()->isNew() ? '?id='.$form->getObject()->getId() : '')) ?>" method="post" <?php $form->isMultipart() and print 'enctype="multipart/form-data" ' ?>>
<?php if (!$form->getObject()->isNew()): ?>
<input type="hidden" name="sf_method" value="put" />
<?php endif; ?>
    <table class="table">
    <tfoot>
      <tr>
        <td colspan="4">
          <?php echo $form->renderHiddenFields(false) ?>
            <div class="form-actions center-align-text">
                <button type="button" class="btn"><a href="<?php echo url_for('locality/index') ?>">Indietro</a></button>
          <?php if (!$form->getObject()->isNew()): ?>
            &nbsp;<?php //echo link_to('Delete', 'locality/delete?id='.$form->getObject()->getId(), array('method' => 'delete', 'confirm' => 'Are you sure?')) ?>
          <?php endif; ?>
                <button type="submit" class="btn btn-primary">SALVA</button>
            </div>
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
          <th><?php echo $form['is_vector']->renderLabel() ?></th>
          <td>
              <?php echo $form['is_vector']->renderError() ?>
              <?php echo $form['is_vector'] ?>
          </td>
      </tr>
      <tr>
          <th><?php echo $form['formatted_address']->renderLabel() ?></th>
          <td colspan="3">
              <?php echo $form['formatted_address']->renderError() ?>
              <?php echo $form['formatted_address']->render(array('class'=>'input-xxlarge geocodable')) ?>
              <div>

              </div>
          </td>
      </tr>
      <tr>
        <th><?php echo $form['is_active']->renderLabel() ?></th>
        <td colspan="3">
          <?php echo $form['is_active']->renderError() ?>
          <?php echo $form['is_active'] ?>
        </td>
      </tr>
      <tr>
        <th><?php echo $form['phone']->renderLabel() ?></th>
        <td>
          <?php echo $form['phone']->renderError() ?>
          <?php echo $form['phone']->render(array('class'=>'input-xlarge')) ?>
        </td>
          <th><?php echo $form['fax']->renderLabel() ?></th>
          <td>
              <?php echo $form['fax']->renderError() ?>
              <?php echo $form['fax']->render(array('class'=>'input-xlarge')) ?>
          </td>
      </tr>
      <tr>
        <th><?php echo $form['mobile']->renderLabel() ?></th>
        <td>
          <?php echo $form['mobile']->renderError() ?>
          <?php echo $form['mobile']->render(array('class'=>'input-xlarge')) ?>
        </td>
          <th><?php echo $form['email']->renderLabel() ?></th>
          <td>
              <?php echo $form['email']->renderError() ?>
              <?php echo $form['email']->render(array('class'=>'input-xxlarge')) ?>
          </td>
      </tr>
      <tr>
        <th><?php echo $form['site']->renderLabel() ?></th>
          <td colspan="3">
          <?php echo $form['site']->renderError() ?>
          <?php echo $form['site']->render(array('class'=>'input-xxlarge'))?>
        </td>
      </tr>

    </tbody>
  </table>
</form>

<script type="text/javascript">
    $( document ).ready(function() {
        // Create the autocomplete object, restricting the search
        // to geographical location types.
        var options = {
            types: ['establishment','geocode'],
            componentRestrictions: {country: 'it'}
        };
       var  autocomplete = new google.maps.places.Autocomplete(document.getElementById('locality_name'),options);

        // When the user selects an address from the dropdown,
        // populate the address fields in the form.
        google.maps.event.addListener(autocomplete, 'place_changed', function() {
            var place = autocomplete.getPlace();


            var address = '';
            if (place.geometry) {
                $('#locality_latitude').val(place.geometry.location.k);
                $('#locality_longitude').val(place.geometry.location.B);
            }
            fillInAddress();
            $('#locality_name').val(place.name);
        });

        function fillInAddress() {
            var componentForm = {
                street_number: 'short_name',
                route: 'long_name',
                locality: 'long_name',
                administrative_area_level_1: 'short_name',
                country: 'long_name',
                postal_code: 'short_name'
            };

            // Get the place details from the autocomplete object.
            var place = autocomplete.getPlace();

            // Get each component of the address from the place details
            // and fill the corresponding field on the form.
            var val = "";
            for (var i = 0; i < place.address_components.length; i++) {
                var addressType = place.address_components[i].types[0];

                    var val = val + place.address_components[i][componentForm[addressType]] + ", ";
                    $('#locality_formatted_address').val(val);
                }
            }
    });
</script>