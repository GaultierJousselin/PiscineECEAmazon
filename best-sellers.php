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

// if($db_found) {
// 	if (mysqli_num_rows($result) != 0) {
// 		$liv_nom = "Aucun Best Seller";
// 		$liv_image = "images/nothing.png";
// 		$mus_nom = "Aucun Best Seller";
// 		$mus_image = "images/nothing.png";
// 		$vet_nom = "Aucun Best Seller";
// 		$vet_image = "images/nothing.png";
// 		$sel_nom = "Aucun Best Seller";
// 		$sel_image = "images/nothing.png";
// 		echo "coucou";
// 	}
// 	else
// 	{
// 		echo "ERROR !!!!!!!!!!!";
// 	}
// } else {
// 	echo "Nous ne trouvons rien.";
// }
include 'sql_functions.php';

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
		<div class="row">
				<div class="offset-md-1 col-md-3">
					<div class="img-thumbnail">
						<a href="recherche.php/$idliv" target="_blank">
							<img src="<?php echo $bs_livres->photo; ?>" style="width: 100%">
							<div class="caption">
								<p>
									<?php echo $bs_livres->titre; ?>
								</p>
							</div>
						</a>
					</div>
				</div>
				<div class="offset-md-4 col-md-3">
					<div class="img-thumbnail">
						<a href="recherche.php/$idmus" target="_blank">
							<img src="<?php echo $bs_musique->photo; ?>" style="width: 100%">
							<div class="caption">
								<p>
									<?php echo $bs_musique->titre; ?>
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
						<a href="recherche.php/$idvet" target="_blank">
							<img src="<?php echo $bs_vetements->photo; ?>" style="width: 100%">
							<div class="caption">
								<p>
									<?php echo $bs_vetements->titre; ?>
								</p>
							</div>
						</a>
					</div>
				</div>
				<div class="offset-md-4 col-md-3">
					<div class="img-thumbnail">
						<a href="recherche.php/$idsel" target="_blank">
							<img src="<?php echo $bs_sel->photo; ?>" style="width: 100%">
							<div class="caption">
								<p>
									<?php echo $bs_sel->titre; ?>
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