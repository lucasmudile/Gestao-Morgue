<?php

include_once('conexao.php');



class CrudFuncao extends Conexao{

      function __construct() {
        # INICIALIZANDO A CONEXÃO
        parent::connect();
    }


       # CRIANDO A FUNÇÃO PARA FAZER O INSERT DA FUNÇÃO
    public function insert(Funcao $model) {

         $descricao           = $model->getDescricao();

         $query = $this->conexao->prepare("INSERT INTO funcao(descricao) 
                                      VALUES('$descricao')");

                if($query->execute()) {
              
                      echo '<div class="alert alert-success mt-5 alert-dismissible fade show" role="alert">
                                            <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                                            <span aria-hidden="true">&times;</span>
                                            <span class="sr-only">Close</span>
                                            </button>
                                            <h4 class="alert-heading">'.$model->getDescricao().'</h4>
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

        $query     = $this->conexao->prepare("SELECT * FROM funcao");
        $query     ->execute();
        $result    = $query->get_result();
        $nacional  = array();

        while($dados = $result->fetch_assoc()) {
            $objecto = new Funcao();
            $objecto->      setId($dados["idfuncao"]);
            $objecto->      setDescricao($dados["descricao"]);
            
            if($objecto->getId() == $id) {
                echo '<option value="'.$objecto->getId().'" selected>'.$objecto->getDescricao().'</option>';
            } else {
                echo '<option value="'.$objecto->getId().'">'.$objecto->getDescricao().'</option>';
            }
        }

    

        # Fechando o comando
        $query->close();
        #Fechando a conexão
        $this->conexao->close();
    }


       # Função para listar todos as funções
    public function select() {
        
        $query = $this->conexao->prepare("SELECT * FROM funcao ORDER BY descricao");
        
        $funcoes = array();
        if($query->execute()) {

            $result      = $query->get_result();
            while($dados = $result->fetch_assoc()) {
                $funcao = new Funcao();
                                          $funcao->setId($dados["idfuncao"]);
                                          $funcao->setDescricao($dados["descricao"]);
                     
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

        $query = $this->conexao->prepare("DELETE FROM funcao WHERE idfuncao = $id");
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


        $query = $this->conexao->prepare("SELECT * FROM funcao WHERE idfuncao = ?");
        $query->bind_param('s', $id);

        if($query->execute()) {

            $result      = $query->get_result(); 
            $funcao       = new Funcao();
            while($dados = $result->fetch_assoc()) {
              $funcao->setId($dados['idfuncao']);
              $funcao->setDescricao($dados['descricao']);

            }
        }
        
        
        return $funcao;

       # FECHANDO O COMANDO
       $query->close();
       # FECHANDO A CONEXÃO
       $this->conexao->close();

    }



    # Função para fazer o update da FUnção
    public function update(Funcao $model) {

         $id             = $model->getId();
         $descricao           = $model->getDescricao();     

     

                $query = $this->conexao->prepare("UPDATE funcao SET
                  descricao       =  '$descricao'
                    WHERE idfuncao   =  '$id'");

                    if($query->execute()) {
                        echo '<div class="alert alert-success mt-5 alert-dismissible fade show" role="alert">
                                            <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                                            <span aria-hidden="true">&times;</span>
                                            <span class="sr-only">Close</span>
                                            </button>
                                            <h4 class="alert-heading">'.$model->getDescricao().'</h4>
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
                        <h4 class="alert-heading">'.$model->getDescricao().'</h4>
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

        $query  = $this->conexao->prepare("SELECT * FROM funcao WHERE descricao  LIKE '$search' ORDER BY descricao");
      //  $query->bind_param('s', $search);

        $funcaos = array();
        if($query->execute()) {

            $result      = $query->get_result(); 

            while($dados = $result->fetch_assoc()) {
            $funcao   = new Funcao();
               $funcao->setId($dados["idfuncao"]);
               $funcao->setDescricao($dados["descricao"]);
       
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
