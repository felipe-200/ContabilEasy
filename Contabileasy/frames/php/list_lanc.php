<?php
    include("con_bd.php");
    $sql = mysql_query("SELECT * FROM lancamento");
?>
<!DOCTYPE html>
<html>
<head>
<title>ContFácil</title>
<meta charset="UTF-8"/>
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<link rel="stylesheet" type="text/css" href="../../style/css3/bootstrap.min.css"/>
<link rel="stylesheet" type="text/css" href="../../style/css/style.css"/>
</head>
<body>	
<h3 align="center">LISTAGEM DE LANÇAMENTOS</h3>
    <div class="col-md-9 col-md-offset-2" >
        <div class="table table-responsive">
            <table class="table table-striped table-bordered">
                <thead>
                    <tr class="text-uppercase">
                        <th>Data da operação</th>
                        <th>Histórico da operação</th>
                        <th>Conta a ser debitada</th>
                        <th>Conta a ser creditada</th>
                        <th>Valor</th>
                        <th hidden>ID</th>
                        <th class="alinhar">Ação</th>
                    </tr>
                </thead>
                <tbody>
                    <?php
						while($dado = mysql_fetch_assoc($sql)){ ?>
						<tr class="active">  
						 	<td> <?php echo date("d/m/Y", strtotime($dado["data_operacao"]));?></td>
						 	<td> <?php echo $dado["historico"]; ?> </td>
						 	<td> <?php echo $dado["conta_debito"]; ?> </td>
                            <td> <?php echo $dado["conta_credito"]; ?> </td>
                            <td> <?php echo "$ ". number_format($dado["valor"], 2); ?> </td>
                            <td hidden> <?php echo $dado["id"]; ?> </td>
						 	<td> 
                                <div class="alinhar">
                                    <a href="javascript: if(confirm('Tem certeza que você deseja excluir o registro ?')){ location.href='apagar.php?id=<?php echo $dado["id"]; ?>'; }"; id="link">
                                        <button class="btn btn-danger"> 
                                            Deletar
                                        </button>
                                    </a>
                                </div>
                            </td>
						 </tr>
 				    <?php } ?>
                </tbody>
            </table>
        </div>
    </div>
<input class="btn btn-primary t1" onclick="location.href='../rela.html'" type="submit" value="VOLTAR">
 </body>
 </html>
