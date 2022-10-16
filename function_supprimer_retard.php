<?php
$host = 'localhost';
$user = 'root';
$pass = '';
$db = 'grh';


$link = mysql_connect($host, $user, $pass) or die('Erreur : ' . mysql_error());
mysql_select_db($db) or die('Erreur :' . mysql_error());
mysql_query("set character_set_server='utf8'");
mysql_query("set names 'utf8'");
$ID_RET= $_GET['ID_RET'];
//$ID_EMPLOYEUE=$_GET['ID_EMPLOYEUE'];

$supgrade = mysql_query("DELETE FROM tab_retard WHERE ID_RET='$ID_RET'");
//header('list_retard.php?ID_EMPLOYEUE= $ID_EMPLOYEUE ');
header('location: retard_absence.php'); // redirection
 
?>