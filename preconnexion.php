<?php
	session_start();

	$mail = isset($_POST["mail"])? $_POST["mail"]: "";
			$MDP = isset($_POST["MDP"])? $_POST["MDP"]: "";
			$nom = isset($_POST["nom"])? $_POST["nom"]: "";
			$prenom = isset($_POST["prenom"])? $_POST["prenom"]: "";
			$adresse = isset($_POST["adresse"])? $_POST["adresse"]: "";
			$image = isset($_POST["image"])? $_POST["image"]: "";
			$wallpaper= isset($_POST["wallpaper"])? $_POST["wallpaper"]: "";
			$statut = isset($_POST["statut"])? $_POST["statut"]: "";
			$page_suivante = "";

				if(!empty($MDP) && !empty($mail) && !empty($nom) && !empty($prenom) && !empty($adresse)) {
					$servername = "localhost";
					$username ="root";
					$password = "";
					$dbname = "piscinedb2";
			
					$connection = new mysqli($servername, $username, $password, $dbname);

					if($connection->connect_error) {
						die("Connection failed: " . $connection->connect_error);
					}
					else {
					}

					if($statut == "acheteur") {
						$sql1 = "SELECT * FROM acheteur WHERE (mail = '$mail' AND MDP = '$MDP')";
						$req1 = mysqli_query($connection, $sql1) or die ("Message d'erreur1: " . mysqli_error($connection) );

						if(mysqli_num_rows($req1) == 0){
							$sql = "INSERT INTO acheteur VALUE (0, '$nom', '$prenom', '$image', '$wallpaper', '$adresse', '$mail', '$MDP', 0, 0)";
							$page_suivante = "page_compte_acheteur.php";
						}
						else{
							echo 'Un utlisateur existe déjà avec des informations de connexion. <br> Veuillez selectionner un autre mail ou mot de passe. Merci. <br>';
						}
					}

					if($statut == "vendeur") {

						$sql1 = "SELECT * FROM vendeur WHERE (mail = '$mail' AND MDP = '$MDP')";
						$req1 = mysqli_query($connection, $sql1) or die ("Message d'erreur2: " . mysqli_error($connection) );

						if(mysqli_num_rows($req1) == 0){
							$sql = "INSERT INTO vendeur VALUE (0, '$nom', '$prenom', '$image', '$wallpaper', '$adresse', '$mail', '$MDP', 0)";
							$page_suivante = "page_compte_vendeur.php";
						}
						else{
							echo 'Un utlisateur existe déjà avec des informations de connexion. <br> Veuillez selectionner un autre mail ou mot de passe. Merci. <br>';
						}
					}

					if($page_suivante == "page_compte_vendeur.php" || $page_suivante == "page_compte_acheteur.php") {

						$_SESSION['mail'] = $mail;
						$_SESSION['MDP'] = $MDP; 
						$_SESSION['statut'] = $statut;
						$req = mysqli_query($connection, $sql) or die ("Message d'erreur3: " . mysqli_error($connection) );
						while($data = mysqli_fetch_assoc($sql1)) { 
							$_SESSION['ID'] = $data['id'];
						}
					}
					else {
						echo 'Impossible de créer le compte compte.<br>';
					}
				}
				else {
					echo 'Des champs sont vides';
				}

		if($_SESSION['statut'] == "acheteur") {
			header('Location: '. 'page_compte_acheteur.php');
		}
		if($_SESSION['statut'] == "vendeur") {
			header('Location: '. 'page_compte_vendeur.php');
		}
		if($_SESSION['statut'] == "admin") {
			header('Location: '. 'page_compte_admin.php');
		}

?>