<?php 
	$host = "localhost";
	$database = "Contabilidade";
	$user = "root";
	$senha = "";	
	$mysqli = mysql_connect($host, $user, $senha, $database);
	mysql_select_db($database, $mysqli); 	

	mysql_set_charset('utf8');
?>