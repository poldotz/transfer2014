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
                        <label class="label-success"> Tot: <?php echo $tot ?> </label><br/>
                        <a href="<?php echo url_for('@services_pdf') ?>" target="_blank" class="btn btn-inverse"><span class="" data-icon="&#xe051;"></span> Stampa tutti</a>
                    </div>
                </div>
            </div>
        </div><!-- Leftside bar end -->

<script type="text/javascript">
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