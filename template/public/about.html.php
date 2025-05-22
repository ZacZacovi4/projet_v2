<main>
    <div class="club__carousel-title">
        <h1>MNS Padel Club</h1>
    </div>
    <section class="club__carousel container">
        <div class="apropos__carousel">
            <button class="btn__carousel" id="prev">&#10096;</button>
            <button class="btn__carousel" id="next">&#10097;</button>
            <ul>
                <li class="slide__carousel">
                    <img class="slide__carousel-image" src="assets/images/paddle_club_carousel_1.jpg" alt="" />
                </li>
                <li class="slide__carousel active">
                    <img class="slide__carousel-image" src="assets/images/img_carousel_6.avif" alt="" />
                </li>
                <li class="slide__carousel">
                    <img class="slide__carousel-image" src="assets/images/paddle_club_carousel_2.jpg" alt="" />
                </li>
            </ul>
        </div>
        <div class="club__carousel-description">
            <p class="club__description-content">
                Lorem ipsum dolor sit amet consectetur adipisicing elit. Soluta ad
                voluptatem deleniti fugit repellat eum veritatis eos quae libero,
                eaque error laboriosam corrupti, atque velit laborum tenetur
                delectus rem! Dignissimos?Lorem ipsum dolor sit amet consectetur
                adipisicing elit. Itaque libero, ex fuga quos provident quo maiores
                ab debitis quis consectetur recusandae laborum unde aliquam quam
                repudiandae voluptatum laboriosam tenetur officia!
            </p>
        </div>
    </section>
    <section class="about__team-list container">
        <div class="about__team-list-title">
            <h2>Les Equipes de Notre Club</h2>
        </div>
        <?php foreach ($recordset as $raw): ?>
            <div class="about__team-item">
                <div class="about__team-item-title">
                    <h3><?= 'Les ' . $raw['team_name'] ?></h3>
                </div>
                <div class="about__team-item-content">
                    <?php foreach ($raw['players'] as $player): ?>
                        <div class="about__team-player">
                            <div class="about__player-photo-wrapper">
                                <img src="assets/images/photo_player_1.avif" alt="" class="about__player-photo" />
                            </div>
                            <div class="about__team-player-info">
                                <div class="about__team-player-name">
                                    <h4><?= $player['player_names'] ?></h4>
                                </div>
                                <div class="about__team-player-bio">
                                    <p>
                                        <?= $player['player_biography'] ?>
                                    </p>
                                </div>
                                <div class="about__team-player-rank">
                                    <p><strong>Classement :</strong> numéro <?= $player['player_rank'] ?> français</p>
                                </div>
                            </div>
                        </div>
                    <?php endforeach; ?>
                </div>
            </div>
        <?php endforeach; ?>
    </section>
</main>