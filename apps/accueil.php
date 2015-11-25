<?php
	require('views/accueil.phtml');
	if (isset ($_SESSION['id'])) {
		if (isset($_POST['ajax'])) {
			if(isset($_SESSION['id'], $_POST['message']) && $_POST['message'] != "") {
				$message = mysqli_real_escape_string($db, $_POST['message']);
				$query = "INSERT INTO post (id_user,contenu) VALUES ('".intval($_SESSION['id'])."','".$message."')";
				$resultat = mysqli_query($db, $query);
				if ($resultat) {
					$message="";
				}
				else {
					$errors[]="Problème de connexion au serveur de messagerie";
				}
			}
		}
		require('views/tchat.phtml');
	}
?>
