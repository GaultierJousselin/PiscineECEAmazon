<script>
	function search(value)
	{
		window.location.href = 'recherche.php?search=' + value + '';
	}

	function searchFromBar()
	{
		search(document.getElementById('search_bar').value);
	}

	function handleSearchEnter(e)
	{
		var keycode = (e.keyCode ? e.keyCode : e.which);
	    if (keycode == '13') {
	        alert('You pressed enter! - plain javascript');
	    }
	}
</script>
<nav class="navbar navbar-expand-md navbar-dark bg-primary fixed-top">
	<a class="navbar-brand" href="Accueil.php">
		<img src="images/logo_simple_small.png" width="20" height="30" class="d-inline-block align-top" alt="">
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
					<a class="dropdown-item" href="recherche.php?cat=livres">Livres</a>
					<a class="dropdown-item" href="recherche.php?cat=musique">Musiques</a>
					<a class="dropdown-item" href="recherche.php?cat=vetements">Vetements</a>
					<a class="dropdown-item" href="recherche.php?cat=sel">Sports et Loisirs</a>
					<div class="dropdown-divider"></div>
					<a class="dropdown-item" href="categories.php">Tout regarder</a>
				</div>
			</li>
			<li class="nav-item">
				<a class="nav-link" href="best-sellers.php">Best-Sellers</a>
			</li>
		</ul>
	</div>
	<div class="collapse navbar-collapse mx-auto order-2" style="width: 2000px;">
		<div class="form-inline">
			<input id="search_bar" onfocus="handleSearchEnter(event)" class="form-control mr-sm-2" type="search" placeholder="Search" aria-label="Search" style="width: 400px !important;">
			<button onclick="searchFromBar()" class="btn btn-outline-dark my-2 my-sm-0" type="submit">Search</button>
		</div>
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