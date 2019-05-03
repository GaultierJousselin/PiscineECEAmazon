<?php

//identifier la BDD
$database = "piscinedb2";

//connectez-vous dans la BDD
$db_handle = mysqli_connect('localhost', 'root', 'root');
$db_found = mysqli_select_db($db_handle, $database);
mysqli_set_charset($db_handle, "utf8");

?>