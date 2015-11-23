<?php
session_start();

$db = mysqli_connect('192.168.1.84', 'pascal','', 'tchat');

if ($db === false)
	die(mysqli_connect_error()); 	
	$access = array('accueil', 'login', 'logout', 'register');
	$traitements = array('login', 'logout', 'register');
	$accessAdmin = array('admin', 'accueil', 'login', 'logout', 'register');
	$traitementsAdmin = array('admin', 'login', 'logout', 'register');
	$page = 'accueil';
	if (isset($_GET['page']))
	{
		if (in_array($_GET['page'], $traitements)) {
			require('apps/traitement_'.$_GET['page'].'.php');
		}
		else if (isset($_SESSION['id']) && $_SESSION['admin'] === true && in_array($_GET['page'], $traitementsAdmin))
		{
		require('apps/traitement_'.$_GET['page'].'.php');
		}
		if (in_array($_GET['page'], $access)) {
			$page = $_GET['page'];
		}
		else if (isset($_SESSION['id']) && $_SESSION['admin'] === true && in_array($_GET['page'], $accessAdmin))
		{
		$page = $_GET['page'];
		}
	}
	require('apps/skel.php');
?>