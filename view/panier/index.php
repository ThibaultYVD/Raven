<!DOCTYPE html>
<html>

<head>
   <title>Page panier</title>
</head>

<body>


   <div class="container">
      <div class="col-md-12 get_cart my-5">

      </div>
   </div>


   <script type="text/javascript">
      $(document).ready(function() {

         show_mycart(); //Affiche le panier en appellant la fonction ajax en question
         function show_mycart() {
            $.ajax({
               url: "<?= WEBROOT ?>ajax/show_mycart.php",
               method: "POST",
               dataType: "JSON",
               success: function(data) {
                  $("#get_cart").html(data.out);
                  $("#cart").text(data.da);
                  $("#total").text(data.total);
               }
            });
         }

         setInterval(show_mycart, 500);

      });

      $(document).on("click", ".remove", function() { //Gère le bouton de suppression de produit
         var id = $(this).attr("id"); //Récupère l'id du produit a supprimer

         var action = "delete";

         $.ajax({ //Appelle l'action delete (voir cart_action.php)
            url: "<?= WEBROOT ?>ajax/cart_action.php",
            method: "POST",
            data: {
               id: id,
               action: action
            },
            dataType: "JSON",
            success: function(data) {

            }
         });
      });



      $(document).on("click", ".clearall", function() { //Gère le bouton de suppression de tout les produit
         var id = $(this).attr("id"); //Récupère les id des produits a supprimer

         var action = "clearall";

         $.ajax({ //Appelle l'action clearall (voir cart_action.php)
            url: "<?= WEBROOT ?>ajax/cart_action.php",
            method: "POST",
            data: {
               id: id,
               action: action
            },
            dataType: "JSON",
            success: function(data) {

            }
         });
      });


      $(document).on("click", ".passerCommande", function() { //Gère le bouton de suppression de tout les produit


         <?php


         

         ?>
      });
   </script>


   </script>

</body>
<script>

</script>

</html>