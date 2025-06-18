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
            <!-- Section de création d'événement -->
            <div class="admin__event-creation">
                <h2 class="admin__event-creation-heading">Créer un nouveau Evénements</h2>
                <button id="open__create-event-form" class="event__creation-btn">Créer</button>


                <div class="event__creation-message-wrapper" id="event__creation-message-wrapper">
                    <h3 class="event__creation-message-success" id="200">L'événement a été cré.</h3>
                    <h3 class="event__creation-message-error" id="500">Une erreur est survenue lors de la création
                        d'événement.</h3>
                </div>

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
                        class="event-creation-overlay-form" method="POST" onsubmit="submitEventCreationForm(event)">

                        <div class="event-creation-form-group">
                            <label for="creation-event-club-selection" class="event_creation-label">Club d'Accueil
                            </label>
                            <select name="club_id" id="creation-event-club-selection" class="event-creation-input">
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
                                class="event-creation-input">
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
                            <input type="datetime-local" id="creation-event-event_date" name="event_date"
                                class="event-creation-input" />
                        </div>

                        <div class="event-creation-form-group"> <label for="creation-event-event_capacity"
                                class="event_creation-label">Capacité
                                d'Evénement</label>
                            <input type="number" id="creation-event-event_capacity" name="event_capacity" min="1"
                                class="event-creation-input" />
                        </div>
                        <div class="event-create-form-button-wrapper">
                            <button type="submit" class="button-submit__create-event-form">Créer</button>
                            <button type="close" class="button-annulation__create-event-form"
                                id="button-annulation__create-event-form">Annuler</button>

                        </div>
                    </form>
                </div>
            </div>
            <!-- Section d'affichage/modification et suppression des événements -->
            <div class="admin__event-listing">
                <h2 class="admin__event-listing-heading">Vos Evénements</h2>

                <div class="event__modification-message-wrapper" id="event__modification-message-wrapper">
                    <h3 class="event__modification-message-success" id="event__modification-message-success">L'événement
                        a été modifié.</h3>
                    <h3 class="event__modification-message-error" id="event__modification-message-error-500">Une erreur
                        est survenue lors de la modification d'événement.</h3>
                    <h3 class="event__deletion-message-success" id="event__deletion-message-success">L'événement
                        a été suprimé.</h3>
                    <h3 class="event__deletion-message-error" id="event__deletion-message-error-500">Une erreur
                        est survenue lors de la suppression d'événement.</h3>

                </div>
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
            <!-- Formulaire overlay de modification d'evenement -->
            <div id="event-modification__form-overlay" class="admin__event-modification-overlay">
                <div class="event-modification-overlay-content">
                    <button id="close__modification-event-form" class="button-close__modification-event-form"
                        aria-label="Fermer le formulaire">
                        &times;
                    </button>
                    <div class="event-modification-form-heading-wrapper">
                        <h2 class="event-modification-form-heading">Modification d'Evénement</h2>
                    </div>

                    <form action="index.php?page=eventManagement" id="event-modification__form"
                        class="event-modification-overlay-form" method="POST"
                        onsubmit="submitEventModificationForm(event)">
                        <input type="hidden" name="event_id" value="">
                        <div class="event-modification-form-group">
                            <label for="modification-event-club-selection" class="event_modification-label">Club
                                d'Accueil
                            </label>
                            <select name="club_id" id="modification-event-club-selection"
                                class="event-modification-input">
                                <?php foreach ($clubs as $club): ?>
                                    <option value="<?= hsc($club['club_id']) ?>"><?= hsc($club['club_name']) ?></option>
                                <?php endforeach; ?>
                            </select>
                        </div>

                        <div class="event-modification-form-group"> <label for="modification-event-event_type-selection"
                                class="event_modification-label">Type
                                d'Evénement</label>
                            <select name="event_type_id" id="modification-event-event_type-selection"
                                class="event-modification-input">
                                <?php foreach ($eventTypes as $eventType): ?>
                                    <option value="<?= hsc($eventType['event_type_id']) ?>">
                                        <?= hsc($eventType['event_type_name']) ?>
                                    </option>
                                <?php endforeach; ?>
                            </select>
                        </div>

                        <div class="event-modification-form-group"> <label for="modification-event-team-selection"
                                class="event_modification-label">Les équipes
                                participants</label>
                            <div id="event-modification__chip-wrapper" class="event-modification__chip-wrapper"></div>
                            <select name="teams_id[]" id="modification-event-team-selection"
                                class="event-modification-input">
                                <option value="" disable>-- Sélection --</option>
                                <?php foreach ($teams as $team): ?>
                                    <option value="<?= hsc($team['team_id']) ?>"><?= hsc($team['team_name']) ?></option>
                                <?php endforeach; ?>
                            </select>
                        </div>

                        <div class="event-modification-form-group"> <label for="modification-event-event_date"
                                class="event_modification-label">Date d'Evénement
                            </label>
                            <input type="datetime-local" id="modification-event-event_date" name="event_date"
                                class="event-modification-input" />
                        </div>

                        <div class="event-modification-form-group"> <label for="modification-event-event_capacity"
                                class="event_modification-label">Capacité
                                d'Evénement</label>
                            <input type="number" id="modification-event-event_capacity" name="event_capacity" min="1"
                                class="event-modification-input" />
                        </div>
                        <div class="event-modification-form-button-wrapper">
                            <button type="submit" class="button-submit__modification-event-form">Modifier</button>
                            <button type="close" class="button-annulation__modification-event-form"
                                id="button-annulation__modification-event-form">Annuler</button>

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
                        <input type="hidden" name="event_id" value="">
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