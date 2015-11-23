<?php
if (isset($_POST['mdp']))
{
	$mdp = password_hash($_POST['mdp'], PASSWORD_BCRYPT, array("cost"=>10));
}

if (isset($_POST['mdp']))
{
	// login
	if (password_verify($_POST['mdp'], $mdp))
	{
		// mdp OK
	}
	else
	{
		// erreur
	}
}
?>