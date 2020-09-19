<?php 
    include("php/con_bd.php");
    $sql = mysql_query("SELECT DISTINCT nome_conta FROM contfacil WHERE tipo_conta = 'Analitico'");
 ?>
<!DOCTYPE html>
<html>
<head>
	<title>ContFácil</title>
    <meta charset="utf-8">
	<link rel="stylesheet" type="text/css" href="../style/css3/bootstrap.min.css"/>
    <link rel="stylesheet" type="text/css" href="../style/css/style2.css"/>
</head>
<body>
	<div class="container">
        	<h2>LANÇAMENTOS</h2>
            <hr />
        	<form method="POST" action="php/lancamentos.php">
        		<p>Data da operação:</p>
        		<input type="date" name="data_op" class="form-control" required>
                <p>Histórico da operação:</p>
                <input type="text" name="hist_op" class="form-control"  required placeholder="Ex: COMPRA DE UM CARRO">
        		<p>Conta a ser debitada:</p>         
                <select class="form-control" required name="conta_deb"> 
                    <?php
                        while($dado = mysql_fetch_assoc($sql)){ ?> 
                            <option> <?php echo $dado["nome_conta"]; ?> </option>
                    <?php } ?>
                </select>
        		<p>Conta a ser creditada:</p>
                <?php
                    $sql = mysql_query("SELECT DISTINCT nome_conta FROM contfacil WHERE tipo_conta = 'Analitico'");
                ?>                 
                <select class="form-control" required name="conta_cre">  
                <?php
                    while($dado = mysql_fetch_assoc($sql)){ ?> 
                        <option> <?php echo $dado["nome_conta"]; ?> </option>
                <?php } ?>
                </select>
        		<p>Valor:</p>
        		<input type="number" name="valor" class="form-control" required placeholder="Ex: 1000"> 
        		<div align="center" style="padding-top: 10px;">
        			<input type="submit" name="cadastrar" class="btn btn-primary btn-lg" align="center" value="Lançar"> 
        		</div>
        	</form>
        </div>
</body>
</html>
