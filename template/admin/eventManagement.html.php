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
                <h1 class="admin__content-heading">Gestion des Evénements</h1>
            </div>
            <?php if ($message || $error): ?>
                <div class="event__message-wrapper" id="event__message-wrapper">
                    <?php if ($message): ?>
                        <h3 class="event__message-success" id="event__message-success"><?= hsc($message) ?></h3>
                    <?php
                    endif; ?>
                    <?php if ($error): ?>
                        <h3 class="event__message-error" id="event__message-error"><?= hsc($error) ?></h3>
                    <?php
                    endif; ?>
                </div>
            <?php endif; ?>
            <!-- Section de création d'événement -->
            <div class="admin__event-creation">
                <h2 class="admin__event-creation-heading">Créer un nouveau Evénements</h2>
                <button id="open__create-event-form" class="event__creation-btn">Créer</button>
            </div>
            <!-- Section d'affichage/modification et suppression des événements -->
            <div class="admin__event-listing">
                <h2 class="admin__event-listing-heading">Vos Evénements</h2>

                <!-- Creation de tableau d'événements -->
                <div class="admin_event-table-wrapper">
                    <table class="admin_event-table">
                        <tr class="admin_event-table-headers">
                            <th class="admin_event-table-header">Date</th>
                            <th class="admin_event-table-header">Club</th>
                            <th class="admin_event-table-header">Type</th>
                            <th class="admin_event-table-header">Capacité</th>
                            <th class="admin_event-table-header">Places restantes</th>
                            <th class="admin_event-table-header">Equipes</th>
                            <th class="admin_event-table-header">Créateur</th>
                            <?php foreach ($events as $event): ?>
                        <tr class="admin_event-table-fields" data-id="<?= $event['event_id']; ?>"
                            data-date="<?= $event['event_date']; ?>" data-club-id="<?= $event['club_id']; ?>"
                            data-club-name="<?= $event['club_name']; ?>" data-type-id="<?= $event['event_type_id']; ?>"
                            data-type-name="<?= $event['event_type_name']; ?>"
                            data-capacity="<?= $event['event_capacity']; ?>" data-teams-id="<?= $event['team_ids']; ?>"
                            data-teams-name="<?= $event['team_names']; ?>">

                            <td class="admin_event-table-field"><?= $event["event_date"]; ?></td>
                            <td class="admin_event-table-field"><?= $event["club_name"]; ?></td>
                            <td class="admin_event-table-field"><?= $event["event_type_name"]; ?></td>
                            <td class="admin_event-table-field"><?= $event["event_capacity"]; ?></td>
                            <td class="admin_event-table-field"><?= "28"; ?></td>
                            <td class="admin_event-table-field"><?= $event["team_names"]; ?></td>
                            <td class="admin_event-table-field"><?= $event["user_first_name"]; ?></td>
                            <td class="admin_event-table-field"><a href="#" class="admin_event-table-field-modifier"
                                    id="admin_event-table-field-modifier">&#9998;</a>
                            </td>
                            <td class="admin_event-table-field"><a href="#" class="admin_event-table-field-deleter"
                                    id="admin_event-table-field-deleter">&times;</a>
                            </td>

                        </tr>
                    <?php endforeach ?>
                    </table>
                </div>
            </div>
            <!-- Formulaire overlay d'evenement -->
            <div id="event__form-overlay" class="admin__event-form-overlay">
                <div class="event__form-overlay-content">
                    <button id="close__event-form" class="button-close__event-form" aria-label="Fermer le formulaire">
                        &times;
                    </button>
                    <div class="event__form-heading-wrapper">
                        <h2 class="event__form-heading">Gestion d'Evénement</h2>
                    </div>

                    <form id="event__form" class="event__overlay-form" onsubmit="submitEventForm(event)">
                        <input class="CSRF_token" type="hidden" name="token" value="<?= $csrfToken ?? '' ?>">
                        <input class="event_id" type="hidden" name="event_id" value="">
                        <div class="event__form-group">
                            <label for="event__club-selection" class="event__form-label">Club
                                d'Accueil
                            </label>
                            <select name="club_id" id="event__club-selection" class="event__form-input">
                                <?php foreach ($clubs as $club): ?>
                                    <option value="<?= hsc($club['club_id']) ?>"><?= hsc($club['club_name']) ?></option>
                                <?php endforeach; ?>
                            </select>
                        </div>

                        <div class="event__form-group"> <label for="event__type-selection"
                                class="event__form-label">Type
                                d'Evénement</label>
                            <select name="event_type_id" id="event__type-selection" class="event__form-input">
                                <?php foreach ($eventTypes as $eventType): ?>
                                    <option value="<?= hsc($eventType['event_type_id']) ?>">
                                        <?= hsc($eventType['event_type_name']) ?>
                                    </option>
                                <?php endforeach; ?>
                            </select>
                        </div>

                        <div class="event__form-group"> <label for="event__team-selection" class="event__form-label">Les
                                équipes
                                participants</label>
                            <div id="event__chip-wrapper" class="event__chip-wrapper"></div>
                            <select name="teams_id[]" id="event__team-selection" class="event__form-input">
                                <option value="" disable>-- Sélection --</option>
                                <?php foreach ($teams as $team): ?>
                                    <option value="<?= hsc($team['team_id']) ?>"><?= hsc($team['team_name']) ?></option>
                                <?php endforeach; ?>
                            </select>
                        </div>

                        <div class="event__form-group"> <label for="event__date" class="event__form-label">Date
                                d'Evénement
                            </label>
                            <input type="datetime-local" id="event__date" name="event_date" class="event__form-input" />
                        </div>

                        <div class="event__form-group"> <label for="event__capacity" class="event__form-label">Capacité
                                d'Evénement</label>
                            <input type="number" id="event__capacity" name="event_capacity" min="1"
                                class="event__form-input" />
                        </div>
                        <div class="event__form-button-wrapper">
                            <button type="submit" class="button__submit-event-form">Valider</button>
                            <button type="close" class="button__annulation-event-form"
                                id="button__annulation-event-form">Annuler</button>

                        </div>
                    </form>
                </div>
            </div>
            <!-- Formulaire overlay de suppression d'evenement -->
            <div id="event-deletion__form-overlay" class="admin__event-deletion-overlay">
                <div class="event-deletion-overlay-content">
                    <div class="event-deletion-form-heading-wrapper">
                        <h2 class="event-deletion-form-heading">Confirmez la suppression d'événement</h2>
                    </div>
                    <form action="index.php?page=eventManagement" id="event-deletion__form"
                        class="event-deletion-overlay-form" method="POST" onsubmit="submitEventDeletionForm(event)">
                        <input class="CSRF_token" type="hidden" name="token" value="<?= $csrfToken ?? '' ?>">
                        <input class="event_id" type="hidden" name="event_id" value="">
                        <div class="event-deletion-form-button-wrapper">
                            <button type="submit" class="button-submit__deletion-event-form">Valider</button>
                            <button type="close" class="button-annulation__deletion-event-form"
                                id="button-annulation__deletion-event-form">Annuler</button>

                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</main>