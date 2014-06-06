<?php include_partial('global/services_navbar',array('selected'=>'service_hostess')); ?>
<?php use_stylesheet('dataTableNew/jquery.dataTables.min.css','last') ?>
<?php use_stylesheet('dataTableNew/dataTables.tableTools.min.css','last') ?>
<?php use_stylesheet('dataTableNew/dataTables.scroller.min.css','last') ?>
<?php use_javascript('dataTableNew/jquery.dataTables.min.js') ?>
<?php use_javascript('dataTableNew/dataTables.scroller.min.js') ?>
<?php use_javascript('dataTableNew/dataTables.tableTools.min.js') ?>

<div class="main-container">
    <?php include_partial('global/navbar_mini'); ?>
    <div class="row-fluid">
        <div class="span12" style="margin-bottom: 0px;">
            <div class="widget">
                <div class="widget-header">
                    <span class="fs1" aria-hidden="true" data-icon="&#xe074;"></span> Servizi Hostess
                </div>
                <div style="padding: 5px;" class="widget-body">
                    <div id="service_hostess_search_error" style="display: none"></div>
                    <form id ="service_hostess_search_form" class="form-horizontal no-margin">
                        <fieldset>
                            <div class="control-group">
                                <div style="margin-left: 0px;" class="controls">
                                    <div class="row-fluid">
                                        <div class="span10">
                                            <?php echo $form['date_range']->render(); ?>
                                        </div>
                                        <div class="span2 form-inline" >
                                          <!--  <label class="radio inline">
                                                <?php //echo $form['date_range_off']->render() ?>
                                                Escludi
                                            </label>-->
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="control-group">
                                <div style="margin-left: 0px;" class="controls">
                                    <div class="row-fluid">
                                        <div class="span10 input-left-top-margins">
                                            <?php echo $form['contact']->render(); ?>
                                        </div>
                                        <div class="span2 form-inline" >
                                            <label class="radio inline">
                                                <?php echo $form['contact_off']->render() ?>
                                                Escludi
                                            </label>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="control-group">
                                <div style="margin-left: 0px;" class="controls">
                                    <div class="row-fluid">
                                        <div class="span10 input-left-top-margins">
                                            <?php echo $form['rifFile']->render(); ?>
                                        </div>
                                        <div class="span2 form-inline" >
                                            <label class="radio inline">
                                                <?php echo $form['rifFile_off']->render() ?>
                                                Escludi
                                            </label>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="control-group">
                                <div style="margin-left: 0px;" class="controls">
                                    <div class="row-fluid">
                                        <div class="span10 input-left-top-margins">
                                            <?php echo $form['customer']->render(); ?>
                                        </div>
                                        <div class="span2 form-inline" >
                                            <label class="radio inline">
                                                <?php echo $form['customer_off']->render() ?>
                                                Escludi
                                            </label>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="control-group">
                                <div style="margin-left: 0px;" class="controls">
                                    <div class="row-fluid">
                                        <div class="span10 input-left-top-margins">
                                            <?php echo $form['locality']->render(); ?>
                                            <?php echo $form['locality_hidden']->render(); ?>
                                        </div>
                                        <div class="span2 form-inline" >
                                            <label class="radio inline">
                                                <?php echo $form['locality_off']->render() ?>
                                                Escludi
                                            </label>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="control-group">
                                <div style="margin-left: 0px;" class="controls">
                                    <div class="row-fluid">
                                        <div class="span10 input-left-top-margins"required>
                                            <?php echo $form['vehicle_type_id']->render(); ?>
                                        </div>
                                        <div class="span2 form-inline" >
                                            <label class="radio inline">
                                                <?php echo $form['vehicle_type_id_off']->render() ?>
                                                Escludi
                                            </label>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="control-group">
                                <div style="margin-left: 0px;" class="controls">
                                    <div class="row-fluid">
                                        <div class="span10 input-left-top-margins"required>
                                            <?php echo $form['driver_id']->render(); ?>
                                        </div>
                                        <div class="span2 form-inline" >
                                            <label class="radio inline">
                                                <?php echo $form['driver_id_off']->render() ?>
                                                Escludi
                                            </label>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="control-group">
                                <div style="margin-left: 0px;" class="controls">
                                    <div class="row-fluid">
                                        <div class="span12 center-align-text">
                                            <?php echo $form['transfer_type']->render() ?>
                                        </div>

                                    </div>
                                </div>
                            </div>
                            <div class="form-actions no-margin no-bottom-padding no-top-padding">
                                <button id="service_hostess_search_button" type="submit" class="btn btn-info pull-right">
                                    CERCA
                                </button>
                                <div class="clearfix">
                                </div>
                            </div>
                        </fieldset>
                    </form>

                </div>
            </div>
        </div>
    </div>
    <div class="row-fluid">
        <div class="span12">
            <div class="widget">
                <div class="widget-header">

                    </div>

                </div>
                <div class="widget-body">
                    <table id="service_hostess_list" class="table striped table-bordered no-margin">
                        <thead>
                        <tr>
                            <th style="width: 4%">Progressivo</th>
                            <th style="width: 4%">Data Reg.</th>
                            <th style="width: 4%">Giorno</th>
                            <th style="width: 4%">Ora</th>
                            <th style="width: 15%">Cliente</th>
                            <th style="width: 15%">Referente</th>
                            <th style="width: 4%">Pax</th>
                            <th style="width: 5%">Rif.File</th>
                            <th style="width: 17%">Percorso</th>
                            <th style="width: 8%">Mezzo</th>
                            <th style="width: 6%">Autista</th>
                            <th style="width: 5%">Tipo</th>
                            <th style="width: 9%">Note</th>
                        </tr>
                        </thead>
                        <tbody>
                        <tr>
                            <td class="center-align-text" colspan="11"><h4>Effettuare una ricerca per visualizzare i risultati.</h4></td>
                        </tr>
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
</div>

<script type="text/javascript">
    $('#service_hostess_search_button').on('click',function(e){
        e.preventDefault();
        var form = $('#service_hostess_search_form');
        var datastring = form.serialize();
        if($.fn.dataTable.isDataTable( '#service_hostess_list' )){
            table = $('#service_hostess_list').DataTable();
            table.destroy();
        }
        table = $('#service_hostess_list').on('xhr.dt', function ( e, settings, json ) {
            if(json.errors){
                $('#service_hostess_search_error').html( json.errors );
            }
        } ).DataTable({
            "dom": 'T<"clear">rtiS',
            tableTools: {
                "columns": [
                    { "type": "string" },
                    { "type": "date" },
                    { "type": "date" },
                    { "type": "date" },
                    { "type": "string" },
                    { "type": "string" },
                    { "type": "string" },
                    { "type": "string" },
                    { "type": "string" },
                    { "type": "string" },
                    { "type": "string" },
                    { "type": "string" },
                    { "type": "string" }
                ],
                "aButtons": [ {
                    "sExtends": "csv",
                    "sFieldSeperator": ",",
                    "sFileName": "Export.csv"
                }, {
                "sExtends": "xls",
                "sFileName": "Export.xls"
                }, "pdf","copy", "print" ],
                "sSwfPath": "<?php echo $sf_request->getUriPrefix().$sf_request->getRelativeUrlRoot() ?>/swf/copy_csv_xls_pdf.swf"
            },
            "destroy": true,
            "scrollY": 600,
            scrollCollapse: true,
            "deferRender": true,
            "ajax": {
                "url": "<?php echo url_for('serviceHostess/getData') ?>",
                "data": function ( d ) {
                    d.form = datastring
                },
                "type": "POST"
            },
            "language": {
                "processing":     "Caricamento...",
                "sLengthMenu":     "Visualizza _MENU_ elementi",
                "zeroRecords":   "La ricerca non ha portato alcun risultato",
                "info":           "Vista da _START_ a _END_ di _TOTAL_ elementi",
                "infoEmpty":     "Vista da 0 a 0 di 0 elementi",
                "infoFiltered":   "(filtrati da _MAX_ elementi totali)",
                "infoPostFix":    "",
                "search":          "Cerca:",
                "loadingRecords": "",
                "paginate": {
                    "first":    "Inizio",
                    "previous": "Precedente",
                    "next":    "Successivo",
                    "last":     "Fine"
                }
            }
        });
        return false;
    });
</script>