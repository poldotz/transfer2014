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
                    <form class="form-horizontal no-margin">
                        <fieldset>
                            <div class="control-group">
                                <div style="margin-left: 0px;" class="controls">
                                    <div class="row-fluid">
                                        <div class="span10">
                                            <div class="input-append">
                                                <input type="text" name="date_range1" id="date_range1" class="span12 date_picker" placeholder="Seleziona date da - a"/>
                                                      <span class="add-on">
                                                        <i class="icon-calendar"></i>
                                                      </span>
                                            </div>
                                        </div>
                                        <div class="span2 form-inline" >
                                            <label class="radio inline">
                                                <input type="checkbox"  name="esc_date" value="escludi">
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
                                            <input type="text" class="input-block-level" title="Referente" placeholder="Referente">
                                        </div>
                                        <div class="span2 form-inline" >
                                            <label class="radio inline">
                                                <input type="checkbox"  name="esc_referente" value="escludi">
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
                                            <input type="text" class="input-block-level" title="Cliente" placeholder="Cliente">
                                        </div>
                                        <div class="span2 form-inline" >
                                            <label class="radio inline">
                                                <input type="checkbox"  name="esc_cliente" value="escludi">
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
                                            <input type="text" class="input-block-level" title="Localit&agrave" placeholder="Localit&agrave">
                                        </div>
                                        <div class="span2 form-inline" >
                                            <label class="radio inline">
                                                <input type="checkbox"  name="esc_localita" value="escludi">
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
                                            <select class="input-block-level" required >
                                                <option selected>Mezzo</option>
                                                <option>Bus 17/30</option>
                                                <option>Auto 1/3 posti</option>
                                            </select>
                                        </div>
                                        <div class="span2 form-inline" >
                                            <label class="radio inline">
                                                <input type="checkbox"  name="esc_mezzo" value="escludi">
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
                                            <select class="input-block-level" required >
                                                <option selected>Autista</option>
                                                <option >Maurizio</option>
                                                <option>Leonardo</option>
                                            </select>
                                        </div>
                                        <div class="span2 form-inline" >
                                            <label class="radio inline">
                                                <input type="checkbox"  name="esc_austista" value="escludi">
                                                Escludi
                                            </label>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="control-group">
                                <div style="margin-left: 0px;" class="controls">
                                    <div class="row-fluid">
                                        <div class="span6 center-align-text">
                                            <label class="radio inline">
                                                <input type="radio" name="optionsRadios" id="optionsRadios1" value="option1">
                                                Arrivo
                                            </label>
                                        </div>
                                        <div class="span6 center-align-text">
                                            <label class="radio inline">
                                                <input type="radio" name="optionsRadios" id="optionsRadios2" value="option2" checked>
                                                Partenza
                                            </label>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="form-actions no-margin no-bottom-padding no-top-padding">
                                <button type="submit" class="btn btn-info pull-right">
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
                    <div class="center-align-text form-inline">
                        Servizi del:
                        <div class="input-append date" id="dp3" data-date="02-01-2013" data-date-format="dd-mm-yyyy">
                            <input class="span6" type="text" value="02-01-2013">
                            <span class="add-on"><i class="icon-th"></i></span>
                        </div>
                    </div>

                </div>
                <div class="widget-body">
                    <table class="table table-striped table-condensed table-bordered no-margin">
                        <thead>
                        <tr>
                            <th class="span1">Progressivo</th>
                            <th class="span2">Data Reg.</th>
                            <th class="span3">Cliente</th>
                            <th class="span3 ">Referente</th>
                            <th class="span2 ">Pax</th>
                            <th class="span1">Rif.File</th>
                        </tr>
                        </thead>
                        <tbody>
                        <tr>
                            <td class="center-align-text" colspan="6"><h4>Effettuare una ricerca per visualizzare i risultati.</h4></td>
                        </tr>
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
</div>