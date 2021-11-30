<div>
  <h1><?= $connexion['titre'] ?></h1>
  <?php
  if (isset($connexion['autre'])) {
    echo "<p>" . $connexion['autre'] . "</p>";
  }
  ?>
  <!-- Inscription -->
  <form action="<?= WEBROOT ?>connexion/inscription" class="tm-contact-form" method="POST">
    <div class="form-group">
      <input type="text" id="inscription_pseudo" name="inscription_pseudo" class="form-control" placeholder="Pseudo" required />
    </div>
    <div class="form-group">
      <input type="email" id="inscription_email" name="inscription_email" class="form-control" placeholder="Email" required />
    </div>
    <div class="form-group">
      <input type="password" id="inscription_mdp" name="inscription_mdp" class="form-control" placeholder="mot de passe" required />
    </div>
    <div class="tm-text-right">
      <button type="submit" class="btn tm-btn tm-btn-big">
        S'incrire
      </button>
    </div>
  </form>
</div>