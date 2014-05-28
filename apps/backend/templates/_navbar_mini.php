<div class="navbar hidden-desktop">
    <div class="navbar-inner">
        <div class="container">
            <a data-target=".navbar-responsive-collapse" data-toggle="collapse" class="btn btn-navbar">
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
            </a>
            <div class="nav-collapse collapse navbar-responsive-collapse">
                <ul class="nav">
                    <li>
                        <a class="active" href="profile.html">Configurazione</a>
                    </li>
                    <li>
                        <a href="index.html" class="selected">
                            <span class="fs1" aria-hidden="true" data-icon="&#xe0a0;"></span> Prenotazione
                        </a>
                    </li>
                    <li>
                        <a href="reports.html">
                            <span class="fs1" aria-hidden="true" data-icon="&#xe097;"></span> In Arrivo
                        </a>
                    </li>
                    <li>
                        <a href="forms.html">
                            <span class="fs1" aria-hidden="true" data-icon="&#xe0b8;"></span> In Partenza
                        </a>
                    </li>
                    <?php if(!$sf_user->hasCredential('Cliente')): ?>

                    <li>
                        <a href="graphs.html">
                            <span class="fs1" aria-hidden="true" data-icon="&#xe096;"></span> Servizi Autista
                        </a>
                    </li>
                    <li>
                        <a href="ui-elements.html">
                            <span class="fs1" aria-hidden="true" data-icon="&#xe0a5;"></span> Servizi Hostes
                        </a>
                    </li>
                    <?php endif; ?>
                </ul>
            </div>
        </div>
    </div>
</div>