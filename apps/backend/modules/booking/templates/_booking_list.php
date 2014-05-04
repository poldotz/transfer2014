<table id="booking_list" class="table table-condensed table-striped table-hover table-bordered pull-left dataTable">
    <thead>
    <tr>
        <th style="width:5%">Progressivo</th>

        <th style="width: 20%">Cliente</th>

        <th style="width: 15%">Referente</th>

        <th style="width: 10%">Data Prenot.</th>

        <th style="width: 10%">Rif.File</th>

        <th style="width: 5%">Pax</th>

        <th style="width: 10%">Mezzo Richiesto</th>

        <th style="width: 15%">Creato da</th>

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
       oTable = $('#booking_list').dataTable({
            'bLengthChange': false,
            "iDisplayLength": 5,
            'bProcessing': true,
            'bServerSide': true,
            "sPaginationType": "full_numbers",
            'sAjaxSource': "<?php echo url_for('booking/get_data') ?>",
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
            $('#booking_list tbody tr').bind('click', function () {
                var aData = oTable.fnGetData( this );
                var idNumber = aData[0];
                postSelectedRow(idNumber);
            });
        }

        function postSelectedRow(idNumber) {
            $.get("<?php echo url_for('booking/editJs') ?>", {
                    idNumber: idNumber
                },
                function(book){
                    $("#booking_container").html( book );
                }).fail(function(){
                    bootbox.alert('Prenotazione non trovata!');
                });

        }
    });
</script>