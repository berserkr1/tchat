<?php
	require('views/accueil.phtml');
	if (isset ($_SESSION['id'])) {
		require('views/tchat.phtml');
	}
?>