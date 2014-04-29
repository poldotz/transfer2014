<table id="booking_list" class="table table-condensed table-striped table-hover table-bordered pull-left dataTable">
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
        $('#booking_list').dataTable({
            'bLengthChange': false,
            "iDisplayLength": 5,
            'bProcessing': true,
            'bServerSide': true,
            'sAjaxSource': "<?php echo url_for('booking/get_data') ?>"
        }).fnSetFilteringDelay();
    })
</script>