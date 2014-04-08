//Data Tables
$(document).ready(function () {
    $('#users_table').dataTable({
        'bProcessing': true,
        'bServerSide': true,
        'sAjaxSource': "/admin/users"
    });
        $('#data-table').dataTable({
            "sPaginationType": "full_numbers",
            "iDisplayLength" : 10,
            "sLength": true,
            "aaSorting": [],
            "oLanguage":
            {
                "sProcessing":   "Elaborazione in corso...",
                "sLengthMenu":   "_MENU_",
                "sZeroRecords":  "Nessun elemento trovato",
                "sInfo":         "Visualizzate _END_ righe di ( _TOTAL_ )",
                "sInfoEmpty":    "Nessuna record",
                "sInfoFiltered": "( Filtrati _MAX_ elementi sul totale)",
                "sInfoPostFix":  "",
                "sSearch":       "Ricerca : ",
                "sUrl":          "",
                "oPaginate": {
                    "sFirst":    "Primo",
                    "sPrevious": "Precedente",
                    "sNext":     "Successivo",
                    "sLast":     "Ultimo"
                }
            },
            oPaginate:
            {
                iFullNumbersShowPages: 5
            }
        });

    $('#data-table-tasks').dataTable({
        "sPaginationType": "full_numbers",
        "sLength": true,
        "iDisplayLength" : 5,
        "aaSorting": [],
        "oLanguage":
        {
            "sProcessing":   "Elaborazione in corso...",
            "sLengthMenu":   "_MENU_",
            "sZeroRecords":  "Nessun elemento trovato",
            "sInfo":         "Visualizzate _END_ righe di ( _TOTAL_ )",
            "sInfoEmpty":    "Nessuna record",
            "sInfoFiltered": "( Filtrati _MAX_ elementi sul totale)",
            "sInfoPostFix":  "",
            "sSearch":       "Ricerca : ",
            "sUrl":          "",
            "oPaginate": {
                "sFirst":    "Primo",
                "sPrevious": "Precedente",
                "sNext":     "Successivo",
                "sLast":     "Ultimo"
            }
        },
        oPaginate:
        {
            iFullNumbersShowPages: 5
        }
        /*,"fnDrawCallback": function ( oSettings ) {
            if ( oSettings.aiDisplay.length == 0 )
            {
                return;
            }

            var nTrs = $('#data-table-tasks tbody tr');
            var iColspan = nTrs[0].getElementsByTagName('td').length;
            var sLastGroup = "";
            for ( var i=0 ; i<nTrs.length ; i++ )
            {
                var iDisplayIndex = oSettings._iDisplayStart + i;
                var sGroup = oSettings.aoData[ oSettings.aiDisplay[iDisplayIndex] ]._aData[0];
                if ( sGroup != sLastGroup )
                {
                    var nGroup = document.createElement( 'tr' );
                    var nCell = document.createElement( 'td' );
                    nCell.colSpan = iColspan;
                    nCell.className = "group";
                    nCell.innerHTML = sGroup;
                    nGroup.appendChild( nCell );
                    nTrs[i].parentNode.insertBefore( nGroup, nTrs[i] );
                    sLastGroup = sGroup;
                }
            }
        },
        "aoColumnDefs": [
            { "bVisible": false, "aTargets": [ 0 ] }
        ],
        "aaSortingFixed": [[ 0, 'asc' ]],
        "aaSorting": [[ 1, 'asc' ]],
        "sDom": 'lfr<"giveHeight"t>ip'*/
    });

    $('#advaced-search-query').click(function(){
        $('#advanced-search-form').toggle();
    });

});