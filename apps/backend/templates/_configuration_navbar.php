<div id="main-nav" class="hidden-phone hidden-tablet">
    <ul>
        <li>
            <?php echo link_to('<span class="fs1" aria-hidden="true" data-icon="&#xe003;"></span>Dati Aziendali',"@company",array("class"=>($selected == "company") ? "selected": "")); ?>

        </li>
        <li>
            <a href="arrivo.html">
                <span class="fs1" aria-hidden="true" data-icon="&#xe0b7;"></span> Categorie Mezzi
            </a>
        </li>
        <li>
            <a href="partenza.html">
                <span class="fs1" aria-hidden="true" data-icon="&#xe0ab;"></span> Mezzi
            </a>
        </li>
        <li>
            <a href="autista.html">
                <span class="fs1" aria-hidden="true" data-icon="&#xe075;"></span> Autisti
            </a>

        </li>
        <li>
            <a href="hostess.html">
                <span class="fs1" aria-hidden="true" data-icon="&#xe074;"></span> Utenti
            </a>
        </li>
    </ul>
    <div class="clearfix"></div>
</div>