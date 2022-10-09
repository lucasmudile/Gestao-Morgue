<?php

include_once('conexao.php');

class CrudCamara extends Conexao{

      function __construct() {
        # INICIALIZANDO A CONEXÃO
        parent::connect();
    }

      # CRIANDO A FUNÇÃO PARA FAZER O INSERT DO Camara
    public function insert(Camara $model) {

         $referencia           = $model->getReferencia();
         $N_GavetaTotal        = $model->getN_GavetaTotal();

         $query = $this->conexao->prepare("INSERT INTO camara(referencia, n_gaveta_total, n_gaveta_ocupada) 
                                      VALUES('$referencia','$N_GavetaTotal','0')");

                if($query->execute()) {
              
                      echo '<div class="alert alert-success mt-5 alert-dismissible fade show" role="alert">
                                            <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                                            <span aria-hidden="true">&times;</span>
                                            <span class="sr-only">Close</span>
                                            </button>
                                            <h4 class="alert-heading">'.$model->getReferencia().'</h4>
                                            <p>Foi cadastrado com sucesso!.</p>
                                            <p class="mb-0">'.date('d-m-Y').'</p>

                                        </div>'
                                        ;

                } else {
                    return 3;
                }

        # FECHANDO COMANDO
        $query->close();

        #FECHANDO A CONEXÃO
        $this->conexao->close();

    }

   # Função para listar todas as camaras
    public function select() {
        
        $query = $this->conexao->prepare("SELECT * FROM camara ");
        
        $camaras = array();
        if($query->execute()) {

            $result      = $query->get_result();
            while($dados = $result->fetch_assoc()) {
                $camara = new Camara();
                                          $camara->setId($dados["idcamara"]);
                                          $camara->setReferencia($dados["referencia"]);
                                          $camara->setN_GavetaTotal($dados["n_gaveta_total"]);
                                          $camara->setN_GavetaOcupada($dados["n_gaveta_ocupada"]);
                                          
                $camaras[] = $camara;
            }
        }

        return $camaras;
        
       # FECHANDO O COMANDO
       $query->close();
       # FECHANDO A CONEXÃO
       $this->conexao->close();
    }



# CRIANDO A FUNÇÃO PARA LISTAR TODAS FUNÇÕES NUM OPCTION
    public function options() {

        $query     = $this->conexao->prepare("SELECT * FROM camara");
        $query     ->execute();
        $result    = $query->get_result();
        $nacional  = array();

        while($dados = $result->fetch_assoc()) {
            $objecto = new Camara();
            $objecto->      setId($dados["idcamara"]);
            $objecto->      setReferencia($dados["referencia"]);
            
            if($objecto->getId() == $id) {
                echo '<option value="'.$objecto->getId().'" selected>'.$objecto->getReferencia().'</option>';
            } else {
                echo '<option value="'.$objecto->getId().'">'.$objecto->getReferencia().'</option>';
            }
        }

    

        # Fechando o comando
        $query->close();
        #Fechando a conexão
        $this->conexao->close();
    }



     # FUNÇÃO PARA FAZER O DELETE DO Camara DE FORMA DEFINITIVA
    public function delete($id) {

        $query = $this->conexao->prepare("DELETE FROM camara WHERE idcamara = $id");
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




           # Função para Pegar o curso vai id
    public function getById($id) {


        $query = $this->conexao->prepare("SELECT * FROM camara WHERE idcamara = ?");
        $query->bind_param('s', $id);

        if($query->execute()) {

            $result      = $query->get_result(); 
            $camara       = new Camara();
            while($dados = $result->fetch_assoc()) {
                  $camara->setId($dados["idcamara"]);
                  $camara->setReferencia($dados["referencia"]);
                  $camara->setN_GavetaTotal($dados["n_gaveta_total"]);
                  $camara->setN_GavetaOcupada($dados["n_gaveta_ocupada"]);
            }
        }
        
        
        return $camara;

       # FECHANDO O COMANDO
       $query->close();
       # FECHANDO A CONEXÃO
       $this->conexao->close();

    }




 # Função para fazer o update do Funcionario
    public function update(Camara $model) {

         $id             = $model->getId();
         $referencia     = $model->getReferencia();
         $N_GavetaTotal  = $model->getN_GavetaTotal();
         $Ocupada        = $model->getN_GavetaOcupada();

     

                $query = $this->conexao->prepare("UPDATE camara SET
                  referencia       =  '$referencia',
                  n_gaveta_total           =  '$N_GavetaTotal',
                  n_gaveta_ocupada      =  '$Ocupada'
                    WHERE idcamara   =  '$id'");

                    if($query->execute()) {
                        echo '<div class="alert alert-success mt-5 alert-dismissible fade show" role="alert">
                                            <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                                            <span aria-hidden="true">&times;</span>
                                            <span class="sr-only">Close</span>
                                            </button>
                                            <h4 class="alert-heading">'.$model->getReferencia().'</h4>
                                            <p>Foi editado com sucesso!.</p>
                                            <p class="mb-0">'.date('d-m-Y H:s').'</p>

                                        </div>'
                                        ;

                                       
                    
                    } else {
                        echo '<div class="alert alert-success mt-5 alert-dismissible fade show" role="alert">
                        <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                        <span class="sr-only">Close</span>
                        </button>
                        <h4 class="alert-heading">'.$model->getReferencia().'</h4>
                        <p>Não foi editado com sucesso!.</p>
                        <p class="mb-0">'.date('d-m-Y H:s').'</p>
                    </div>';
                    }   


       

        # FECHANDO O COMANDO
        $query->close();
        # FECHANDO A CONEXÃO
        $this->conexao->close();
    } 



        # Função para pesquisar o função
    public function search($descricao) {

        $search = "%{$descricao}%";

        $query  = $this->conexao->prepare("SELECT * FROM camara WHERE referencia  LIKE '$search' ORDER BY referencia");
      //  $query->bind_param('s', $search);

        $camaras = array();
        if($query->execute()) {

            $result      = $query->get_result(); 

            while($dados = $result->fetch_assoc()) {
            $camara   = new Camara();
                  $camara->setId($dados["idcamara"]);
                  $camara->setReferencia($dados["referencia"]);
                  $camara->setN_GavetaTotal($dados["n_gaveta_total"]);
                  $camara->setN_GavetaOcupada($dados["n_gaveta_ocupada"]);
       
                $camaras[] = $camara;

            }
        }

        return $camaras;

        # FECHANDO O COMANDO
       $query->close();
       # FECHANDO A CONEXÃO
       $this->conexao->close();

    }





}

?>