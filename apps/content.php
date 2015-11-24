<?php 
if (isset($_SESSION['id']))
{
	require('views/tchat.phtml');
	$query = "SELECT user.pseudo, post.contenu, post.date
			  FROM post
			  LEFT JOIN user ON post.id_user = user.id
			  ORDER BY `post`.`date` DESC
			  LIMIT 0 , 30";
	$resultat = mysqli_query($db, $query);
	if ($resultat)
	{
		while ($post = mysqli_fetch_assoc($resultat))
		{
			require('views/tchat_list.phtml');
		}
	}
	else
	{
	$errors[] = mysqli_error($db);
	}
}
else
{
	require('views/content.phtml');
}
?>