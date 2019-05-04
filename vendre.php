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

		<!-- Vérification qu'un admin ou un vendeur est connecté pour pouvoir ajouter un produit -->
		<?php
		session_start();
			if(!empty($_SESSION)) {
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

				$sql1 = "SELECT * FROM admin WHERE (mail ='". $_SESSION['mail'] . "' AND mdp = '" . $_SESSION['MDP'] ."')";
				$req1 = mysqli_query($connection, $sql1) or die ("Message d'erreur: " . mysqli_error($connection) );

				if(mysqli_num_rows($req1) == 1){
					$connected = true;
				}
				else {
					$sql2 = "SELECT * FROM vendeur WHERE (mail = '" . $_SESSION['mail'] . "' AND mdp = '" . $_SESSION['MDP'] ."')";
					$req2 = mysqli_query($connection, $sql2) or die ("Message d'erreur: " . mysqli_error($connection) );

					if(mysqli_num_rows($req2) == 1){
						$connected = true;
					}
					else {
						$connected = false;
					}
				}
			}else{
				$connected = false;
			}
			
			if($connected == false) { echo "<script>window.location.href='compte.php';</script>"; }
		?>
		
		<form method="post">
			<div class="form-group row">
				<label for="mail" class="col-md-1 col-form-label"></label>
				<h2>Ajout d'un article sur le site</h2>
			</div>

			<div class="form-group row">
				<label class="col-md-1 col-form-label"></label>
				<label class="col-md-2 col-form-label">
					<input type="submit" class="btn btn-primary" value="Livre" name="button1">
				</label>
				<label class="col-md-2 col-form-label">
					<input type="submit" class="btn btn-primary" value="Musique" name="button2">
				</label>
				<label class="col-md-2 col-form-label">
					<input type="submit" class="btn btn-primary" value="Sport et loisir" name="button3">
				</label>
				<label class="col-md-2 col-form-label">
					<input type="submit" class="btn btn-primary" value="Vêtement" name="button4">
				</label>
			</div>

		<?php

			session_start();
			$titre = isset($_POST["titre"])? $_POST["titre"]: "";
			$auteur = isset($_POST["auteur"])? $_POST["auteur"]: "";
			$annee = isset($_POST["annee"])? $_POST["annee"]: "";
			$editeur = isset($_POST["editeur"])? $_POST["editeur"]: "";
			$prix = isset($_POST["prix"])? $_POST["prix"]: "";
			$photo = isset($_POST["photo"])? $_POST["photo"]: "";
			$description = isset($_POST["description"])? $_POST["description"]: "";
			$quantite = isset($_POST["quantite"])? $_POST["quantite"]: "";
			$producteur = isset($_POST["producteur"])? $_POST["producteur"]: "";
			$album = isset($_POST["album"])? $_POST["album"]: "";
			$video = isset($_POST["video"])? $_POST["video"]: "";
			$genre= isset($_POST["genre"])? $_POST["genre"]: "";
			$type = isset($_POST["type"])? $_POST["type"]: "";
			$id_vendeur = $_SESSION['ID'];
			$message_final = "";

				if(isset($_POST['button1'])) {
					echo '
					<div class="form-group row">
						<label class="col-md-1 col-form-label"></label>
						<label for="titre" class="col-md-2 col-form-label">Titre </label>
						<div class="col-md-4">
							<input type="text" class="form-control" name="titre" />
						</div>
					</div>

					<div class="form-group row">
						<label class="col-md-1 col-form-label"></label>
						<label for="auteur" class="col-md-2 col-form-label">Auteur</label>
						<div class="col-md-4">
							<input type="text" class="form-control" name="auteur"/>
						</div>
					</div> 

					<div class="form-group row">
						<label class="col-md-1 col-form-label"></label>
						<label for="annee" class="col-md-2 col-form-label">Année </label>
						<div class="col-md-4">
							<input type="text" class="form-control" name="annee"/>
						</div>
					</div> 

					<div class="form-group row">
						<label class="col-md-1 col-form-label"></label>
						<label for="editeur" class="col-md-2 col-form-label">Editeur </label>
						<div class="col-md-4">
							<input type="text" class="form-control" name="editeur"/>
						</div>
					</div> 

					<div class="form-group row">
						<label class="col-md-1 col-form-label"></label>
						<label for="prix" class="col-md-2 col-form-label">Prix </label>
						<div class="col-md-4">
							<input type="text" class="form-control" name="prix"/>
						</div>
					</div> 

					<div class="form-group row">
						<label class="col-md-1 col-form-label"></label>
						<label for="photo" class="col-md-2 col-form-label">Photo </label>
						<div class="col-md-4">
							<input type="file" class="form-control" name="photo"/>
						</div>
					</div>

					<div class="form-group row">
						<label class="col-md-1 col-form-label"></label>
						<label for="description" class="col-md-2 col-form-label">Description </label>
						<div class="col-md-4">
							<input type="text" class="form-control" name="description"/>
						</div>
					</div> 

					<div class="form-group row">
						<label class="col-md-1 col-form-label"></label>
						<label for="quantite" class="col-md-2 col-form-label">Quantité </label>
						<div class="col-md-4">
							<input type="number" class="form-control" name="quantite"/>
						</div>
					</div>

					<div class="form-group row">
						<label class="col-md-1 col-form-label"></label>
						<label class="col-md-2 col-form-label">
							<input type="submit" class ="btn btn-primary" value="Valider" name="button5">
						</label> 
					</div>';

					
				}

				if(isset($_POST['button5'])) {
						if(!empty($titre) && !empty($auteur) && !empty($annee) && !empty($editeur) && !empty($prix) && !empty($description) && !empty($quantite) ) {
							$servername = "localhost";
							$username ="root";
							$password = "";
							$dbname = "piscinedb2";
							$connection = new mysqli($servername, $username, $password, $dbname);

								if($connection->connect_error) {
									die("Connection failed: " . $connection->connect_error);
								}

								$sql0 = "SELECT * FROM livres, vendeur, admin WHERE (livres.titre = '$Titre' AND livres.auteur = '$auteur' AND ( livres.id_vendeur = vendeur.id OR livres.id_vendeur = admin.id) )";
								$req0 = mysqli_query($connection, $sql0) or die ("Message d'erreur1: " . mysqli_error($connection) );

								if(mysqli_num_rows($req0) == 0){
										$sql = "INSERT INTO livres VALUE (0, '$titre', '$auteur', '$annee', '$editeur', '$id_vendeur', '$prix', '$photo', '$description', '$quantite')";
										$req = mysqli_query($connection, $sql) or die ("Message d'erreur: " . mysqli_error($connection) );
										echo 'Livre ajouté! <br>';
									}
								else {
									echo 'Vous avez deja ajouté ce livre.<br>';
								}
						}
						else {
							echo 'Des champs sont vides.';
						}
					}

				//Affichage des champs de demande de création de compte pour un administrateur
				if(isset($_POST['button2'])) {
					echo ' 
					<div class="form-group row">
						<label class="col-md-1 col-form-label"></label>
						<label for="titre" class="col-md-2 col-form-label">Titre </label>
						<div class="col-md-4">
							<input type="text" class="form-control" name="titre" />
						</div>
					</div>

					<div class="form-group row">
						<label class="col-md-1 col-form-label"></label>
						<label for="auteur" class="col-md-2 col-form-label">Auteur</label>
						<div class="col-md-4">
							<input type="text" class="form-control" name="auteur"/>
						</div>
					</div> 

					<div class="form-group row">
						<label class="col-md-1 col-form-label"></label>
						<label for="annee" class="col-md-2 col-form-label">Année </label>
						<div class="col-md-4">
							<input type="text" class="form-control" name="annee"/>
						</div>
					</div> 

					<div class="form-group row">
						<label class="col-md-1 col-form-label"></label>
						<label for="producteur" class="col-md-2 col-form-label">Producteur </label>
						<div class="col-md-4">
							<input type="text" class="form-control" name="producteur"/>
						</div>
					</div> 

					<div class="form-group row">
						<label class="col-md-1 col-form-label"></label>
						<label for="prix" class="col-md-2 col-form-label">Prix </label>
						<div class="col-md-4">
							<input type="text" class="form-control" name="prix"/>
						</div>
					</div>

					<div class="form-group row">
						<label class="col-md-1 col-form-label"></label>
						<label for="album" class="col-md-2 col-form-label">Album </label>
						<div class="col-md-4">
							<input type="text" class="form-control" name="album"/>
						</div>
					</div> 

					<div class="form-group row">
						<label class="col-md-1 col-form-label"></label>
						<label for="photo" class="col-md-2 col-form-label">Photo </label>
						<div class="col-md-4">
							<input type="file" class="form-control" name="photo"/>
						</div>
					</div>

					<div class="form-group row">
						<label class="col-md-1 col-form-label"></label>
						<label for="description" class="col-md-2 col-form-label">Description </label>
						<div class="col-md-4">
							<input type="description" class="form-control" name="description"/>
						</div>
					</div> 

					<div class="form-group row">
						<label class="col-md-1 col-form-label"></label>
						<label for="quantite" class="col-md-2 col-form-label">Quantité </label>
						<div class="col-md-4">
							<input type="number" class="form-control" name="quantite"/>
						</div>
					</div>

					<div class="form-group row">
						<label class="col-md-1 col-form-label"></label>
						<label class="col-md-2 col-form-label">
							<input type="submit" class ="btn btn-primary" value="Valider" name="button6">
						</label> 
					</div>';
				}

				if(isset($_POST['button6'])) {
						if(!empty($titre) && !empty($auteur) && !empty($annee) && !empty($producteur) && !empty($prix) && !empty($album) && !empty($description) && !empty($quantite) ) {
							$servername = "localhost";
							$username ="root";
							$password = "";
							$dbname = "piscinedb2";
							$connection = new mysqli($servername, $username, $password, $dbname);

								if($connection->connect_error) {
									die("Connection failed: " . $connection->connect_error);
								}

								$sql0 = "SELECT * FROM musique, vendeur, admin WHERE (musique.titre = '$Titre' AND musique.auteur = '$auteur' AND ( musique.id_vendeur = vendeur.id OR musique.id_vendeur = admin.id) )";
								$req0 = mysqli_query($connection, $sql0) or die ("Message d'erreur1: " . mysqli_error($connection) );

								if(mysqli_num_rows($req0) == 0){
										
										$sql = "INSERT INTO musique VALUE (0, '$titre', '$auteur', '$annee', '$producteur', '$id_vendeur', '$album', '$prix', '$photo', '$description', '$quantite')";
										$req = mysqli_query($connection, $sql) or die ("Message d'erreur: " . mysqli_error($connection) );
										echo 'Morceau ajouté! <br>';
									}
								else {
									echo 'Vous avez deja ajouté ce morceau.<br>';
								}
						}
						else {
							echo 'Des champs sont vides.';
						}
					}

				if(isset($_POST['button3'])) {
					echo ' 
					<div class="form-group row">
						<label class="col-md-1 col-form-label"></label>
						<label for="titre" class="col-md-2 col-form-label">Titre </label>
						<div class="col-md-4">
							<input type="text" class="form-control" name="titre" />
						</div>
					</div>

					<div class="form-group row">
						<label class="col-md-1 col-form-label"></label>
						<label for="photo" class="col-md-2 col-form-label">Photo </label>
						<div class="col-md-4">
							<input type="file" class="form-control" name="photo"/>
						</div>
					</div>

					<div class="form-group row">
						<label class="col-md-1 col-form-label"></label>
						<label for="description" class="col-md-2 col-form-label">Description </label>
						<div class="col-md-4">
							<input type="text" class="form-control" name="description"/>
						</div>
					</div> 

					<div class="form-group row">
						<label class="col-md-1 col-form-label"></label>
						<label for="video" class="col-md-2 col-form-label">Vidéo </label>
						<div class="col-md-4">
							<input type="file" class="form-control" name="video"/>
						</div>
					</div>

					<div class="form-group row">
						<label class="col-md-1 col-form-label"></label>
						<label for="prix" class="col-md-2 col-form-label">Prix </label>
						<div class="col-md-4">
							<input type="text" class="form-control" name="prix"/>
						</div>
					</div>

					<div class="form-group row">
						<label class="col-md-1 col-form-label"></label>
						<label for="type" class="col-md-2 col-form-label">Type </label>
						<div class="col-md-4">
							<input type="text" class="form-control" name="type"/>
						</div>
					</div> 

					<div class="form-group row">
						<label class="col-md-1 col-form-label"></label>
						<label class="col-md-2 col-form-label">
							<input type="submit" class ="btn btn-primary" value="Valider" name="button7">
						</label> 
					</div>';
				}

				if(isset($_POST['button7'])) {
						if(!empty($titre) && !empty($prix) && !empty($type) && !empty($description) ) {
							$servername = "localhost";
							$username ="root";
							$password = "";
							$dbname = "piscinedb2";
							$connection = new mysqli($servername, $username, $password, $dbname);

								if($connection->connect_error) {
									die("Connection failed: " . $connection->connect_error);
								}

								$sql0 = "SELECT * FROM sel, vendeur, admin WHERE (sel.titre = '$Titre' AND ( sel.id_vendeur = vendeur.id OR sel.id_vendeur = admin.id) )";
								$req0 = mysqli_query($connection, $sql0) or die ("Message d'erreur1: " . mysqli_error($connection) );

								if(mysqli_num_rows($req0) == 0){
										
										$sql = "INSERT INTO sel VALUE (0, '$titre', '$photo', '$description', '$video', '$prix', '$type', '$id_vendeur')";
										$req = mysqli_query($connection, $sql) or die ("Message d'erreur: " . mysqli_error($connection) );
										echo 'Produit ajouté! <br>';
									}
								else {
									echo 'Vous avez deja ajouté ce produit.<br>';
								}
						}
						else {
							echo 'Des champs sont vides.';
						}
					}

				if(isset($_POST['button4'])) {
					echo ' 
					<div class="form-group row">
						<label class="col-md-1 col-form-label"></label>
						<label for="titre" class="col-md-2 col-form-label">Titre </label>
						<div class="col-md-4">
							<input type="text" class="form-control" name="titre" />
						</div>
					</div>

					<div class="form-group row">

						<label class="col-md-1 col-form-label"></label>
						<label for="genre" class="col-md-2 col-form-label">Genre </label>
						
						<div class="col-md-1 form-check">
							<input type="radio" class="form-check-input" name="genre" value="Homme" checked/>
							<label class="form-check-label" for="homme">Homme</label>
						</div>

						<div class="col-md-1 form-check">
							<input type="radio" class="form-check-input" name="genre" value="Femme"/> 
							<label class="form-check-label" for="femme">Femme</label>
						</div>
						
					</div> 

					<div class="form-group row">
						<label class="col-md-1 col-form-label"></label>
						<label for="type" class="col-md-2 col-form-label">Type </label>
						<div class="col-md-4">
							<input type="text" class="form-control" name="type"/>
						</div>
					</div> 

					<div class="form-group row">
						<label class="col-md-1 col-form-label"></label>
						<label for="prix" class="col-md-2 col-form-label">Prix </label>
						<div class="col-md-4">
							<input type="text" class="form-control" name="prix"/>
						</div>
					</div>

					<div class="form-group row">
						<label class="col-md-1 col-form-label"></label>
						<label for="photo" class="col-md-2 col-form-label">Photo </label>
						<div class="col-md-4">
							<input type="file" class="form-control" name="photo"/>
						</div>
					</div>

					<div class="form-group row">
						<label class="col-md-1 col-form-label"></label>
						<label for="description" class="col-md-2 col-form-label">Description </label>
						<div class="col-md-4">
							<input type="text" class="form-control" name="description"/>
						</div>
					</div> 

					<div class="form-group row">
						<label class="col-md-1 col-form-label"></label>
						<label for="description" class="col-md-2 col-form-label">Quantité </label>
						<div class="col-md-4">
							<input type="text" class="form-control" name="quantite"/>
						</div>
					</div> 

					<div class="form-group row">
						<label class="col-md-1 col-form-label"></label>
						<label class="col-md-2 col-form-label">
							<input type="submit" class ="btn btn-primary" value="Valider" name="button8">
						</label> 
					</div>';
				}

				if(isset($_POST['button8'])) {
						if(!empty($titre) && !empty($genre) && !empty($type) && !empty($prix) && !empty($description) && !empty($quantite) ) {
							$servername = "localhost";
							$username ="root";
							$password = "";
							$dbname = "piscinedb2";
							$connection = new mysqli($servername, $username, $password, $dbname);

								if($connection->connect_error) {
									die("Connection failed: " . $connection->connect_error);
								}

								$sql0 = "SELECT * FROM vetements, vendeur, admin WHERE (vetements.titre = '$Titre' AND vetements.type = '$type' AND ( vetements.id_vendeur = vendeur.id OR vetements.id_vendeur = admin.id) )";
								$req0 = mysqli_query($connection, $sql0) or die ("Message d'erreur1: " . mysqli_error($connection) );

								if(mysqli_num_rows($req0) == 0){
										
										$sql = "INSERT INTO vetements VALUE (0, '$titre', '$id_vendeur', '$genre', '$type', '$prix', '$photo', '$description', '$quantite', '$video')";
										$req = mysqli_query($connection, $sql) or die ("Message d'erreur: " . mysqli_error($connection) );
										echo 'Vêtement ajouté! <br>';

									}
								else {
									echo 'Vous avez deja ajouté ce vetement.<br>';
								}
						}
						else {
							echo 'Des champs sont vides.';
						}
					}
		?>	
 	</form>

	</div>
	
	<?php include 'footer.php'; ?>
</body>
</html>