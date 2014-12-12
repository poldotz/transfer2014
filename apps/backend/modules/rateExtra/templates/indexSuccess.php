<?php include_partial('global/configuration_navbar',array('selected'=>'rate')); ?>
<?php use_stylesheet('dataTables/jquery.dataTables.css','last') ?>
<?php use_javascript('dataTables/jquery.dataTables.min.js') ?>
<?php use_javascript('dataTables/jquery.dataTables.filterDelay.js') ?>

<div class="main-container">
    <div class="row-fluid">
        <div class="span12">

            <table id="rateExtra" class="table table-condensed table-striped table-hover table-bordered pull-left dataTable">
                <thead>
                <tr>
                    <th>Nome</th>
                    <th>Valore di default</th>
                    <th>Tiplogia</th>
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
            $('#rateExtra').dataTable({
                'bProcessing': true,
                'bServerSide': true,
                'sAjaxSource': "<?php echo url_for('rateExtra/get_data') ?>"
            }).fnSetFilteringDelay();
        })
    </script>


  <a href="<?php echo url_for('rateExtra/new') ?>">New</a>
