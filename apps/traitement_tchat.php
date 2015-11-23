<?php
	if(isset($_SESSION['id'], $_POST['message']) && $_POST['message'] != "") {
		$message=mysqli_real_escape_string($db, $_POST['message']);
		$query="INSERT INTO post (id_user,contenu) VALUES ('".intval($_SESSION['id'])."','".$message."')";
		$resultat = mysqli_query($db, $query);
		if ($resultat) {
			$message="";
		}
		else {
			$errors[]="Connexion impossible au serveur de messagerie";
		}
	}
?>