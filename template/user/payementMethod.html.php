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
                    <a href="index.php?page=userProfile" class="menu__list-element-ref">
                        <i class="bx bxs-user"></i>
                        <span class="sidebar__nav-item">Mon&nbspProfil</span>
                    </a>
                </li>
                <li class="sidebar__menu-element">
                    <a href="index.php?page=reservation" class="menu__list-element-ref">
                        <i class="bx bxs-calendar"></i>
                        <span class="sidebar__nav-item">Mes&nbspRéservation</span>
                    </a>
                </li>
                <li class="sidebar__menu-element">
                    <a href="index.php?page=order" class="menu__list-element-ref">
                        <i class="bx bxs-cart"></i>
                        <span class="sidebar__nav-item">Mes&nbspcommandes</span>
                    </a>
                </li>
                <li class="sidebar__menu-element">
                    <a href="index.php?page=payementMethod" class="menu__list-element-ref user__icone-active">
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
                <h1 class="user__content-heading">Mes Moyens de paiement</h1>
            </div>
            <div class="user__payement-information">
                <div class="payement__card-saved">
                    <div class="payement__card-saved-header-wrapper">
                        <h2 class="payement__card-saved-header">
                            Mes cartes enregistrées
                        </h2>
                    </div>
                    <div class="payement__card-saved-element">
                        <div class="payement__card-saved-logo-wrapper">
                            <img src="assets/images/cartes_bancaires_logo/image_carte-bancaire_mastercard.png" alt=""
                                class="payement__card-saved-logo" />
                        </div>
                        <div class="payement__card-saved-information">
                            <p class="payement__card-saved-number">
                                ****&nbsp****&nbsp****&nbsp6666
                            </p>
                            <p class="payement__card-saved-expdate">11/29</p>
                        </div>
                        <div class="payement__card-saved-delete">
                            <button class="payement__card-saved-delete-btn">
                                Suprimer
                            </button>
                        </div>
                    </div>
                    <div class="payement__card-saved-element">
                        <div class="payement__card-saved-logo-wrapper">
                            <img src="assets/images/cartes_bancaires_logo/image_carte-bancaire_visa.webp" alt=""
                                class="payement__card-saved-logo" />
                        </div>
                        <div class="payement__card-saved-information">
                            <p class="payement__card-saved-number">
                                ****&nbsp****&nbsp****&nbsp6666
                            </p>
                            <p class="payement__card-saved-expdate">11/29</p>
                        </div>
                        <div class="payement__card-saved-delete">
                            <button class="payement__card-saved-delete-btn">
                                Suprimer
                            </button>
                        </div>
                    </div>
                    <div class="payement__card-saved-element">
                        <div class="payement__card-saved-logo-wrapper">
                            <img src="assets/images/cartes_bancaires_logo/image_carte-bancaire_mastercard.png" alt=""
                                class="payement__card-saved-logo" />
                        </div>
                        <div class="payement__card-saved-information">
                            <p class="payement__card-saved-number">
                                ****&nbsp****&nbsp****&nbsp6666
                            </p>
                            <p class="payement__card-saved-expdate">11/29</p>
                        </div>
                        <div class="payement__card-saved-delete">
                            <button class="payement__card-saved-delete-btn">
                                Suprimer
                            </button>
                        </div>
                    </div>
                </div>
                <div class="payement__card-new">
                    <div class="payement__card-new-header-wrapper">
                        <h2 class="payement__card-new-header">
                            Rajouter une nouvelle carte
                        </h2>
                    </div>
                    <div class="payement__card-new-logo-wrapper">
                        <img src="assets/images/cartes_bancaires_logo/image_carte-bancaire_CB.png" alt=""
                            class="payement__card-new-logo" />
                        <img src="assets/images/cartes_bancaires_logo/image_carte-bancaire_visa.webp" alt=""
                            class="payement__card-new-logo" />
                        <img src="assets/images/cartes_bancaires_logo/image_carte-bancaire_mastercard.png" alt=""
                            class="payement__card-new-logo" />
                    </div>
                    <div class="payement__card-new-form-wrapper">
                        <form action="#" method="post" class="payement__card-new-form">
                            <div class="card__new-form-group">
                                <label for="payement__card-number" class="payement__card-label">Numéro de carte
                                    :</label>
                                <input type="text" id="payement__card-number" name="payement__card-number"
                                    placeholder="1234-5678-9012-3456" autocomplete="cc-number" inputmode="numeric"
                                    maxlength="19" required class="payement__card-input" />
                            </div>
                            <div class="card__new-form-group">
                                <label for="payement__card-expiry-date" class="payement__card-label">Date d'expiration
                                    :</label>
                                <input type="text" id="payement__card-expiry-date" name="payement__card-expiry-date"
                                    placeholder="MM/AA" autocomplete="cc-exp" inputmode="numeric" maxlength="5" required
                                    class="payement__card-input" />
                            </div>
                            <div class="card__new-form-group">
                                <label for="payement__card-cvc" class="payement__card-label">CVC :</label>
                                <input type="text" id="payement__card-cvc" name="payement__card-cvc" placeholder="123"
                                    autocomplete="cc-csc" inputmode="numeric" maxlength="4" required
                                    class="payement__card-input" />
                            </div>
                            <button type="submit" class="card__new-form-submit-btn">
                                Enregistrer
                            </button>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
</main>