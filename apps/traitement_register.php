<?php

	$pseudo=$avatar=$mdp=$mdp2="";
	if (isset($_POST['pseudo'], $_POST['mdp'],$_POST['mdp2'])) {
		$pseudo = mysqli_real_escape_string($db, $_POST['pseudo']);		
		$query = "SELECT * FROM user WHERE pseudo='".$pseudo."'";
		$resultat = mysqli_query($db, $query);
		if ($resultat) {
			$errors[] = "Le pseudonyme existe déjà";
		}
		if (strlen($pseudo) < 4) {
			$errors[] = "Pseudonyme trop court (4 caractères minimum)";
		}
		if ($_POST['mdp'] != $_POST['mdp2']) {
			$errors[] = "Le mot de passe n'est pas vérifié";
		}
		else if (strlen($_POST['mdp']) < 6) {
			$errors[] = "Mot de passe trop court (6 caractères minimum)";
		}
		//----- A METTRE A JOUR ----------------------------------------------------
		// Pas de DB images pour upload et traiter l'image, code actuel pour fichiers dans le répertoire racine
		if (isset($_FILES['avatar_source'])) {
			if ( $image = @getimagesize($_FILES['avatar_source']['name']) ) { // vérif fichier image, @ désactive l'erreur renvoyée par la fonction
				if ($image[0] > 150 || $image[1] > 150) { // largeur et hauteur image
					$errors[] = "L'avatar est trop grand (150x150 max)";
				}
				else if ($_FILES['avatar_source']['size'] > 25000) { // poids image
					$errors[] = "L'avatar est trop gros (25Ko max)";
				}
				else {
					$avatar = mysqli_real_escape_string($db, $_FILES['avatar_source']['name']);
				}
			}
			else {
				$errors[] = "Le format du fichier est inconnu";
			}
		}
		// Créer un fichier .htaccess (serveurs Apache) dans le répertoire d'upload pour empêcher l'exécution de code php
		//--------------------------------------------------------------------------
		// Problème de droit d'accès pour fichier distant (modifier php.ini), n'exécute pas getimagesize
		else if (isset($_POST['avatar_url'])) {
			if ( $image = @getimagesize($_POST['avatar_url']) ) { // vérif fichier image, @ désactive l'erreur renvoyée par la fonction
				if ($image[0] > 150 || $image[1] > 150) { // largeur et hauteur image
					$errors[] = "L'avatar est trop grand (150x150 max)";
				}
				else if (filesize($_POST['avatar_url']) > 25000) { // poids image
					$errors[] = "L'avatar est trop gros (25Ko max)";
				}
				else {
					$avatar = mysqli_real_escape_string($db, $_POST['avatar_url']);
				}
			}
			else {
				$errors[] = "Le format du fichier est inconnu";
			}
		}
		//----------------------------------------------------------------------------
		if (count($errors) == 0) {
			$mdp = mysqli_real_escape_string($db, $_POST['mdp']);
			$mdp = password_hash($mdp, PASSWORD_BCRYPT, array("cost"=>10));
			$query = "INSERT INTO user (pseudo,password,avatar) VALUES ('".$pseudo."','".$mdp."','".$avatar."')";
			mysqli_query($db,$query);
			header('Location: index.php?page=register');
			exit;
		}
	}
?>