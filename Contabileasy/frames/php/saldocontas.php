<?php
	include("con_bd.php");
    $sql = mysql_query("SELECT DISTINCT nome_conta FROM contfacil WHERE tipo_conta = 'Analitico'");
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
    <div class="container">
        <h3 style="margin-bottom: 50px" align="center">LISTA DE CONTAS</h3>
            <h4>Selecione a Conta</h4>
        <form method="get" action="TotContas.php">
            <select class="form-control" name="nome" required>
            <?
                while($dado = mysql_fetch_assoc($sql)){ ?>
                    <option> <?php echo $dado["nome_conta"]; ?> </option>
            <?php } ?>
            </select>
            <span>
                <button class="btn btn-primary btn-md" type="submit">Listar</button>
            </span>
        </form>
    </div>
        <!--Butão voltar -->
<input class="btn btn-primary t1" onclick="location.href='javascript: history.go(-1)'" type="submit" value="VOLTAR">
</body>
</html>

