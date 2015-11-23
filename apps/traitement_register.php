<?php

	$pseudo=$mdp=$mdp2="";
	if (isset($_POST['pseudo'], $_POST['mdp'],$_POST['mdp2'])) {
		$pseudo = mysqli_real_escape_string($db, $_POST['pseudo']);
		$mdp = mysqli_real_escape_string($db, $_POST['mdp']);
		$mdp2 = $_POST['mdp2'];
		$avatar = mysqli_real_escape_string($db, $_POST['avatar']);
		if ($mdp != $mdp2)
		{
			$errors[] = "Password don't match";
		}
		else if (strlen($mdp) < 6)
		{
			$errors[] = "Password too short";
		}
		if (strlen($pseudo) < 4)
		{
			$errors[] = "Login too short";
		}
		if (count($errors) == 0) {
			require('apps/password.php');
			$query = "INSERT INTO user (pseudo,password,avatar) VALUES ('".$pseudo."','".$mdp."','".$avatar."')";
			mysqli_query($db,$query);
			header('Location: index.php?page=register');
			exit;
		}
	}
?>