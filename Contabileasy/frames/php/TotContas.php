<?php 
	include("con_bd.php");
    $nome = $_GET['nome'];
    $sqld = mysql_query("SELECT historico, data_operacao, valor FROM lancamento WHERE conta_debito = '$nome'");
    $sqlc = mysql_query("SELECT historico, data_operacao, valor FROM lancamento WHERE conta_credito = '$nome'");
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
<h3 align="center">SALDO DE CONTAS</h3>
    <div class="col-lg-6 col-lg-offset-3">
        <div class="table table-responsive"> 
            <!--TABELA DEBITO -->
            <table class="table table-striped table-bordered">
                <h4>CONTA: <b style="color: #337ab7;"><?php echo $nome; ?></b></h4>
                <thead>
                    <tr class="text-uppercase">
                        <th>Data</th>
                        <th>Histórico</th>
                        <th>Valor Débito</th>
                    </tr>
                </thead>
                <tbody>
                    <?php $val_d = 0 ?>
                    <?php while ($valor_d = mysql_fetch_assoc($sqld)) { ?>
                        <tr>
                            <td><?php echo date("d/m/Y", strtotime($valor_d['data_operacao'])); ?></td>
                            <td><?php echo $valor_d['historico']; ?></td>
                            <td><?php echo "$ ". number_format($valor_d['valor'], 2)?></td>
                            <td hidden><?php $val_d += $valor_d['valor']?></td>
                        </tr>
                    <? } ?>
                    <b></b>
                </tbody>
            </table>
            <b class="bold">TOTAL DÉBITO: <?php echo "$ ". number_format($val_d, 2); ?> </b>
            <hr>
            <!--TABELA CREDITO -->
            <table class="table table-striped table-bordered">
                <thead>
                    <tr class="text-uppercase">
                        <th>Data</th>
                        <th>Histórico</th>
                        <th>Valor Crédito</th>
                    </tr>
                </thead>
                <tbody>
                    <?php $val_c = 0 ?>
                    <?php while ($valor_c = mysql_fetch_assoc($sqlc)) { ?>
                        <tr>
                            <td><?php echo date("d/m/Y", strtotime($valor_c['data_operacao'])); ?></td>
                            <td><?php echo $valor_c['historico']; ?></td>
                            <td><?php echo "$ ". number_format($valor_c['valor'], 2)?></td>
                            <td hidden><?php $val_c += $valor_c['valor']?></td>
                        </tr>
                    <? } ?>
                </tbody>
            </table>
            <b class="bold">TOTAL CRÉDITO: <?php echo "$ ". number_format($val_c, 2); ?></b>
            <hr>
            <?php 
                $valtot = $val_d - $val_c;
                if($valtot > 0){
                    $cor = '#337ab7';
                }else if($valtot == 0){
                    $cor = '#f0ad4e';
                }else{
                    $cor = '#d43f3a';
                }
             ?>
            <h4>SALDO TOTAL: <b style="color: <?php echo $cor ?>"> $ <?php  
                $valtot = $val_d - $val_c;
                if($valtot < 0){
                    $valtot = $valtot * -1; 
                }
                echo number_format($valtot, 2);
             ?></b></h4>

            <!-- -->
            <?php 
                if($val_c > $val_d){
                    echo " <b style='color: #d43f3a;'> SALDO CREDOR </b> ";
                }elseif($val_c == $val_d){
                    echo " <b style='color: #f0ad4e;'> SALDO NULO </b> ";
                }
                else{
                    echo " <b style='color: #337ab7;'> SALDO DEVEDOR </b> ";
                }
             ?>
        </div>
    </div>         
<input class="btn btn-primary" id="t1" onclick="location.href='javascript: history.go(-1)'" type="submit" value="VOLTAR"> 
 </body>
 </html>