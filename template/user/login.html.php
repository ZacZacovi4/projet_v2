<main>
  <section class="connection__formulaire">
    <div class="login">
      <h1 class="login__title">Connexion</h1>
      <div class="login__description">
        <p class="login__inscription-suggestion">
          Vous n'avez pas encore le compte?
          <a href="index.php?page=register" class="login__link">
            Inscrivez vous !</a>
        </p>
      </div>
      <?php if (isset($error))
        echo "<p>" . hsc($error) . "</p>"; ?>
      <form action="index.php?page=login" method="post" class="login__form">
        <div class="login__form-group">
          <label for="email" class="login__label">Email*</label>
          <input type="email" id="email" name="email" placeholder="Votre email" required class="login__input" />
        </div>
        <div class="login__form-group">
          <label for="password" class="login__label">Mot de passe*</label>
          <input type="password" id="password" name="password" placeholder="Votre mot de passe" required
            class="login__input" />
        </div>
        <button type="submit" class="login__button">Connecter</button>
        <div class="login__forgot-password">
          <a href="#" class="login__link">Mot de passe oublié ?</a>
        </div>
      </form>
    </div>
  </section>
</main>