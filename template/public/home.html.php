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
    <?php foreach ($events as $event): ?>
      <div class="match__content">
        <div class="match__image-wrapper">
          <img src="assets/images/img_section match_1.jpg" alt="" class="match__image" />
        </div>
        <div class="match__description">
          <div class="match__date">
            <p class="match__date-and-time"><?= formatData(hsc($event['event_date'])) ?></p>
            <h3 class="match__date-header"><?= 'Tournois ' . hsc($event['event_type_name']) ?></h3>
          </div>
          <div class="match__location">
            <p class="match__location-header">Localisation</p>
            <p class="match__location-club"><?= 'Club ' . hsc($event['club_name']) . ', ' . hsc($event['club_address']) ?>
            </p>
          </div>
          <div class="match__team">
            <p class="match__team-header">Equipes participants</p>
            <p class="match__team-participants">
              <?= hsc($event['team_names']) ?>
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