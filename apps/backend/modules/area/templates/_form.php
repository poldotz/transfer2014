<?php use_stylesheets_for_form($form) ?>
<?php use_javascripts_for_form($form) ?>

<form action="<?php echo url_for('area/'.($form->getObject()->isNew() ? 'create' : 'update').(!$form->getObject()->isNew() ? '?id='.$form->getObject()->getId() : '')) ?>" method="post" <?php $form->isMultipart() and print 'enctype="multipart/form-data" ' ?>>
<?php if (!$form->getObject()->isNew()): ?>
<input type="hidden" name="sf_method" value="put" />
<?php endif; ?>
    <table class="table">
    <tfoot>
      <tr>
        <td colspan="4">
          <?php echo $form->renderHiddenFields(true) ?>
            <div class="form-actions center-align-text">
                <button type="button" class="btn"><a href="<?php echo url_for('area/index') ?>">Indietro</a></button>
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
          <th><?php echo $form['is_active']->renderLabel() ?></th>
          <td>
              <?php echo $form['is_active']->renderError() ?>
              <?php echo $form['is_active'] ?>
          </td>
      </tr>
    </tbody>
  </table>
</form>
<div id="map_canvas_area"></div>
<script type="text/javascript">
    $( document ).ready(function() {

        var map;
        var marker;
        var areaSquare;
        var lat = 40.12;
        var lng = 9.01;


            // sardegna
            var mapOptions = {
                zoom: 8,
                center: new google.maps.LatLng(lat,lng),
                mapTypeControl: false,
                panControl: false,
                zoomControl: false,
                streetViewControl: false
            };

        map = new google.maps.Map(document.getElementById('map_canvas_area'), mapOptions);

        if($('#area_latitude').val() && $('#area_longitude').val()){
            lat = $('#area_latitude').val();
            lng = $('#area_longitude').val();

        }
        var markerPosition = new google.maps.LatLng(lat,lng);
        marker = new google.maps.Marker({
            position: markerPosition,
            map: map,
            title: $('#area_name').val()
        });

        var bounds = new google.maps.LatLngBounds(
            new google.maps.LatLng($('#area_viewport_ne_lt').val(),$('#area_viewport_ne_ln').val()),
            new google.maps.LatLng($('#area_viewport_sw_lt').val(),$('#area_viewport_sw_ln').val())
        );

        areaSquare = new google.maps.Rectangle({
            bounds:bounds,
            editable: false
        });
        areaSquare.setMap(map);
        map.fitBounds(bounds);


        // Create the autocomplete object, restricting the search
        // to geographical location types.
        var options = {
            types: ['geocode'],
            componentRestrictions: {country: 'it'}
        };
       var  autocomplete = new google.maps.places.Autocomplete(document.getElementById('area_name'),options);

        // When the user selects an address from the dropdown,
        // populate the address fields in the form.
        google.maps.event.addListener(autocomplete, 'place_changed', function() {
            var place = autocomplete.getPlace();
            map.panTo(place.geometry.location);
            map.setZoom(8);

            // fill form fields.
            if (place.geometry) {
                $('#area_latitude').val(place.geometry.location.k);
                $('#area_longitude').val(place.geometry.location.B);
                //viewport area. ne
                $('#area_viewport_ne_lt').val(place.geometry.viewport.Ea.j); //lat
                $('#area_viewport_ne_ln').val(place.geometry.viewport.va.j);// lng
                //viewport area. sw
                $('#area_viewport_sw_lt').val(place.geometry.viewport.Ea.k); //lat
                $('#area_viewport_sw_ln').val(place.geometry.viewport.va.k); //lng

            }
            // se esiste già lo elimino.
            if(marker){
                marker.setMap(null);
            }
            if(areaSquare){
                areaSquare.setMap(null);
            }
            // add marker to the map.
            marker = new google.maps.Marker({
                position: place.geometry.location,
                map: map,
                title: place.name
            });

            var bounds = new google.maps.LatLngBounds(
                place.geometry.viewport.getSouthWest(),
                place.geometry.viewport.getNorthEast()
            );

             areaSquare = new google.maps.Rectangle({
                bounds:bounds,
                editable: false
            });
            areaSquare.setMap(map);
            map.fitBounds(bounds);

        });

    });
</script>
<script>
    document.getElementById('area_name').addEventListener('keypress', function(event) {
        if (event.keyCode == 13) {
            event.preventDefault();
        }
    });
</script>