<?php
	
	session_start();

	
	if(!empty($_SESSION)) {
		header('Location: '. 'page_compte.php');
	}

	if(isset($_POST['button1']) && empty($_SESSION) ) {
		$mail = isset($_POST["mail"])? $_POST["mail"]: "";
		$MDP = isset($_POST["MDP"])? $_POST["MDP"]: "";
		if(!empty($MDP) && !empty($mail)){
			$servername = "localhost";
			$username ="root";
			$password = "";
			$dbname = "piscinedb2";
			$sql = "";

			$connection = new mysqli($servername, $username, $password, $dbname);

			if($connection->connect_error) {
				die("Connection failed: " . $connection->connect_error);
			}

			$sql = "SELECT * FROM acheteur WHERE (mail = '$mail' AND MDP = '$MDP')";
			$req = mysqli_query($connection, $sql) or die ("Message d'erreur: " . mysqli_error($connection) );

			if(mysqli_num_rows($req) == 1){
				session_start();
				$_SESSION['mail'] = $mail;
				$_SESSION['MDP'] = $MDP; 

				header('Location: ' . "page_compte.php");
			}
			else {
				echo 'Mauvais mail/mot de passe';
			}
		}
		else {
			echo 'Des champs sont vides';
		}
	}

?>
