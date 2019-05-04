<?php
//On demarre la sessions avant toute chose.
session_start();

include 'global.php';


if (isset($_GET['clear']))
{
	if (isset($_SESSION['cart']))
	{
		$_SESSION['cart'] = [];
	}
}

if (isset($_SESSION['cart']))
{
	if (isset($_POST['removeProd']))
	{
		unset($_SESSION['cart'][$_POST['removeProd']]);
	}
	if (isset($_GET['updateQuantity']) && isset($_GET['id']))
	{
		echo "COUCOU"; 
		$_SESSION['cart'][$_GET['id']]['quantite'] = $_GET['updateQuantity'];
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

		function clearCart()
		{
			window.location.href = "panier.php?clear=true";
		}
		function clearProd(id)
		{
			console.log(id);
			sendPostRequest("panier.php", "removeProd=" + id);
			window.location.href = "panier.php";
		}

		function updatePrice(id)
		{
			// alert("The input value has changed. The new value is: " + value);

			// var oldPrice = parseInt(document.getElementById('totalPrice').innerHTML);
			// var diffPrice = quantity * price;
			// var newPrice = oldPrice - diffPrice + parseInt(value) * price;
			// console.log(quantity);
			// console.log(oldPrice);
			// console.log(oldPrice - diffPrice);
			// console.log(newPrice);
			// document.getElementById('totalPrice').innerHTML = newPrice;
			// sendPostRequest("panier.php", "updateQuantity=" + value + "&id=" + id);
			var value = document.getElementById(id).value;
			window.location.href = "panier.php?updateQuantity=" + value + "&id=" + id;
		}

		function goToOrderPage()
		{
			window.location.href = "commande.php";
		}

		function lol(val)
		{
			alert("LOL: " + val);
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
				// $totalPrice = 0;

				// for ($i = 0; $i < $cartSize; $i++)
				// {
				// 	$product = $cart[$i];
				// 	$totalPrice += $product['valeur_commande'] * $product['quantite'];
				// }

				$totalPrice = getCartTotalPrice();

				echo "<div style='position: fixed; top: 0px; width: 100%; left: 50%; z-index: 1000; transform: translateX(-50%); padding: 20px; padding-top: 76px; background-color: white'>";
				echo "<button class='btn btn-danger' onclick='clearCart()'>Vider le panier</button>";
				echo "<button class='btn btn-success' style='float:right' onclick='goToOrderPage()'>Passer à la commande</button>";
				echo "<span style='float:right; margin-right: 40px; padding-top: 6px; font-size: 18px; font-weight: bold'>Prix Total: <span id='totalPrice'>".$totalPrice."</span> €</span>";
				echo "</div>";
				echo "<br />";
				echo "<br />";
				echo "<br />";

				foreach ($cart as $row => $product)
				{
					$cat = $product['cat'];
					$productId = $product['id_produit'];

					$sql = "SELECT * FROM `".$cat."` WHERE `id`='".$productId."'";
					$result = mysqli_query($db_handle, $sql) or die(mysqli_error($db_handle));
					$data = mysqli_fetch_assoc($result);

					echo "<hr />";
					echo "<div class='container-fluid'>";
					echo "		<div class='row'>";
					echo "			<div class='col-lg'>";
					echo "				<a href=produit.php?cat=".$cat."&id=".$data['id']."><strong>".$data['titre']."</strong></a><br /><br />";
					echo "				<img src=".$data['photo']." alt='nous n avons pas trouvé' width= '100px'>";
					echo "			</div>";
					echo "			<div class='col col-lg-3'>";
					echo "				<br /><button class='btn btn-sm btn-danger' onclick='clearProd(".$row.")'>Supprimer du panier</button><br /><br /><br />";
					echo "				<div>";
					echo "					<p><strong>Prix : </strong>".$data['prix']." €</p>";
					echo "					<p><strong>Quantité: </strong><input id='".$row."' type=\"number\" name=\"quantity\" min=\"1\" max=\"5\" value=\"".$product['quantite']."\"><button class='btn btn-sm' onclick='updatePrice(".$row.")'>OK</button></p>";
					echo "				</div>";
					echo "			</div>";
					echo "		</div>";
					echo "</div>";
				}
			}
			else
			{
					echo "<hr />";
					echo "<br />";
					echo "<div class='container'>";
					echo "	<div class='row'>";
					echo "		<div class='col-lg-2'>";
					echo "			<img src='images/sad.jpg' class='img-rounded' width='80%' height='90%'>";
					echo "		</div>";
					echo "		<div class='col-lg-10'>";
					echo "			<br />";
					echo "			<br />";
					echo "			<strong>Il semblerait que votre panier soit vide ! Vite vite, retrounez sur le site pour le remplir <a href='recherche.php'>ici</a></strong>";
					echo "		</div>";
					echo "	</div>";
					echo "</div>";
				
			}

		?>
	</div>
	
	<?php include 'footer.php'; ?>
</body>
</html>