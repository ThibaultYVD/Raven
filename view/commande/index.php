<?php
$connect = mysqli_connect("localhost", "2022-raven", "123456", "2022-raven_"); //Connection à la bdd
$output = "";
$test = "";

echo "<div class='container'<div class='col-md-12my-5'>";
echo "<h1>Merci pour votre achat ! Ici le résumé de votre commande. </h1>";

$array = $_SESSION['commande'];




$sql = "SELECT MAX(`IDCOMMANDE`) FROM `lignecommande` LIMIT 1";
//var_dump($sql);    
$requete = Model::connexion()->prepare("$sql");
$requete->execute();
$result = $requete->fetchAll();
$idMax = $result[0][0];
$idcommande = $idMax + 1;



$utilisateur = $_SESSION['utilisateur']['pseudo'];
$total = $_SESSION['total_price'];
$sql = "INSERT INTO commande (IDCOMMANDE, UTILISATEUR, TRANSPORTEUR, DATE, MONTANT) VALUES ($idcommande, '$utilisateur', 'Chronopost', NOW(), $total)";
//var_dump($sql);
$requete = Model::connexion()->prepare($sql);
$requete->execute();


//--------------------------------------------------------------------------------------------------------------------------
$query = "SELECT * FROM commande WHERE UTILISATEUR = '$utilisateur'"; //Séléctionne les prduit
$res = mysqli_query($connect, $query); //Excecute la sélection






$output = "";

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
echo $output;



//--------------------------------------------------------------------------------------------------------------------------
$output = "";
echo "<h1>Le résumé de votre panier :</h1>";
foreach ($array as $key => $value) {

    $output .= " 
    <table class='table table-bordered table-striped'>
        <tr>
           <th>NOM</th>
           <th>PRIX</th>
           <th>QUANTITÉ</th>
        </tr>
        <tr>
            <td>" . $value['name'] . "</td>
            <td>" . $value['price'] . " €</td>
            <td>" . $value['quantity'] . "</td>
        </tr>
    </table>";
}


echo $output;



foreach ($array as $key => $value) {


    $id = $value['id'];
    $quantity = $value['quantity'];
    $sql = "UPDATE produits SET quantite = quantite - $quantity WHERE id = $id";
    $requete = Model::connexion()->prepare($sql);
    $requete->execute();






    $idprod = $value['id'];
    $quantity = $value['quantity'];

    $sql = "INSERT INTO lignecommande (idcommande, idproduit, quantité) VALUES ($idcommande, $idprod, $quantity)";
    $requete = Model::connexion()->prepare($sql);
    $requete->execute();
}

unset($_SESSION['mycart']);