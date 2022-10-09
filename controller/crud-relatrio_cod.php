<?php

include_once('conexao.php');
require '../../model/relatorio.php';

class CrudRelatorio extends Conexao{
  function __construct() {
    # INICIALIZANDO A CONEXÃO
    parent::connect();
  }


  public function rel_anual($model)
  {
   
   $relAnual=$model->getRelAnual();
   
   // $por_ano="SELECT * FROM cadaver WHERE MONTH(data_registo)=$relAnual and YEAR(data_registo)=YEAR(CURRENT_DATE)";
   if (!empty($relAnual)) {
   
     $query = $this->conexao->prepare("SELECT *,YEAR(data_registo)-YEAR(data_de_nascimento) as idade FROM view_cadaver WHERE MONTH(data_registo)=$relAnual and YEAR(data_registo)=YEAR(CURRENT_DATE)");
   }
   else{
    $query = $this->conexao->prepare("SELECT *,YEAR(data_registo)-YEAR(data_de_nascimento) as idade FROM view_cadaver WHERE YEAR(data_registo)=YEAR(CURRENT_DATE)");
   }

        
    $cadaves = array();
    if($query->execute()) {

        $result      = $query->get_result();
        if (mysqli_num_rows($result)>0){
           while($dados = $result->fetch_assoc()) {
           $model=new Relatorio();
                          $model->setId($dados['id_cadaver']);
                          $model->setNome($dados['nome']);
                          $model->setIdade($dados['idade']);
                          $model->setBi($dados['bi']);
                          $model->setSexo($dados['sexo']);
                          $model->setResidente($dados['residente']);
                          $model->setDataNascimento($dados['data_de_nascimento']);
                          $model->setContacto($dados['contacto']);
                          $model->setNomePai($dados['nome_do_pai']);
                          $model->setNomeMae($dados['nome_da_mae']);
                          $model->setIdGrauParentesco($dados['grau_parentesco']);
                          $model->setTestemunhaFamiliar($dados['testemunha_familiar']);
                          $model->setTestemunhaResponsavel($dados['testemunha_responsavel']);
                          $model->setBiTestemunhaFamiliar($dados['bi_testemunha_familiar']);
                          $model->setIdProveniencia($dados['local_proveniencia']);
                          $model->setIdGaveta($dados['gaveta']);
                          $model->setIdCamara($dados['camara']);  
                          $model->setIdUsuario($dados['funcionario']);
                          $model->setDataRegisto($dados['data_registo']);

            $cadaves[] = $model;
        }

        }else{
          empty($cadaves);
        }
       
    }

    return $cadaves;
    //$funcionario->setId($dados["idfuncionario"]);
   # FECHANDO O COMANDO
   $query->close();
   # FECHANDO A CONEXÃO
   $this->conexao->close();

  }

  public function relMes($model)
  {
   
 $relMensal=$model->getRelMensal();
   
   // $por_ano="SELECT * FROM cadaver WHERE MONTH(data_registo)=$relAnual and YEAR(data_registo)=YEAR(CURRENT_DATE)";
   if (!empty($relMensal)) {
     $query = $this->conexao->prepare("SELECT *,YEAR(data_registo)-YEAR(data_de_nascimento) as idade FROM view_cadaver WHERE MONTH(data_registo)=$relMensal and YEAR(data_registo)=YEAR(CURRENT_DATE)");
   }
   else{
    $query = $this->conexao->prepare("SELECT *,YEAR(data_registo)-YEAR(data_de_nascimento) as idade FROM view_cadaver WHERE MONTH(data_registo)=MONTH(CURRENT_DATE)and YEAR(data_registo)=YEAR(CURRENT_DATE)");
   }

        
    $cadaves = array();
    if($query->execute()) {

        $result      = $query->get_result();
        if (mysqli_num_rows($result)>0){
           while($dados = $result->fetch_assoc()) {
           $model=new Relatorio();
                          $model->setId($dados['id_cadaver']);
                          $model->setNome($dados['nome']);
                          $model->setIdade($dados['idade']);
                          $model->setBi($dados['bi']);
                          $model->setSexo($dados['sexo']);
                          $model->setResidente($dados['residente']);
                          $model->setDataNascimento($dados['data_de_nascimento']);
                          $model->setContacto($dados['contacto']);
                          $model->setNomePai($dados['nome_do_pai']);
                          $model->setNomeMae($dados['nome_da_mae']);
                          $model->setIdGrauParentesco($dados['grau_parentesco']);
                          $model->setTestemunhaFamiliar($dados['testemunha_familiar']);
                          $model->setTestemunhaResponsavel($dados['testemunha_responsavel']);
                          $model->setBiTestemunhaFamiliar($dados['bi_testemunha_familiar']);
                          $model->setIdProveniencia($dados['local_proveniencia']);
                          $model->setIdGaveta($dados['gaveta']);
                          $model->setIdCamara($dados['camara']);  
                          $model->setIdUsuario($dados['funcionario']);
                          $model->setDataRegisto($dados['data_registo']);

            $cadaves[] = $model;
        }

        }else{
          empty($cadaves);
        }
       
    }

    return $cadaves;
    //$funcionario->setId($dados["idfuncionario"]);
   # FECHANDO O COMANDO
   $query->close();
   # FECHANDO A CONEXÃO
   $this->conexao->close();

  }



}
?>