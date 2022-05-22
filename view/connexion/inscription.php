<div class="container">
  <h1><?= $connexion['titre'] ?></h1>
  <?php
  if (isset($connexion['autre'])) {
    echo "<p>" . $connexion['autre'] . "</p>";
  }
  ?>
  <!-- Inscription -->
        
  <form action="<?= WEBROOT ?>connexion/inscription" class="tm-contact-form" method="POST">
    <div class="form-group">
      <input type="text" id="pseudo" name="pseudo" class="form-control" placeholder="Pseudo" required />
    </div>
    <div class="form-group">
      <input type="password" id="motdepasse" name="motdepasse" class="form-control" placeholder="mot de passe" required />
    </div>
    <div class="form-group">
      <input type="email" id="email" name="email" class="form-control" placeholder="Email" required />
    </div>
    <div class="form-group">
      <input type="text" id="adresse" name="adresse" class="form-control" placeholder="Adresse" required />
    </div>
    <div class="form-group">
      <input type="text" id="CP" name="CP" class="form-control" placeholder="Code Postal" required />
    </div>
    <div class="form-group">
      <input type="text" id="ville" name="ville" class="form-control" placeholder="Ville" required />
    </div>
    <input type="submit" value="envoyer" name="envoyer"/> 
  </form>
</div>
<?php 