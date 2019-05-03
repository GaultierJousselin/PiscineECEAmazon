<?php

$servername = "localhost";
$username ="root";
$password = "root";
$dbname = "piscinedb2";
$sql = "";
$connection = new mysqli($servername, $username, $password, $dbname);
if($connection->connect_error) {
	die("Connection failed: " . $connection->connect_error);
}

//Requête best-seller du livre
$req_livres = " SELECT id_produit, SUM(quantite) FROM commandes WHERE cat = 'livres' GROUP BY id_produit ORDER BY SUM(quantite) DESC ";
$result_livres = mysqli_query($connection, $req_livres) or die ("Message d'erreur: " . mysqli_error($connection) );
$obj_livres = $result_livres->fetch_object();
$id_bs_livres = $obj_livres->id_produit;
/* On libère la requête */
$result_livres->close();
//On récupère les infos du produit depuis l'id_produit ->>> $bs_livres
$req_livres = " SELECT livres.titre, livres.photo FROM livres,commandes WHERE livres.id= $id_bs_livres ";
$result_livres = mysqli_query($connection, $req_livres) or die ("Message d'erreur: " . mysqli_error($connection) );
$bs_livres = $result_livres->fetch_object();

//Requête best-seller de la musique
$req_musique = " SELECT id_produit, SUM(quantite) FROM commandes WHERE cat = 'musique' GROUP BY id_produit ORDER BY SUM(quantite) DESC ";
$result_musique = mysqli_query($connection, $req_musique) or die ("Message d'erreur: " . mysqli_error($connection) );
$obj_musique = $result_musique->fetch_object();
$id_bs_musique = $obj_musique->id_produit;
/* On libère la requête */
$result_musique->close();
//On récupère les infos du produit depuis l'id_produit ->>> $bs_musique
$req_musique = " SELECT musique.titre, musique.photo FROM musique,commandes WHERE musique.id= $id_bs_musique ";
$result_musique = mysqli_query($connection, $req_musique) or die ("Message d'erreur: " . mysqli_error($connection) );
$bs_musique = $result_musique->fetch_object();

//Requête best-seller de la vetements
$req_vetements = " SELECT id_produit, SUM(quantite) FROM commandes WHERE cat = 'vetements' GROUP BY id_produit ORDER BY SUM(quantite) DESC ";
$result_vetements = mysqli_query($connection, $req_vetements) or die ("Message d'erreur: " . mysqli_error($connection) );
$obj_vetements = $result_vetements->fetch_object();
$id_bs_vetements = $obj_vetements->id_produit;
/* On libère la requête */
$result_vetements->close();
//On récupère les infos du produit depuis l'id_produit ->>> $bs_vetements
$req_vetements = " SELECT vetements.titre, vetements.photo FROM vetements,commandes WHERE vetements.id= $id_bs_vetements ";
$result_vetements = mysqli_query($connection, $req_vetements) or die ("Message d'erreur: " . mysqli_error($connection) );
$bs_vetements = $result_vetements->fetch_object();

//Requête best-seller de la sel
$req_sel = " SELECT id_produit, SUM(quantite) FROM commandes WHERE cat = 'sel' GROUP BY id_produit ORDER BY SUM(quantite) DESC ";
$result_sel = mysqli_query($connection, $req_sel) or die ("Message d'erreur: " . mysqli_error($connection) );
$obj_sel = $result_sel->fetch_object();
$id_bs_sel = $obj_sel->id_produit;
/* On libère la requête */
$result_sel->close();
//On récupère les infos du produit depuis l'id_produit ->>> $bs_sel
$req_sel = " SELECT sel.titre, sel.photo FROM sel,commandes WHERE sel.id= $id_bs_sel ";
$result_sel = mysqli_query($connection, $req_sel) or die ("Message d'erreur: " . mysqli_error($connection) );
$bs_sel = $result_sel->fetch_object();





echo $bs_livres->titre;
echo "</br>";
echo $bs_musique->titre;
echo "</br>";
echo $bs_vetements->titre;
echo "</br>";
echo $bs_sel->titre;




?>
