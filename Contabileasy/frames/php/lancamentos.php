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
		$data_op = $_POST['data_op']; 
		$hist_op = $_POST['hist_op'];
		$valor = $_POST['valor'];
        $conta_deb = $_POST['conta_deb'];
        $conta_cre = $_POST['conta_cre'];

		$query = mysql_query("INSERT INTO lancamento(data_operacao, conta_debito, conta_credito, historico, valor) VALUES('$data_op', '$conta_deb', '$conta_cre','$hist_op', $valor)") or die(mysql_error());	
                if($query){
                       echo "<h1 class='sucer'>Lançamento feito com sucesso!</h1>";
                }else{
                        echo "<h1 class='sucer'>O lançamento não foi feito !</h1>";
                }
	 ?>
<input class="btn btn-primary" id="t1" onclick="location.href='javascript: history.go(-1)'" type="submit" value="VOLTAR">
</body>
</html>