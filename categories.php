<?php
//On demarre la sessions avant toute chose.
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
				<li class="nav-item"><a class="nav-link" href="compte.php">Mes Comptes</a></li>
				<li class="nav-item"><a class="nav-link" href="panier.php">Panier</a></li>
			</ul>
		</div>
	</nav>
	<br>
	<div class="container">
	<div class="row">
			<div class="offset-md-1 col-md-3">
				<div class="img-thumbnail">
					<a href="images/livres.jpg" target="_blank">
						<img src="images/livres.jpg" style="width: 100%">
						<div class="caption">
							<p>
								Livres
							</p>
						</div>
					</a>
				</div>
			</div>
			<div class="offset-md-4 col-md-3">
				<div class="img-thumbnail">
					<a href="images/note.jpg" target="_blank">
						<img src="note.jpg" style="width: 100%">
						<div class="caption">
							<p>
								Musiques
							</p>
						</div>
					</a>
				</div>
			</div>
	</div>
	<br>
	<div class="row">
		<div class="offset-md-1 col-md-3">
				<div class="img-thumbnail">
					<a href="vetements.png" target="_blank">
						<img src="vetements.png" style="width: 100%">
						<div class="caption">
							<p>
								Vetements
							</p>
						</div>
					</a>
				</div>
			</div>
			<div class="offset-md-4 col-md-3">
				<div class="img-thumbnail">
					<a href="sploi.jpg" target="_blank">
						<img src="sploi.jpg" style="width: 100%">
						<div class="caption">
							<p>
								Sports et Loisirs
							</p>
						</div>
					</a>
				</div>
			</div>
	</div>
	</div>
</body>
</html>