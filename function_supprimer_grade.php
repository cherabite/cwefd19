<?php

$host = 'localhost';
$user = 'root';
$pass = '';
$db = 'grh';


$link = mysql_connect($host, $user, $pass) or die('Erreur : ' . mysql_error());
mysql_select_db($db) or die('Erreur :' . mysql_error());
mysql_query("set character_set_server='utf8'");
mysql_query("set names 'utf8'");
$ID_GRADE = $_GET['ID_GRADE'];
$supgrade = mysql_query("DELETE FROM tab_grade WHERE ID_GRADE='$ID_GRADE'");
header('location: list_grade_emp.php'); // redirection
?>