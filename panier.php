<?php
//On demarre la sessions avant toute chose.
session_start();


if (isset($_GET['clear']))
{
	if (isset($_SESSION['cart']))
	{
		$_SESSION['cart'] = [];

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
	<link rel="stylesheet" type="text/css" href="style.css">
	<script type="text/javascript">
		$(document).ready(function(){	
			$('.header').height($(window).height());
		});

		function clearCart()
		{
			window.location.href = "panier.php?clear=true";
		}

		function updatePrice(value, quantity, price, cat, id)
		{
			alert("The input value has changed. The new value is: " + value);
			// var oldPrice = parseInt(document.getElementById('totalPrice').innerHTML);
			// var diffPrice = quantity * price;
			// var newPrice = oldPrice - diffPrice + parseInt(e.target.value) * price;
			// document.getElementById('totalPrice').innerHTML = newPrice;
			// sendPostRequest("panier.php", "updatePrice=" + newPrice);
		}

	</script>
</head>
<body>
	<?php include 'Navbar.php'; ?>
	
	<div class="container container-margin">
		<?php

			if (isset($_SESSION['cart']) && count($_SESSION['cart']) != 0)
			{
				$cart = $_SESSION['cart'];
				$cartSize = count($cart);
				$totalPrice = 0;

				for ($i = 0; $i < $cartSize; $i++)
				{
					$product = $cart[$i];
					$totalPrice += $product['valeur_commande'] * $product['quantite'];
				}

				echo "<div style='position: fixed; top: 0px; width: 100%; left: 50%; transform: translateX(-50%); padding: 20px; padding-top: 76px; background-color: white'>";
				echo "<button class='btn btn-danger' onclick='clearCart()'>Vider le panier</button>";
				echo "<button class='btn btn-success'  style='float:right'>Passer à la commande</button>";
				echo "<span style='float:right; margin-right: 40px; padding-top: 6px; font-size: 18px; font-weight: bold'>Prix Total: <span id='totalPrice'>".$totalPrice."</span> €</span>";
				echo "</div>";
				echo "<br />";
				echo "<br />";
				echo "<br />";

				for ($i = 0; $i < $cartSize; $i++)
				{
					$product = $cart[$i];
					$cat = $product['cat'];
					$productId = $product['id_produit'];

					$sql = "SELECT * FROM `".$cat."` WHERE `id`='".$productId."'";
					$result = mysqli_query($db_handle, $sql) or die(mysqli_error($db_handle));
					$data = mysqli_fetch_assoc($result);

					echo "<hr />";
					echo "<div class='container-fluid'>";
					echo "	<table class='product_table_search'><tbody>";
					echo "		<div class='row'>";
					echo "			<tr class='col-lg-2'>";
					echo "				<td>";
					echo "					<strong>".$data['titre']."</strong>";
					echo "				</td>";
					echo "			</tr>";
					echo "		</div>";
					echo "		<div class='row' style='display: inline-block'";
					echo "			<div class='col-lg-6'>";
					echo "				<tr >";
					echo "					<td >";
					echo "						<img src=".$data['photo']." alt='nous n avons pas trouvé' width= '100px'>";
					echo "					</td>";
					echo "					<td >";
					echo "						<p>".$data['description']."</p><br />";
					echo "						<p><strong>Prix : </strong>".$data['prix']." €</p>";
					echo "						<p><strong>Quantité: </strong><input onupdate=\"updatePrice(this.value, ".$product['quantite'].", ".$data['prix'].", ".$cat.", ".$data['id'].")\" type=\"number\" name=\"quantity\" min=\"1\" max=\"5\" value=\"".$product['quantite']."\"></p>";
					echo "					</td>";
					echo "				</tr>";
					echo "			</div>";
					echo "		</div>";
					echo "	</tbody></table>";
					echo "</div>";
				}
			}
			else
			{
				echo "Votre panier est vide ! Vite vite, retrounez sur le site pour le remplir <a href='recherche.php'>ici</a>";
			}

		?>
	</div>
	
	<?php include 'footer.php'; ?>
</body>
</html>