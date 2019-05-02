<?php

	if(!empty($_SESSION)) {
		header('Location: '. 'page_compte.php');
	}

	if(isset($_POST['button1']) && empty($_SESSION) ) {
		$mail = isset($_POST["mail"])? $_POST["mail"]: "";
		$MDP = isset($_POST["MDP"])? $_POST["MDP"]: "";
		$nom = isset($_POST["nom"])? $_POST["nom"]: "";
		$prenom = isset($_POST["prenom"])? $_POST["prenom"]: "";
		$adresse = isset($_POST["adresse"])? $_POST["adresse"]: "";
		$image = isset($_POST["image"])? $_POST["image"]: "";
		$wallpaper= isset($_POST["wallpaper"])? $_POST["wallpaper"]: "";

		if(!empty($MDP) && !empty($mail) && !empty($nom) && !empty($prenom) && !empty($adresse)){
			$servername = "localhost";
			$username ="root";
			$password = "";
			$dbname = "piscinedb2";
			$sql = "";

			$connection = new mysqli($servername, $username, $password, $dbname);

			if($connection->connect_error) {
				die("Connection failed: " . $connection->connect_error);
			}
			else {
				echo "connection successful <br>";
			}

			$sql = "INSERT INTO acheteur VALUE (0, ' ', '$nom', '$prenom', '$image', '$wallpaper', '$adresse', '$mail', '$MDP', 0)";

			if($connection->query($sql) === TRUE){
				session_start();
				$_SESSION['mail'] = $mail;
				$_SESSION['MDP'] = $MDP; 

				header('Location: ' . "page_compte.php");
			}
			else {
				echo 'Erreur dans la création du compte.<br>';
				echo 'Error: ' . $sql . "<br>" . $connection->error;
			}
		}
		else {
			echo 'Des champs sont vides';
			header('Location: ' . 'compte.php');
		}
	}

?>
