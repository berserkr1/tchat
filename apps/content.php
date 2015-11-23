<?php 
if (isset($_SESSION['id']))
{
	require('views/tchat.phtml');
}
else
{
	require('views/content.phtml');
}
?>