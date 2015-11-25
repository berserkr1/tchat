<?php 

	$post = "";
	$query = "SELECT post.id_user, user.id
			  FROM post
			  LEFT JOIN user ON post.id_user = user.id";
	$resultat = mysqli_query($db, $query);
	$user = mysqli_fetch_assoc($resultat);
	if (isset($_POST['input'], $_SESSION['id']))
	{
		$post = mysqli_real_escape_string($db, $_POST['input']);
		$query2 = "INSERT INTO `tchat`.`post` (`id`, `id_user`, `contenu`, `date`) VALUES (NULL, '" . $_SESSION['id'] . "', '" . $post . "', CURRENT_TIMESTAMP)";
		$resultat = mysqli_query($db, $query2);
		if ($resultat)
		{
			header('Location: index.php?page=accueil');
			exit;
		}
		else
		{
			$errors[] = mysqli_error($db);
		}
	}	
 ?>