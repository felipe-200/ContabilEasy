<?php 
	include("con_bd.php");

	$id = $_GET['id'];

	$sql = mysql_query("DELETE FROM `contfacil` WHERE id = $id");

	if($sql){
		header("location: contas.php");
	}
 ?>
