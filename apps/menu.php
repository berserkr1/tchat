<?php
if (isset($_SESSION['id']))
{
	if ($_SESSION['admin'] === true)
	{
		require('views/header_admin.phtml');
	}
	else
	{
		require('views/menu_logged.phtml');
	}
}
else
{
	require('views/menu.phtml');
}
?>