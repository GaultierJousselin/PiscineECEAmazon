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
	<?php include 'Navbar.php'; ?>
	<div class="container container-margin">
	<div class="row">
			<div class="offset-md-1 col-md-3">
				<div class="img-thumbnail">
					<a href="recherche.php?cat=livres">
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
					<a href="recherche.php?cat=musique">
						<img src="images/note.jpg" style="width: 100%">
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
					<a href="recherche.php?cat=vetements">
						<img src="images/vetements.png" style="width: 100%">
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
					<a href="recherche.php?cat=sel">
						<img src="images/sploi.jpg" style="width: 100%">
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
	<?php include 'footer.php'; ?>
</body>
</html>