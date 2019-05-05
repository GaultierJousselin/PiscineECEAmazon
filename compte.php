<?php
//On demarre la sessions avant toute chose.
session_start();

if (isset($_SESSION['ID']))
{
	header("location: page_compte_".$_SESSION['statut'].".php");
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
			<form method="post">
				<div class="form-group row">
					<label class="col-md-1 col-form-label"></label>
					<h2>Identifiez-vous</h2>
				</div>
				<div class="form-group">
					<div class="form-group row">
						<label class="col-md-1 col-form-label"></label>
						<label for="mail" class="col-md-2 col-form-label">Adresse e-mail</label>
						<div class="col-md-4">
							<input type="text" class="form-control" name="mail" placeholder="@edu.ece.fr" />
						</div>
					</div>
				</div>

				<div class="form-group">
					<div class="form-group row">
						<label class="col-md-1 col-form-label"></label>
						<label for="MDP" class="col-md-2 col-form-label">Mot de passe</label>
						<div class="col-md-4">
							<input type="password" class="form-control" name="MDP"/>
						</div>
					</div>
				</div>

				<div class="form-group">
					<label class="col-md-1 col-form-label"></label>
					<label class="col-md-2 col-form-label">
						<input type="submit" class="btn btn-primary" value="Identifiez-vous" name="button1">
						<br><br><br>
					</label>

					<?php
						//Connexion pour un acheteur / vendeur
						if(isset($_POST['button1'])) {
							$mail = isset($_POST["mail"])? $_POST["mail"]: "";
							$MDP = isset($_POST["MDP"])? $_POST["MDP"]: "";
							if(!empty($MDP) && !empty($mail)){
								$servername = "localhost";
								$username ="root";
								$password = "";
								$dbname = "piscinedb2";
								$sql1 = "";
								$sql2 = "";

								$connection = new mysqli($servername, $username, $password, $dbname);

								if($connection->connect_error) {
									die("Connection failed: " . $connection->connect_error );
								}

								$sql1 = "SELECT * FROM acheteur WHERE (mail = '$mail' AND mdp = '$MDP')";
								$req1 = mysqli_query($connection, $sql1) or die ("Message d'erreur: " . mysqli_error($connection) );

								if(mysqli_num_rows($req1) == 1){
									$_SESSION['mail'] = $mail;
									$_SESSION['MDP'] = $MDP; 
									$_SESSION['statut'] = "acheteur";

									while($data = mysqli_fetch_assoc($req1)) { 
										$_SESSION['ID'] = $data['id'];
									}


									if (isset($_SESSION['oldPage']))
									{
										$oldPage = $_SESSION['oldPage'];
										$_SESSION['oldPage'] = NULL;
										echo "<script>window.location.href='".$oldPage."';</script>";
									}

									echo "<script>window.location.href='page_compte_acheteur.php';</script>";
								}
								else {
									$sql2 = "SELECT * FROM vendeur WHERE (mail = '$mail' AND mdp = '$MDP')";
									$req2 = mysqli_query($connection, $sql2) or die ("Message d'erreur: " . mysqli_error($connection) );

									if(mysqli_num_rows($req2) == 1){
										$_SESSION['mail'] = $mail;
										$_SESSION['MDP'] = $MDP; 
										$_SESSION['statut'] = "vendeur";

										while($data = mysqli_fetch_assoc($req2)) { 
											$_SESSION['ID'] = $data['id'];
										}

										if (isset($_SESSION['oldPage']))
										{
											$oldPage = $_SESSION['oldPage'];
											$_SESSION['oldPage'] = NULL;
											echo "<script>window.location.href='".$oldPage."';</script>";
										}
										echo "<script>window.location.href='page_compte_vendeur.php';</script>";
									}
									else {
										echo 'Mauvais mail/mot de passe';
									}
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
			<form method="post">
			<div class="form-group">
				<label class="col-md-1 col-form-label"></label>
				<label class="col-md-2 col-form-label">Vous possédez un compte administrateur ?</label>
				<label class="col-md-2 col-form-label">
					<input type="submit" class ="btn btn-primary" value="Connectez-vous" name="button3">
				</label>
				<label class="col-md-2 col-form-label">
					<input type="submit" class ="btn btn-primary" value="Faire la demande de compte" name="button4">
				</label>				
			</div>

			<?php
				//Affichage du champs de connexion pour un administrateur
				if(isset($_POST['button3'])) {
					echo ' 
					<div class="form-group row">
						<label class="col-md-1 col-form-label"></label>
						<label for="mail_admin" class="col-md-2 col-form-label">Adresse e-mail administrateur</label>
						<div class="col-md-4">
							<input type="text" class="form-control" name="mail_admin" placeholder="@edu.ece.fr" />
						</div>
					</div>

					<div class="form-group row">
						<label class="col-md-1 col-form-label"></label>
						<label for="MDP_admin" class="col-md-2 col-form-label">Mot de passe administrateur</label>
						<div class="col-md-4">
							<input type="password" class="form-control" name="MDP_admin"/>
						</div>
					</div> 
					<div class="form-group row">
						<label class="col-md-1 col-form-label"></label>
						<label class="col-md-2 col-form-label">
							<input type="submit" class ="btn btn-primary" value="Connexion" name="button5">
						</label> 
					</div>';
				}

				//Affichage des champs de demande de création de compte pour un administrateur
				if(isset($_POST['button4'])) {
					echo ' 
					<div class="form-group row">
						<label class="col-md-1 col-form-label"></label>
						<label for="nom" class="col-md-2 col-form-label" placeholder="Nom">Nom & Prénom</label>
						<div class="col-md-2">
							<input type="text" class="form-control" name="nom"/>
						</div>e
						<label for="prenom" class="col-form-label" placeholder="prenom"></label>
						<div class="col-md-2">
							<input type="text" class="form-control" name="prenom"/>
						</div>
					</div>

					<div class="form-group row">
						<label class="col-md-1 col-form-label"></label>
						<label for="mail" class="col-md-2 col-form-label">Adresse e-mail administrateur</label>
						<div class="col-md-4">
							<input type="text" class="form-control" name="mail" placeholder="@edu.ece.fr" />
						</div>
					</div>

					<div class="form-group row">
						<label class="col-md-1 col-form-label"></label>
						<label for="MDP" class="col-md-2 col-form-label">Mot de passe administrateur</label>
						<div class="col-md-4">
							<input type="password" class="form-control" name="MDP"/>
						</div>
					</div>
					<div class="form-group row">
						<label class="col-md-1 col-form-label"></label>
						<label class="col-md-2 col-form-label">
							<input type="submit" class ="btn btn-primary" value="Envoyer la demande" name="button6">
						</label> 
					</div>';
				}

				//Connexion pour un compte admin
				if(isset($_POST['button5'])) {
					$mail = isset($_POST["mail_admin"])? $_POST["mail_admin"]: "";
					$MDP = isset($_POST["MDP_admin"])? $_POST["MDP_admin"]: "";
					if(!empty($MDP) && !empty($mail)){
						$servername = "localhost";
						$username ="root";
						$password = "";
						$dbname = "piscinedb2";
						$sql1 = "";

						$connection = new mysqli($servername, $username, $password, $dbname);

						if($connection->connect_error) {
							die("Connection failed: " . $connection->connect_error );
						}

						$sql1 = "SELECT * FROM admin WHERE (mail = '$mail' AND mdp = '$MDP')";
						$req1 = mysqli_query($connection, $sql1) or die ("Message d'erreur: " . mysqli_error($connection) );
						
						if(mysqli_num_rows($req1) == 1)
						{
							$data = mysqli_fetch_assoc($req1);
							if ($data['accepte'] == 1)
							{
								$_SESSION['mail'] = $mail;
								$_SESSION['MDP'] = $MDP; 
								$_SESSION['statut'] = "admin";
								$_SESSION['ID'] = $data['id'];
								
								echo "<script>window.location.href='page_compte_admin.php';</script>";
							}
						}
						else {
							if(mysqli_num_rows($req1) != 1) {
								echo 'Mauvais mail/mot de passe';
							}
							if($_SESSION['accepte'] != 1) {
								echo 'Compte en attente de validation par un autre administrateur';
							}

						}
					}
					else {
						echo 'Des champs sont vides';
					}
				}

				//Envoie de la demande création de compte aux administrateurs
				if(isset($_POST['button6'])){
					$mail = isset($_POST["mail"])? $_POST["mail"]: "";
					$MDP = isset($_POST["MDP"])? $_POST["MDP"]: "";
					$nom = isset($_POST["nom"])? $_POST["nom"]: "";
					$prenom = isset($_POST["prenom"])? $_POST["prenom"]: "";
				
					if(!empty($MDP) && !empty($mail) && !empty($nom) && !empty($prenom)) {
						$servername = "localhost";
						$username ="root";
						$password = "";
						$dbname = "piscinedb2";
			
						$connection = new mysqli($servername, $username, $password, $dbname);

						$mail = mysqli_real_escape_string($connection, $mail);
						$MDP = mysqli_real_escape_string($connection, $MDP);
						$nom = mysqli_real_escape_string($connection, $nom);
						$prenom = mysqli_real_escape_string($connection, $prenom);

						if($connection->connect_error) {
							die("Connection failed: " . $connection->connect_error);
						}

						$sql1 = "SELECT * FROM admin WHERE (mail = '$mail' AND MDP = '$MDP')";
						$req1 = mysqli_query($connection, $sql1) or die ("Message d'erreur: " . mysqli_error($connection) );

						if(mysqli_num_rows($req1) == 0){
							$sql = "INSERT INTO admin (`nom`, `prenom`, `mail`, `MDP`) VALUE ('$nom', '$prenom', $mail', '$MDP')";
							$req = mysqli_query($connection, $sql) or die ("Message d'erreur: " . mysqli_error($connection) );
							echo 'Une demande de création de compte a bien été envoyé aux administrateurs.<br> Veuillez patienter en attendant leur réponse. Merci.';
						}
						else{
							echo 'Un utlisateur existe déjà avec des informations de connexion. <br> Veuillez selectionner un autre mail ou mot de passe. Merci. <br>';
						}
					}
					else {
						echo 'Des champs sont vides';
					}
				}
			?>
			</form>
		</div>

		<?php 
			if(!empty($_SESSION) ) {
				$statut = $_SESSION['statut'];
				echo "<script>window.location.href='page_compte_" . $statut . ".php';</script>";
			}

		?>
		<?php include 'footer.php'; ?>
	</body>
</html>

