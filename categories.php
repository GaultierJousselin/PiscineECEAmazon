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
	<nav class="navbar navbar-expand-md navbar-dark bg-primary fixed-top">
		<a class="navbar-brand" href="Accueil.php">
			<img src="logo_simple_small.png" width=20" height="30" class="d-inline-block align-top" alt="">
			E€E
		</a>
		<button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
			<span class="navbar-toggler-icon"></span>
		</button>
		<div class="navbar-collapse collapse w-100 order-1 order-md-0 dual-collapse2 navbar-left" id="navbarSupportedContent">
			<ul class="navbar-nav mr-auto">
				<li class="nav-item dropdown">
					<a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
						Categorie
					</a>
					<div class="dropdown-menu" aria-labelledby="navbarDropdown">
						<a class="dropdown-item" href="#">Livres</a>
						<a class="dropdown-item" href="#">Musiques</a>
						<a class="dropdown-item" href="#">Vetements</a>
						<a class="dropdown-item" href="#">Sports et Loisirs</a>
						<div class="dropdown-divider"></div>
						<a class="dropdown-item" href="categorie.php">Tout regarder</a>
					</div>
				</li>
				<li class="nav-item">
					<a class="nav-link" href="best-sellers.php">Best-Sellers</a>
				</li>
			</ul>
		</div>
		<div class="collapse navbar-collapse mx-auto order-2" style="width: 1400px;">
			<form class="form-inline">
				<input class="form-control mr-sm-2" type="search" placeholder="Search" aria-label="Search" style="width: 400px !important;">
				<button class="btn btn-outline-dark my-2 my-sm-0" type="submit">Search</button>
			</form>
		</div>
		<div class="navbar-collapse collapse w-100 order-3 dual-collapse2 navbar-right" id="navbarSupportedContent">
			<ul class="navbar-nav ml-auto">
				<li class="nav-item">
					<a class="nav-link" href="vendre.php">Vendre</a>
				</li><li class="nav-item">
					<a class="nav-link" href="compte.php">Mes Comptes</a>
				</li><li class="nav-item">
					<a class="nav-link" href="panier.php">Panier</a>
				</li>
			</ul>
		</div>
	</nav>
	<br><br><br><br>
	<div class="container">
	<div class="row">
			<div class="offset-md-1 col-md-3">
				<div class="img-thumbnail">
					<a href="recherche.html">
						<img src="livres.jpg" style="width: 100%">
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
					<a href="recherche.html">
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
					<a href="recherche.html">
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
					<a href="recherche.html">
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
	<br><br><br><br>
	</div>
	<footer class="page-footer">
		<div class="container">
			<div class="row">
				<div class="col-lg-8 col-md-8 col-sm-12">
					<h6 class="text-uppercase font-weight-bold">Information additionnelle</h6>
					<p>
						ECE Amazon est une entreprise de commerce électronique française basée à Paris. Elle est un des géants du Web Parisien, regroupés sous l'acronyme GAFFE.
					</p>
					<p>
						Cette entreprise est gérée par trois jeunes ingénieurs fraichement sortient de l'ecole ECE Paris. 
					</p>
				</div>
				<div class="col-lg-4 col-md-4 col-sm-12">
					<h6 class="text-uppercase font-weight-bold">Contact</h6>
					<p>
						37, quai de Grenelle, 75015 Paris, France <br>
						info@eceamazon.ece.fr <br>
						+33 01 02 03 04 05 <br>
						+33 01 03 02 05 04
					</p>
				</div>
			</div>
			<div class="footer-copyright text-center">&copy; 2019 Copyright | Droit d'auteur: Jousselin Gaultier</div>
		</footer>
</body>
</html>