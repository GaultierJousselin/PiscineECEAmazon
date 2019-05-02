<?php
	session_start();

	if(!empty($_SESSION)) {
		header('Location: '. 'page_compte.php');
	}

	if(empty($_SESSION) ) {
		header('Location: '. "compte.html");
	}

?>
