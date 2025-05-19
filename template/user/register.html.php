<main>
  <section class="inscription__formulaire">
    <div class="inscription">
      <h1 class="inscription__title">Inscription</h1>
      <div class="inscription__description">
        <p class="inscription__message">
          Veillez remplir le formulaire d'inscription
        </p>
      </div>
      <form action="#" method="post" class="login__form">
        <div class="inscription__form-group">
          <div class="inscription__form-group-wrapper">
            <div class="inscription__form-group-name">
              <label for="first_name" class="inscription__label">Nom*</label>
              <input type="text" id="first_name" name="first_name" placeholder="Votre nom" required
                class="inscription__input" />
            </div>
            <div class="inscription__form-group-name">
              <label for="last_name" class="inscription__label">Prenom*</label>
              <input type="text" id="last_name" name="last_name" placeholder="Votre prenom" required
                class="inscription__input" />
            </div>
          </div>
        </div>
        <div class="inscription__form-group">
          <label for="email" class="inscription__label">Email*</label>
          <input type="email" id="email" name="email" placeholder="Votre email" required class="inscription__input" />
        </div>
        <div class="inscription__form-group">
          <label for="password" class="inscription__label">Mot de passe*</label>
          <input type="password" id="password" name="password" placeholder="Votre mot de passe" required
            class="inscription__input" />
        </div>
        <div class="inscription__form-group">
          <label for="confirmation_password" class="inscription__label">Confirmer votre mot de passe*</label>
          <input type="password" id="confirmation_password" name="confirmation_password"
            placeholder="Confirmez votre mot de passe" required class="inscription__input" />
        </div>
        <div class="inscription__user-terms">
          <input type="checkbox" id="user-terms" name="user-terms" required class="inscription__checkbox" />
          <a href="#" class="inscription__user-terms-message">
            Veuillez accepter les conditions de vente et la politique de
            confidentialité.
          </a>
        </div>
        <div class="inscription__buttons">
          <a href="connexion.html" class="inscription__button-cancel">
            Abandonner</a>
          <button type="submit" class="inscription__btn-validation">
            Confirmer
          </button>
        </div>
      </form>
    </div>
  </section>
</main>