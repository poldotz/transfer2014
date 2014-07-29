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
            <?php if($service[2] == "Partenza" || $service[2] == "Taxi"): ?>
                <a href="<?php echo url_for('@departure?id='.$service[12])?>">
                    <span data-icon="&#xe07f;"></span> Visualizza
                </a>
            <?php else: ?>
                <a href="<?php echo url_for('@arrival?id='.$service[12])?>">
                    <span data-icon="&#xe07f;"></span> Visualizza
                </a>
            <?php endif; ?>
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
        <a class="btn btn-info" target="_blank" href="<?php echo url_for('serviceDriver/driverServiceListPdf?id='.$id.'&day='.$day) ?>" >
            STAMPA
        </a>
        <a class="btn btn-success" id="send_mail_to_single_driver" data-content="<?php echo $id ?>" href="Javascript:void(0)" data-icon="&#xe040;" >
            INVIA EMAIL
        </a>
    </div>
</div>
<?php endif; ?>

<script type="text/javascript">
    $('#send_mail_to_single_driver').click(function(){

        var driver_id = $(this).attr('data-content');
        $.ajax({
            url: '<?php echo url_for('@driver-services_email-pdf') ?>',
            type: "post",
            data: { driver_id: driver_id},
            success: function (response){
                if (response > ""){
                    bootbox.alert(response);
                }
                return false;
            }
        });
    });


</script>