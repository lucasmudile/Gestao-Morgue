<?php
include_once('../../controller/crud-cadaver_c.php');

$crud= new CrudCadaver();
$model=new Cadaver();



if (isset($_REQUEST['op'])) {
	$op=$_REQUEST['op'];

switch ($op) {
	case 'read':read($crud);
	break;
	case 'create':salvar($crud,$model);
	break;
	default:
	# code...
	break;
}


}
function salvar($crud,$model)
{
	$model->setNome($_REQUEST['nome']);
	$model->setBi($_REQUEST['bilhete']);
	$model->setSexo($_REQUEST['sexo']);
	$model->setDataNascimento($_REQUEST['data_nascimento']);
	$model->setResidente($_REQUEST['residente']);
	$model->setContacto($_REQUEST['contacto']);
	$model->setNomePai($_REQUEST['nomePai']);
	$model->setNomeMae($_REQUEST['nomeMae']);
	$model->setIdGrauParentesco($_REQUEST['grau_parentesco']);
	$model->setTestemunhaFamiliar($_REQUEST['testemunhaResponsavel']);
	$model->setTestemunhaResponsavel($_REQUEST['contacto']);
	$model->setIdProveniencia($_REQUEST['proveniencia']);
	$model->setIdGaveta($_REQUEST['gaveta']);
	$model->setIdCamara($_REQUEST['camara']);

	$crud->insert($model);
}

?>

