<?php
	session_start();

	if(!empty($_SESSION)) {
		if($_SESSION['statut'] == "acheteur") {
			header('Location: '. 'page_compte_acheteur.php');
		}
		if($_SESSION['statut'] == "vendeur") {
			header('Location: '. 'page_compte_vendeur.php');
		}
	}
	else {
		header('Location: '. "compte.php");		
	}
?>
