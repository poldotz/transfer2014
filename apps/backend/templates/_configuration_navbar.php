<div id="main-nav" class="hidden-phone hidden-tablet">
    <ul>
        <li>
            <?php echo link_to('<span class="fs1" aria-hidden="true" data-icon="&#xe003;"></span>Dati Aziendali',"@company",array("class"=>($selected == "company") ? "selected": "")); ?>

        </li>
        <li>
            <?php echo link_to('<span class="fs1" aria-hidden="true" data-icon="&#xe0b7;"></span> Categorie Mezzi',"@vehicle_type",array("class"=>($selected == "vehicle_type") ? "selected": "")); ?>
        </li>
        <li>
            <?php echo link_to('<span class="fs1" aria-hidden="true" data-icon="&#xe0ab;"></span> Mezzi',"@vehicle",array("class"=>($selected == "vehicle") ? "selected": "")); ?>
        </li>
        <li>
            <?php echo link_to('<span class="fs1" aria-hidden="true" data-icon="&#xe074;"></span> Utenti','@users',array("class"=>($selected == "users") ? "selected": "")); ?>
        </li>
        <li>
            <?php echo link_to('<span class="fs1" aria-hidden="true" data-icon="&#xe071;"></span> Clienti',"@customer",array("class"=>($selected == "customer") ? "selected": "")); ?>
        </li>
        <li>
            <?php echo link_to('<span class="fs1" aria-hidden="true" data-icon="&#xe00d;"></span> Localit&agrave',"@locality",array("class"=>($selected == "locality") ? "selected": "")); ?>
        </li>
    </ul>
    <div class="clearfix"></div>
</div>