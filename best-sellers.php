<?php
//On demarre la sessions avant toute chose.
session_start();

// //identifier la BDD
// $database = "piscinedb2";

// //connectez-vous dans la BDD
// $db_handle = mysqli_connect('localhost', 'root', '');
// $db_found = mysqli_select_db($db_handle, $database);

// $sql = "SELECT * FROM `livres`";
// $result = mysqli_query($db_handle, $sql) or die(mysqli_error($db_handle));

include 'sql_functions.php';

if(!isset($bs_livres)) {
	$bs_livres_titre = "Aucun Best Seller";
	$bs_livres_photo = "images/nothing.png";
	$bs_livres_id = "";
} else {
	$bs_livres_titre = $bs_livres->titre;
	$bs_livres_photo = $bs_livres->photo; 
	$bs_livres_id = $bs_livres->id; 
}

if(!isset($bs_musique)) {
	$bs_musique_titre = "Aucun Best Seller";
	$bs_musique_photo = "images/nothing.png";
	$bs_musique_id = "";
} else {
	$bs_musique_titre = $bs_musique->titre;
	$bs_musique_photo = $bs_musique->photo;
	$bs_musique_id = $bs_musique->id;
}

if(!isset($bs_vetements)) {
	$bs_vetements_titre = "Aucun Best Seller";
	$bs_vetements_photo = "images/nothing.png";
	$bs_vetements_id = "";
} else {
	$bs_vetements_titre = $bs_vetements->titre;
	$bs_vetements_photo = $bs_vetements->photo;
	$bs_vetements_id = $bs_vetements->id;
}

if(!isset($bs_sel)) {
	$bs_sel_titre = "Aucun Best Seller";
	$bs_sel_photo = "images/nothing.png";
	$bs_sel_id = "";
} else {
	$bs_sel_titre = $bs_sel->titre;
	$bs_sel_photo = $bs_sel->photo;
	$bs_sel_id = $bs_sel->id;
}

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
	<h1  style="text-align:center"> Voice les Best-Sellers des différentes catégories !</h1><br/>
		<div class="row">
				<div class="offset-md-1 col-md-3">
					<h4>Livre :</h4>
					<div class="img-thumbnail">
						<a href="produit.php?id=<?php echo $bs_livres_id; ?>&cat=livres">
							<img src="<?php echo $bs_livres_photo; ?>" style="width: 100%">
							<div class="caption">
								<p>
									<?php echo $bs_livres_titre; ?>
								</p>
							</div>
						</a>
					</div>
				</div>
				<div class="offset-md-4 col-md-3">
					<h4>Musique :</h4>
					<div class="img-thumbnail">
						<a href="produit.php?id=<?php echo $bs_musique_id; ?>&cat=musique">
							<img src="<?php echo $bs_musique_photo; ?>" style="width: 100%">
							<div class="caption">
								<p>
									<?php echo $bs_musique_titre; ?>
								</p>
							</div>
						</a>
					</div>
				</div>
		</div>
		<br>
		<div class="row">
			<div class="offset-md-1 col-md-3">
				<h4>Vetement :</h4>	
				<div class="img-thumbnail">
						<a href="produit.php?id=<?php echo $bs_vetements_id; ?>&cat=vetements">
							<img src="<?php echo $bs_vetements_photo; ?>" style="width: 100%">
							<div class="caption">
								<p>
									<?php echo $bs_vetements_titre; ?>
								</p>
							</div>
						</a>
					</div>
				</div>
				<div class="offset-md-4 col-md-3">
					<h4>Sport et Loisirs :</h4>
					<div class="img-thumbnail">
						<a href="produit.php?id=<?php echo $bs_sel_id; ?>&cat=sel">
							<img src="<?php echo $bs_sel_photo; ?>" style="width: 100%">
							<div class="caption">
								<p>
									<?php echo $bs_sel_titre; ?>
								</p>
							</div>
						</a>
					</div>
				</div>
		</div>
		<br><br><br><br>
	</div>
	<?php include 'footer.php'; ?>
</body>
</html>