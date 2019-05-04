<?php
//On demarre la sessions avant toute chose.
session_start();

include 'global.php';

$userConnected = false;

if (!isset($_SESSION['ID']))
{
    $userConnected = true;
    $_SESSION['oldPage'] = "commande.php";
    header("location: compte.php");
}

$user_id = $_SESSION['ID'];

// $sql = "SELECT * FROM `acheteur` WHERE `id`=$user_id";
$sql = "SELECT * FROM `acheteur` WHERE `id`='".$user_id."'";
$result = mysqli_query($db_handle, $sql) or die(mysqli_error($db_handle));
$user = mysqli_fetch_assoc($result);

$cardSaved = !empty($user['CB_nbr']) && !empty($user['CB_name']) && !empty($user['CB_date_expi']) && !empty($user['CB_CVC']); 

$errors = [];

if (isset($_POST['buy']) && isset($_SESSION['cart']) && count($_SESSION['cart']) != 0)
{
    $checkoutPrice = getCartTotalPrice();
    $checkoutNumber = $_SESSION['cart'][0]['nbr_commande'];

    $cardNbr = mysqli_real_escape_string($db_handle, htmlspecialchars($_POST['card_nbr']));
    $cardDate = mysqli_real_escape_string($db_handle, htmlspecialchars($_POST['card_date']));
    $cardCvc = mysqli_real_escape_string($db_handle, htmlspecialchars($_POST['card_cvc']));
    $cardName = mysqli_real_escape_string($db_handle, htmlspecialchars($_POST['card_name']));

    if (!preg_match('/^\d{16}$/', $cardNbr))
        $errors[] = "Mauvais numéro de carte !";
    if (!preg_match('/^\d{3,4}$/', $cardCvc))
        $errors[] = "Mauvais CVC !";
    if (!preg_match('/^[a-zA-Z-\s]+$/', $cardName))
        $errors[] = "Mauvais nom !";
    if (preg_match('/^(\d{2})\/(\d{2})$/', $cardDate, $matches))
    {
        $month = intval($matches[1]);
        $year = intval($matches[2]);
        if ($month < 1 || $month > 12 || $year < 19 || $year > 25)
            $errors[] = "Mauvaise date d'expiration !";
    }
    else
        $errors[] = "Mauvaise date d'expiration !";

    if (count($errors) == 0)
    {
        if (isset($_POST['save_card']))
        {
                $sql = "UPDATE `acheteur` SET `CB_nbr`='".$cardNbr."', `CB_name`='".$cardName."', `CB_date_expi`='".$cardDate."', `CB_CVC`='".$cardCvc."' WHERE `id`='".$user_id."'";
                $res = mysqli_query($db_handle, $sql) or die(mysqli_error($db_handle));
        }

        foreach ($_SESSION['cart'] as $row => $elem)
        {
            $sql = "INSERT INTO `commandes` (`id_produit`, `id_acheteur`, `id_vendeur`, `quantite`, `valeur_commande`, `bought`, `nbr_commande`, `cat`) VALUES 
                    ('".$elem['id_produit']."', 
                    '".$elem['id_acheteur']."', 
                    '".$elem['id_vendeur']."', 
                    '".$elem['quantite']."', 
                    '".$elem['valeur_commande']."', 
                    '1', 
                    '".$elem['nbr_commande']."', 
                    '".$elem['cat']."')";

            $res = mysqli_query($db_handle, $sql) or die(mysqli_error($db_handle));
        }
        $IncrementValue = 1;
        $sql = "UPDATE `acheteur` SET `nbr_commande`= `nbr_commande`+ '".$IncrementValue."' WHERE `id`='".$user_id."'";
        $res = mysqli_query($db_handle, $sql) or die(mysqli_error($db_handle));
        sendMail($user['mail'], $checkoutNumber, $checkoutPrice);   
        $_SESSION['cart'] = [];

        header("location: buy_success.php?checkout=".$checkoutNumber."&price=".$checkoutPrice);
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
	</script>
</head>
<body>
	<?php include 'Navbar.php'; ?>

	<div class="container container-margin">
		
        <form action="commande.php" method="POST">
            <h4>Commande n°<?php echo $_SESSION['cart'][0]['nbr_commande']; ?></h4>
            <br />
            <div class="row">
                <div class="col-lg-4">
                <h3>Contact</h3>
                <hr />
                    <div class="form-group row">
                        <div class="form-group col-lg-6">
                            <label for="lastname">Nom</label>
                            <input type="text" name="lastname" class="form-control" id="lastname" placeholder="Nom" value="<?php echo $user['nom']; ?>">
                        </div>
                        <div class="form-group col-lg-6">
                            <label for="firstname">Prénom</label>
                            <input type="text" name="firstname" class="form-control" id="firstname" placeholder="Prénom" value="<?php echo $user['prenom']; ?>">
                        </div>
                    </div>
                    <div class="row form-group col-lg-6">
                        <label for="phone">Téléphone</label>
                        <input type="tel" name="phone" class="form-control" id="phone" placeholder="06" value="<?php echo $user['telephone']; ?>">
                    </div>
                    <div class="form-group">
                        <label for="mail">Mail</label>
                        <input type="mail" name="mail" class="form-control" id="mail" placeholder="@edu.ece.fr" value="<?php echo $user['mail']; ?>">
                    </div>
                </div>
                <div class="col-lg-4">
                    <h3>Adresse de livraison</h3>
                    <hr />
                    <div class="form-group">
                        <label for="address">Adresse postale</label>
                        <input type="text" class="form-control" id="address" placeholder="Adresse postale" value="<?php echo $user['adresse']; ?>">
                    </div>
                    <div class="form-group row">
                        <div class="form-group col-lg-6">
                            <label for="zip">Code Postal</label>
                            <input type="text" class="form-control" id="zip" placeholder="Code Postal" value="<?php echo $user['zip']; ?>">
                        </div>
                        <div class="form-group col-lg-6">
                            <label for="city">Ville</label>
                            <input type="text" class="form-control" id="city" placeholder="Ville" value="<?php echo $user['ville']; ?>">
                        </div>
                    </div>
                    <div class="form-group">
                        <label for="country">Pays</label>
                        <input type="text" class="form-control" id="country" placeholder="Pays" value="<?php echo $user['pays']; ?>">
                    </div>
                </div>
                <div class="col-lg-4">
                    <h3>Paiement</h3>
                    <hr />
                    <div class="form-group">
                        <label for="card_nbr">Numéro de carte</label>
                        <input type="text" class="form-control" id="card_nbr" name="card_nbr" placeholder="4242424242424242" value="<?php echo isset($_POST['buy']) ? $cardNbr : $user['CB_nbr']; ?>">
                    </div>
                    <div class="form-group row">
                        <div class="form-group col-lg-6">
                            <label for="card_date">Date d'éxpiration</label>
                            <input type="text" class="form-control" id="card_date" name="card_date" placeholder="MM/AA" value="<?php echo isset($_POST['buy']) ? $cardDate : $user['CB_date_expi']; ?>">
                        </div>
                        <div class="form-group col-lg-6">
                            <label for="card_cvc">CVC</label>
                            <input type="text" class="form-control" id="card_cvc" name="card_cvc" placeholder="CVC" value="<?php echo isset($_POST['buy']) ? $cardCvc : $user['CB_CVC']; ?>">
                        </div>
                    </div>
                    <div class="form-group">
                        <label for="card_name">Nom</label>
                        <input type="text" class="form-control" id="card_name" name="card_name" placeholder="Nom" value="<?php echo isset($_POST['buy']) ? $cardName : $user['CB_name']; ?>">
                    </div>
                    <div id="save_card_check" class="form-group <?php echo ($cardSaved ? 'd-none' : ''); ?>">
                        <div class="form-check">
                        <input class="form-check-input" type="checkbox" id="save_card" name="save_card">
                        <label class="form-check-label" for="save_card">
                            Sauvegarder ma carte banquaire
                        </label>
                        </div>
                    </div>
                    <div id="save_card_check" class="form-group <?php echo ($cardSaved ? '' : 'd-none'); ?>">
                        <div class="form-check">
                        <input class="form-check-input" type="checkbox" id="save_card" name="save_card">
                        <label class="form-check-label" for="save_card">
                            Mettre à jour ma carte banquaire
                        </label>
                        </div>
                    </div>
                </div>
            </div>
            <hr />
            <div style="float:right">
                <span style="margin-right:30px; font-weight:bold">Prix total: <?php echo getCartTotalPrice(); ?> € TTC</span>
                <input type="submit" class="btn btn-success" value="Acheter" name="buy" />
                <?php
                    foreach ($errors as $row => $elem)
                    {
                        echo "<br /><span class=\"error-msg\">".$elem."</span>";
                    }
                ?>
            </div>
            <br />
            <br />
            <br />
            <br />
            <br />
        </form>
        

	</div>
	
	<?php include 'footer.php'; ?>
</body>
</html>