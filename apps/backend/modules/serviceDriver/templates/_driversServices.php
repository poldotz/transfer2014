<div class="left-sidebar"> <!-- Leftside bar start -->
            <br/><br/>
            <div class="content">
                <table   class="table table-condensed table-bordered no-margin">
                    <thead>
                    <tr>
                        <th style="width:15%">
                            Autista
                        </th>
                        <th style="width:5%" class="hidden-phone">
                            Num.
                        </th>
                    </tr>

                    </thead>
                    <tbody style="background-color: #ffffff">
                    <?php $tot = 0; ?>
                    <?php foreach($services as $service): ?>
                     <?php $tot += $service['num']; ?>
                    <tr>
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