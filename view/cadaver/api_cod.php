<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<title>Document</title>
</head>
<body>
	<?php


if (isset($_REQUEST['op'])) {
	switch ($_REQUEST['op']) {
		case 'teste':
		insert();
		// $vetor = array('success' => 1,'info'=>'tudo certo');
		// echo json_encode($vetor);
			break;
		
		default:
			# code...
			break;
	}
function insert()
{
include('../../model/cadaver.php');
include('../../controller/crud-cadaver.php');
$cadaver=new Cadaver();

$nome=$_POST['nome'];
$sexo=$_POST['sexo'];
$bi=$_POST['bilhete'];
$dataNascimento=$_POST['data_nascimento'];
$residente=$_POST['residente'];
$nomePai=$_POST['nomePai'];
$nomeMae=$_POST['nomeMae'];
$idGrauParentesco=$_POST['grau_parentesco'];
$testemunhaFamiliar=$_POST['testemunhaFamiliar'];
$testemunhaResponsavel=$_POST['testemunhaResponsavel'];
$contacto=$_POST['contacto'];
$idProveniencia=$_POST['proveniencia'];
$idGaveta=$_POST['gaveta'];
$idCamara=$_POST['camara'];

$cadaver->setNome($nome);
$cadaver->setBi($bi);
$cadaver->setSexo($sexo);
$cadaver->setResidente($residente);
$cadaver->setDataNascimento($dataNascimento);
$cadaver->setContacto($contacto);
$cadaver->setNomePai($nomePai);
$cadaver->setNomeMae($nomeMae);
$cadaver->setIdGrauParentesco($idGrauParentesco);
$cadaver->setTestemunhaFamiliar($testemunhaFamiliar);
$cadaver->setTestemunhaResponsavel($testemunhaResponsavel);
$cadaver->setIdProveniencia($idProveniencia);
$cadaver->setIdGaveta($idGaveta);
$cadaver->setIdCamara($idCamara);

$insert = new CrudCadaver();
$insert->insert($cadaver); 
}

}
                
// if (isset($_POST['salvar'])) {   
// }

?>
</body>
</html>
