<?php
/**
 * Created by PhpStorm.
 * User: poldotz
 * Date: 02/05/14
 * Time: 8.35
 */
?>
<table id="departure_list" class="table table-condensed table-striped table-hover table-bordered pull-left dataTable">
    <thead>
    <tr>
        <th style="width: 4%">Annullato</th>

        <th style="width: 5%">Progressivo</th>

        <th style="width: 7%">Ora Par.</th>

        <th style="width: 6%">Sigla</th>

        <th style="width: 13%">Mezzo Rich.</th>

        <th style="width: 10%">Autista</th>

        <th style="width: 20%">Cliente</th>

        <th style="width: 15%">Referente</th>

        <th style="width: 25%">Tragitto</th>
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
        oTable = $('#departure_list').dataTable({
            'bLengthChange': false,
            "iDisplayLength": 5,
            'bProcessing': true,
            'bServerSide': true,
            'sAjaxSource': "<?php echo url_for('departure/get_data') ?>",
            'fnDrawCallback': function() {
                clickRowHandler();
            },
            "oLanguage": {
                "sProcessing":     "Caricamento...",
                "sLengthMenu":     "Visualizza _MENU_ elementi",
                "sZeroRecords":   "La ricerca non ha portato alcun risultato",
                "sInfo":           "Vista da _START_ a _END_ di _TOTAL_ elementi",
                "sInfoEmpty":     "Vista da 0 a 0 di 0 elementi",
                "sInfoFiltered":   "(filtrati da _MAX_ elementi totali)",
                "sInfoPostFix":    "",
                "sSearch":          "Cerca:",
                "sLoadingRecords": "",
                "sUrl":            "",
                "oPaginate": {
                    "sFirst":    "Inizio",
                    "sPrevious": "Precedente",
                    "sNext":    "Successivo",
                    "sLast":     "Fine"
                }
            }
        }).fnSetFilteringDelay();

        /* Click event handler */
        function clickRowHandler() {
            $('#departure_list tbody tr').bind('click', function () {
                var aData = oTable.fnGetData( this );
                var idNumber = aData[1];
                postSelectedRow(idNumber);
            });
        }

        function postSelectedRow(idNumber) {
            $.get("<?php echo url_for('arrival/editJs') ?>", {
                    idNumber: idNumber
                },
                function(arrival){
                    $("#arrival_container").html(arrival);
                }).fail(function(){
                    bootbox.alert('Arrivo non trovato!');
                });

        }
    });
</script>