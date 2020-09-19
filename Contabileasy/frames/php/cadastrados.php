<?php 
		include("con_bd.php");
 ?>
<!DOCTYPE html>
<html>
<head>
<title>ContFácil</title>
<meta charset="UTF-8">
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<link rel="stylesheet" type="text/css" href="../../style/css3/bootstrap.min.css"/>
<link rel="stylesheet" type="text/css" href="../../style/css/style.css"/>
</head>
<body>
	<?php
		mysql_set_charset('utf8');
		$nome_conta = $_POST['nome_conta']; 
		$tipo_conta = $_POST['tipo_conta'];
		$localizador = $_POST['localizador'];
	?>
	<?php	
		$conexao = mysql_query("INSERT INTO contfacil (nome_conta, tipo_conta, localizador) values('$nome_conta', '$tipo_conta', '$localizador')");
		if($conexao){
			echo "<h1 class='sucer'>Conta cadastrada com sucesso :-)</h1>";
		}else{
			echo "<h1 class='sucer'>Nome da Conta <i class='italico'>$nome_conta</i> ou o Localizador <i class='italico'>$localizador</i> estão duplicados :-( !</h1>";
		}
	?>
<input class="btn btn-primary" id="t1" onclick="location.href='javascript: history.go(-1)'" type="submit" value="VOLTAR">
</body>
</html>

