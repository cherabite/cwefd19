<?php

$host = 'localhost';
$user = 'root';
$pass = '';
$db = 'grh';


$link = mysql_connect($host, $user, $pass) or die('Erreur : ' . mysql_error());
mysql_select_db($db) or die('Erreur :' . mysql_error());
mysql_query("set character_set_server='utf8'");
mysql_query("set names 'utf8'");
$ID_SERVICE = $_GET['ID_SERVICE'];
$supgrade = mysql_query("DELETE FROM tab_services WHERE ID_SERVICE='$ID_SERVICE'");
header('location: list_service.php'); // redirection
?>