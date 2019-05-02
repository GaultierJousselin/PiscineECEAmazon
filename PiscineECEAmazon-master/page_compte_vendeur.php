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
	<nav class="navbar navbar-expand-md">
		<a class="navbar-brand" href="Accueil.html">Logo</a>
		<button class="navbar-toggler navbar-dark" type="button" data-toggle="collapse" data-target="#main-navigation">
			<span class="navbar-toggler-icon"></span>
		</button>
		<div class="collapse navbar-collapse" id="main-navigation">
			<ul class="navbar-nav">
				<li class="nav-item"><a class="nav-link" href="categories.php">Catégories</a></li>
				<li class="nav-item"><a class="nav-link" href="best-sellers.php">Best-Sellers</a></li>
				<li class="nav-item"><a class="nav-link" href="recherche.php">Recherche</a></li>
				<li class="nav-item"><a class="nav-link" href="vendre.php">Vendre</a></li>
				<li class="nav-item"><a class="nav-link" href="preconnexion.php">Mon Compte</a></li>
				<li class="nav-item"><a class="nav-link" href="panier.php">Panier</a></li>
			</ul>
		</div>
	</nav>
	
	<div class="col-md-12">
		<h2>Votre compte marchand</h2>
		<div class="row">
			<div class="col-md-1"></div>
			<div class="col-md-11">
				<!--affichage des ID de connexion de la session en cours-->
				<?php
				session_start();

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

					$sql = "SELECT * FROM vendeur WHERE (mail = '" . $_SESSION['mail'] . "' AND MDP = '" . $_SESSION['MDP'] . "')";
					$req = mysqli_query($connection, $sql) or die ("Message d'erreur: " . mysqli_error($connection) );

						while($data = mysqli_fetch_assoc($req)) { 
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

	<div>

</body>
</html>
