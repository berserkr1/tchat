<?php
	$titre = "Tchat";	
	if (isset($_GET['ajax']))
	{
		require('apps/tchat_list.php');
	}
	else
	{
	require('views/skel.phtml');
	}	