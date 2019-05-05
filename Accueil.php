<?php
//On demarre la sessions avant toute chose.
session_start();

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

	<div class="" >

    <div class="row" >
      <div class="col">
        <div id="carouselExampleIndicators" class="carousel slide" data-ride="carousel">
      <ol class="carousel-indicators">
        <li data-target="#carouselExampleIndicators" data-slide-to="0" class="active"></li>
        <li data-target="#carouselExampleIndicators" data-slide-to="1"></li>
        <li data-target="#carouselExampleIndicators" data-slide-to="2"></li>
      </ol>
      <div class="carousel-inner" style= "height:65vh">
        <div class="carousel-item active">
          <img src="images/carrousel1.png" class="d-block w-100" alt="annonce">
        </div>
        <div class="carousel-item">
          <img src="images/carrousel2.png" class="d-block w-100" alt="solde">
        </div>
        <div class="carousel-item">
          <img src="images/carrousel3.png" class="d-block w-100" alt="promo">
        </div>
      </div>
      <a class="carousel-control-prev" href="#carouselExampleIndicators" role="button" data-slide="prev">
        <span class="carousel-control-prev-icon" aria-hidden="true"></span>
        <span class="sr-only">Previous</span>
      </a>
      <a class="carousel-control-next" href="#carouselExampleIndicators" role="button" data-slide="next">
        <span class="carousel-control-next-icon" aria-hidden="true"></span>
        <span class="sr-only">Next</span>
      </a>
    </div>
    </div>
    </div>
	</div>
  <br />
  <br />
  <div class="container">
  <div class="row">
      <div class="col">
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
      
      <div class="col">
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
  
    	<div class="col">
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
      </div>
    </div>
	<?php include 'footer.php'; ?>
</body>
</html>