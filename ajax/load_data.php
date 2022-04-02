<?php

include("../connection.php");


//Fixe la limite des éléments affichés
$limit = 10; 

$query = "SELECT * FROM produits LIMIT 0, $limit"; //Séléctionne les prduit
$res = mysqli_query($connect, $query); //Excecute la sélection

$output = "";
if (mysqli_num_rows($res) < 1) { //Si il y a pas de colonnes (donc des produits) dans la bdd
	$output .= "<h1 class='text-center'>Il n'y a pas de données dans la base de donnée !!</h1>"; //Afficher qu'il n'y a aps de produit dans la bdd
} else {

	while ($row = mysqli_fetch_array($res)) { //Affiche tout les produits dans la bdd

		$output .= "
             <div class='col-md-3 rounded bg-white d-flex justify-content-center'>
				<form method='post'>
					<img src='assets/img/" . $row['image'] . "' class='col-md-12' height='200px'>
					<h3 class='mx-3 text-center'>" . $row['nom'] . "</h3>
					<h3 class='mx-3 text-center'>" . $row['prix'] . "€</h3>
					<input type='hidden' name='id' value='" . $row['id'] . "' id='" . $row['id'] . "'>
					<input type='hidden' name='name' value='" . $row['nom'] . "' id='name" . $row['id'] . "'>
					<input type='hidden' name='price' value='" . $row['prix'] . "' id='price" . $row['id'] . "'>
					<input type='hidden' name='quantity' value='1' id='quantity" . $row['id'] . "'>
					<input type='submit' name='add' id='" . $row['id'] . "' class='btn btn-outline-dark mt-auto add_cart' value='Ajouter au panier' style='margin-left: 40px;'>
				</form>
				</div>

		 ";
	}
}


$data['output'] = $output;


echo json_encode($data);
