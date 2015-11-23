<?php
	$pseudo = "";
	$mdp = "";

	if (isset($_POST['pseudo'], $_POST['mdp'])) {
	$pseudo = mysqli_real_escape_string($db, $_POST['pseudo']);
	$mdp = $_POST['mdp'];
	$query = "SELECT * FROM user WHERE pseudo='" . $pseudo . "'";
	$resultat = mysqli_query($db, $query);
	if ($resultat)
	{
		$user = mysqli_fetch_assoc($resultat);
		if ($user)
		{
			if (password_verify($mdp, $user['password']))
			{
				$_SESSION['id'] = $user['id'];
				$_SESSION['admin'] = (boolean)$user['admin'];
				$_SESSION['login'] = $user['pseudo'];
				header('Location: index.php');
				exit;
			}
			else
			{
				$errors[] = "Mot de passe erroné";
			}
		}
		else
		{
			$errors[] = "Pseudonyme inconnu";
		}
	}
	else
	{
		$errors[] = "Internal server error";
	}
	}
?>