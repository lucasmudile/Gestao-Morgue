<?php
include_once('../../controller/crud-relatrio.php');
$crud= new CrudRelatorio();
$model=new Relatorio();
$res=0;

if (isset($_REQUEST['data'])) {
$model->setRelData($_REQUEST['data']);
$dados = $crud->relData($model);
}else{
$dados=$crud->relData($model);
}


?>
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
	            <th scope="col">Nome</th>
	            <th scope="col">BI</th>
	            <th scope="col">Sexo</th>
	            <th scope="col">DataNascimento</th>
	            <th scope="col">Proveniência</th>
	            <th scope="col">Residente</th>
	            <th scope="col">Funcionario</th>
	        </tr>
			</thead><tbody>';

			if (!empty($dados)) {
            
          foreach ($dados as $key => $value) {
            
        $doc.= '<tr>
        <td>'.$value->getNome().'</td>
        <td>'.$value->getBi().'</td>
        <td>'.$value->getSexo().'</td>
        <td>'.$value->getDataNascimento().'</td>
        <td>'.$value->getIdProveniencia().'</td>
        <td>'.$value->getResidente().' </td>
        <td>'.$value->getIdUsuario().'</td>
        </tr>';
        }
        }else {
            // echo '<tr><td colspan="7"> resultado da pesquisa:'.$res.'</td></tr>';
        }
	
		$doc.='</tbody></table>';
		$doc.='';
		$doc.='
			
			</body>
			</html>
			';
	$dompdf->load_html($doc);

	$dompdf->setPaper('A4', 'landscape');
	
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