<?php 
	include("con_bd.php");
  $sqld = mysql_query("SELECT DISTINCT valor, conta_debito FROM lancamento WHERE conta_credito != 'CAPITAL SOCIAL'");
  $sqlc = mysql_query("SELECT DISTINCT valor, conta_credito FROM lancamento WHERE conta_credito != 'CAPITAL SOCIAL'");
  $sqlpl = mysql_query("SELECT DISTINCT conta_credito FROM lancamento WHERE conta_credito = 'CAPITAL SOCIAL'");
?>

<!DOCTYPE html>
<html>
<head>
<title>Contabileasy</title>
<meta charset="UTF-8"/>
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<link rel="stylesheet" type="text/css" href="../../style/css3/bootstrap.min.css"/>
<link rel="stylesheet" type="text/css" href="../../style/css/style.css"/>
</head>
<body>
 <h3 align="center">Balanço Patrimonial</h3>
<div class="col-md-9 col-md-offset-2">
 <div class="table table-responsive">
  	<table class="table table-striped table-bordered">
  	<tr>
      <th width="50%"><div align="center"><strong>ATIVO</strong></div></th>
      <th width="50%"><div align="center"><strong>PASSIVO</strong></div></th>
    </tr>
    <tr>
    <!--PHP AQUI -->
		<td rowspan="3">
      <?php $val_d = 0; ?>
      <?php while ($debit = mysql_fetch_assoc($sqld)) { ?>
			<div><!--AQUI--><?php echo $debit['conta_debito']; ?></div>

      <!--VALOR DEBITO-->
      <span class="text-hide"><?php $debit['valor'] ?></span>
      <span class="text-hide"><?php $val_d += $debit['valor']?></span>
      <?php } ?>
		</td>
	    <td height="18">
        <?php $val_c = 0; ?>
        <?php while($credit = mysql_fetch_assoc($sqlc)){?>
          <div><!--AQUI--><?php echo $credit['conta_credito']; ?></div>

          <!--VALOR CREDITO-->
          <span class="text-hide"><?php $debit['valor']; ?></span>
          <span class="text-hide"><?php $val_c += $credit['valor']?></span> 
        <?php } ?>
	    </td>
    </tr>
    <!--FIM PHP -->
    <tr>
      <td>
      	<div align="center"><strong>PATRIMÔNIO LÍQUIDO</strong></div>
      </td>
    </tr>
    <tr>
    <!--PHP AQUI -->
      <td height="31">
        <?php while($pl = mysql_fetch_assoc($sqlpl)){ ?>
      	<div><!--AQUI--><?php echo $pl['conta_credito']; ?></div>
        <?php } ?>
      </td>
    </tr>
    <!--FIM PHP -->
    <tr>
      <td><div align="left"><strong>TOTAL ATIVO: $<!--AQUI--><?php echo number_format($val_d, 2) ; ?></strong></div></td>
      <td><div align="left"><strong>TOTAL PASSIVO: $<!--AQUI--><?php echo number_format($val_c, 2) ; ?></strong></div></td>
      </tr>
  	</table>
 </div>
</div>
<!--Botão-->
<input class="btn btn-primary t1" onclick="location.href='../rela.html'" type="submit" value="VOLTAR">
</body>
</html>