<?php

 

    include_once('../../model/cadaver.php');
    include_once('../../controller/crud-cadaver.php');

     $selectCadaver = new CrudCadaver();

     $max=$selectCadaver->selectMax();
    
     if (isset($_GET['id'])) {
     	$id=$_GET['id'];
     }
     else{
     	$id=$max->getId();
     }




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