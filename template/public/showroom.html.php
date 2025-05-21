<main>
    <div class="section__sell-wrapper">
        <h1 class="section__sell_title">Les matchs à venir</h1>
    </div>
    <section class="match__section container">
        <?php foreach ($events as $event): ?>
            <div class="match__content">
                <div class="match__image-wrapper">
                    <img src="assets/images/img_section match_1.jpg" alt="" class="match__image" />
                </div>
                <div class="match__description">
                    <div class="match__date">
                        <p class="match__date-and-time"><?= formatData($event['event_date']) ?></p>
                        <h3 class="match__date-header"><?= 'Tournois ' . $event['event_type_name'] ?></h3>
                    </div>
                    <div class="match__location">
                        <p class="match__location-header">Localisation</p>
                        <p class="match__location-club"><?= 'Club ' . $event['club_name'] . ', ' . $event['club_address'] ?>
                        </p>
                    </div>
                    <div class="match__team">
                        <p class="match__team-header">Equipes participants</p>
                        <p class="match__team-participants">
                            <?= $event['team_names'] ?>
                        </p>
                    </div>
                    <div class="match__reservation">
                        <p class="match__price">A partir de <span>10€</span></p>
                        <button class="match__reservation-btn">Reserver</button>
                    </div>
                </div>
            </div>
        <?php endforeach; ?>
    </section>
</main>