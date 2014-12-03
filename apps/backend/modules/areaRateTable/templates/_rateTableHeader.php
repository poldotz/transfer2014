<?php
/**
 * Created by PhpStorm.
 * User: lpodda
 * Date: 5/5/14
 * Time: 5:38 PM
 */
?>
<ul class="nav nav-tabs" style="margin-bottom: 0px;">
    <li class="<?php echo $active == 'areas' ? 'active':'' ?>">
        <a href="<?php echo $urlRateAreas ?>">Tariffe per zona</a>
    <li class="<?php echo $active == 'parameters' ? 'active':'' ?>">
        <a href="<?php echo $urlRateParameters ?>">Parametri tariffe</a>
    </li>
</ul>