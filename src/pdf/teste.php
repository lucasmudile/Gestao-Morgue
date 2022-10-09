<?php	

	//referenciar o DomPDF com namespace
	use Dompdf\Dompdf;

	// include autoloader
	require_once("dompdf/autoload.inc.php");

	//Criando a Instancia
	$dompdf = new DOMPDF();

	// Carrega seu HTML
	$dompdf->load_html('
		<!DOCTYPE html>
<html>
<head>
	<title>recibo do deposíto</title>
	<meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <link rel="stylesheet" type="text/css" href="adianti.css">
    <link rel="stylesheet" type="text/css" href="application.css">
</head>
<body>
	 <div class="adianti_container">
		<div class="header">
	        <!-- <div class="thin_bar">
	            &nbsp;
	        </div> -->
	        <div class="header_content">
	            <div class="logo1 img-responsive" style="text-align: center;float: none;">
	                    <img src="insignia.png" style="width: 90px;" alt="">
	            </div>
	            <div class="logo1" style="text-align: center;float: none;">
	                    <a class="color_change" target="newwindow" href="">
	                        REPÚBLICA DE ANGOLA
	                    </a>
	                </div>
	            <div class="logo1" style="text-align: center;float: none;">
	                <a target="newwindow" class="color_change" href="http://www.igae.gov.ao/">
	                   MINISTÉRIO DA SAÚDE
	                </a>
	            </div>
	            <div class="logo1" style="text-align: center;float: none;">
	                <a target="newwindow" href="javascript:;">
	                      HOSPITAL MARIA
	                </a>
	            </div>
	        </div>
	        
	        <div class="header_bottom" style="clear:both"></div>
	    </div>
	    <div class="body">
	    </div>
	</div>

</body>
</html>
		');

	
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

