<?php 
if (isset($_SESSION['id']))
{
	require('views/tchat.phtml');
	$nombreDeMessagesParPage = 5;
	$nombreOffset = 0;
	$query = "SELECT user.pseudo, post.contenu, post.date, user.avatar
			  FROM post
			  LEFT JOIN user ON post.id_user = user.id
			  ORDER BY `post`.`date` DESC
			  LIMIT ".intval($nombreDeMessagesParPage)." OFFSET ".intval($nombreOffset)."";
	$resultat = mysqli_query($db, $query);
	if ($resultat)
	{
		while ($post = mysqli_fetch_assoc($resultat))
		{
			require('views/tchat_list.phtml');
		}
		require('views/pagination_tchat.phtml');
	}
	else
	{
		$errors[] = mysqli_error($db);
	}
}
 ?>