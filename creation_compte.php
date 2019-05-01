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



	<form action="connexion.php" method="post">
			<div class="form-group row">
				<label for="mail" class="col-md-1 col-form-label"></label>
				<h2>Création de votre compte ECE</h2>
			</div>



			<div class="form-group row">
				<label class="col-md-1 col-form-label"></label>
				<label for="mail" class="col-md-2 col-form-label">Adresse mail</label>
				<div class="col-md-2">
					<input type="text" class="form-control" name="mail" placeholder="@edu.ece.fr" />
				</div>
				<label class="col-md-1 col-form-label"></label>
				<label for="image" class="col-md-1 col-form-label">Photo de profil</label>
				<div class="col-md-2">
					<input type="file" class="form-control" name="image"/>
				</div>
			</div>

			<div class="form-group row">
				<label class="col-md-1 col-form-label"></label>
				<label for="MDP" class="col-md-2 col-form-label">Mot de passe</label>
				<div class="col-md-2">
					<input type="text" class="form-control" name="MDP"/>
				</div>

				<label for="wallpaper" class="col-md-1 col-form-label"></label>
				<label for="wallpaper" class="col-md-1 col-form-label">Photo de couverture</label>
				<div class="col-md-2">
					<input type="file" class="form-control" name="image"/>
				</div>

			</div>

			<div class="form-group row">
				<label class="col-md-1 col-form-label"></label>
				<label for="nom" class="col-md-2 col-form-label" placeholder="Nom">Nom & Prénom</label>
				<div class="col-md-1">
					<input type="text" class="form-control" name="nom"/>
				</div>
				<label for="prenom" class="col-form-label" placeholder="prenom"></label>
				<div class="col-md-1">
					<input type="text" class="form-control" name="prenom"/>
				</div>
			</div>

			<div class="form-group row">
				<label class="col-md-1 col-form-label"></label>
				<label for="adresse" class="col-md-2 col-form-label">Adresse postale</label>
				<div class="col-md-2">
					<input type="text" class="form-control" name="adresse"/>
				</div>
			</div>

			<div class="form-group">
				<label for="mail" class="col-md-1 col-form-label"></label>
				<label><input type="submit" class="btn btn-primary" value="Inscription" name="button1"></label>
				<input type="reset" class="btn btn-primary" value="Effacer" name="button2">
			</div>
 	</form>

</body>
</html>