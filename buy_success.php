<?php
//On demarre la sessions avant toute chose.
session_start();

include 'global.php';

$checkout = "";
$price = 0;

if (isset($_GET['checkout']) && isset($_GET['price']))
{
    $checkout = mysqli_real_escape_string($db_handle, htmlspecialchars($_GET['checkout']));
    $price = intval($_GET['price']);
    $sql = "SELECT * FROM `commandes` WHERE `nbr_commande`='".$checkout."'";
    $result = mysqli_query($db_handle, $sql) or die(mysqli_error($db_handle));
    
    if (mysqli_num_rows($result) == 0)
    {
        header("location: Accueil.php");
    }
}
else
{
    header("location: Accueil.php");
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

	<div class="container container-margin" style="text-align: center">
        <br />
        <br />
		<h3>Votre commande '<?php echo $checkout; ?>' d'un montant de <?php echo $price; ?>€ a été effectué avec succes !</h3>
        <p>Vous pouvez <a href="Accueil.php">revenir à l'accueil</a> ou faire de <a href="best-sellers.php">nouveaux achats</a> !</p>
        <br />
        <br />
        <br />
	</div>
	
	<?php include 'footer.php'; ?>
</body>
</html>