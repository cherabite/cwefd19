<?php

$host = 'localhost';
$user = 'root';
$pass = '';
$db = 'gestion_stock';


$link = mysql_connect($host, $user, $pass) or die('Erreur : ' . mysql_error());
mysql_select_db($db) or die('Erreur :' . mysql_error());
mysql_query("set character_set_server='utf8'");
mysql_query("set names 'utf8'");
$ID_CATEGORIE = $_GET['ID_CATEGORIE'];
$supgrade = mysql_query("DELETE FROM categorie WHERE ID_CATEGORIE='$ID_CATEGORIE'");
header('location: liste_categorie.php'); // redirection
?>