<?php
/**
 * Created by PhpStorm.
 * User: lpodda
 * Date: 5/9/14
 * Time: 11:30 AM
 */
?>

<table class="table table-striped table-condensed table-bordered no-margin">
    <thead>
    <tr>
        <th class="span1">Tipo</th>
        <th class="span1">Orario</th>
        <th class="span1">Sigla</th>
        <th class="span2 hidden-phone">Mezzo Richiesto</th>
        <th class="span2 hidden-phone">Cliente</th>
        <th class="span2 hidden-phone">Referente</th>
        <th class="span2 hidden-phone">Tragitto</th>
        <th class="span1">Azione</th>
    </tr>
    </thead>
    <tbody>
    <?php if(count($driverService)): ?>
        <?php foreach($driverService as $key => $service): ?>
    <tr>
        <td><?php echo $service[2]?></td>
        <td><?php echo $service[3]?></td>
        <td><?php echo $service[4]?></td>
        <td class="vertical-align-mid hidden-phone">
            <?php echo $service[9]?>
        </td>
        <td class="hidden-phone">
            <?php echo $service[5]?>
        </td>
        <td class="hidden-phone">
            <?php echo $service[6]?>
        </td>
        <td class="hidden-phone"><?php echo $service[8]?></td>
        <td>
            <span data-icon="&#xe07f;"></span> Visualizza
        </td>
    </tr>
    <?php endforeach; ?>
    <?php else: ?>
        <td colspan="8"><h4 class="center-align-text">Selezionare un Autista dalla colonna laterale se presente.</h4></td>
    <?php endif;  ?>
    </tbody>
</table>
<hr/>
<div class="clearfix"></div>
<div class="row-fluid">
    <div class="span12 center-align-text">
<?php if(count($driverService)): ?>
        <a class="btn btn-success" target="_blank" href="<?php echo url_for('serviceDriver/driverServiceListPdf?id='.$id.'&day='.$day) ?>" >
            STAMPA
        </a>
    </div>
</div>
<?php endif; ?>
