<?php
session_start();

$servername = "localhost";
$username ="root";
$password = "";
$dbname = "piscinedb2";
$sql = "";

$connection = new mysqli($servername, $username, $password, $dbname);

if($connection->connect_error) {
	die("Connection failed: " . $connection->connect_error);
}

if(isset($_POST['button3'])) {
	$sql = "UPDATE admin SET accepte = '1' WHERE ('" . $_POST['id'] . "' = id)";
	$req = mysqli_query($connection, $sql) or die ("Message d'erreur: " . mysqli_error($connection) );
	echo 'accepté!';
}

if(isset($_POST['button4'])) {
	$sql = "DELETE FROM admin WHERE ('" . $_POST['id'] . "' = id)";
	$req = mysqli_query($connection, $sql) or die ("Message d'erreur: " . mysqli_error($connection) );
	echo 'supprimé!';
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
	<br><br><br><br>
	<div class="col-md-12">
		<h2>Votre compte Administrateur</h2>
		<div class="row">
			<div class="col-md-1"></div>
			<div class="col-md-1">
				
			</div>

			<div class="col-md-12">
				<!--affichage des ID de connexion de la session en cours-->
				<?php

				if(!empty($_SESSION['mail']) && !empty($_SESSION['MDP'])) {
					$servername = "localhost";
					$username ="root";
					$password = "";
					$dbname = "piscinedb2";
					$sql = "";

					$connection = new mysqli($servername, $username, $password, $dbname);

					if($connection->connect_error) {
						die("Connection failed: " . $connection->connect_error);
					}

					$sql = "SELECT * FROM admin WHERE (mail = '" . $_SESSION['mail'] . "' AND MDP = '" . $_SESSION['MDP'] . "')";
					$req = mysqli_query($connection, $sql) or die ("Message d'erreur: " . mysqli_error($connection) );

					while($data = mysqli_fetch_assoc($req)) { 
						echo "ID: ". $data['id']. '<br>';
						echo "Nom: ". $data['nom']. '<br>';
						echo "Prénom: ". $data['prenom']. '<br>';
						echo "Mail: ". $data['mail']. '<br>';
					}
				}
				else {
					echo 'Error ID';
				}
				?>

				<form method="post">
				<div class="form-group">
					<label class="col-md-1 col-form-label"></label>
					<label><input type="submit" class="btn btn-primary" value="Commerçants" name="button1"></label>
					<label><input type="submit" class="btn btn-primary" value="Requêtes des nouveaux Administrateurs" name="button2"></label>
				</div>

				<?php
				
				if(!empty($_SESSION['mail']) && !empty($_SESSION['MDP'])) {

					if(isset($_POST['button1'])) {
						$sql = "SELECT * FROM vendeur";
						$req = mysqli_query($connection, $sql) or die ("Message d'erreur: " . mysqli_error($connection) );

						while($data = mysqli_fetch_assoc($req)) { 
							echo "ID: ". $data['id']. '<br>';
							echo "mail: ". $data['mail']. '<br>';
							echo "Nom: ". $data['nom']. '<br>';
							echo "Prénom: ". $data['prenom']. '<br><br>';
						}
					}

					if(isset($_POST['button2'])) {
						// $sql = "SELECT * FROM admin WHERE (accepte = 0)";
						$sql = "SELECT * FROM admin WHERE accepte = 0";
						$req = mysqli_query($connection, $sql) or die ("Message d'erreur: " . mysqli_error($connection) );

						if(mysqli_num_rows($req) >= 1) {
							while($data = mysqli_fetch_assoc($req)){
								echo '<form method="post">';
								echo '<label class="col-form-group row"></label>';
								echo "ID: ". $data['id']. '<br>';
								$_SESSION['id2'] = $data['id'];
								echo "mail: ". $data['mail']. '<br>';
								echo "Nom: ". $data['nom']. '<br>';
								echo "Prénom: ". $data['prenom']. '<br><br>';
								echo "<input name='id' value='".$data['id']."' type='hidden' />";
								echo '<label><input type="submit" class="btn btn-primary" value="Accepter" name="button3"> </label>';
								echo '<label><input type="submit" class="btn btn-primary" value="Supprimer" name="button4"> </label>';
								echo '</form>';
							}
						}
						else {
							echo 'Aucune demande en attente';
						}
					}

					

			}
				?>
			</form>

			</div>
		</div>


	<form action="deconnexion.php" method="post">
			<div class="form-group">
				<label class="col-md-2 col-form-label">
					<input type="submit" class ="btn btn-primary" value="Déconnexion">
				</label>			
			</div>
	</form>

	</div>
</div>
<?php include 'footer.php'; ?>
</body>
</html>