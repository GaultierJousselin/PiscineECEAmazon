<?php
session_start();
?>

<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<title>ECE Amazon - Categories</title>
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/css/bootstrap.min.css">
	<script src="https://code.jquery.com/jquery-3.3.1.slim.min.js"></script>
	<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/js/bootstrap.min.js"></script>
	<link rel="stylesheet" type="text/css" href="style.css">
	<script type="text/javascript">
		$(document).ready(function(){	
			$('.header').height($(window).height());
		});
	</script>
</head>
<body>
	<?php include 'Navbar.php'; ?>

		<div class="container container-margin">
	<div class="col-md-12">
		<h2>Votre compte client</h2>
		<div class="row">
			<div class="col-lg-1"></div>
			<div class="col-lg-11">
				<!--affichage des ID de connexion de la session en cours-->
				<?php

				if(isset($_SESSION['mail']) && isset($_SESSION['MDP'])) {
					$servername = "localhost";
					$username ="root";
					$password = "";
					$dbname = "piscinedb2";
					$sql = "";

					$connection = new mysqli($servername, $username, $password, $dbname);

					if($connection->connect_error) {
						die("Connection failed: " . $connection->connect_error);
					}

					$sql = "SELECT * FROM acheteur WHERE (mail = '" . $_SESSION['mail'] . "' AND MDP = '" . $_SESSION['MDP'] . "')";
					$req = mysqli_query($connection, $sql) or die ("Message d'erreur: " . mysqli_error($connection) );

						while($data = mysqli_fetch_assoc($req)) { 
							echo "ID: ". $data['id']. '<br>';
							echo "Nom: ". $data['nom']. '<br>';
							echo "Prénom: ". $data['prenom']. '<br>';
							echo "Mail: ". $data['mail']. '<br>';
							echo "Adresse: ". $data['adresse']. '<br>';
							echo "Image: ". $data['image']. '<br>';
							echo "Image du mur: ". $data['wallpaper']. '<br>';
						}
					}
					else {
						echo 'Error ID';
					}

				?>
			</div>
		</div>


	<form action="deconnexion.php" method="post">
			<div class="form-group">
				<label class="col-md-2 col-form-label">
					<input type="submit" class ="btn btn-primary" value="Déconnexion">
				</label>			
			</div>
	</form>

	</div>
 </div>
 <?php include 'footer.php'; ?>
</body>
</html>
