<table id="booking_search_list" class="table table-condensed table-striped table-hover table-bordered pull-left dataTable">
    <thead>
    <tr>
        <th>Progressivo</th>

        <th>Cliente</th>

        <th>Referente</th>

        <th>Data Prenot.</th>

        <th>Rif.File</th>

        <th>Pax</th>

        <th>Mezzo Richiesto</th>

        <th>Creato da</th>

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
       oTable = $('#booking_search_list').dataTable({
            'bLengthChange': false,
            'bFilter': false,
            'iDisplayLength': 5,
            'bProcessing': true,
            'bServerSide': true,
            'sAjaxSource': "<?php echo url_for('booking/get_data') ?>",
            'fnDrawCallback': function() {
                clickRowHandler();
            }
        }).fnSetFilteringDelay();

        /* Click event handler */
        function clickRowHandler() {
            $('#booking_search_list tbody tr').bind('click', function () {
                myApp.showPleaseWait();
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
                    myApp.hidePleaseWait();
                }).fail(function(){
                    myApp.hidePleaseWait();
                    bootbox.alert('Prenotazione non trovata!');
                });

        }

    });
</script>