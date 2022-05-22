<?php
session_start();
$total = 0; //Variable servant à calculer le prix total


$to = 0;

$output = "";

$output .= " 
  <table class='table table-bordered table-striped'>
    <tr>
       <th>NOM</th>
       <th>PRIX</th>
       <th>QUANTITÉ</th>
       <th>TOTAL</th>
       <th>ACTION</th>
    </tr>
"; //Affiche le tableau

if (!empty($_SESSION['mycart'])) { //Si le panier n'est pas vide
  $_SESSION['commande'] = $_SESSION['mycart'] ;
  foreach ($_SESSION['mycart'] as $key => $value) {

    $output .= "
           <tr>
             <td>" . $value['name'] . "</td>
             <td>" . $value['price'] . " €</td>
             <td>" . $value['quantity'] . "</td>
             <td>" . number_format($value['quantity'] * $value['price'], 2) . " €</td>
             <td>
               <button class='btn btn-danger remove' id='" . $value['id'] . "'>Retirer</button>
             </td>
		"; //Afficher les éléments du panier

    $total = $total + $value['quantity'] * $value['price']; //Calcul le prix total en fonction de la quantité et du prix unitaire

    $_SESSION['total_price'] = $total; //Affiche le total
  }

  $output .= "
         <tr>
           <td></td>
           <td><b>Prix Total  : " . number_format($total, 2) . "€</b></td>
           <td><b></b></td>
           <td><a href='commande'><button class='btn btn-danger passerCommande'>Passer commande</button><a></td>
           <td><button class='btn btn-danger clearall' id='" . $value['id'] . "'>Tout supprimer</button></td>
         </tr>
   
	";
  


  $to = count($_SESSION['mycart']);
} else {
}


$data['da'] = $to;
$data['out'] = $output;


echo json_encode($data);
