<?php
/**
 * Created by PhpStorm.
 * User: lpodda
 * Date: 5/5/14
 * Time: 5:38 PM
 */
?>
<?php include_partial('global/configuration_navbar',array('selected'=>'customer')); ?>
<div class="main-container" xmlns="http://www.w3.org/1999/html">
    <h4>Gestionie Tariffa</h4>
    <div class="row-fluid">
        <div class="span12">
            <form action="<?php echo url_for('areaRateTable/save')?>" method="post">
                <button type="submit" class="btn btn-success">Salva</button>
                <br/><br/>
                <table class="table table-bordered table-striped">
                    <thead>
                    <th>Zona</th>
                    <th>Categoria Mezzo</th>
                    <th>Tariffa</th>
                    </thead>
                    <tbody>
                        <?php echo $form->render() ?>
                    </tbody>
                </table>
            </form>
        </div>
    </div>
</div>

