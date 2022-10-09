<?php

include_once('conexao.php');
require '../../model/cadaver.php';
// echo "ola";
session_start();
class CrudCadaver extends Conexao{
  function __construct() {
    # INICIALIZANDO A CONEXÃO
    parent::connect();
  }
	public function insert($model)
  {
    $nome = $model->getNome();
    $Sexo         = $model->getSexo();
    $bi             = $model->getBi();
    $dataNascimento=$model->getDataNascimento();
    $residente         = $model->getResidente();
    $contacto       = $model->getContacto();
    $sexo       = $model->getSexo();
    $nomePai=$model->getNomePai();
    $nomeMae=$model->getNomeMae();
    $idGrauParentesco=$model->getIdGrauParentesco();
    $testemunhaFamiliar=$model->getTestemunhaFamiliar();
    $testemunhaResponsavel=$model->getTestemunhaResponsavel();
    $idProveniencia=$model->getIdProveniencia();
    $idGaveta=$model->getIdGaveta();
    $idCamara=$model->getIdCamara();
    $idUsuario=$_SESSION['idusuario'];

    $query  = $this->conexao->prepare("SELECT * FROM cadaver WHERE bi='$bi'");
  
    if($query->execute()){
      $result= $query->get_result();
      if (mysqli_num_rows($result)>0){
        // verdade/ bi já foi cadastrado
        $vetor = array('op' => 2);
      }else {
        // falso / o bi pode ser cadastrado
          $query = $this->conexao->prepare("INSERT INTO cadaver(nome,sexo,data_de_nascimento,residente,nome_do_pai,nome_da_mae,bi,id_grau_parentesco,testemunha_familiar,testemunha_responsavel,
          contacto,id_proveniencia_,id_gaveta_,id_usuario_,_id_camara,statu,data_registo) VALUES('$nome','$sexo','$dataNascimento','$residente','$nomePai','$nomeMae','$bi','$idGrauParentesco','$testemunhaFamiliar','$testemunhaResponsavel','$contacto','$idProveniencia','$idGaveta','$idUsuario','$idCamara','Depositado',now())");
            if($query->execute()) {
              $vetor = array('op' => 1,'info'=>'tudo certo');
            }else {
              $vetor = array('op' => 2,'info'=>'erro ao cadastrar');
            }
        $vetor = array('op' => 1);
      }
      
    }

    echo json_encode($vetor);
  }
}
?>