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
				<li class="nav-item"><a class="nav-link" href="compte.html">Mes Comptes</a></li>
				<li class="nav-item"><a class="nav-link" href="panier.html">Panier</a></li>
			</ul>
		</div>
	</nav>



	<form action="connexion.php" method="post">
			<h2>Création de votre compte compte</h2>
			<div class="form-group row">
				<label for="mail" class="col-md-1 col-form-label">Adresse e-mail</label>
				<div class="col-md-2">
					<input type="text" class="form-control" name="mail" placeholder="@edu.ece.fr" />
				</div>
			</div>

			<div class="form-group">
				<label for="MDP" class="col-md-4 col-form-label">Mot de passe</label>
				<div class="col-md-4">
					<input type="text" class="form-control" name="MDP"/>
				</div>
			</div>

				<label for="Num">Numéro Client </label>
				<input type="text" name="Num" id="Num"/><br>
				
				<label for="Prenom">Prénom </label>
				<input type="text" name="Nom" id="Nom"/><br>

				<label for="Age">Age </label>
				<input type="number" name="Age" id="Age"/><br>
						
				<label for="Classe">Classe de siege </label>
				<input type="text" name="Classe" id="Classe"/><br>

				<label for="Statut">Statut client </label>
				<input type="text" name="Statut" id="Statut"/><br>

				<label><input type="submit" value="Soumettre le formulaire"/></label>
				<input type="reset" value="Effacer"/><br>
 	</form>

</body>
</html>
