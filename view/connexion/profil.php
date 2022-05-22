<!-- Vérifier si l'utilisateur est connecté -->
<div class="container">
    <h1><a href="<?= WEBROOT?>connexion/profil" style="color:grey;"><?= $connexion['titre_profil'] ?></a> </h1>
    <?php
    if(isset($connexion['autre'])) {
        echo "<p>".$connexion['autre']."</p>";
    }
    ?>

    <ul>
      <li style="font-size: 1.2rem">Pseudo : <?= $_SESSION ['utilisateur']['pseudo'] ?></li>
      <li style="font-size: 1.2rem">Adresse : <?= $_SESSION ['utilisateur']['adresse'] ?></li>
      <li style="font-size: 1.2rem">Ville : <?= $_SESSION ['utilisateur']['ville'] ?></li>
      <li style="font-size: 1.2rem">Code postale : <?= $_SESSION ['utilisateur']['CP'] ?></li>
    </ul>

    <a href="<?= WEBROOT?>mescommandes/"><div>Vos dernières commandes : </div></a>

  </body>

</div>