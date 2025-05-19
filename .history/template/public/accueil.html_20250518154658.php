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

        <!-- Bouton pour accéder à l'espace de connexion -->
        <a href="connexion.html" class="navbar__connexion-button">Connexion
        </a>
      </div>
    </nav>
  </header>

  <div class="carousel">
    <button class="btn__carousel" id="prev">&#10096;</button>
    <button class="btn__carousel" id="next">&#10097;</button>
    <ul>
      <li class="slide__carousel">
        <img class="slide__carousel-image" src="assets/images/img_carousel_1.webp" alt="" />
      </li>
      <li class="slide__carousel active">
        <img class="slide__carousel-image" src="assets/images/img_carousel_5.jpg" alt="" />
      </li>
      <li class="slide__carousel">
        <img class="slide__carousel-image" src="assets/images/img_carousel_6.avif" alt="" />
      </li>
    </ul>
  </div>

  <main>
    <section class="match__section container">
      <div class="match__content">
        <div class="match__image-wrapper">
          <img src="assets/images/img_section match_1.jpg" alt="" class="match__image" />
        </div>
        <div class="match__description">
          <div class="match__date">
            <p class="match__date-and-time">Dimanche 13 Avril 2025 à 15h00</p>
            <h3 class="match__date-header">Tournois P1000</h3>
          </div>
          <div class="match__location">
            <p class="match__location-header">Localisation</p>
            <p class="match__location-club">5 Padel club, Nancy</p>
          </div>
          <div class="match__team">
            <p class="match__team-header">Equipes participants</p>
            <p class="match__team-participants">
              Les Trois Feuilles, Les Démons, Les Bomboclatz Réactives
            </p>
          </div>
          <div class="match__reservation">
            <p class="match__price">A partir de <span>10€</span></p>
            <button class="match__reservation-btn">Reserver</button>
          </div>
        </div>
      </div>
      <div class="match__content">
        <div class="match__image-wrapper">
          <img src="assets/images/img_section match_1.jpg" alt="" class="match__image" />
        </div>
        <div class="match__description">
          <div class="match__date">
            <p class="match__date-and-time">Dimanche 13 Avril 2025 à 15h00</p>
            <h3 class="match__date-header">Tournois P1000</h3>
          </div>
          <div class="match__location">
            <p class="match__location-header">Localisation</p>
            <p class="match__location-club">5 Padel club, Nancy</p>
          </div>
          <div class="match__team">
            <p class="match__team-header">Equipes participants</p>
            <p class="match__team-participants">
              Les Trois Feuilles, Les Démons, Les Bomboclatz Réactives
            </p>
          </div>
          <div class="match__reservation">
            <p class="match__price">A partir de <span>10€</span></p>
            <button class="match__reservation-btn">Reserver</button>
          </div>
        </div>
      </div>
      <div class="match__content">
        <div class="match__image-wrapper">
          <img src="assets/images/img_section match_1.jpg" alt="" class="match__image" />
        </div>
        <div class="match__description">
          <div class="match__date">
            <p class="match__date-and-time">Dimanche 13 Avril 2025 à 15h00</p>
            <h3 class="match__date-header">Tournois P1000</h3>
          </div>
          <div class="match__location">
            <p class="match__location-header">Localisation</p>
            <p class="match__location-club">5 Padel club, Nancy</p>
          </div>
          <div class="match__team">
            <p class="match__team-header">Equipes participants</p>
            <p class="match__team-participants">
              Les Trois Feuilles, Les Démons, Les Bomboclatz Réactives
            </p>
          </div>
          <div class="match__reservation">
            <p class="match__price">A partir de <span>10€</span></p>
            <button class="match__reservation-btn">Reserver</button>
          </div>
        </div>
      </div>
    </section>
  </main>

  <!-- Pied de page -->
  <footer class="footer">
    <div class="footer__content container">
      <!-- Logo pied de page -->
      <div class="footer__brand">
        <a href="accueil.html">Logo</a>
      </div>

      <!-- Icônes des réseaux sociaux -->
      <div class="footer__socials">
        <i class="fa-brands fa-facebook"></i>
        <i class="fa-brands fa-x-twitter"></i>
        <i class="fa-brands fa-instagram"></i>
        <i class="fa-brands fa-youtube"></i>
        <i class="fa-brands fa-linkedin"></i>
      </div>

      <!-- Liens du pied de page -->
      <div class="footer__links-list">
        <ul class="footer__menu">
          <li class="footer__item">
            <a class="footer__link" href="#ref1">Contactez nous</a>
          </li>
          <li class="footer__item">
            <a class="footer__link" href="#ref2">Mentions légales</a>
          </li>
          <li class="footer__item">
            <a class="footer__link" href="#ref3">Conditions générales et règlements</a>
          </li>
          <li class="footer__item">
            <a class="footer__link" href="#ref4">Politique de confidentialité</a>
          </li>
        </ul>
      </div>
    </div>
  </footer>

  <script src="js/script.js"></script>
</body>

</html>