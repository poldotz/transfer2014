<?php include_partial('global/configuration_navbar',array('selected'=>'vehicle_type')); ?>
<?php use_stylesheet('dataTables/jquery.dataTables.css','last') ?>
<?php use_javascript('dataTables/jquery.dataTables.min.js') ?>
<?php use_javascript('dataTables/jquery.dataTables.filterDelay.js') ?>

<div class="main-container">
    <div class="row-fluid">
        <div class="span12">
            <?php echo button_to('Nuovo','vehicleType/new',array('class'=>"btn btn-info", "style"=>'float:left; margin: 5px;')) ?>
                    <table id="vehicle_type" class="table table-condensed table-striped table-hover table-bordered pull-left dataTable">
                    <thead>
                        <tr>
                            <th>Name</th>
                            <th>Azioni</th>
                        </tr>

                        </thead>
                        <tbody>
                        </tbody>
                    </table>
        </div>
    </div>

<br/>


    <script type="text/javascript">
    $(document).ready(function() {
        $('#vehicle_type').dataTable({
            'bProcessing': true,
            'bServerSide': true,
            'sAjaxSource': "<?php echo url_for('vehicleType/get_data') ?>"
        }).fnSetFilteringDelay();
    })
</script>

    <table>
      <thead>
        <tr>
          <th>Id</th>
          <th>Name</th>
          <th>Created at</th>
          <th>Updated at</th>
        </tr>
      </thead>
      <tbody>
        <?php foreach ($VehicleTypes as $VehicleType): ?>
        <tr>
          <td><a href="<?php echo url_for('vehicleType/edit?id='.$VehicleType->getId()) ?>"><?php echo $VehicleType->getId() ?></a></td>
          <td><?php echo $VehicleType->getName() ?></td>
          <td><?php echo $VehicleType->getCreatedAt() ?></td>
          <td><?php echo $VehicleType->getUpdatedAt() ?></td>
        </tr>
        <?php endforeach; ?>
      </tbody>
    </table>

      <a href="<?php echo url_for('vehicleType/new') ?>">New</a>
</div>
