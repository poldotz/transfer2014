<div class="left-sidebar"> <!-- Leftside bar start -->
            <br/><br/>
            <div class="content">
                <table class="table striped table-condensed table-bordered no-margin sidebar">
                    <thead>
                    <tr>
                        <th style="width:15%;">
                            Autista
                        </th>
                        <th style="width:5%" class="hidden-phone">
                            Num.
                        </th>
                    </tr>

                    </thead>
                    <tbody style="background-color: #ffffff">
                    <?php $tot = 0; ?>
                    <?php foreach($services as $key => $service): ?>
                     <?php $tot += $service['num']; ?>
                    <tr style="cursor: pointer" class="service_driver" data-content="<?php echo $key ?>" data-date="<?php echo $sf_user->getCurrentDriversDate() ?>">
                        <td>
                            <?php echo $service['driver'] ?>
                        </td>
                        <td class="hidden-phone">
                            <?php echo $service['num'] ?>
                        </td>
                    </tr>
                    <?php endforeach; ?>
                    </tbody>
                </table>
                <br/>
                <div class="row-fluid">
                    <div class="span12 center-align-text">
                        <span class="badge badge-inverse "> <strong>TOT:  <?php echo $tot ?></strong></span>
                    </div>
                </div>
                <hr/>
                <div class="row-fluid">
                    <div class="span12 center-align-text">
                        <a href="<?php echo url_for('@services_pdf') ?>" target="_blank" class="btn btn-inverse"><span class="" data-icon="&#xe051;"></span> Stampa tutti</a>
                    </div>
                </div>
                <hr/>
                <div class="row-fluid">
                    <div class="span12 center-align-text">
                        <a href="Javascript:void(0)" id="send_mail_to_drivers" class="btn btn-success"><span class="fs1" data-icon="&#xe040;"></span> Invia a tutti</a>
                    </div>
                </div>
                <hr/>
            </div>
        </div><!-- Leftside bar end -->

<script type="text/javascript">

    $('#send_mail_to_drivers').click(function(){
        $.ajax({
                url: '<?php echo url_for('@services_email-pdf') ?>',
                type: "get",
                success: function (response){
                    if (response > ""){
                        bootbox.alert(response);
                    }
                    return false;
                }
            }
        );
    });

    $('.service_driver').click(function(){

        var day = $(this).attr('data-date');
        var driver_id = $(this).attr('data-content');
        $.ajax(
            {
                url: '<?php echo url_for('serviceDriver/driverServiceList') ?>',
                data: { day: day, driver_id: driver_id},
                type: "post",
                success: function (HTML){
                    if (HTML > ""){
                        $('#service_driver_list').html(HTML);
                    }
                    return false;
                }
            }
        );


    });

</script>