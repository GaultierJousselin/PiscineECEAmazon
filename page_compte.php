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
				<li class="nav-item"><a class="nav-link" href="categories.html">Catégories</a></li>
				<li class="nav-item"><a class="nav-link" href="best-sellers.html">Best-Sellers</a></li>
				<li class="nav-item"><a class="nav-link" href="recherche.html">Recherche</a></li>
				<li class="nav-item"><a class="nav-link" href="vendre.html">Vendre</a></li>
				<li class="nav-item"><a class="nav-link" href="preconnexion.php">Mes Comptes</a></li>
				<li class="nav-item"><a class="nav-link" href="panier.html">Panier</a></li>
			</ul>
		</div>
	</nav>
	

	<!--affichage des ID de connexion de la session en cours-->
	<?php
	session_start();

	if(isset($_SESSION['mail']) && isset($_SESSION['MDP'])) {
		echo '<html>';
		echo '<head>';
		echo '<title>Page de notre section membre</title>';
		echo '</head>';

		echo '<body>';
		echo 'Votre login est '.$_SESSION['mail'].' et votre mot de passe est '.$_SESSION['MDP'].'.';
		echo '<br />';
	}
	?>

	<form action="deconnexion.php" method="post">
			<div class="form-group">
				<label class="col-md-2 col-form-label">
					<input type="submit" class ="btn btn-primary" value="Déconnexion">
				</label>			
			</div>
	</form>

</body>
</html>
