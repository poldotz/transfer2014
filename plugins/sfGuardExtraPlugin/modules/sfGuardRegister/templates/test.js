/**
 * Created with JetBrains PhpStorm.
 * User: poldotz
 * Date: 21/06/13
 * Time: 17.26
 * To change this template use File | Settings | File Templates.
 */
function are_cookies_enabled() {
    var cookieEnabled = (navigator.cookieEnabled) ? true : false;

    if (typeof navigator.cookieEnabled == "undefined" && !cookieEnabled)
    {
        document.cookie="testcookie";
        cookieEnabled = (document.cookie.indexOf("testcookie") != -1) ? true : false;
    }
    return (cookieEnabled);
}

$(function() {
    /* check cookie */
    if (!are_cookies_enabled()) {
        window.location.href='/cookie_must_be_enabled.html';
    }

    /* giorno duplicato*/
    var li='<li class="giorno">';
    li+='<label>Pass per il giorno</label>';
    li+='<input type="text" name="giorno[]"/>';
    li+=' <a class="rimuovi_giorno button" href="#" style="float: left; margin-left: 10px;"><span><em>Elimina giorno <img src="/images/icons/delete.png" /></em></span></a>';
    li+='</li>';

    /* gestione tasti aggiunta e rimozione giorno */
    $('.aggiungi_giorno').live('click',function(event) {
        event.preventDefault();
        $('#giorni').append(li);
        $('#giorni .giorno:last input').datepicker({dateFormat: 'dd/mm/yy', minDate: '3d'});
        aggiornaPrezzo();
    });

    $('.rimuovi_giorno').live('click',function(event) {
        event.preventDefault();
        if($('#giorni .giorno').length>1) {
            $(this).parent().remove();
            aggiornaPrezzo();
        } else {
        }
    });

    /* datepicker */
    $('#giorni .giorno input').datepicker({dateFormat: 'dd/mm/yy', minDate: '3d'});

    aggiornaStrutture=function() {
        var selected_el=$('#fase1_tipologia_veicolo :selected');
        var selected_value=selected_el.attr('value');
        /* id del prodotto che richiede la lista delle strutture ricettive */
        if (selected_value==3) {
            $('#fase1_struttura_ricettiva').attr('name','fase1[struttura_ricettiva]');
            $('#fase1_struttura_ricettiva').parent().show();
        } else {
            $('#fase1_struttura_ricettiva').attr('name','');
            $('#fase1_struttura_ricettiva').parent().hide();
        }
        aggiornaPrezzo();
    }

    aggiornaProvince=function() {
        var selected_el=$('#fase1_stato :selected');
        var selected_value=selected_el.attr('value');
        /* id del prodotto che richiede la lista delle strutture ricettive */
        if (selected_value=='IT') {
            $('#fase1_provincia').attr('name','fase1[provincia]');
            $('#fase1_provincia').parent().show();
        } else {
            $('#fase1_provincia').attr('name','');
            $('#fase1_provincia').parent().hide();
        }
    }

    /* gestione strutture ricettive */
    $('#fase1_tipologia_veicolo').change(function() {
        aggiornaStrutture();
    });

    /* gestione province */
    $('#fase1_stato').change(function() {
        aggiornaProvince();
    });

    /* gestione euro */
    $('#fase1_livello_motore').change(function() {
        aggiornaPrezzo();
    });

    aggiornaPrezzo=function() {
        var tipologia_veicolo=$('#fase1_tipologia_veicolo :selected').attr('value');
        var livello_motore=$('#fase1_livello_motore :selected').attr('value');
        var num_tickets=$('#giorni .giorno').size();
        var indirizzo="/fase1ajax/prezzo/tipologia_veicolo/"+tipologia_veicolo+"/livello_motore/"+livello_motore+"/num_tickets/"+num_tickets;
        $.getJSON(indirizzo,
            function(data){
                if (data.result) {
                    $('#prezzo').html('Prezzo &euro; '+data.prezzo);
                } else {
                    $('#prezzo').html('');
                }
            });

    }

    aggiornaStrutture();
    aggiornaProvince();

    /* metto la classe al li che ha l'errore */

    $(".error_list").parent().addClass('error');

    /* CONTROLLO DATA */


    isValidDate=function(dateText) {
        data=dateText.split('/');

        /* controllo che la stringa sia di 10 char */
        if (dateText.length!=10) {
            return false;
        }

        /* controllo che ci siano 3 chunk */
        if (data.length!=3) {
            return false;
        }

        /* controllo che gg mm aaaa siano numerici */
        if (isNaN(data[0]) || isNaN(data[1]) || isNaN(data[2])) {
            return false;
        }

        /* controllo che gg e mm siano di 2 char, e aaaa di 4 char */
        if (!(data[0].length==2 && data[1].length==2 && data[2].length==4)) {
            return false;
        }

        /* controllo la correttezza della data (parziale) */
        if (data[0]<1 || data[0]>31 || data[1]<1 || data[1]>12) {
            return false;
        }

        /* controllo che non sia carnevale */
        /*if ((data[1]==1 && data[0]>=28) || (data[1]==2 && data[0]<=18)) {
         return false;
         }*/

        return true;
    }

    $('.buttons button[type=submit]').click(function(e) {
        $('.hasDatepicker').each(function() {
            if (!isValidDate($(this).val())) {
                alert("********* AVVISO *********\n\nInserire data corretta gg/mm/aaaa.\nEsempio: 15/08/2010");
                /*
                 alert("********* AVVISO *********\n\nNon e' attualmente possibile acquistare i ticket nel periodo dal 28 Gennaio al 18 Febbraio 2013");
                 */
                e.preventDefault();
                return false;
            }
        });

    });

    // rimuovo/nascondo il pass per gite scolastiche

    /*$('#fase1_tipologia_veicolo option[value=2]').remove(); */

});



































































































