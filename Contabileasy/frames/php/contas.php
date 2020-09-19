<?php 
    include('con_bd.php');
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
<h3 align="center">LISTAGEM DE CONTAS</h3>
    <div class="col-lg-6 col-lg-offset-3">
        <div class="table table-responsive">
            <table class="table table-striped table-bordered">
                <thead>
                    <tr class="text-uppercase">
                        <th>Nome da Conta</th>
                        <th>Tipo da Conta</th>
                        <th>Localizador</th>
                        <th hidden>ID</th>
                        <th class="alinhar">Ação</th>
                    </tr>
                </thead>
                <tbody>
                    <?php
					$sql = mysql_query("SELECT * FROM contfacil ORDER BY localizador ASC");
					while($dado = mysql_fetch_assoc($sql)){ ?>
						 <tr class="active">  
						 	<td> <?php echo $dado["nome_conta"]; ?> </td>
						 	<td> <?php echo $dado["tipo_conta"]; ?> </td>
						 	<td> <?php echo $dado["localizador"]; ?> </td>
                            <td hidden> <?php echo $dado["id"]; ?> </td>
						 	<td> 
                            <div class="alinhar">
                                <a href="javascript: if(confirm('Tem certeza que você deseja excluir o registro ?')){ location.href='apaga_li.php?id=<?php echo $dado["id"]; ?>';
                                }"; id="link">
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
