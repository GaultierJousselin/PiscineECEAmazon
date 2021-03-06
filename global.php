<?php

include 'connect.php';

function addToCart($db_handle, $catInput, $idInput, $quantityInput)
{
	$cat = htmlspecialchars($catInput);
	$id = intval($idInput);
	$quantity = 1;
	if (isset($quantityInput))
		$quantity = $quantityInput;

	if ($quantity < 1)
		$quantity = 1;
	if ($quantity > 5)
		$quantity = 5;

	$sql = "SELECT * FROM `".$cat."` WHERE `id`='".$id."'";
	$result = mysqli_query($db_handle, $sql) or die(mysqli_error($db_handle));

	if (mysqli_num_rows($result) == 1)
	{
		//$user_id = $_SESSION['id'];
		$user_id = 0;
		$data = mysqli_fetch_assoc($result);
		
		$sql = "SELECT `nbr_commande` FROM `commandes` WHERE `id_acheteur`='".$user_id."' AND `bought`='0'";
		$result2 = mysqli_query($db_handle, $sql) or die(mysqli_error($db_handle));
		$data2 = mysqli_fetch_assoc($result2);

		$command = $user_id."".time();
		
		if (isset($_SESSION['cart']) && count($_SESSION['cart']) != 0)
			$command = $_SESSION['cart'][0]['nbr_commande'];
		
		$parsedData = array(
			"id_produit" => $id,
			"id_acheteur" => $user_id,
			"id_vendeur" => $data['id_vendeur'],
			"quantite" => $quantity,
			"valeur_commande" => intval($data['prix']),
			"bought" => '0',
			"nbr_commande" => $command,
			"cat" => $cat
		);

		$_SESSION['cart'][] = $parsedData;


		print_r($_SESSION['cart']);

		// $sql = "INSERT INTO `commandes` (`id_produit`, `id_acheteur`, `id_vendeur`, `quantite`, `valeur_commande`, `bought`, `nbr_commande`, `cat`) VALUES ('".$id."', '".$user_id."', '".$data['id_vendeur']."', '".$quantity."', '".intval($data['prix'])."', '0', '".$command."', '".$cat."')";
		// $res = mysqli_query($db_handle, $sql) or die(mysqli_error($db_handle));
	}
}

function getCartTotalPrice()
{
	$totalPrice = 0;
	
	if (isset($_SESSION['cart']) && count($_SESSION['cart']) != 0)
	{
		$cart = $_SESSION['cart'];
		$cartSize = count($cart);

		foreach ($cart as $row => $elem)
		{
			$totalPrice += $elem['valeur_commande'] * $elem['quantite'];
		}
	}

	return $totalPrice;
}

function connectGmail()
{

}
function sendMail($mail, $nbr_cmd, $price_cmd)
{
	$to      =  $mail;
	$subject = 'Confirmation commande n°'.$nbr_cmd.'.';
	$message = '<h1>Bonjour !</h1>
				<p>Voici la confirmation de la commande n°'.$nbr_cmd.' d un montant de '.$price_cmd.' euros.</p>
				<br/> 
				<p><strong>Nous esperons vous revoir bientôt sur ECEAmazon !</strong></p>  
				';
	$headers = 'From: no.reply.ece.amazon@gmail.com' . "\r\n" .
	'X-Mailer: PHP/' . phpversion() . "\r\n"
	;
	$headers .= "Content-Type: text/html; charset=UTF-8\r\n";

	mail($to, $subject, $message, $headers);
}

?>