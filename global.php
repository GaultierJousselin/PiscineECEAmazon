<?php

include 'connect.php';

function addToCart($catInput, $idInput)
{
	$cat = htmlspecialchars($catInput);
	$id = intval($idInput);
	$quantity = 1;
	if (isset($_GET['quantity']))
		$quantity = intval($_GET['quantity']);

	if ($quantity < 1)
		$quantity = 1;
	if ($quantity > 5)
		$quantity = 5;

	$sql = "SELECT * FROM `".$cat."` WHERE `id`='".$id."'";
	$result = mysqli_query($db_handle, $sql) or die(mysqli_error($db_handle));

	if ($mysqli_num_rows($result) == 1)
	{
		//$user_id = $_SESSION['id'];
		$user_id = 0;
		
		$sql = "SELECT * FROM `commandes` WHERE `id_acheteur`='".$user_id."' AND `bought`='false'";
		$result2 = mysqli_query($db_handle, $sql) or die(mysqli_error($db_handle));

		$command = intval($user_id."".time()."".mt_rand(0, 100));

		if (mysqli_num_rows($result2) == 0)
			$command = mysqli_fetch_assoc($result2)['numero_commande'];

		$sql = "INSERT INTO `commandes` (`id_produit`, `id_acheteur`, `id_vendeur`, `quantite`, `valeur_commande`, `bought`, `numero_commande`, `cat`) VALUES ('".$id."', '".$user_id."', '".$result['id_vendeur']."', '".$quantity."', '".$result['prix']."', 'false', '".$command."', '".$cat."');";
		$res = mysqli_query($db_handle, $sql) or die(mysqli_error($db_handle));
	}
}

?>