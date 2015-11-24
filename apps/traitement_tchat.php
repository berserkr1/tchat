<?php 
	$post ="";
	if (isset($_POST['post']))
	{
		$post = mysqli_real_escape_string($db, $_POST['post']);
		$query = "INSERT INTO post (contenu) VALUES('". $post ."')";
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
 ?>