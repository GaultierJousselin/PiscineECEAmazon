<?php
//On demarre la sessions avant toute chose.
session_start();

include 'global.php';

if (isset($_POST['add']) && isset($_POST['id']))
	addToCart($db_handle, $_POST['add'], $_POST['id'], $_POST['quantity']);

$categories = isset($_GET['cat']) ? $_GET['cat'] : NULL;
if (isset($categories)) {
	$categories = explode(',', $categories);
}
$search = isset($_GET['search']) ? $_GET['search'] : NULL;

$livresCat = false;
$musiqueCat = false;
$vetementsCat = false;
$selCat = false;
if(isset($categories)){
	foreach ($categories as $row => $elem)
	{
		$livresCat = $livresCat ? $livresCat : strcmp($elem, "livres") == 0;
		$musiqueCat = $musiqueCat ? $musiqueCat : strcmp($elem, "musique") == 0;
		$vetementsCat = $vetementsCat ? $vetementsCat : strcmp($elem, "vetements") == 0;
		$selCat = $selCat ? $selCat : strcmp($elem, "sel") == 0;
	}
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

		function updateCategories(search)
		{
			var livres = document.getElementById("livres_check").checked;
			var musique = document.getElementById("musque_check").checked;
			var vetements = document.getElementById("vetements_check").checked;
			var sel = document.getElementById("sel_check").checked;

			var query = "";
			if (livres)
				query += "livres,";
			if (musique)
				query += "musique,";
			if (vetements)
				query += "vetements,";
			if (sel)
				query += "sel,";
			query =	query.substring(0, query.length - 1);

			document.location.href = "recherche.php?cat=" + query + "&search=" + search;
		}
	</script>
</head>
<body>
	<?php include 'Navbar.php'; ?>
		<div class="search_cat">
			<h4>Catégories</h4>
			<br />
			<div id="save_card_check" class="form-group">
				<div class="form-check">
					<input class="form-check-input" type="checkbox" id="livres_check" name="livres_check" <?php echo ($livresCat ? "checked" : ""); ?>>
					<label class="form-check-label" for="livres_check">
					Livres
					</label>
				</div>
			</div>
			<div id="save_card_check" class="form-group">
				<div class="form-check">
					<input class="form-check-input" type="checkbox" id="musque_check" name="musque_check" <?php echo ($musiqueCat ? "checked" : ""); ?>>
					<label class="form-check-label" for="musque_check">
					Musique
					</label>
				</div>
			</div>
			<div id="save_card_check" class="form-group">
				<div class="form-check">
					<input class="form-check-input" type="checkbox" id="vetements_check" name="vetements_check" <?php echo ($vetementsCat ? "checked" : ""); ?>>
					<label class="form-check-label" for="vetements_check">
					Vetements
					</label>
				</div>
			</div>
			<div id="save_card_check" class="form-group">
				<div class="form-check">
					<input class="form-check-input" type="checkbox" id="sel_check" name="sel_check" <?php echo ($selCat ? "checked" : ""); ?>>
					<label class="form-check-label" for="sel_check">
					Sports et Loisirs
					</label>
				</div>
			</div>
			<button class="btn btn-sm" onclick="updateCategories('<?php echo $search; ?>')">Filtrer</button>
		</div>
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

				if (isset($search) && !isset($categories))
				{
					$keywords = mysqli_real_escape_string($db_handle, htmlspecialchars($search));
					$sql = "SELECT * FROM `".$cat."` WHERE `titre` LIKE '%".$keywords."%'";
					$result2 = mysqli_query($db_handle, $sql) or die(mysqli_error($db_handle));
					
					if (mysqli_num_rows($result2) > 0)
					{
						while ($value = mysqli_fetch_assoc($result2)) 
						{
							$alreadyInCart = false;
							
							if (isset($_SESSION['cart']))
							{
								$cart = $_SESSION['cart'];
								$cartSize = count($cart);
	
								foreach ($cart as $row => $product)
								{
									if ($product['cat'] == $cat && $product['id_produit'] == $value['id'])
									{
										$alreadyInCart = true;
										break;
									}
								}
							}

							echo "<hr />";
							echo "<div class='container'>";
							echo "	<table class='product_table_search'><tbody>";
							echo "		<div class='row'>";
							echo "			<tr class='col-md-2'>";
							echo "				<td>";
							echo "					<strong><a href='produit.php?cat=".$cat."&id=".$value['id']."'>".$value['titre']."</strong>";
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
							echo "						<select id='q".$cat."".$value['id']."' class='form-control' style='width:60px; position: absolute'>";
							echo "							<option>1</option>";
							echo "							<option>2</option>";
							echo "							<option>3</option>";
							echo "							<option>4</option>";
							echo "							<option>5</option>";
							echo "						</select>";
							echo "						<button onclick='addCart(event, \"".$cat."\", ".$value['id'].")'' type='button' class='btn btn-success' style='position: absolute; left: 70px' ".($alreadyInCart ? "disabled" : "").">Ajouter à mon panier</button><br />";
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
			}
			

			if (isset($categories) && !isset($search))
			{
				foreach ($categories as $row => $cat)
				{
					$keywords = mysqli_real_escape_string($db_handle, htmlspecialchars($cat));
					$sql = "SELECT * FROM `".$cat."`";
					$result2 = mysqli_query($db_handle, $sql) or die(mysqli_error($db_handle));
					
					if (mysqli_num_rows($result2) > 0)
					{
						while ($value = mysqli_fetch_assoc($result2)) 
						{
							$alreadyInCart = false;
							
							if (isset($_SESSION['cart']))
							{
								$cart = $_SESSION['cart'];
								$cartSize = count($cart);
	
								for ($i = 0; $i < $cartSize; $i++)
								{
									$product = $cart[$i];
									if ($product['cat'] == $cat && $product['id_produit'] == $value['id'])
									{
										$alreadyInCart = true;
										break;
									}
								}
							}

							echo "<hr />";
							echo "<div class='container'>";
							echo "	<table class='product_table_search'><tbody>";
							echo "		<div class='row'>";
							echo "			<tr class='col-md-2'>";
							echo "				<td>";
							echo "					<strong><a href='produit.php?cat=".$cat."&id=".$value['id']."'>".$value['titre']."</strong>";
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
							echo "						<select id='q".$cat."".$value['id']."' class='form-control' style='width:60px; position: absolute'>";
							echo "							<option>1</option>";
							echo "							<option>2</option>";
							echo "							<option>3</option>";
							echo "							<option>4</option>";
							echo "							<option>5</option>";
							echo "						</select>";
							echo "						<button onclick='addCart(event, \"".$cat."\", ".$value['id'].")'' type='button' class='btn btn-success' style='position: absolute; left: 70px' ".($alreadyInCart ? "disabled" : "").">Ajouter à mon panier</button><br />";
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
			}
			if (isset($categories) && isset($search))
				{
					foreach ($categories as $row => $cat)
					{
						$keywords = mysqli_real_escape_string($db_handle, htmlspecialchars($cat));
						$keywords2 = mysqli_real_escape_string($db_handle, htmlspecialchars($search));
						$sql = "SELECT * FROM `".$cat."` WHERE `titre` LIKE '%".$keywords2."%'";
						$result2 = mysqli_query($db_handle, $sql) or die(mysqli_error($db_handle));
						
						if (mysqli_num_rows($result2) > 0)
						{
							while ($value = mysqli_fetch_assoc($result2)) 
							{
								$alreadyInCart = false;
								
								if (isset($_SESSION['cart']))
								{
									$cart = $_SESSION['cart'];
									$cartSize = count($cart);
		
									for ($i = 0; $i < $cartSize; $i++)
									{
										$product = $cart[$i];
										if ($product['cat'] == $cat && $product['id_produit'] == $value['id'])
										{
											$alreadyInCart = true;
											break;
										}
									}
								}

								echo "<hr />";
								echo "<div class='container'>";
								echo "	<table class='product_table_search'><tbody>";
								echo "		<div class='row'>";
								echo "			<tr class='col-md-2'>";
								echo "				<td>";
								echo "					<strong><a href='produit.php?cat=".$cat."&id=".$value['id']."'>".$value['titre']."</strong>";
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
								echo "						<select id='q".$cat."".$value['id']."' class='form-control' style='width:60px; position: absolute'>";
								echo "							<option>1</option>";
								echo "							<option>2</option>";
								echo "							<option>3</option>";
								echo "							<option>4</option>";
								echo "							<option>5</option>";
								echo "						</select>";
								echo "						<button onclick='addCart(event, \"".$cat."\", ".$value['id'].")'' type='button' class='btn btn-success' style='position: absolute; left: 70px' ".($alreadyInCart ? "disabled" : "").">Ajouter à mon panier</button><br />";
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
				}

			if ($results == 0)
				{
					echo "<script>window.location.href='best-sellers.php';</script>";
				}

			?>
		</div>

	<?php include 'footer.php'; ?>
	
	
	</body>
	</html>