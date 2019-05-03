<?php
//On demarre la sessions avant toute chose.
session_start();

include 'global.php';

if (isset($_POST['add']) && isset($_POST['id']))
	addToCart($db_handle, $_POST['add'], $_POST['id'], $_POST['quantity']);

$categories = $_GET['cat'];
if (isset($categories)) {
	$categories = explode(',', $categories);
}
$search = $_GET['search'];
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
		function addCart(cat, id) {
			var quantity = document.getElementById('q' + id).value;
			//window.location.href = 'recherche.php?add=' + cat + '&id=' + id + "$quantity=";
			sendPostRequest("recherche.php", "add=" + cat + "&id=" + id + "&quantity=" + quantity);
			var cartCount = document.getElementById("cart_size").innerHTML;
			document.getElementById("cart_size").innerHTML = "1";
			if (cartCount != "Vide")
				document.getElementById("cart_size").innerHTML = parseInt(cartCount) + 1;
			console.log("Cart size: " + cartCount);
		}
	</script>
</head>
<body>
	<?php include 'Navbar.php'; ?>
		<div class="container container-margin">
			<?php
			$sql = "SHOW TABLES";
			$result = mysqli_query($db_handle, $sql);
			
			$results = 0;
			while ($value = mysqli_fetch_assoc($result)) {
				$cat = $value["Tables_in_piscinedb2"];
				if (!strcmp($cat, "admin") || !strcmp($cat, "vendeur") || !strcmp($cat, "acheteur") || !strcmp($cat, "commandes")) {
					continue;
				}

				// echo "<strong>".$name.":</strong><br>";

				if (isset($search))
				{

					$keywords = mysqli_real_escape_string($db_handle, htmlspecialchars($search));
					$sql = "SELECT * FROM `".$cat."` WHERE `titre` LIKE '%".$keywords."%'";
					$result2 = mysqli_query($db_handle, $sql) or die(mysqli_error($db_handle));
					
					if (mysqli_num_rows($result2) > 0)
					{
						while ($value = mysqli_fetch_assoc($result2)) {
							echo "<hr />";
							echo "<div class='container'>";
							echo "	<table class='product_table_search'><tbody>";
							echo "		<div class='row'>";
							echo "			<tr class='col-md-2'>";
							echo "				<td>";
							echo "					<strong>".$value['titre']."</strong>";
							echo "				</td>";
							echo "			</tr>";
							echo "		</div>";
							echo "		<div class='row'>";
							echo "			<tr class='col-md-6'>";
							echo "				<td >";
							echo "					<img src=".$value['photo']." alt='nous n avons pas trouvé' width= '150px'>";
							echo "				</td>";
							echo "				<td >";
							echo "					<p>".$value['description']."</p><br />";
							echo "					<p><strong>Prix : </strong>".$value['prix']." €</p><br />";
							echo "					<br />";
							echo "					<div class='form-group'>";
							echo "					<div style='position: relative;'>";
							echo "						<select id='q".$value['id']."' class='form-control' style='width:60px; position: absolute'>";
							echo "							<option>1</option>";
							echo "							<option>2</option>";
							echo "							<option>3</option>";
							echo "							<option>4</option>";
							echo "							<option>5</option>";
							echo "						</select>";
							echo "						<button onclick='addCart(\"".$cat."\", ".$value['id'].")'' type='button' class='btn btn-success' style='position: absolute; left: 70px'>Ajouter à mon panier</button><br />";
							echo "					</div>";
							echo "					<br />";
							echo "				</td>";
							echo "			</tr>";
							echo "		</div>";
							echo "	</tbody></table>";
							echo "</div>";


							echo "<br />";
							$results++;
						}
					}
				}

				// echo "<br />";

				/*
				if (isset($categories)) {
					foreach ($categories as $row => $elem) {
						if (!strcmp($name, $elem)) {
							echo "X ";	
						}
					}
				}*/
			}

			if ($results == 0)
				{
					echo "Rien de dispo !";
				}

			?>
		</div>

	<?php include 'footer.php'; ?>
	
	
	</body>
	</html>