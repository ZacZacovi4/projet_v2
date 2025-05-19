<main>
    <div class="home__page-container container">
        <div class="home__page-header-wrapper">
            <h1 class="home__page-header">Bonjour <?php if (isLoggedIn())
                echo $_SESSION['first_name']; ?></h1>
        </div>
        <div class="home__page-menu">
            <?php if (isAdmin()) { ?>
                <a href="index.php?page=admin" class="home__page-menu-element">
                    <i class="bx bx-user-hexagon"></i>
                    <p class="home__page-menu-element-header">Admin</p>
                    <p class="home__page-menu-element-description">
                        Panel d'administrateur
                    </p>
                </a>
            <?php } ?>
            <a href="profil_utilisateur.html" class="home__page-menu-element">
                <i class="bx bxs-user"></i>
                <p class="home__page-menu-element-header">Mon Profil</p>
                <p class="home__page-menu-element-description">
                    Modifier les informations de mon compte
                </p>
            </a>
            <a href="réservation_utilisateur.html" class="home__page-menu-element">
                <i class="bx bxs-calendar"></i>
                <p class="home__page-menu-element-header">Mes Réservations</p>
                <p class="home__page-menu-element-description">
                    Télécharger et gérer mes billets
                </p>
            </a>
            <a href="commandes_utilisateur.html" class="home__page-menu-element">
                <i class="bx bxs-cart"></i>
                <p class="home__page-menu-element-header">Mes Commandes</p>
                <p class="home__page-menu-element-description">
                    Voir mes commandes
                </p>
            </a>
            <a href="mode_payements_utilisateur.html" class="home__page-menu-element">
                <i class="bx bxs-credit-card"></i>
                <p class="home__page-menu-element-header">Mes moyens de paiement</p>
                <p class="home__page-menu-element-description">
                    Gérer mes moyens de paiement
                </p>
            </a>
            <a href="amis_utilisateur.html" class="home__page-menu-element">
                <i class="bx bxs-group"></i>
                <p class="home__page-menu-element-header">Mes Amis</p>
                <p class="home__page-menu-element-description">
                    Consulter mes amis
                </p>
            </a>
            <a href="index.php?page=logout" class="home__page-menu-element">
                <i class="bx bxs-log-out"></i>
                <p class="home__page-menu-element-header">Se déconnecter</p>
                <p class="home__page-menu-element-description">
                    Quitter mon compte
                </p>
            </a>
        </div>
    </div>
</main>