<?php 	 
	if (isset($_SESSION['id']))
	{
		require('views/tchat.phtml');
	}	
	else
	{
		$errors[] = mysqli_error($db);
	}
?>