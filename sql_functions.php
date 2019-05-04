<?php

// $servername = "localhost";
// $username ="root";
// $password = "";
// $dbname = "piscinedb2";
// $sql = "";
// $connection = new mysqli($servername, $username, $password, $dbname);
// if($connection->connect_error) {
// 	die("Connection failed: " . $connection->connect_error);
// }
include 'connect.php';
//Requête best-seller du livre
$req_livres = " SELECT id_produit, SUM(quantite) FROM commandes WHERE bought='1' AND cat = 'livres' GROUP BY id_produit ORDER BY SUM(quantite) DESC ";
$result_livres = mysqli_query($db_handle, $req_livres) or die ("Message d'erreur: " . mysqli_error($db_handle) );
$obj_livres = $result_livres->fetch_object();
if(isset($obj_livres)){
    $id_bs_livres = $obj_livres->id_produit;
    /* On libère la requête */
    $result_livres->close();
    //On récupère les infos du produit depuis l'id_produit ->>> $bs_livres
    $req_livres = " SELECT * FROM livres WHERE id='$id_bs_livres'";
    $result_livres = mysqli_query($db_handle, $req_livres) or die ("Message d'erreur: " . mysqli_error($db_handle) );
    $bs_livres = $result_livres->fetch_object();
}



//Requête best-seller de la musique
$req_musique = " SELECT id_produit, SUM(quantite) FROM commandes WHERE bought='1' AND cat='musique' GROUP BY id_produit ORDER BY SUM(quantite) DESC ";
$result_musique = mysqli_query($db_handle, $req_musique) or die ("Message d'erreur: " . mysqli_error($db_handle) );
$obj_musique = $result_musique->fetch_object();
if(isset($obj_musique)) {
    $id_bs_musique = $obj_musique->id_produit;
    
    /* On libère la requête */
    $result_musique->close();
    //On récupère les infos du produit depuis l'id_produit ->>> $bs_musique
    $req_musique = "SELECT * FROM musique WHERE id='$id_bs_musique'";
    $result_musique = mysqli_query($db_handle, $req_musique) or die ("Message d'erreur: " . mysqli_error($db_handle) );
    $bs_musique = $result_musique->fetch_object();
}



//Requête best-seller de la vetements
$req_vetements = " SELECT id_produit, SUM(quantite) FROM commandes WHERE bought='1' AND cat = 'vetements' GROUP BY id_produit ORDER BY SUM(quantite) DESC ";
$result_vetements = mysqli_query($db_handle, $req_vetements) or die ("Message d'erreur: " . mysqli_error($db_handle) );
$obj_vetements = $result_vetements->fetch_object();
if(isset($obj_vetements)) {
    $id_bs_vetements = $obj_vetements->id_produit;
    /* On libère la requête */
    
    $result_vetements->close();
    //On récupère les infos du produit depuis l'id_produit ->>> $bs_vetements
    $req_vetements = "SELECT * FROM vetements WHERE id='$id_bs_vetements'";
    $result_vetements = mysqli_query($db_handle, $req_vetements) or die ("Message d'erreur: " . mysqli_error($db_handle) );
    $bs_vetements = $result_vetements->fetch_object();
}



//Requête best-seller de la sel
$req_sel = " SELECT id_produit, SUM(quantite) FROM commandes WHERE bought='1' AND cat = 'sel' GROUP BY id_produit ORDER BY SUM(quantite) DESC ";
$result_sel = mysqli_query($db_handle, $req_sel) or die ("Message d'erreur: " . mysqli_error($db_handle) );
$obj_sel = $result_sel->fetch_object();
if(isset($obj_sel)) {
    $id_bs_sel = $obj_sel->id_produit;
    
    /* On libère la requête */
    $result_sel->close();
    //On récupère les infos du produit depuis l'id_produit ->>> $bs_sel
    $req_sel = " SELECT * FROM sel WHERE id='$id_bs_sel'";
    $result_sel = mysqli_query($db_handle, $req_sel) or die ("Message d'erreur: " . mysqli_error($db_handle) );
    $bs_sel = $result_sel->fetch_object();
}





// echo $bs_livres->titre;
// echo "</br>";
// echo $bs_musique->titre;
// echo "</br>";
// echo $bs_vetements->titre;
// echo "</br>";
// echo $bs_sel->titre;




?>
