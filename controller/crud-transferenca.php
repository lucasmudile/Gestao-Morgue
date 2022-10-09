<?php

include_once('conexao.php');
require '../../model/transferenca.php';
class CrudTransferenca extends Conexao
{
  function __construct() 
  {
   # INICIALIZANDO A CONEXÃO
    parent::connect();
  }

  public function teste()
  {
    $query= $this->conexao->prepare("SELECT * FROM view_cadaver");
    $query->execute();
    $result=$query->get_result();
    while($dados=$result->fetch_assoc()){
      $model = new Transferenca();
      $model->setIdCadaver($dados["id_cadaver"]);
      $model->setCadaver($dados["nome"]);
      // echo $model->getCadaver();
      echo '<option  title="'.$model->getIdCadaver().'"value="'.$model->getIdCadaver().'" selected>'.$model->getCadaver().'</option>';
    }
    # FECHANDO O COMANDO
    $query->close();
    # FECHANDO A CONEXÃO
    $this->conexao->close();

  }

  public function getById($id)
  {
    $dado= array();
    $query= $this->conexao->prepare("SELECT * FROM view_cadaver WHERE id_cadaver='$id'");
    $query->execute();
    $result=$query->get_result();
    if (mysqli_num_rows($result)>0){
      while($dados=$result->fetch_assoc()){
      $model = new Transferenca();
      $model->setIdCadaver($dados["id_cadaver"]);
      $model->setNome($dados["nome"]);

      $model->setIdGaveta($dados["id_gaveta_"]);
      $model->setIdCamara($dados["_id_camara"]);
      $model->setGaveta($dados["gaveta"]);
      $model->setCamara($dados["camara"]);

      $dado[] = $model;
    }
    return $dado;
    # FECHANDO O COMANDO
    $query->close();
    # FECHANDO A CONEXÃO
    $this->conexao->close();

    }else{
    echo "erro";
    }
  }

     public function update_transf(Transferenca $model) {

          $id = $model->getIdCadaver();

         $gaveta=$model->getGaveta();
         $camara=$model->getCamara();
         $query = $this->conexao->prepare("UPDATE cadaver SET id_gaveta_='$gaveta', _id_camara='$camara' WHERE id_cadaver='$id'");
      
      if($query->execute()) {
        return 1;
      } else {
        return 2;
      }   


        # FECHANDO O COMANDO
        $query->close();
        # FECHANDO A CONEXÃO
        $this->conexao->close();
    }

    public function editarTransferencia(Transferenca $model) {
      $id = $model->getIdCadaver();
      $idGaveta=$model->getIdGaveta();
      $idCamara=$model->getIdCamara();
      $gaveta=$model->getGaveta();
      $camara=$model->getCamara();
      $query = $this->conexao->prepare("UPDATE transferencia SET camara_origem='$idCamara', camara_destino='$camara', gaveta_origem='$idGaveta', gaveta_destino='$gaveta', data_actualizacao=now() WHERE id_cadaver='$id'");

      if($query->execute()) {
      return 1;
      } else {
      return 2;
      }   


      # FECHANDO O COMANDO
      $query->close();
      # FECHANDO A CONEXÃO
      $this->conexao->close();
    }


    public function insert(Transferenca $model) {
      $id = $model->getIdCadaver();
      $idGaveta=$model->getIdGaveta();
      $idCamara=$model->getIdCamara();

      $gaveta=$model->getGaveta();
      $camara=$model->getCamara();

      $query = $this->conexao->prepare("INSERT INTO transferencia(camara_origem,camara_destino,gaveta_origem,gaveta_destino,id_cadaver,data) VALUES('$idCamara','$camara','$idGaveta','$gaveta','$id',now())");

       if($query->execute()) {
        echo "certo";
      } else {
        echo "erro";
      }  
      // echo "antigo ga:$idGaveta";
      // echo "antigo ca:$idGaveta";
      // echo "Novo ga:$gaveta";
      // echo "Novo ca:$camara";
      // echo "id cadaver:$id";

      # FECHANDO O COMANDO
      $query->close();
      # FECHANDO A CONEXÃO
      $this->conexao->close();
    }

        public function select() {
        
        $query = $this->conexao->prepare("SELECT * FROM view_transferencia ORDER BY nome");
        
        $transferencia = array();
        if($query->execute()) {

            $result      = $query->get_result();
            while($dados = $result->fetch_assoc()) {
                $model = new Transferenca();
                $model->setId($dados['idtransferencia']);
                $model->setIdCadaver($dados['id_cadaver']);
                $model->setNome($dados['nome']);
                $model->setIdGaveta($dados['gaveta_or']);
                $model->setGaveta($dados['gaveta_des']);
                $model->setIdCamara($dados['camara_or']);
                $model->setCamara($dados['camara_des']);
                $model->setData($dados['data']);

                $transferencia[] = $model;
            }
        }

        return $transferencia;
        //$funcionario->setId($dados["idfuncionario"]);
       # FECHANDO O COMANDO
       $query->close();
       # FECHANDO A CONEXÃO
       $this->conexao->close();
    }

    public function delete($id) {

        $query = $this->conexao->prepare("DELETE FROM transferencia WHERE idtransferencia = $id");
        if($query->execute()) {
            echo "Correu tudo bem";
            
        } else {
            "Não correu tudo bem";
        }


         # FECHANDO O COMANDO
         $query->close();
         # FECHANDO A CONEXÃO
         $this->conexao->close();
    }


}

// CREATE view view_transferencia
// as
// SELECT 
// t.*,ca.nome, 
// cam.referencia camara_or,
// came.referencia camara_des,
// ga.numero gaveta_or,
// gav.numero gaveta_des
// FROM transferencia t
// INNER JOIN cadaver ca ON ca.id_cadaver=t.id_cadaver
// INNER JOIN camara cam ON cam.idcamara=t.camara_origem
// INNER JOIN camara came ON came.idcamara=t.camara_destino

// INNER JOIN gaveta ga ON ga.idgaveta=t.gaveta_origem
// INNER JOIN gaveta gav ON gav.idgaveta=t.gaveta_destino
?>