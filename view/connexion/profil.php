<!-- Vérifier si l'utilisateur est connecté -->
<div>
    <h1><a href="<?= WEBROOT?>connexion/profil" style="color:grey;"><?= $connexion['titre_profil'] ?></a> </h1>
    <?php
    if(isset($connexion['autre'])) {
        echo "<p>".$connexion['autre']."</p>";
    }
    ?>

    <h2>Voici le profil de <?= $_SESSION['utilisateur']['pseudo']; ?></h2>
    <div>Quelques informations sur vous : </div>
    <ul>
      <li>Votre adresse est : <?= $_SESSION ['utilisateur']['adresse'] ?></li>
      <li>Votre code postale est : <?= $_SESSION ['utilisateur']['CP'] ?></li>
      <li>Votre ville est : <?= $_SESSION ['utilisateur']['ville'] ?></li>
    </ul>
  </body>

</div>