<?php include_partial('global/configuration_navbar',array('selected'=>'vehicle')); ?>
<?php use_stylesheet('dataTables/jquery.dataTables.css','last') ?>
<?php use_javascript('dataTables/jquery.dataTables.min.js') ?>
<?php use_javascript('dataTables/jquery.dataTables.filterDelay.js') ?>

<div class="main-container">
    <div class="row-fluid">
        <div class="span12">
            <?php echo button_to('Nuovo','vehicle/new',array('class'=>"btn btn-info", "style"=>'float:left; margin: 5px;')) ?>
            <table id="vehicle" class="table table-condensed table-striped table-hover table-bordered pull-left dataTable">
                <thead>
                <tr>
                    <th>Marca/Modello</th>

                    <th>Categoria</th>

                    <th>Targa</th>

                    <th>Telaio</th>

                    <th>KM</th>

                    <th>Note</th>

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
            $('#vehicle').dataTable({
                'bProcessing': true,
                'bServerSide': true,
                'sAjaxSource': "<?php echo url_for('vehicle/get_data') ?>"
            }).fnSetFilteringDelay();
        })
    </script>

