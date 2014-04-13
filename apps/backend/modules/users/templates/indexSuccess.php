<?php include_partial('global/configuration_navbar',array('selected'=>'users')); ?>
<?php use_stylesheet('dataTables/jquery.dataTables.css','last') ?>
<?php use_javascript('dataTables/jquery.dataTables.min.js') ?>
<?php use_javascript('dataTables/jquery.dataTables.filterDelay.js') ?>

<div class="main-container">
    <div class="row-fluid">
        <div class="span12">
            <?php echo button_to('Nuovo','users/new',array('class'=>"btn btn-info", "style"=>'float:left; margin: 5px;')) ?>
            <table id="users" class="table table-condensed table-striped table-hover table-bordered pull-left dataTable">
                <thead>
                <tr>
                    <th>Nome Utente</th>

                    <th>Nome</th>

                    <th>Cognome</th>

                    <th>Email</th>

                    <th>Telefono</th>

                    <th>Gruppo</th>

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
            $('#users').dataTable({
                'bProcessing': true,
                'bServerSide': true,
                'sAjaxSource': "<?php echo url_for('users/get_data') ?>"
            }).fnSetFilteringDelay();
        })
    </script>

