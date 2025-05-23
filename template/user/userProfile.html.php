<main>
    <!-- Sidebar -->
    <div class="user__sidebar">
        <div class="user__sidebar-top">
            <div class="user__sidebar-logo">
                <i class="bx bx-tennis-ball"></i>
                <span>MNS&nbspPadel&nbspClub</span>
            </div>
            <i class="bx bx-menu" id="sidebar__btn"></i>
        </div>
        <div class="user__sidebar-user">
            <img src="assets/images/photo_player_1.avif" alt="profile-img" class="sidebar__user-img" />
            <div class="sidebar__user-info">
                <p class="sidebar__user-name">User</p>
                <p class="sidebar__user-function">Admin</p>
            </div>
        </div>
        <div class="sidebar__user-menu">
            <ul class="sidebar__user-menu-list">
                <li class="sidebar__menu-element">
                    <a href="index.php?page=menu" class="menu__list-element-ref">
                        <i class="bx bxs-widget"></i>
                        <span class="sidebar__nav-item">Mon&nbspEspace</span>
                    </a>
                </li>
                <li class="sidebar__menu-element">
                    <a href="index.php?page=userProfile" class="menu__list-element-ref user__icone-active">
                        <i class="bx bxs-user"></i>
                        <span class="sidebar__nav-item">Mon&nbspProfil</span>
                    </a>
                </li>
                <li class="sidebar__menu-element">
                    <a href="index.php?page=reservation" class="menu__list-element-ref">
                        <i class="bx bxs-calendar"></i>
                        <span class="sidebar__nav-item">Mes&nbspRéservations</span>
                    </a>
                </li>
                <li class="sidebar__menu-element">
                    <a href="index.php?page=order" class="menu__list-element-ref">
                        <i class="bx bxs-cart"></i>
                        <span class="sidebar__nav-item">Mes&nbspcommandes</span>
                    </a>
                </li>
                <li class="sidebar__menu-element">
                    <a href="index.php?page=payementMethod" class="menu__list-element-ref">
                        <i class="bx bxs-credit-card"></i>
                        <span class="sidebar__nav-item">Moyens&nbspde&nbsppaiment</span>
                    </a>
                </li>
                <li class="sidebar__menu-element">
                    <a href="index.php?page=friend" class="menu__list-element-ref">
                        <i class="bx bxs-group"></i>
                        <span class="sidebar__nav-item">Mes&nbspamis</span>
                    </a>
                </li>
                <li class="sidebar__menu-element">
                    <a href="index.php?page=logout" class="menu__list-element-ref">
                        <i class="bx bxs-log-out"></i>
                        <span class="sidebar__nav-item">Se&nbspdéconnecter</span>
                    </a>
                </li>
            </ul>
        </div>
    </div>

    <!-- Main page content -->
    <div class="user__main-content">
        <div class="container__user-page">
            <div class="user__content-header-wrapper">
                <h1 class="user__content-heading">Mon Profil</h1>
            </div>
            <div class="user__profile-information">
                <div class="profile__information-element">
                    <h3 class="profile__information-element-heading">Nom :</h3>
                    <div class="profile__information-element-content">
                        <p class="profile__information-element-surname">Nom</p>
                    </div>
                </div>
                <div class="profile__information-element">
                    <h3 class="profile__information-element-heading">Prénom :</h3>
                    <div class="profile__information-element-content">
                        <p class="profile__information-element-name">Prénom</p>
                    </div>
                </div>
                <div class="profile__information-element">
                    <h3 class="profile__information-element-heading">E-mail :</h3>
                    <div class="profile__information-element-content">
                        <p class="profile__information-element-email">
                            email@email.com
                        </p>
                    </div>
                </div>
                <div class="profile__bouton-wrapper">
                    <a href="#" class="profile__btn-modification">Modifier</a>
                </div>
            </div>
        </div>
    </div>
</main>