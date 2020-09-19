<?php 
  include("con_bd.php");
  $sql = mysql_query("SELECT nome_conta, tipo_conta, localizador FROM contfacil WHERE tipo_conta != 'Totalizador' ORDER BY localizador");//QUERY RESTO
  $sqln = mysql_query("SELECT nome_conta FROM contfacil ORDER BY localizador");//QUERY NOME

  //LAÇO DE REPETIÇÃO NOME
  

while ($nomes = mysql_fetch_assoc($sqln)) {

    $nomes['nome_conta'];
    $array = implode("", $nomes); 
    $sqld = mysql_query("SELECT valor FROM lancamento WHERE conta_debito = '$array'");
    $sqlc = mysql_query("SELECT valor FROM lancamento WHERE conta_credito = '$array'");
  }
  //FIM LOOP NOME
  
  //VALOR TOTAL DEBITO -->
  $val_d = 0;
  while ($valor_d = mysql_fetch_assoc($sqld)) { 
  $valor_d['valor'];
  $val_d += $valor_d['valor'];
  }//FIM LOOP TOTAL DEBITO

  //VALOR TOTAL CREDITO
  $val_c = 0;
  while ($valor_c = mysql_fetch_assoc($sqlc)){ 
  $valor_c['valor'];
  $val_c += $valor_c['valor'];
  }//FIM LOOP TOTAL CREDITO

  //VALOR TOTAL
  $valtot = $val_d - $val_c;
  if($valtot < 0){
    $valtot = $valtot * -1;
  }

   echo "$ " . number_format($valtot, 2);

?>
<!DOCTYPE html>
<html>
<head>
<title>Contabileasy</title>
<link rel="stylesheet" type="text/css" href="../../style/css3/bootstrap.min.css"/>
<link rel="stylesheet" type="text/css" href="../../style/css/style.css"/>
</head>
<body>
  <h3 class="text-center">BALANCETE DE CONTAS</h3>
  <div class="col-lg-6 col-lg-offset-3">
    <div class="table table-responsive">
      <table class="table table-striped table-bordered">
        <thead>
          <tr>
            <th>Código Localizador</th>
            <th>Nome</th>
            <th>Tipo</th>
            <th>Saldo</th>
          </tr>
        </thead>
        <tbody>
          <?php while($saldotot = mysql_fetch_assoc($sql)){?>
          <tr>
              <td><?php echo $saldotot['localizador']; ?></td>
              <td><?php echo $saldotot['nome_conta']; ?></td>
              <td><?php echo $saldotot['tipo_conta']; ?></td>
              <td><?php echo "$ " . number_format($valtot, 2); ?></td>
          </tr>
          <?php } ?> 
        </tbody>
      </table>
    </div>  
  </div>
  <input class="btn btn-primary t1" onclick="location.href='javascript: history.go(-1)'" type="submit" value="VOLTAR">
</body>
</html>
