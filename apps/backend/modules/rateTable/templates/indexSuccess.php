<?php include_partial('global/configuration_navbar',array('selected'=>'rate')); ?>
<?php use_stylesheet('dataTables/jquery.dataTables.css','last') ?>
<?php use_javascript('dataTables/jquery.dataTables.min.js') ?>
<?php use_javascript('dataTables/jquery.dataTables.filterDelay.js') ?>

<div class="main-container">
    <div class="row-fluid">
        <div class="span12">

            <h3>Tariffazine Clienti</h3>
            <table id="customer_rate" class="table table-condensed table-striped table-hover table-bordered pull-left dataTable">
                <thead>
                <tr>
                    <th>Nominativo</th>
                    <th>Tipologia</th>
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
            $('#customer_rate').dataTable({
                'bProcessing': true,
                'bServerSide': true,
                'sAjaxSource': "<?php echo url_for('rateTable/get_data') ?>"
            }).fnSetFilteringDelay();
        })
    </script>