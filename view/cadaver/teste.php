<?php

 

    include_once('../../model/cadaver.php');
    include_once('../../controller/crud-cadaver.php');

     $selectCadaver = new CrudCadaver();

     $max=$selectCadaver->selectMax();
    
     

     $id=$max->getId();


    if($id != null) {

       
        $cadaver  = $selectCadaver->getById($id);
        if($cadaver->getId() == null) {
            header('Location: ../index.php');
        }

    } else {
        header('Location: ../index.php');
    }
    



?>
<?php	

	//referenciar o DomPDF com namespace
	use Dompdf\Dompdf;

	// include autoloader
	require_once("../../src/pdf/dompdf/autoload.inc.php");

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
    <link rel="stylesheet" type="text/css" href="../../src/pdf/recib_deposito.css">
</head>
<body>

<div class="cabecario">
	<img src="../../src/pdf/cv.png" width="80" height="80">
	<h5>REPÚBLICA DE ANGOLA</h5>
	<H5>GOVERNO DA PROVíNCIA DE LUANDA</H5>
	<h5>MINISTÉRIO DA SAÚDE</h5>
	<h5>HOSPITAL XXXXXXXX XXXXXXX</h5>
</div>
<div class="corpo">
	<div class="header">
		<H4>SECÇÃO DA MORGUE</H4>
		<H5>MODELO PARA LEVANTAMENTO DE CORPO</H5>
		
	</div>
	<div class="falecido">
		<b>Nome do falecido </b><span>'.$cadaver->getNome().'</span> 
		<span class="idade">
		<b>de </b>'.$cadaver->getIdade().'</span>
		<b> de idade,</b><span>
		</span> 
		 <b>do sexo </b><span>'.$cadaver->getSexo().'</span>
		<br>
		<b>Natural de </b><span>Luanda</span>
		
		<br>
		<b>Residente </b><span>'.$cadaver->getResidente().'</span>
	</div>
	<div class="parentes">
		<b>Local de proveniencia </b><span>'.$cadaver->getIdProveniencia().'</span> 
		
	</div>
	<div class="parentes">
		<b>filho de </b><span>'.$cadaver->getNomePai().'</span> <b>E de </b>'.$cadaver->getNomeMae().'
		<br>
		<b>Residente</b> <span>'.$cadaver->getResidente().'</span>
		
	</div>
	<div class="testemunha">
		<div class="header">
			<h5>TESTEMUNHAS</h5>
		</div>
		<b>Nome </b><span>'.$cadaver->getTestemunhaFamiliar().'</span> 
		<br>
		<b>BI </b><span>'.$cadaver->getBiTestemunhaFamiliar().'</span> 
		<br>
		<b>Grau de parentesco </b><span>'.$cadaver->getIdGrauParentesco().'</span>
		
		<br>
		<b>Contacto </b>'.$cadaver->getContacto().'
		<br>
		<b>Data de registro </b><span>'.$cadaver->getDataRegisto().'</span>

	</div>
	<div class="assinatura">
		<span style="float: left;">
			<b>Assinatura/famíliar</b><br>
			_________________________________
		</span>
		<span style="float: right;">
			<b>Assinatura/responsável</b><br>
			_________________________________
			<br><b>'.$cadaver->getTestemunhaResponsavel().'</b>
		</span>
	</div>
</div>
</body>
</html>
');

	
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