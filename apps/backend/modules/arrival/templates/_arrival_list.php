<?php
/**
 * Created by PhpStorm.
 * User: poldotz
 * Date: 02/05/14
 * Time: 8.35
 */
?>
<table id="arrival_list" class="table table-condensed table-striped table-hover table-bordered pull-left dataTable">
    <thead>
    <tr>
        <th style="width: 0%"></th>

        <th style="width: 3%">Annullato</th>

        <th style="width: 5%">Progressivo</th>

        <th style="width: 8%">Ora Arr.</th>

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
    var scroller = {};
    var rowIndex = 0;
    $(document).ready(function() {

        table = $('#arrival_list').DataTable({
            "columnDefs": [
                {
                    "targets": [ 0 ],
                    "visible": false

                },
            ],
            "saveState": true,
            "scrollY": 200,
            scrollCollapse: true,
            stateSave:      true,
            "fnInitComplete": function (o) {
                // Immediately scroll to row 1000
                scroller = o.oScroller;
                scroller.fnScrollToRow( rowIndex );
            },
            "dom": 'T<"clear">rtiS',
            tableTools: {
                "sRowSelect": "single",
                "aButtons": [ ]
            },
            "deferRender": true,
            'ajax': "<?php echo url_for('arrival/get_data') ?>",
            "drawCallback": function(settings) {
                clickRowHandler();
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

        /* Click event handler */
        function clickRowHandler() {
            $('#arrival_list tbody tr').bind('dblclick', function () {
                var aData = table.row( this).data();
                var idNumber = aData[2];
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

        $('#set_driver').click(function(){
            if($( "#set_driver_container").hasClass('hidden')){
                $( "#set_driver_container").removeClass('hidden');
                scroller.fnScrollToRow( rowIndex );
            }
            else{
                $( "#set_driver_container").addClass('hidden');
            }
            /*scroller.fnScrollToRow(rowIndex);
            var oTT = TableTools.fnGetInstance( 'arrival_list' );
            oTT.fnSelect( $('#arrival_list tbody tr')[rowIndex] );
            var aData = oTT.fnGetSelectedData();
            alert(aData[0][0]);
            rowIndex = rowIndex + 1;*/
        });

        $('#set_arrival_driver').submit(function(e){
            e.preventDefault();
            $(this).attr('action');
            var driver_id = $(this).find('select').val();
            scroller.fnScrollToRow(rowIndex);
            var oTT = TableTools.fnGetInstance( 'arrival_list' );
            oTT.fnSelect( $('#arrival_list tbody tr')[rowIndex] );
            var aData = oTT.fnGetSelectedData();
            var arrival_id = aData[0][0];
            if(arrival_id && driver_id){
                $.ajax({
                    url: "<?php echo url_for('arrival/setDriver') ?>",
                    data:{arrival_id: arrival_id, driver_id: driver_id},
                    type: "POST"

                })
                    .done(function(driver_name){
                        var table = $('#arrival_list').DataTable();
                        table.cell(rowIndex,6).data(driver_name);
                        rowIndex  = rowIndex + 1;
                        scroller.fnScrollToRow(rowIndex);
                })
                    .fail(function(){
                    bootbox.alert('Errore durante il salvataggio!');
                });

            }else{
                bootbox.alert('Nessun Record Selezionato.');
            }

        });

    });
</script>