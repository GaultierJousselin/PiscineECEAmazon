<?php
//On demarre la sessions avant toute chose.
session_start();

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
		<form method="post">
			<div class="form-group row">
				<label class="col-md-1 col-form-label"></label>
				<h2>Identifiez-vous</h2>
			</div>
			<div class="form-group">
				<div class="form-group row">
					<label class="col-md-1 col-form-label"></label>
					<label for="mail" class="col-md-4 col-form-label">Adresse e-mail</label>
				</div>
				<div class="form-group row">
					<label class="col-md-1 col-form-label"></label>
					<div class="col-md-4">
						<input type="text" class="form-control" name="mail" placeholder="@edu.ece.fr" />
					</div>
				</div>
			</div>

			<div class="form-group">
				<div class="form-group row">
					<label class="col-md-1 col-form-label"></label>
					<label for="MDP" class="col-md-4 col-form-label">Mot de passe</label>
				</div>
				<div class="form-group row">
					<label class="col-md-1 col-form-label"></label>
					<div class="col-md-4">
						<input type="password" class="form-control" name="MDP"/>
					</div>
				</div>
			</div>





			<div class="form-group">
				<label class="col-md-1 col-form-label"></label>
				<label class="col-md-2 col-form-label">
					<input type="submit" class="btn btn-primary" value="Identifiez-vous" name="button1">
				</label>

				<?php
					session_start();
			
			if(isset($_POST['button1'])) {
				$mail = isset($_POST["mail"])? $_POST["mail"]: "";
				$MDP = isset($_POST["MDP"])? $_POST["MDP"]: "";
				if(!empty($MDP) && !empty($mail)){
					$servername = "localhost:8888";
					$username ="root";
					$password = "root";
					$dbname = "piscinedb2";
					$sql = "";

					$connection = new mysqli($servername, $username, $password, $dbname);

					if($connection->connect_error) {
						die("Connection failed: " . $connection->connect_error );
					}

					$sql = "SELECT * FROM acheteur WHERE (mail = '$mail' AND MDP = '$MDP')";
					$req = mysqli_query($connection, $sql) or die ("Message d'erreur: " . mysqli_error($connection) );

					if(mysqli_num_rows($req) == 1){
						session_start();
						$_SESSION['mail'] = $mail;
						$_SESSION['MDP'] = $MDP; 

						header('Location: ' . "page_compte.php");
					}
					else {
						echo 'Mauvais mail/mot de passe';
					}
				}
				else {
					echo 'Des champs sont vides';
				}
			}
			?>
			
			</div>
		</form>

		<form action="creation_compte.php" method="post">
			<div class="form-group">
				<label class="col-md-1 col-form-label"></label>
				<label class="col-md-2 col-form-label">Nouveau chez ECE ?</label>
				<label class="col-md-2 col-form-label">
					<input type="submit" class ="btn btn-primary" value="Créez un compte" name="button2">
				</label>			
			</div>
		</form>
	</div>
<?php include 'footer.php'; ?>
</body>
</html>

