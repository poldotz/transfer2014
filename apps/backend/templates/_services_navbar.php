<div id="main-nav" class="hidden-phone hidden-tablet">
    <ul>
        <li>
            <?php echo link_to('<span class="fs1" aria-hidden="true" data-icon="&#xe03f;"></span> Prenotazione',"@booking",array("class"=>($selected == "booking") ? "selected": "")); ?>
        </li>
        <li>
            <?php echo link_to('<span class="fs1" aria-hidden="true" data-icon="&#xe133;"></span> In Arrivo',"@arrival",array("class"=>($selected == "arrival") ? "selected": "")); ?>
        </li>
        <li>
            <?php echo link_to('<span class="fs1" aria-hidden="true" data-icon="&#xe131;"></span> In Partenza',"@departure",array("class"=>($selected == "departure") ? "selected": "")); ?>
        </li>
        <li>
            <a href="autista.html">
                <span class="fs1" aria-hidden="true" data-icon="&#xe075;"></span> Servizi Autista
            </a>

        </li>
        <li>
            <a href="hostess.html">
                <span class="fs1" aria-hidden="true" data-icon="&#xe074;"></span> Servizi Hostess
            </a>
        </li>
    </ul>
    <div class="clearfix"></div>
</div>