<div class="container">
  <h1><?= $connexion['titre'] ?></h1>

  <!-- Connexion -->


  <form action="<?= WEBROOT ?>connexion" class="tm-contact-form" method="POST">
    <div class="form-group">
      <input type="text" id="connexion_pseudo" name="connexion_pseudo" class="form-control" placeholder="Pseudo" required />
    </div>
    <div class="form-group">
      <input type="password" id="connexion_mdp" name="connexion_mdp" class="form-control" placeholder="Mot de passe" required />
    </div>
    <div class="tm-text-right">
      <button type="submit" class="btn tm-btn tm-btn-big">
        Se connecter
      </button>
    </div>
  </form>
  <div class="tm-text-right">
      <a class="nav-link" href="<?= WEBROOT?>connexion/inscription" >S'inscrire</a>
    </div>
</div>