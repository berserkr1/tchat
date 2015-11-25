<?php 
$nombreDeMessagesParPage = 10;
$nombreOffset = 0;
if (isset($_GET['p']) && is_numeric($_GET['p'])) {
    $nombreDeMessagesParPage = intval($_GET['p']);
}
if (isset($_GET['o']) && is_numeric($_GET['o']) ) {
    $nombreOffset = intval($_GET['o']);
}
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
	}
 ?>