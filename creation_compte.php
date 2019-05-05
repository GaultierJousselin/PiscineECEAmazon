<?php

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
				<label for="mail" class="col-md-1 col-form-label"></label>
				<h2>Création de votre compte ECE</h2>
			</div>

			<div class="form-group row">
				<label class="col-md-1 col-form-label"></label>
				<label for="mail" class="col-md-2 col-form-label">Adresse mail</label>
				<div class="col-md-2">
					<input type="text" class="form-control" name="mail" placeholder="@edu.ece.fr" />
				</div>
				<label class="col-md-1 col-form-label"></label>
				<label for="image" class="col-md-2 col-form-label">Photo de profil</label>
				<div class="col-md-4">
					<input type="file" class="form-control" name="image"/>
				</div>
			</div>

			<div class="form-group row">
				<label class="col-md-1 col-form-label"></label>
				<label for="MDP" class="col-md-2 col-form-label">Mot de passe</label>
				<div class="col-md-2">
					<input type="text" class="form-control" name="MDP"/>
				</div>

				<label for="wallpaper" class="col-md-1 col-form-label"></label>
				<label for="wallpaper" class="col-md-2 col-form-label">Photo de couverture</label>
				<div class="col-md-4">
					<input type="file" class="form-control" name="image"/>
				</div>

			</div>

			<div class="form-group row">
				<label class="col-md-1 col-form-label"></label>
				<label for="nom" class="col-md-2 col-form-label">Nom & Prénom</label>
				<div class="col-md-2">
					<input type="text" class="form-control" name="nom" placeholder="Nom"/>
				</div>
				<label for="prenom" class="col-form-label"></label>
				<div class="col-md-2">
					<input type="text" class="form-control" name="prenom" placeholder="Prenom"/>
				</div>
				
			</div>
			<div class ="form-group row">
				<!-- numéro de tel -->
				<label class="col-md-1 col-form-label"></label>
				<label for="telephone" class="col-md-2 col-form-label">n° de téléphone </label>
				<div class="col-md-2">
					<input type="text" class="form-control" name="telephone" placeholder="10 chiffres"/>
				</div>
			</div>

			<div class="form-group row">
				<label class="col-md-1 col-form-label"></label>
				<label for="adresse" class="col-md-2 col-form-label">Adresse postale </label>
				<div> 
						 <div class ="col-form-label row">
						<!-- Numéro de voie -->
							<label for="num_voie" class="col-md-3 col-form-label">N° de voie</label>
							<input type="text" class="col-md-2 form-control" name="num_voie" placeholder="1-199"/>
							<label class="col-md-1 col-form-label"></label>
						<!-- Non de rue -->
							<label for="rue" class="col-md-2 col-form-label">Rue</label>
							<input type="text" class="col-md-4 form-control" name="rue"/>
						</div>
						<div class ="col-form-label row">
						 <!-- Code postal -->
							<label for="CP" class="col-md-3 col-form-label">Code postal</label>
							<input type="text" class="col-md-2 form-control" name="CP" placeholder="XXXXX"/>
							<label class="col-md-1 col-form-label"></label>
						 <!-- Ville -->
							<label for="ville" class="col-md-2 col-form-label">Ville</label>
							<input type="text" class="col-md-4 form-control" name="ville"/>
						</div>
						<div class ="col-form-label row">
						 <!-- Pays -->
							<label for="pays" class="col-md-3 col-form-label">Pays</label>
							<input type="text" class="col-md-4 form-control" name="pays"/>
							<label class="col-md-1 col-form-label"></label>
						</div>
				</div>
			</div>

			<div class="form-group row">
				<label for="statut" class="col-md-1 col-form-label"></label>

				<label for="statut" class="col-md-2 col-form-label">Statut </label>

				<div class="col-md-1 form-check">
					<input type="radio" class="form-check-input" name="statut" value="acheteur" checked/>
					<label class="form-check-label" for="acheteur">Client</label>
				</div>

				<div class="col-md-1 form-check">
					<input type="radio" class="form-check-input" name="statut" value="vendeur"/> 
					<label class="form-check-label" for="vendeur">Vendeur</label>
				</div>
			</div>
			

			<div class="form-group">
				<label for="mail" class="col-md-1 col-form-label"></label>
				<label><input type="submit" class="btn btn-primary" value="Inscription" name="button1"></label>
				<input type="reset" class="btn btn-primary" value="Effacer" name="button2">
			</div>	

		<?php

			$mail = isset($_POST["mail"])? $_POST["mail"]: "";
			$MDP = isset($_POST["MDP"])? $_POST["MDP"]: "";
			$nom = isset($_POST["nom"])? $_POST["nom"]: "";
			$prenom = isset($_POST["prenom"])? $_POST["prenom"]: "";
			$num_voie = isset($_POST["num_voie"])? $_POST["num_voie"]: "";
			$rue = isset($_POST["rue"])? $_POST["rue"]: "";
			$CP = isset($_POST["CP"])? $_POST["CP"]: "";
			$ville = isset($_POST["ville"])? $_POST["ville"]: "";
			$pays = isset($_POST["pays"])? $_POST["pays"]: "";
			$telephone = isset($_POST["telephone"])? $_POST["telephone"]: "";
			$image = isset($_POST["image"])? $_POST["image"]: "";
			$wallpaper= isset($_POST["wallpaper"])? $_POST["wallpaper"]: "";
			$statut = isset($_POST["statut"])? $_POST["statut"]: "";
			$connecte = false;
			$message_erreur = "";
			$adresse = "";

				if( preg_match ( " /^[^\W][a-zA-Z0-9_]+(\.[a-zA-Z0-9_]+)*\@edu.ece.fr$/ " ,$mail) ) {
					$valide_mail = true;
				}
				else{
					$valide_mail = false;
					$message_erreur .= "Le mail est incorrecte, il doit etre du type @edu.ece.fr. <br>";
				}

				if( preg_match ( " /^[0-9]{5,5}$/ " , $CP )) {
					$valide_cp = true;
				}
				else{
					$valide_cp = false;
					$message_erreur .= "Le code postal est incorrecte, il doit comporter 5 chiffres sans espaces. <br>";
				}

				if( $num_voie > 0 && $num_voie < 200) {
					$valide_num_voie = true;
				}
				else{
					$valide_num_voie = false;
					$message_erreur .= "Le numéro de voie est incorrecte, elle doit comprise entre 1 et 199. <br>";
				}

				if ( preg_match ( " /^[0-9]{10,10}$/ " , $telephone ) ){
					$valide_telephone = true;
				}
				else{
					$valide_telephone = false;
					$message_erreur .= "Le numéro de téléphone est incorrecte, il doit être composé de 10 chiffres sans espaces. <br>";
				}

				if(isset($_POST['button1'])){
				if(!empty($MDP) && !empty($mail) && !empty($nom) && !empty($prenom) && !empty($CP) && !empty($ville) && !empty($rue) && !empty($telephone)) {
					if($valide_mail == true && $valide_num_voie == true && $valide_cp == true && $valide_telephone == true) {
						$servername = "localhost";
						$username ="root";
						$password = "";
						$dbname = "piscinedb2";
		
						$connection = new mysqli($servername, $username, $password, $dbname);

							if($connection->connect_error) {
								die("Connection failed: " . $connection->connect_error);
							}
							else {
							}

							//Unicité du mail dans la DB
							$sql = "";
							$sql0 = "SELECT acheteur.mail, vendeur.mail FROM acheteur,vendeur WHERE acheteur.mail = '$mail' OR vendeur.mail = '$mail'";
							$req0 = mysqli_query($connection, $sql0) or die ("Message d'erreur1: " . mysqli_error($connection) );

							$adresse = $num_voie . " " . $rue;; 
							if(mysqli_num_rows($req0) == 0){
								
								if($statut == "acheteur") {			
									$sql = "INSERT INTO acheteur VALUE (0, '$nom', '$prenom', '$image', '$wallpaper', '$adresse', '$CP', '$ville', '$pays', '$telephone', '$mail', '$MDP',0 , 0, 0, 0, 0)";
									$connecte = true;
								}

								if($statut == "vendeur") {
									$sql = "INSERT INTO vendeur VALUE (0, '$nom', '$prenom', '$image', '$wallpaper', '$adresse', '$CP', '$ville', '$pays', '$telephone' '$mail', '$MDP')";
									$connecte = true;
								}
							}
							else {
								echo 'Un utilisateur possède déja ce mail. Veuillez en utiliser un autre. <br>';
								$connecte = false;
							}

							if($connecte == true) {
								$result = mysqli_query($connection, $sql) or die ("Message d'erreur3: " . mysqli_error($connection) );
								echo "Votre compte a bien été cree, vous pouvez vous <a href='compte.php'>connecter</a> !<br />";
							}
							else {
								echo 'Impossible de créer le compte compte.<br>';
							}
						}
						else {
							$message_erreur .= "<br> Merci de bien vouloir corriger les champs mentionnées.";
							echo $message_erreur;
						}
					}
					else {
						echo 'Des champs sont vides';
					}
				}

		?>	
		
 	</form>

 </div>
<?php include 'footer.php'; ?>
</body>
</html>