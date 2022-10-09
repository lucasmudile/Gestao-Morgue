<?php

include_once('conexao.php');



class CrudProveniencia extends Conexao{

      function __construct() {
        # INICIALIZANDO A CONEXÃO
        parent::connect();
    }



    # CRIANDO A FUNÇÃO PARA LISTAR TODAS FUNÇÕES NUM OPCTION
    public function options() {

        $query     = $this->conexao->prepare("SELECT * FROM proveniencia");
        $query     ->execute();
        $result    = $query->get_result();
        $nacional  = array();

        while($dados = $result->fetch_assoc()) {
            $objecto = new Proveniencia();
            $objecto->      setId($dados["idproveniencia"]);
            $objecto->      setLocal($dados["local"]);
            
            if($objecto->getId() == $id) {
                echo '<option value="'.$objecto->getId().'" selected>'.$objecto->getLocal().'</option>';
            } else {
                echo '<option value="'.$objecto->getId().'">'.$objecto->getLocal().'</option>';
            }
        }

    

        # Fechando o comando
        $query->close();
        #Fechando a conexão
        $this->conexao->close();
    }


         # CRIANDO A FUNÇÃO PARA FAZER O INSERT DA PROVENIENCIA
    public function insert(Proveniencia $model) {

         $descricao           = $model->getLocal();

         $query = $this->conexao->prepare("INSERT INTO proveniencia(local) 
                                      VALUES('$descricao')");

                if($query->execute()) {
              
                      echo '<div class="alert alert-success mt-5 alert-dismissible fade show" role="alert">
                                            <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                                            <span aria-hidden="true">&times;</span>
                                            <span class="sr-only">Close</span>
                                            </button>
                                            <h4 class="alert-heading">'.$model->getLocal().'</h4>
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







       # Função para listar todas as Proveniencias
    public function select() {
        
        $query = $this->conexao->prepare("SELECT * FROM proveniencia ORDER BY local");
        
        $funcoes = array();
        if($query->execute()) {

            $result      = $query->get_result();
            while($dados = $result->fetch_assoc()) {
                $funcao = new Proveniencia();
                                          $funcao->setId($dados["idproveniencia"]);
                                          $funcao->setLocal($dados["local"]);
                     
                $funcoes[] = $funcao;
            }
        }

        return $funcoes;
        
       # FECHANDO O COMANDO
       $query->close();
       # FECHANDO A CONEXÃO
       $this->conexao->close();
    }


      # FUNÇÃO PARA FAZER O DELETE DO Camara DE FORMA DEFINITIVA
    public function delete($id) {

        $query = $this->conexao->prepare("DELETE FROM proveniencia WHERE idproveniencia = $id");
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


        $query = $this->conexao->prepare("SELECT * FROM proveniencia WHERE idproveniencia = ?");
        $query->bind_param('s', $id);

        if($query->execute()) {

            $result      = $query->get_result(); 
            $funcao       = new Proveniencia();
            while($dados = $result->fetch_assoc()) {
              $funcao->setId($dados['idproveniencia']);
              $funcao->setLocal($dados['local']);

            }
        }
        
        
        return $funcao;

       # FECHANDO O COMANDO
       $query->close();
       # FECHANDO A CONEXÃO
       $this->conexao->close();

    }



    # Função para fazer o update da FUnção
    public function update(Proveniencia $model) {

         $id             = $model->getId();
         $descricao           = $model->getLocal();     

     

                $query = $this->conexao->prepare("UPDATE proveniencia SET
                  local       =  '$descricao'
                    WHERE idproveniencia   =  '$id'");

                    if($query->execute()) {
                        echo '<div class="alert alert-success mt-5 alert-dismissible fade show" role="alert">
                                            <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                                            <span aria-hidden="true">&times;</span>
                                            <span class="sr-only">Close</span>
                                            </button>
                                            <h4 class="alert-heading">'.$model->getLocal().'</h4>
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
                        <h4 class="alert-heading">'.$model->getLocal().'</h4>
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

        $query  = $this->conexao->prepare("SELECT * FROM proveniencia WHERE local  LIKE '$search' ORDER BY local");
      //  $query->bind_param('s', $search);

        $funcaos = array();
        if($query->execute()) {

            $result      = $query->get_result(); 

            while($dados = $result->fetch_assoc()) {
            $funcao   = new Proveniencia();
               $funcao->setId($dados["idproveniencia"]);
               $funcao->setLocal($dados["local"]);
       
                $funcaos[] = $funcao;

            }
        }

        return $funcaos;

        # FECHANDO O COMANDO
       $query->close();
       # FECHANDO A CONEXÃO
       $this->conexao->close();

    }













}
?>

