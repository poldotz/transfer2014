<?php use_helper('I18N') ?>

<div class="registration-wrapper">
    <div class="main-container">
    <?php echo image_tag('top_registration.png',array("width"=>"693", "height"=>"85", "alt"=>"Registrati"))?>
    <?php echo image_tag('smeppo_registration.png',array("width"=>"103", "height"=>"132", "alt"=>"Smeppo","class"=>"smeppo-registration")) ?>
    <br/><br/>
    <div class="container-fluid">
    <?php echo link_to('<span class="fs1" aria-hidden="true" data-icon="&#xe000;"></span> HOME','@homepage'); ?>
        <div class="row-fluid">
        <div class="span12">
            <div class="widget">
                <div class="widget-header">
                    <div class="title">
                        <span class="fs1" aria-hidden="true" data-icon="&#xe070;"></span> DATI UTENTE
                    </div>
                </div>
                <br>
                <div class="widget-body">
                <?php if($form->hasErrors()): ?>
                    <div class="alert alert-error">
                        Sono presenti errori di compilazione, verificare i campi inseriti
                    </div>
                <?php endif; ?>
                <form class="form-horizontal no-margin" action="<?php echo url_for('@sf_guard_register') ?>"  method="post">
                <div class="control-group <?php ($form['first_name']->hasError() ||  $form['last_name']->hasError() ) ? print('error') : print(''); ?> ">
                    <div class="span6">
                        <?php echo $form['first_name']->renderLabel('Nome *',array('class'=>'control-label')); ?>
                        <div class="controls controls-row">
                            <?php echo $form['first_name']->render(array('class'=>'span12',"placeholder"=>"nome")) ?>
                            <?php if($form['first_name']->hasError()): ?>
                                <span class="help-inline"><?php echo $form['first_name']->getError() ?></span>
                            <?php endif; ?>
                        </div>
                    </div>
                    <div class="span6">
                        <?php echo $form['last_name']->renderLabel('Cognome *',array('class'=>'control-label')); ?>
                        <div class="controls controls-row">
                            <?php echo $form['last_name']->render(array('class'=>'span12',"placeholder"=>"cognome")) ?>
                            <?php if($form['last_name']->hasError()): ?>
                                <span class="help-inline"><?php echo $form['last_name']->getError() ?></span>
                            <?php endif; ?>
                        </div>
                    </div>
                </div>
                <div class="control-group <?php ($form['birthday']->hasError() || $form['genre']->hasError()) ? print('error') : print(''); ?>">
                    <div class="span2">
                        <?php echo $form['birthday']->renderLabel('Data nascita',array('class'=>'control-label')) ?>
                        </div>
                        <div class="span5">
                            <?php echo $form['birthday']->render(array('class'=>'span3','style'=>'width:70px;')) ?>
                            <?php if($form['birthday']->hasError()): ?>
                                <span class="help-inline"><?php echo $form['birthday']->getError() ?></span>
                            <?php endif; ?>
                        </div>

                    <div class="span2">
                        <?php echo $form['genre']->renderLabel('Sesso',array('class'=>'control-label')); ?>
                    </div>
                    <div class="span3">
                            <label class="radio inline">
                                <?php ($form['genre']->getValue() == 1) ? $checked = 'checked' :$checked = ''  ?>
                                <input type="radio" name="register[genre]" id="optionsRadios1" value="1" <?php echo $checked ?> /> F
                            </label>
                            <label class="radio inline">
                                <?php ($form['genre']->getValue() == 2) ? $checked = 'checked' :$checked = ''  ?>
                                <input type="radio" name="register[genre]" id="optionsRadios2" value="2" <?php echo $checked ?> /> M
                            </label>
                            <?php if($form['genre']->hasError()): ?>
                                <span class="help-inline"><?php echo $form['genre']->getError() ?></span>
                            <?php endif; ?>
                    </div>
                </div>
                <div class="control-group <?php ($form['country']->hasError()) ? print('error') : print(''); ?>">
                    <div class="span2">
                    <?php echo $form['country']->renderLabel('Stato *',array('class'=>'control-label')); ?>
                    </div>
                    <div class="span10" style="padding-right: 5px;">
                        <?php echo $form['country']->render(array('class'=>"span12")) ?>
                        <?php if($form['country']->hasError()): ?>
                            <span class="help-inline"><?php echo $form['country']->getError() ?></span>
                        <?php endif; ?>
                        </div>

                </div>
                <div class="control-group <?php ($form['provincia']->hasError()) ? print('error') : print(''); ?>">
                  <div class="span2">
                    <?php echo $form['provincia']->renderLabel('Provincia',array('class'=>'control-label')); ?>
                   </div>
                    <div class="span10" style="padding-right: 5px;">
                        <?php echo $form['provincia']->render(array('class'=>'span12','onchange'=>'selectComune()')) ?>
                        <?php if($form['provincia']->hasError()): ?>
                            <span class="help-inline"><?php echo $form['provincia']->getError() ?></span>
                        <?php endif; ?>
                    </div>
                  </div>
                <?php if($sf_user->hasFlash('comune')): ?>
                <div id="comune_id">
                    <div class="control-group <?php ($form['provincia']->hasError() || $form['comune']->hasError()) ? print('error') : print(''); ?>">
                    <div class="span2">
                        <?php echo $form['comune']->renderLabel('Comune',array('class'=>'control-label')); ?>
                        </div>
                        <div class="span10" style="padding-right: 5px;">
                                <?php echo $form['comune']->render(array('class'=>'span12')) ?>
                                <?php if($form['comune']->hasError()): ?>
                                    <span class="help-inline"><?php echo $form['comune']->getError() ?></span>
                                <?php endif; ?>
                            </div>
                        </div>
                    </div>
                <?php else: ?>
                    <div id="comune_id" style="display: none"></div>
                <?php endif; ?>

                <div class="control-group <?php ($form['address']->hasError() || $form['cap']->hasError()) ? print('error') : print(''); ?>">
                    <div class="span2">
                        <?php echo $form['address']->renderLabel('Indirizzo',array('class'=>'control-label')); ?>
                    </div>
                    <div class="span6" style="padding-right: 5px;">
                        <?php echo $form['address']->render(array('class'=>"span12")) ?>
                        <?php if($form['address']->hasError()): ?>
                            <span class="help-inline"><?php echo $form['address']->getError() ?></span>
                        <?php endif; ?>
                    </div>
                   <div class="span2">
                    <?php echo $form['cap']->renderLabel('Cap',array('class'=>'control-label')); ?>
                   </div>
                    <div class="span2" style="padding-right: 5px;">
                        <?php echo $form['cap']->render(array('class'=>'span12')) ?>
                        <?php if($form['cap']->hasError()): ?>
                            <span class="help-inline"><?php echo $form['cap']->getError() ?></span>
                        <?php endif; ?>
                    </div>
                </div>
                <div class="control-group <?php ($form['phone']->hasError() || $form['mobile']->hasError()) ? print('error') : print(''); ?>">
                    <div class="span2">
                    <?php echo $form['phone']->renderLabel('Telefono',array('class'=>'control-label')); ?>
                        </div>
                    <div class="span4"style="padding-right: 5px;">
                        <?php echo $form['phone']->render(array('class'=>'span12',"placeholder"=>"Tel.")) ?>
                        <?php if($form['phone']->hasError()): ?>
                            <span class="help-inline"><?php echo $form['phone']->getError() ?></span>
                        <?php endif; ?>
                    </div>

                    <div class="span2">
                    <?php echo $form['mobile']->renderLabel('Cellulare',array('class'=>'control-label')); ?>
                    </div>
                    <div class="span4" style="padding-right: 5px;">
                        <?php echo $form['mobile']->render(array('class'=>'span12',"placeholder"=>"Cellulare")) ?>
                        <?php if($form['mobile']->hasError()): ?>
                            <span class="help-inline"><?php echo $form['mobile']->getError() ?></span>
                        <?php endif; ?>
                    </div>

                </div>
                <div class="widget-header" style="border-top:1px solid #ddd;">
                    <div class="title">
                        <span class="fs1" aria-hidden="true" data-icon="&#xe086;"></span> DATI ACCESSO AREA MY SME
                    </div>
                </div>
                <br/>
                <div class="control-group <?php $form['email']->hasError() ? print('error') : print('success'); ?>">
                    <?php echo $form['email']->renderLabel('Email *',array('class'=>'control-label')); ?>
                        <div class="input-prepend">
                              <span class="add-on">
                                @
                              </span>
                            <?php echo $form['email']->render(array('class'=>'span12','style'=>'width:480px;')) ?>
                        </div>
                    <?php if($form['email']->hasError()): ?>
                        <div class="span3"></div><span class="help-inline"><?php echo $form['email']->getError() ?></span>
                    <?php endif; ?>
                </div>
                <div class="control-group <?php $form['email_confirm']->hasError() ? print('error') : print('success'); ?>">
                    <?php echo $form['email_confirm']->renderLabel('Conferma Email*',array('class'=>'control-label')); ?>
                        <div class="input-prepend">
                                          <span class="add-on">
                                            @
                                          </span>
                        <?php echo $form['email_confirm']->render(array('class'=>'span12','style'=>'width:480px;')) ?>
                        </div>
                    <?php if($form['email_confirm']->hasError()): ?>
                        <div class="span3"></div> <span class="help-inline"><?php echo $form['email_confirm']->getError() ?></span>
                    <?php endif; ?>
                </div>
                <div class="control-group <?php ($form['password']->hasError() || $form['password_confirm']->hasError()) ? print('error') : print(''); ?>">
                    <div class="span6">
                        <?php echo $form['password']->renderLabel('Password *',array('class'=>'control-label')); ?>
                        <div class="controls controls-row">
                            <?php echo $form['password']->render(array('class'=>'span12',"placeholder"=>"password")) ?>
                            <?php if($form['password']->hasError()): ?>
                                <span class="help-inline"><?php echo $form['password']->getError() ?></span>
                            <?php endif; ?>
                        </div>
                    </div>
                    <div class="span6">
                        <?php echo $form['password_confirm']->renderLabel('Conferma password *',array('class'=>'control-label')); ?>
                        <div class="controls controls-row">
                            <?php echo $form['password_confirm']->render(array('class'=>'span12',"placeholder"=>"conferma password")) ?>
                            <?php if($form['password_confirm']->hasError()): ?>
                                <span class="help-inline"><?php echo $form['password_confirm']->getError() ?></span>
                            <?php endif; ?>
                        </div>
                    </div>
                </div>
                <div class="control-group <?php $form['newsletter']->hasError() ? print('error') : print(''); ?>">
                    <span class="text-info"><strong>NEWSLETTER</strong> - Trattamento dati per l'invio di comunicazioni commerciali</span>
                    <textarea tclass="input-block-level no-margin"  class="span12" readonly>Il Gruppo SME raccoglie i Suoi dati personali per poterLe erogare il servizio richiesto tramite web di invio a mezzo e-mail di comunicazioni con fini di informazione commerciale, ricerche di mercato, offerte dirette di prodotti, illustrazione di iniziative e attivit&agrave ricreative e culturali, altre comunicazioni di utilit&agrave sociale. Il trattamento dei Suoi dati per le finalit&agrave sopraindicate avr&agrave luogo sia con modalit&agrave automatizzate ed informatiche, sia con modalit&agrave manuali, sempre comunque nel rispetto delle regole di riservatezza e di sicurezza previste dalla legge. Il conferimento dei Suoi dati personali a Gruppo SME &egrave assolutamente facoltativo e l'eventuale rifiuto non comporta alcuna conseguenza tranne ovviamente l'eventuale impossibilit&agrave di poterLe fornire tutti o parte dei servizi, o delle opzioni di servizio, che ci richiede. I dati non saranno comunicati o resi accessibili a terzi, salvo i casi previsti dalla legge. Titolare del trattamento dei dati &egrave Gruppo SME. In qualsiasi momento potr&agrave far valere i diritti previsti dall'articolo 7 del D.Lgs. 196/2003 rivolgendosi a: Gruppo SME - Via Vittoria 45 - 31040 Cessalto (TV)</textarea>
                    <label class="checkbox" style="width: 300px;">
                        <?php echo $form['newsletter']->render(array('class'=>'input-mini')) ?>
                        Desidero essere iscritto alla newsletter SME.
                    </label>
                </div>
                <div class="control-group <?php $form['privacy']->hasError() ? print('error') : print(''); ?>">

                    <span class="text-info">Condizioni sul trattamento dei dati personali</span>
                    <textarea tclass="input-block-level no-margin"  class="span12" readonly>Informazioni sulla Privacy
Informativa resa ai sensi dell'art. 13 del d.lgs. 30 giugno 2003 n. 196 (Codice in materia di Protezione dei Dati Personali, di seguito "C.P.")
Il Titolare del Trattamento
Nel corso o a seguito della consultazione di questo sito Internet, possono essere trattati dati relativi a persone identificate o identificabili. Il "titolare" del loro trattamento &egrave il Gruppo SME srl - Via Vittoria, 45 - 31040 Cessalto (TV) - C.F./P.IVA e Registro Imprese TV n. 02041740271.

Luogo di Trattamento dei Dati
I trattamenti connessi ai servizi web di questo sito hanno luogo presso la predetta sede e sono curati solo da personale incaricato del trattamento, oppure da eventuali incaricati di occasionali operazioni di manutenzione.
I dati personali forniti dagli utenti che inoltrano specifiche richieste sono utilizzati al solo fine di eseguire il servizio o la prestazione richiesta e sono comunicati a terzi nel solo caso in cui ci&ograve sia a tal fine necessario.

Tipi di Dati trattati
- Dati di navigazione
I sistemi informatici e le procedure software preposte al funzionamento di questo sito Internet acquisiscono, nel corso del loro normale esercizio, alcuni dati personali la cui trasmissione &egrave implicita nell'uso dei protocolli di comunicazione di Internet. Si tratta di informazioni che non sono raccolte per essere associate a interessati identificati, ma che per loro stessa natura potrebbero, attraverso elaborazioni ed associazioni con dati detenuti da terzi, permettere di identificare gli utenti.
Questi dati vengono utilizzati al solo fine di ricavare informazioni statistiche anonime sull'uso del sito e per controllarne il corretto funzionamento.

- Dati forniti volontariamente dall'utente
L'invio facoltativo, esplicito e volontario di posta elettronica agli indirizzi indicati su questo sito comporta la successiva acquisizione dell'indirizzo del mittente, necessario per rispondere alle richieste, nonch&egrave degli eventuali altri dati personali inseriti nella missiva.
Specifiche informative di sintesi verranno progressivamente riportate o visualizzate nelle pagine del sito predisposte per particolari servizi a richiesta.

- Cookies
I cookies sono una piccola quantit&agrave di dati che vengono memorizzati nella RAM del computer o sul disco fisso, ogni volta che un sito web viene visitato. Il nostro sito Internet utilizza i cookies per riconoscere e tenere traccia dei visitatori, al fine di fornire loro un accesso pi&ugrave veloce al sito e di modificarne i contenuti in base alle preferenze. I cookies non consentono in alcun modo al sito visitato di avere accesso a qualsiasi altro dato presente nel computer degli utenti.

Facoltativit&agrave del conferimento dei Dati
A parte quanto specificato per i dati di navigazione, l'utente &egrave libero di fornire i dati personali qualora richiesto in apposite sezioni del sito.
Il loro mancato conferimento, tuttavia, pu&ograve comportare l'impossibilit&agrave di ottenere quanto eventualmente richiesto.

Modalit&agrave del Trattamento
I dati personali sono trattati con strumenti automatizzati per il tempo strettamente necessario a conseguire gli scopi per cui sono stati raccolti.
Specifiche misure di sicurezza sono osservate per prevenire la perdita dei dati, usi illeciti o non corretti ed accessi non autorizzati.

Diritti degli interessati
Ai sensi dell'art. 7 del C.P., i soggetti cui si riferiscono i dati personali hanno il diritto in qualunque momento di ottenere la conferma dell'esistenza o meno dei medesimi dati, di conoscerne il contenuto e l'origine, verificarne l'esattezza o chiederne l'integrazione, l'aggiornamento o la rettificazione, chiederne la cancellazione, la trasformazione in forma anonima o il blocco dei dati trattati in violazione di legge, nonch&egrave di opporsi in ogni caso, per motivi legittimi, al loro trattamento.
Le richieste in questione vanno rivolte al titolare del trattamento.</textarea>
                    <label class="checkbox"style="width: 350px;">
                        <?php echo $form['privacy']->render() ?>
                        Ho letto e accetto le condizioni sul trattamento dei dati
                    </label>
                </div>

                <?php echo $form['_csrf_token']->render() ?>
                <div class="form-actions no-margin">
                    <button type="submit" class="btn btn-success pull-right">
                        Registrati
                    </button>
                    <div class="clearfix">
                    </div>
                </div>
                </form>
                </div>
                </div>
            </div>
        </div>

        </div>
    </div>
</div>
<script type="text/javascript">
    function selectComune(){
        if($('#register_provincia').val() > 0){
            var provincia_id = $('#register_provincia').val();
            $('#loading-indicator').show();
            $.ajax({
                url: "register/selectComune",
                type: "post",
                cache:false,
                data: "provincia="+$('#register_provincia').val(),
                success: function (HTML){
                    if (HTML>""){
                        $('#comune_id').html(HTML);
                        $('#comune_id').show();
                        $('#loading-indicator').hide();
                    }
                    return false;
                }
            });

        }
    }
</script>

