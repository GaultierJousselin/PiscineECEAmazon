<?php

$servername = "localhost";
$username ="root";
$password = "root";
$dbname = "piscinedb2";
$sql = "";
$connection = new mysqli($servername, $username, $password, $dbname);
if($connection->connect_error) {
	die("Connection failed: " . $connection->connect_error);
}

//On recup $id_produit et $catégorie

$id_produit = 2;
$cat = "livres";

$sql = " SELECT * FROM ".$cat." WHERE ".$cat.".id=".$id_produit;
$result = mysqli_query($connection, $sql) or die ("Message d'erreur: " . mysqli_error($connection) );
$obj= $result->fetch_object();
$result->close();


$sql = " SELECT * FROM vendeur WHERE vendeur.id=".$obj->id_vendeur;
$result = mysqli_query($connection, $sql) or die ("Message d'erreur: " . mysqli_error($connection) );
$obj2= $result->fetch_object();

$str = "Infos du vendeur";

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

	<div class="container container-margin ">

		<div class="row">
			

			<?php echo "<img src=".$obj->photo." alt='Photo manquante' class='img-responsive ' style='height: 250px;width: 250px;'>" ?>

			<div class="alert alert-success col-sm" role="alert">
				<?php 
			  		echo "<h4 class='alert-heading'>$obj->titre</h4>";
			  	?>

			  <div class="card  text-dark" >
				  

			  	<nav >
				  <div class="nav nav-tabs " id="nav-tab" role="tablist">
				    <a class="nav-item nav-link active text-dark " id="nav-home-tab" data-toggle="tab" href="#nav-home" role="tab" aria-controls="nav-home" aria-selected="true">Informations</a>
				    <a class="nav-item nav-link text-dark " id="nav-buy-tab" data-toggle="tab" href="#nav-buy" role="tab" aria-controls="nav-buy" aria-selected="true">Acheter maintenant</a>
				    <a class="nav-item nav-link text-dark" id="nav-contact-tab" data-toggle="tab" href="#nav-contact" role="tab" aria-controls="nav-contact" aria-selected="true">Contact</a>
				  </div>
				</nav>

				<div class="tab-content " id="nav-tabContent">
				  <div class="tab-pane fade show active" id="nav-home" role="tabpanel" aria-labelledby="nav-home-tab">
				  	<ul class="list-unstyled">
				  		<?php 
				  		echo "
					    <ul>
					      <li>Prix (TTC) : ".$obj->prix." € </li>
					      <li>Année : ".$obj->annee." </li>
					      <li>Éditeur : ".$obj->editeur." </li>
					      <li>Quantité : ".$obj->quantite." </li>
					    </ul>
					    <hr>
					    <p class='mb-1'>".$obj->description."</p>
					</ul>
					";?>
				</div>

				 <div class="tab-pane fade" id="nav-buy" role="tabpanel" aria-labelledby="nav-buy-tab">


				 	<?php
				 			echo "						<select id='q".$obj->id."' class='form-control' style='width:60px; position: absolute'>";
							echo "							<option>1</option>";
							echo "							<option>2</option>";
							echo "							<option>3</option>";
							echo "							<option>4</option>";
							echo "							<option>5</option>";
							echo "						</select>"; 
				 			echo "						<button onclick='addCart(\"".$cat."\", ".$obj->id.")'' type='button' class='btn btn-success' style='position: absolute; left: 70px'>Ajouter à mon panier</button><br />";
							
				 	?>

				 </div>
				  
				 	<div class='tab-pane fade bg-dark text-white ' id='nav-contact' role='tabpanel' aria-labelledby='nav-contact-tab'>
				 		
				 		Hahahaha
				 	</div>
				 
				</div>
			

		</div>
	</div>

</body>
<footer>
	<?php include 'footer.php'; ?>
</footer>

</html>

