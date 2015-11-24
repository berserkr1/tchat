<?php 
	$message = "";
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
	function messages() {
		global $db;
		$query = "SELECT * FROM post LEFT JOIN user ON post.id_user = user.id ORDER BY 'date'";
		$resultat = mysqli_query($db, $query);
		if ($resultat) {
			while ($message = mysqli_fetch_assoc($resultat)) {
				echo "<".$message['date']."> ".$message['pseudo']." : ".htmlentities($message['contenu'])."<br/>";
			}
		}
	}
?>