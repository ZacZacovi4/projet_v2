<!DOCTYPE html>
<html lang="fr">

<head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <link rel="stylesheet" href="css/style.css" />
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.7.2/css/all.min.css" />
    <title>Accueil</title>
</head>

<body>
    <header>
        <!-- Barre de navigation principale -->
        <nav class="navbar">
            <div class="navbar__container container">
                <!-- Bouton menu hamburger (affiché sur mobile) -->
                <button type="button" class="navbar__toggler" aria-label="bouton de navigation" aria-expanded="false">
                    <!-- Icône hamburger composée de 3 rectangles -->
                    <svg class="hamburger__icon" width="32" height="27" viewBox="0 0 32 27">
                        <rect class="hamburger__bar--top" x="4" y="4" width="24" height="3" />
                        <rect class="hamburger__bar--middle" x="4" y="12" width="24" height="3" />
                        <rect class="hamburger__bar--bottom" x="4" y="20" width="24" height="3" />
                    </svg>
                </button>
                <!-- Nom du site ou logo cliquable -->
                <div class="navbar__brand">
                    <a href="accueil.html">Logo</a>
                </div>
                <!-- Menu principal avec ancres vers les sections -->
                <ul class="navbar__menu">
                    <li class="navbar__item">
                        <a class="navbar__link" href="accueil.html">Accueil</a>
                    </li>
                    <li class="navbar__item">
                        <a class="navbar__link" href="apropos.html">Club</a>
                    </li>
                    <li class="navbar__item">
                        <a class="navbar__link" href="espace_vente.html">Espace vente</a>
                    </li>
                    <li class="navbar__item">
                        <a class="navbar__link" href="#ref4">Contactez nous</a>
                    </li>
                </ul>
                <?php if (isLoggedIn()) { ?>
                    <!-- Bouton pour accéder à l'espace de connexion -->
                    <a href="accueil_utilisateur.html" class="navbar__user-home-button">
                        <img src="assets/images/photo_player_1.avif" alt="" class="navbar__user-home-img" />
                        <p>Mon Compte</p>
                    </a>
                <?php } else { ?>
                    <a href="connexion.html" class="navbar__connexion-button">Connexion
                    </a>
                <?php } ?>
            </div>
        </nav>
    </header>