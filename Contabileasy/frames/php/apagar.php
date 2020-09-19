<?php 
	include("con_bd.php");

	$id = $_GET['id'];

	$sql = mysql_query("DELETE FROM `lancamento` WHERE id = $id");

	if($sql){
		header("location: list_lanc.php");
	}
 ?>
