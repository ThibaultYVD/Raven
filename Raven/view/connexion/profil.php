<!-- Vérifier si l'utilisateur est connecté -->
<div>
    <h1><a href="<?= WEBROOT?>connexion/profil" style="color:grey;"><?= $connexion['titre_profil'] ?></a> | <a href="<?= WEBROOT?>connexion/commandes" style="color:grey;"><?= $connexion['titre_commande'] ?></a></h1>
    <?php
    if(isset($connexion['autre'])) {
        echo "<p>".$connexion['autre']."</p>";
    }
    ?>
    <form action="<?= WEBROOT?>connexion/modification" class="tm-contact-form" method="POST">
              <div class="form-group">
              <input
                  type="text"
                  id="modification_pseudo"
                  name="modification_pseudo"
                  class="form-control"
                  value="<?= $_SESSION['utilisateur']['pseudo'] ?>"
                  readonly
                  required
                />
</div>
<div class="form-group">
                <input
                  type="text"
                  id="modification_name"
                  name="modification_name"
                  class="form-control"
                  value="<?= $_SESSION['utilisateur']['nom'] ?>"
                  required
                />
              </div>
              <div class="form-group">
                <input
                  type="text"
                  id="modification_firstname"
                  name="modification_firstname"
                  class="form-control"
                  value="<?= $_SESSION['utilisateur']['prenom'] ?>"
                  required
                />                
              </div>
              <div class="form-group">
                <input
                  type="text"
                  id="modification_address"
                  name="modification_address"
                  class="form-control"
                  value="<?= $_SESSION['utilisateur']['rue'] ?>"
                  required
                />                
              </div>
              <div class="form-group">
                <input
                  type="text"
                  id="modification_cp"
                  name="modification_cp"
                  class="form-control"
                  value="<?= $_SESSION['utilisateur']['cp'] ?>"
                  required
                />                
              </div>
              <div class="form-group">
                <input
                  type="text"
                  id="modification_city"
                  name="modification_city"
                  class="form-control"
                  value="<?= $_SESSION['utilisateur']['ville'] ?>"
                  required
                />                
              </div>
              <div class="form-group">
                <input
                  type="email"
                  id="modification_email"
                  name="modification_email"
                  class="form-control"
                  value="<?= $_SESSION['utilisateur']['email'] ?>"
                  required
                />  
</div>           
              <div class="tm-text-right">
                <button type="submit" class="btn tm-btn tm-btn-big">
                  MODIFIER
                </button>
              </div>
            </form>
</div>