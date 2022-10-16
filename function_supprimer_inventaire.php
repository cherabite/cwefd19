<?php

$host = 'localhost';
$user = 'root';
$pass = '';
$db = 'gestion_stock';


$link = mysql_connect($host, $user, $pass) or die('Erreur : ' . mysql_error());
mysql_select_db($db) or die('Erreur :' . mysql_error());
mysql_query("set character_set_server='utf8'");
mysql_query("set names 'utf8'");
$ID_INV = $_GET['ID_INV'];
$supgrade = mysql_query("DELETE FROM inventaire WHERE ID_INV='$ID_INV'");
header('location: modifier_inventaire.php'); // redirection
?>