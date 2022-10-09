<?php

include_once('conexao.php');

class CrudGaveta extends Conexao{

      function __construct() {
        # INICIALIZANDO A CONEXÃO
        parent::connect();
    }




      # CRIANDO A FUNÇÃO PARA FAZER O INSERT DA GAVETA
    public function insert(Gaveta $model) {

         $numero           = $model->getNumero();
         $id_camara             = $model->getIdCamara();

         $query = $this->conexao->prepare("INSERT INTO gaveta(numero, id_camara,statu) VALUES('$numero', '$id_camara', 'Activo')");

                if($query->execute()) {
              
                      echo '<div class="alert alert-success mt-5 alert-dismissible fade show" role="alert">
                                            <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                                            <span aria-hidden="true">&times;</span>
                                            <span class="sr-only">Close</span>
                                            </button>
                                            <h4 class="alert-heading">'.$model->getNumero().'</h4>
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



# CRIANDO A FUNÇÃO PARA LISTAR TODAS FUNÇÕES NUM OPCTION
    public function options() {

        $query     = $this->conexao->prepare("SELECT * FROM gaveta");
        $query     ->execute();
        $result    = $query->get_result();
        $nacional  = array();

        while($dados = $result->fetch_assoc()) {
            $objecto = new Gaveta();
            $objecto->      setId($dados["idgaveta"]);
            $objecto->      setNumero($dados["numero"]);
            
            if($objecto->getId() == $id) {
                echo '<option value="'.$objecto->getId().'" selected>'.$objecto->getNumero().'</option>';
            } else {
                echo '<option value="'.$objecto->getId().'">'.$objecto->getNumero().'</option>';
            }
        }

    

        # Fechando o comando
        $query->close();
        #Fechando a conexão
        $this->conexao->close();
    }



       # Função para listar todos os funcionarios
    public function select() {
        
        $query = $this->conexao->prepare("SELECT * FROM view_gaveta ORDER BY numero");
        
        $gavetas = array();
        if($query->execute()) {

            $result      = $query->get_result();
            while($dados = $result->fetch_assoc()) {
                $gaveta = new Gaveta();
                                          $gaveta->setId($dados["idgaveta"]);
                                          $gaveta->setNumero($dados["numero"]);
                                          //$gaveta->setIdCamara($dados["idcamara"]);
                                          $gaveta->setIdCamara($dados["referencia"]);
                                          $gaveta->setIStatu($dados["statu"]);
                $gavetas[] = $gaveta;
            }
        }

        return $gavetas;
        
       # FECHANDO O COMANDO
       $query->close();
       # FECHANDO A CONEXÃO
       $this->conexao->close();
    }



     # FUNÇÃO PARA FAZER O DELETE DO Funcionario DE FORMA DEFINITIVA
    public function delete($id) {

        $query = $this->conexao->prepare("DELETE FROM gaveta WHERE idgaveta = $id");
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


        $query = $this->conexao->prepare("SELECT * FROM view_gaveta WHERE idgaveta = ?");
        $query->bind_param('s', $id);

        if($query->execute()) {

            $result      = $query->get_result(); 
            $gaveta       = new Gaveta();
            while($dados = $result->fetch_assoc()) {
               $gaveta->setId($dados["idgaveta"]);
               $gaveta->setNumero($dados["numero"]);
               //$gaveta->setIdCamara($dados["idcamara"]);
               $gaveta->setIdCamara($dados["referencia"]);
               //$gaveta->setIStatu($dados["statu"]);
            }
        }
        
        
        return $gaveta;

       # FECHANDO O COMANDO
       $query->close();
       # FECHANDO A CONEXÃO
       $this->conexao->close();

    }



         # Função para fazer o update do Cadaver
    public function update(Gaveta $model) {

         $id                     = $model->getId();
         $numero           = $model->getNumero();
         $id_camara             = $model->getIdCamara();

     

                $query = $this->conexao->prepare("UPDATE gaveta SET
                  numero       =  '$numero',
                  id_camara        =  '$id_camara'    
                  WHERE idgaveta   =  '$id'");

                    if($query->execute()) {
                        echo '<div class="alert alert-success mt-5 alert-dismissible fade show" role="alert">
                                            <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                                            <span aria-hidden="true">&times;</span>
                                            <span class="sr-only">Close</span>
                                            </button>
                                            <h4 class="alert-heading">'.$model->getNumero().'</h4>
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
                        <h4 class="alert-heading">'.$model->getNumero().'</h4>
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

        $query  = $this->conexao->prepare("SELECT * FROM view_gaveta WHERE numero  LIKE '$search' ORDER BY numero");
      //  $query->bind_param('s', $search);

        $gavetas = array();
        if($query->execute()) {

            $result      = $query->get_result(); 

            while($dados = $result->fetch_assoc()) {
               $gaveta   = new Gaveta();
               $gaveta->setId($dados["idgaveta"]);
               $gaveta->setNumero($dados["numero"]);
               $gaveta->setIStatu($dados["statu"]);
               $gaveta->setIdCamara($dados["referencia"]);
       
                $gavetas[] = $gaveta;

            }
        }

        return $gavetas;

        # FECHANDO O COMANDO
       $query->close();
       # FECHANDO A CONEXÃO
       $this->conexao->close();

}



}

?>