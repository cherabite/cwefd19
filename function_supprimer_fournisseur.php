<?php

$host = 'localhost';
$user = 'root';
$pass = '';
$db = 'gestion_stock';


$link = mysql_connect($host, $user, $pass) or die('Erreur : ' . mysql_error());
mysql_select_db($db) or die('Erreur :' . mysql_error());
mysql_query("set character_set_server='utf8'");
mysql_query("set names 'utf8'");
$ID_FOURNISSEUR = $_GET['ID_FOURNISSEUR'];
$supgrade = mysql_query("DELETE FROM fournisseur WHERE ID_FOURNISSEUR='$ID_FOURNISSEUR'");
header('location: liste_fournisseur.php'); // redirection
?>