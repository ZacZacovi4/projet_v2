<main>
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
                        <span class="sidebar__nav-item">Espace&nbsputilisateur</span>
                    </a>
                </li>
                <li class="sidebar__menu-element">
                    <a href="index.php?page=eventManagement" class="menu__list-element-ref user__icone-active">
                        <i class="bx bxs-user"></i>
                        <span class="sidebar__nav-item">Evénements</span>
                    </a>
                </li>
                <li class="sidebar__menu-element">
                    <a href="index.php?page=reservationManagement" class="menu__list-element-ref">
                        <i class="bx bxs-calendar"></i>
                        <span class="sidebar__nav-item">Réservations</span>
                    </a>
                </li>
                <li class="sidebar__menu-element">
                    <a href="index.php?page=ctpManagement" class="menu__list-element-ref">
                        <i class="bx bxs-cart"></i>
                        <span class="sidebar__nav-item">Club/Equipe/Joueurs</span>
                    </a>
                </li>
                <li class="sidebar__menu-element">
                    <a href="index.php?page=userManagement" class="menu__list-element-ref">
                        <i class="bx bxs-group"></i>
                        <span class="sidebar__nav-item">Utilisateurs</span>
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
            <div class="admin__content-header-wrapper">
                <h1 class="admin__content-heading">Mes Evénements</h1>
            </div>
            <div class="admin__event-creation">
                <h2 class="admin__event-creation-heading">Créer un nouveau Evénements</h2>
                <button id="open__create-event-form" class="event__creation-btn">Créer</button>
            </div>
            <!-- Formulaire overlay de creation d'evenement -->
            <div id="event-create__form-overlay" class="admin__event-creation-overlay">
                <div class="event-creation-overlay-content">
                    <button id="close__create-event-form" class="button-close__create-event-form"
                        aria-label="Fermer le formulaire">
                        &times;
                    </button>
                    <div class="event-creation-form-heading-wrapper">
                        <h2 class="event-creation-form-heading">Création d'Evénement</h2>
                    </div>

                    <form action="index.php?page=eventManagement" id="event-create__form"
                        class="event-creation-overlay-form" method="POST">

                        <div class="event-creation-form-group">
                            <label for="creation-event-club-selection" class="event_creation-label">Club d'Accueil
                            </label>
                            <select name="club_id" id="creation-event-club-selection" class="event-creation-input"
                                required>
                                <option value="" disable selected>-- Sélection --</option>
                                <?php foreach ($clubs as $club): ?>
                                    <option value="<?= hsc($club['club_id']) ?>"><?= hsc($club['club_name']) ?></option>
                                <?php endforeach; ?>
                            </select>
                        </div>

                        <div class="event-creation-form-group"> <label for="creation-event-event_type-selection"
                                class="event_creation-label">Type
                                d'Evénement</label>
                            <select name="event_type_id" id="creation-event-event_type-selection"
                                class="event-creation-input" required>
                                <option value="" disable selected>-- Sélection --</option>
                                <?php foreach ($eventTypes as $eventType): ?>
                                    <option value="<?= hsc($eventType['event_type_id']) ?>">
                                        <?= hsc($eventType['event_type_name']) ?>
                                    </option>
                                <?php endforeach; ?>
                            </select>
                        </div>

                        <div class="event-creation-form-group"> <label for="creation-event-team-selection"
                                class="event_creation-label">Les équipes
                                participants</label>
                            <div id="event-creation__chip-wrapper" class="event-creation__chip-wrapper"></div>
                            <select name="teams_id[]" id="creation-event-team-selection" class="event-creation-input">
                                <option value="" disable>-- Sélection --</option>
                                <?php foreach ($teams as $team): ?>
                                    <option value="<?= hsc($team['team_id']) ?>"><?= hsc($team['team_name']) ?></option>
                                <?php endforeach; ?>
                            </select>
                        </div>

                        <div class="event-creation-form-group"> <label for="creation-event-event_date"
                                class="event_creation-label">Date d'Evénement
                            </label>
                            <input type="datetime-local" id="creation-event-event_date" name="event_date" required
                                class="event-creation-input" />
                        </div>

                        <div class="event-creation-form-group"> <label for="creation-event-event_capacity"
                                class="event_creation-label">Capacité
                                d'Evénement</label>
                            <input type="number" id="creation-event-event_capacity" name="event_capacity" required
                                min="1" class="event-creation-input" />
                        </div>
                        <div class="event-create-form-button-wrapper">
                            <button type="close" class="button-annulation__create-event-form">Annuler</button>
                            <button type="submit" class="button-submit__create-event-form">Créer</button>
                        </div>
                    </form>
                </div>
            </div>
            <div class="admin__event-listing">
                <h2 class="admin__event-listing-heading">Vos Evénements</h2>

            </div>
        </div>
    </div>
</main>