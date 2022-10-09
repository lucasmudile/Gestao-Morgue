<?php	

 
    $conn=mysqli_connect('localhost','root','','morgue');
    $depositados="Depositado";
    $levantado="Levantado";
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
    if (isset($_REQUEST['ano'])) {
    	$ano=$_REQUEST['ano'];
    }
    else{
    	$ano=date('Y');
    }
	//referenciar o DomPDF com namespace
	use Dompdf\Dompdf;

	// include autoloader
	require_once("../../src/pdf/dompdf/autoload.inc.php");

	//Criando a Instancia
	$dompdf = new DOMPDF();
		$doc='
			<!DOCTYPE html>
			<html>
			<head>
			<title>relatório anual</title>
			<meta charset="utf-8">
			<meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
			<link href="bootstrap/css/bootstrap.min.css" rel="stylesheet" type="text/css">
			<style type="text/css">
			table{
			text-transform: capitalize;
			}
			meses.{
				text-align: left;
				}
			.dados,th{
				text-align: center;

			}
			</style>

			</head>
			<body>';


	$doc.='
			<table class="table table-sm table-bordered table-striped">
			<thead class="bg-dark text-white">
			<tr>
			<th>mes</th>
			<th>corpos depositados por mes</th>
			<th>corpos no deposito</th>
			<th>corpos levantado</th>
			</tr>
			</thead><tbody>';

			foreach ($mes as $key => $value){
				$corpos_depositados_por_mes = "select count(id_cadaver) as num from view_cadaver where month(data_registo)='$key' and YEAR(data_registo)=$ano";

				$resultado = mysqli_query($conn, $corpos_depositados_por_mes);
				$row = mysqli_fetch_assoc($resultado);
				if ($row['num']!=0 && $row['num']>0 ) {$td=$row['num'];}else{$td="---";}
				// select count(id_cadaver) as num from cadaver where month(data_registo)=6 AND statu="Depositado"
				$corpos_no_deposito = "select count(id_cadaver) as depo from view_cadaver where month(data_registo)='$key'AND statu='$depositados'and YEAR(data_registo)=$ano";

				$resultado1 = mysqli_query($conn, $corpos_no_deposito);
				$row1 = mysqli_fetch_assoc($resultado1);
				if ($row1['depo']!=0 && $row1['depo']>0 ) {$td1=$row1['depo'];}else{$td1="---";}

				// Levantado
				$corpos_levantado = "select count(id_cadaver) as depo from view_cadaver where month(data_registo)='$key'AND statu='$levantado'and YEAR(data_registo)=$ano";

				$resultado2 = mysqli_query($conn, $corpos_levantado);
				$row2 = mysqli_fetch_assoc($resultado2);
				if ($row2['depo']!=0 && $row2['depo']>0 ) {$td2=$row2['depo'];}else{$td2="---";}

				$doc.='<tr>';
				$doc.='<td class="meses"> '.$value.'</td>';
				$doc.='<td class="dados"> '.$td.'</td>';
				$doc.='<td class="dados"> '.$td1.'</td>';
				$doc.='<td class="dados"> '.$td2.'</td>';
				$doc.='</tr>';
			}
		
	
		$doc.='</tbody></table>';
		$doc.='';
		$doc.='
			
			</body>
			</html>
			';
	$dompdf->load_html($doc);

	$dompdf->setPaper('A4', 'portrait');
	
	//Renderizar o html
	$dompdf->render();
	

	//Exibibir a página
	$dompdf->stream(
		"relatorio_celke.pdf", 
		array(
			"Attachment" => false //Para realizar o download somente alterar para true
		)
	);
?>
<!-- 
	<style type="text/css">
		a{

		}
	</style> -->
<!-- <b class=""></b> -->