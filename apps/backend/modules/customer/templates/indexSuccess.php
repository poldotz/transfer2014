<?php include_partial('global/configuration_navbar',array('selected'=>'customer')); ?>
<?php use_stylesheet('dataTables/jquery.dataTables.css','last') ?>
<?php use_javascript('dataTables/jquery.dataTables.min.js') ?>
<?php use_javascript('dataTables/jquery.dataTables.filterDelay.js') ?>

<div class="main-container">
    <div class="row-fluid">
        <div class="span12">
            <?php echo button_to('Nuovo','customer/new',array('class'=>"btn btn-info", "style"=>'float:left; margin: 5px;')) ?>
            <table id="customer" class="table table-condensed table-striped table-hover table-bordered pull-left dataTable">
                <thead>
                <tr>
                    <th>Nominativo</th>

                    <th>Tipologia</th>

                    <th>CF/P.IVA</th>

                    <th>Email</th>

                    <th>Telefono</th>

                    <th>Fax</th>

                    <th>Attivo</th>

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
            $('#customer').dataTable({
                'bProcessing': true,
                'bServerSide': true,
                'sAjaxSource': "<?php echo url_for('customer/get_data') ?>"
            }).fnSetFilteringDelay();
        })
    </script>

