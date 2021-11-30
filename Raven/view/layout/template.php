<!DOCTYPE html>
<html lang="fr">

<head>
  <meta charset="utf-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1,
              shrink-to-fit=no" />
  <meta name="description" content="" />
  <meta name="author" content="" />
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <title>Raven</title>
  <!-- Favicon-->
  <link rel="icon" href="<?= WEBROOT ?>assets/img/favicon.ico" />
  <!-- Bootstrap icons-->
  <link href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.5.0/font/bootstrap-icons.css" rel="stylesheet" />
  <!-- CSS pour Bootsrap en Global -->
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
  <!-- JS Pour Bootsrap en Global -->
  <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script>
  <!-- Bootstrap core JS-->
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.0/dist/js/bootstrap.bundle.min.js"></script>
  <!-- Core theme JS-->
  <script src="<?= WEBROOT ?>js/scripts.js"></script>
  <link href="<?= WEBROOT ?>assets/css/styles.css" rel="stylesheet" />
  <link href="https://fonts.googleapis.com/css?family=Maven+Pro:400,900" rel="stylesheet">
  <script src="//cdnjs.cloudflare.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
  <!------ Include the above in your HEAD tag ---------->

  <link rel="stylesheet" type="text/css" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.1/css/all.min.css">
  <link rel="stylesheet" href="https://pro.fontawesome.com/releases/v5.10.0/css/all.css" integrity="sha384-AYmEC3Yw5cVb3ZcuHtOA93w35dYTsvhLPVnYs9eStHfGJvOvKxVfELGroGkvsg+p" crossorigin="anonymous" />
  
</head>


<body>
  <!-- page header -->
  <header>
    <nav class="navbar navbar-expand-lg navbar-light bg-light">
      <div class="container px-4 px-lg-5">
        <img src="<?= WEBROOT ?>assets/img/logo.png" class="img-responsive" width="50px">
        <a class="navbar-brand" href="#!">Raven</a>
        <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation"><span class="navbar-toggler-icon"></span></button>
        <div class="collapse navbar-collapse" id="navbarSupportedContent">
          <ul class="navbar-nav me-auto mb-2 mb-lg-0 ms-lg-4">

            <li class="nav-item">
              <a class="nav-link" href="<?= WEBROOT ?>accueil">Accueil</a>
            </li>
            <li class="nav-item">
              <a class="nav-link" href="<?= WEBROOT ?>societe">A propos</a>
            </li>
            <!--
            
            <li class="nav-item">
              <a class="nav-link" href="<?= WEBROOT ?>societe">Teams</a>
            </li>
            <li class="nav-item">
              <a class="nav-link" href="#!">Forums</a>
            </li>
            
            <li class="nav-item">
              <a class="nav-link" href="#!">Setup</a>
            </li>
            -->
            <li class="nav-item">
              <a class="nav-link" href="<?= WEBROOT ?>panier">Panier <span id="cart" class="badge red mx-2"></span></a>
            </li>

            <li class="nav-item">
              <?php if (!isset($_SESSION['utilisateur'])) echo '<a class="nav-link" href="' . WEBROOT . 'connexion">Connexion</a>';
              else {
                echo '<a class="nav-link" href="' . WEBROOT . 'connexion/deconnexion">deconnexion</a><li class="nav-item">';
                echo '<a class="nav-link" href="' . WEBROOT . 'connexion">profil</a>';
              }
              ?></a>
            </li>
            <li class="nav-item">
              <a class="nav-link" href="<?= WEBROOT ?>contacter">Contact</a>
            </li>
          </ul>
        </div>
      </div>
    </nav>

    <script type="text/javascript">
    $(document).ready(function() {

      show_mycart();

      function show_mycart() {
        $.ajax({
          url: "<?= WEBROOT ?>ajax/show_mycart.php",
          method: "POST",
          dataType: "JSON",
          success: function(data) {
            $(".get_cart").html(data.out);
            $("#cart").text(data.da);
          }
        });
      }

      setInterval(show_mycart, 500);

    });
  </script>


  </header>
  <!-- Video Banner -->


  <main>
    <?php echo $content_for_layout ?>
  </main>


  <footer class="bg-dark text-center text-white">

    <div class="text-center p-3" style="background-color: rgba(0, 0, 0,
            0.2);">
      Thibault Yvard & Julien Rebours. BTS SIO2 Douanier Rousseau
    </div>
    <!-- Copyright -->
  </footer>
</body>

</html>