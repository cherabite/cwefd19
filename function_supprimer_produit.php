<?php

$host = 'localhost';
$user = 'root';
$pass = '';
$db = 'gestion_stock';


$link = mysql_connect($host, $user, $pass) or die('Erreur : ' . mysql_error());
mysql_select_db($db) or die('Erreur :' . mysql_error());
mysql_query("set character_set_server='utf8'");
mysql_query("set names 'utf8'");
$ID_PRODUIT = $_GET['ID_PRODUIT'];
$supgrade = mysql_query("DELETE FROM produit WHERE ID_PRODUIT='$ID_PRODUIT'");
header('location: liste_produit.php'); // redirection
?>