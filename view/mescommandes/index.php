<?php 
$connect = mysqli_connect("localhost", "2022-raven", "123456", "2022-raven_"); //Connection à la bdd
$query = "SELECT * FROM commande WHERE UTILISATEUR = 'test'"; //Séléctionne les prduit
$res = mysqli_query($connect, $query); //Excecute la sélection
$output = "";
if (mysqli_num_rows($res) < 1) { //Si il y a pas de colonnes (donc des produits) dans la bdd
	$output .= "<h1 class='text-center'>Vous n'avez pas encore passé de commande !</h1>"; //Afficher qu'il n'y a aps de produit dans la bdd
} else {
    
    echo "<div class='container'<div class='col-md-12my-5'>>";
    while ($row = mysqli_fetch_array($res)) {
        $output .= " 
        <table class='table table-bordered table-striped'>
            <tr>
               <th>Votre numéro de commande</th>
               <th>Votre transporteur</th>
               <th>Commandé le</th>
               <th>Montant</th>
            </tr>
             <tr>
                <td>" . $row["IDCOMMANDE"] . "</td>
                <td>" . $row["TRANSPORTEUR"] . "</td>
                <td>" . $row["DATE"] . "</td>
                <td>" . $row["MONTANT"] . "€</td>
            </tr>
        </table>";
    }
    
}
echo $output;
?>