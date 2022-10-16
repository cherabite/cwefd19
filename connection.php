<?php
$dbhost  = 'localhost';
$dbuser  = 'root';
$dbpass  = '';
$dbname  = 'Adherents';
$dbtable = 'enfants';
$dbc = mysql_connect( $dbhost , $dbuser , $dbpass ) or die('Host ?'.mysql_error() );
mysql_select_db( $dbname ) or die('Db ?'.mysql_error() );
?>