<?php
$pseudo = "";
$mdp1 = "";
$mdp2 = "";
if (isset($_POST['pseudo'], $_POST['mdp1'], $_POST['mdp2']))
{
	$pseudo = mysqli_real_escape_string($db, $_POST['pseudo']);
	$mdp1 = $_POST['mdp1'];
	$mdp2 = $_POST['mdp2'];
	if ($mdp1 != $mdp2)
	{
		$errors[] = "Password don't match";
	}
	else if (strlen($mdp1) < 6)
	{
		$errors[] = "Password too short";
	}
	if (strlen($pseudo) < 4)
	{
		$errors[] = "Login too short";
	}
	if (count($errors) == 0)
	{
		$hash = password_hash($mdp1, PASSWORD_BCRYPT, array("cost"=>10));
		$query = "INSERT INTO user (pseudo, password) VALUES('". $pseudo ."', '". $hash ."')";
		$resultat = mysqli_query($db, $query);
		if ($resultat)
		{
			header('Location: index.php?page=login');
			exit;
		}
		else
		{
			$errors[] = mysqli_error($db);
		}
	}
}
?>