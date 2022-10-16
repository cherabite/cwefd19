<?php

$host = 'localhost';
$user = 'root';
$pass = '';
$db = 'grh';


$link = mysql_connect($host, $user, $pass) or die('Erreur : ' . mysql_error());
mysql_select_db($db) or die('Erreur :' . mysql_error());
mysql_query("set character_set_server='utf8'");
mysql_query("set names 'utf8'");
$ID_EMPLOYEUE = $_GET['ID_EMPLOYEUE'];
$supgrade = mysql_query("DELETE FROM employeur WHERE ID_EMPLOYEUE='$ID_EMPLOYEUE'");
header('location: list_employeur.php'); // redirection
?>