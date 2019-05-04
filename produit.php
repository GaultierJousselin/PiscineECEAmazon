<?php
//On demarre la sessions avant toute chose.
session_start();

include 'global.php';

if (!isset($_GET['id']) || !isset($_GET['cat']))
{
	header("location: Accueil.php");
}

$id_produit = mysqli_real_escape_string($db_handle, $_GET['id']);
$cat = mysqli_real_escape_string($db_handle, $_GET['cat']);

$sql = " SELECT * FROM ".$cat." WHERE ".$cat.".id=".$id_produit;
$result = mysqli_query($db_handle, $sql) or die ("Message d'erreur: " . mysqli_error($db_handle) );
$product = mysqli_fetch_assoc($result);
$result->close();

$sql = " SELECT * FROM vendeur WHERE vendeur.id=".$product['id_vendeur'];
$result = mysqli_query($db_handle, $sql) or die ("Message d'erreur: " . mysqli_error($db_handle) );
$vendor = mysqli_fetch_assoc($result);

$str = "Infos du vendeur";

$alreadyInCart = false;

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
	<script src="global.js"></script>
	<link rel="stylesheet" type="text/css" href="style.css">
	<script type="text/javascript">
		$(document).ready(function(){	
			$('.header').height($(window).height());
        });
        
        function addCart(e, cat, id) {
			var quantity = document.getElementById('q' + cat + '' + id).value;
			sendPostRequest("recherche.php", "add=" + cat + "&id=" + id + "&quantity=" + quantity);
			var cartCount = document.getElementById("cart_size").innerHTML;
			document.getElementById("cart_size").innerHTML = "1";
			if (cartCount != "Vide")
				document.getElementById("cart_size").innerHTML = parseInt(cartCount) + 1;
			console.log("Cart size: " + cartCount);
			e.target.disabled = true;
		}
	</script>
</head>
<body>
	<?php include 'Navbar.php'; ?>

	<div class="container container-margin">
    <?php

        $alreadyInCart = false;
                                    
        if (isset($_SESSION['cart']))
        {
            $cart = $_SESSION['cart'];
            $cartSize = count($cart);

            foreach ($cart as $row => $elem)
            {
                if ($elem['cat'] == $cat && $elem['id_produit'] == $product['id'])
                {
                    $alreadyInCart = true;
                    break;
                }
            }
        }

        echo "<div class='container'>";
        echo "	<table class='product_table_search'><tbody>";
        echo "		<div class='row'>";
        echo "			<tr class='col-md-2'>";
        echo "				<td>";
        echo "					<strong>".$product['titre']."</strong>";
        echo "				</td>";
        echo "			</tr>";
        echo "		</div>";
        echo "		<div class='row'>";
        echo "			<tr class='col-md-6'>";
        echo "				<td >";
        echo "					<img src=".$product['photo']." alt='nous n avons pas trouvé' width= '150px'>";
        echo "				</td>";
        echo "				<td >";
        echo "					<p>".$product['description']."</p><br />";
        echo "					<p><strong>Prix : </strong>".$product['prix']." €<br />";
        if (!strcmp($cat, "livres"))
        {
            echo "					<strong>Année : </strong>".$product['annee']."<br />";
            echo "					<strong>Auteur : </strong>".$product['auteur']."<br />";
            echo "					<strong>Editeur : </strong>".$product['editeur']."</p><br />";
        }
        if (!strcmp($cat, "musique"))
        {
            echo "					<strong>Année : </strong>".$product['annee']."<br />";
            echo "					<strong>Auteur : </strong>".$product['auteur']."<br />";
            echo "					<strong>Producteur : </strong>".$product['producteur']."</p><br />";
        }
        if (!strcmp($cat, "vetements"))
        {
            echo "					<strong>Genre : </strong>".$product['genre']."<br />";
            echo "					<strong>Type : </strong>".$product['type']."<br />";
        }
        if (!strcmp($cat, "sel"))
        {
            echo "					<strong>Type : </strong>".$product['type']."<br />";
        }
        echo "					<br />";
        echo "					<div class='form-group'>";
        echo "					<div style='position: relative;'>";
        echo "						<select id='q".$cat."".$product['id']."' class='form-control' style='width:60px; position: absolute'>";
        echo "							<option>1</option>";
        echo "							<option>2</option>";
        echo "							<option>3</option>";
        echo "							<option>4</option>";
        echo "							<option>5</option>";
        echo "						</select>";
        echo "						<button onclick='addCart(event, \"".$cat."\", ".$product['id'].")'' type='button' class='btn btn-success' style='position: absolute; left: 70px' ".($alreadyInCart ? "disabled" : "").">Ajouter à mon panier</button><br />";
        echo "					</div>";
        echo "					<br />";
        echo "				</td>";
        echo "			</tr>";
        echo "		</div>";
        echo "	</tbody></table>";
        echo "</div>";
        echo "<br />";
        ?>
	</div>
	
	<?php include 'footer.php'; ?>
</body>
</html>