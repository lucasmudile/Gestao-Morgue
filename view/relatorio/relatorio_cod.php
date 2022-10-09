   <?php 
    $conn=mysqli_connect('localhost','root','','morgue');
    $depositados="Depositado";
    $mes[1]="Janeiro"; 
    $mes[2]="Fevereiro"; 
    $mes[3]="Março"; 
    $mes[4]="Abril"; 
    $mes[5]="Maio"; 
    $mes[6]="Junho"; 
    $mes[7]="Julho"; 
    $mes[8]="Agosto"; 
    $mes[9]="Setembro"; 
    $mes[10]="Outubro"; 
    $mes[11]="Novembro"; 
    $mes[12]="Dezembro";
     ?>
<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<title>relatório</title>
	<link rel="stylesheet" href="relatorio.css">
</head>
<body>
  <div class="container">
	RELATORIO DE DEPOSITO DE CORPOS
  <hr><br>
  <table border="1">
    <tr>
      <th>mes</th>
      <th>corpos depositados por mes</th>
      <th>nº de corpos no deposito</th>
    </tr>
 
    <?php foreach ($mes as $key => $value){ 
$corpos_depositados_por_mes = "select count(id_cadaver) as num from cadaver where month(data_registo)='$key'";

$resultado = mysqli_query($conn, $corpos_depositados_por_mes);
$row = mysqli_fetch_assoc($resultado);

// select count(id_cadaver) as num from cadaver where month(data_registo)=6 AND statu="Depositado"
$corpos_no_deposito = "select count(id_cadaver) as depo from cadaver where month(data_registo)='$key'AND statu='$depositados'";

$resultado1 = mysqli_query($conn, $corpos_no_deposito);
$row1 = mysqli_fetch_assoc($resultado1);
      ?>

      <tr>
      <td><?php echo $value ?></td>
      <td><?php /**/ if ($row['num']!=0 && $row['num']>0 ) {echo $row['num'];}else{echo "---";}  ?></td>
      <td><?php /**/ if ($row1['depo']!=0 && $row1['depo']>0 ) {echo $row1['depo'];}else{echo "---";}  ?></td>
      
       <?php } ?>
    </tr>
</table>
  </div>
	<script type="text/javascript" src="relatorio.js"></script>
</body>
</html>