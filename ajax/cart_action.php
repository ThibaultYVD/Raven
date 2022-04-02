<?php
session_start();


if (isset($_POST['action'])) { //Test les actions


	if ($_POST['action'] == "clearall") { //Si l'action est de tout supprimer
		unset($_SESSION['mycart']); //Supprime le panier
	}

	if ($_POST['action'] == "delete") { //Si l'action est de supprimer 1 produit

		foreach ($_SESSION['mycart'] as $key => $value) {

			if ($value['id'] == $_POST['id']) {
				unset($_SESSION['mycart'][$key]);
			}
		}
	}

	if ($_POST['action'] == "add") { //Si l'action est d'ajouter un produit


		if (isset($_SESSION['mycart'])) {

			$is_available = 0; //Variable servant à regarder si le produit a déjà été séléctionner

			foreach ($_SESSION['mycart'] as $key => $value) {

				if ($_SESSION['mycart'][$key]['id'] == $_POST['id']) {
					$is_available++; //Pour dire que le produit a déjà été sélectionné
					$_SESSION['mycart'][$key]['quantity'] = $_SESSION['mycart'][$key]['quantity'] + $_POST['quantity']; //Calcul la quantité
				}
			}

			if ($is_available == 0) { //Si le produit a déjà été séléctionner
				$item_array = array(
					'id'  => $_POST['id'],
					'name' => $_POST['name'],
					'price' => $_POST['price'],
					'quantity' => $_POST['quantity']
				);

				$_SESSION['mycart'][] = $item_array;
			}
		} else {//Si le produit n'a pas encore été sélectionné

			$item_array = array(
				'id'  => $_POST['id'],
				'name' => $_POST['name'],
				'price' => $_POST['price'],
				'quantity' => $_POST['quantity']
			);

			$_SESSION['mycart'][] = $item_array;
		}
	}
}
