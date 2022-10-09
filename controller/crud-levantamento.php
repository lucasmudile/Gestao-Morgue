<?php

include_once('conexao.php');



class CrudLevantamento extends Conexao{

	  function __construct() {
        # INICIALIZANDO A CONEXÃO
        parent::connect();
    }


	  # CRIANDO A FUNÇÃO PARA FAZER O INSERT DO Funcionario
    public function insert(Levantamento $model) {

        // $data           = date('d-m-Y');
         $IdGrauParentesco             = $model->getIdGrauParentesco();
         $testemunhaFamiliar       = $model->getTestemunhaFamiliar();
         $contacto      = $model->getContacto();
         $idCadaver       = $model->getIdCadaver();
         $idFuncionario         = $_SESSION['idusuario'];

         $query = $this->conexao->prepare("INSERT INTO levantamento(data,id_grauparentesco,testemunha_familiar,contacto,id_cadaver_,id_funcionario_) VALUES(now(), '$IdGrauParentesco', '$testemunhaFamiliar', '$contacto','$idCadaver','$idFuncionario')");

                if($query->execute()) {
              
                      echo '<div class="alert alert-success mt-5 alert-dismissible fade show" role="alert">
                                            <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                                            <span aria-hidden="true">&times;</span>
                                            <span class="sr-only">Close</span>
                                            </button>
                                            <h4 class="alert-heading">Corpo Levantado com sucesso</h4>
                                            
                                            <p class="mb-0">Aos '.date('d-m-Y').'</p>

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

       # Função para Pegar o curso vai id
    public function getByIdUpdate(Levantamento $id) {


        $idCadaver       = $id->getIdCadaver();

        $query = $this->conexao->prepare("UPDATE cadaver SET statu='Levantado' WHERE id_cadaver = '$idCadaver'");

        if($query->execute()) {
        
            }

       # FECHANDO O COMANDO
       $query->close();
       # FECHANDO A CONEXÃO
       $this->conexao->close();

    }


    # Função para listar todos os funcionarios
    public function select() {
        
        $query = $this->conexao->prepare("SELECT * FROM view_levantamento");
        
        $levantamentos = array();
        if($query->execute()) {

            $result      = $query->get_result();
            while($dados = $result->fetch_assoc()) {
                $levantamento = new Levantamento();
                              $levantamento->setId($dados['id_cadaver_']);
                               $levantamento->setIdCadaver($dados['falecido']);
                              $levantamento->setData($dados['data']);
                              $levantamento->setIdGrauParentesco($dados['parentesco']);
                              $levantamento->setTestemunhaFamiliar($dados['testemunha_familiar']);
                              $levantamento->setContacto($dados['contacto']);
                              $levantamento->setIdFuncionario($dados['funcionario']);
                             
                              
                $levantamentos[] = $levantamento;
            }
        }

        return $levantamentos;
        //$funcionario->setId($dados["idfuncionario"]);
       # FECHANDO O COMANDO
       $query->close();
       # FECHANDO A CONEXÃO
       $this->conexao->close();
    }


 # FUNÇÃO PARA FAZER O DELETE DO Funcionario DE FORMA DEFINITIVA
    public function delete($id) {

        $query = $this->conexao->prepare("DELETE FROM levantamento WHERE id_cadaver_ = $id");
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




        # Função para pesquisar o funcionario
    public function search($descricao) {

        $search = "%{$descricao}%";

        $query  = $this->conexao->prepare("SELECT * FROM view_levantamento WHERE falecido  LIKE '$search' ORDER BY falecido");
      //  $query->bind_param('s', $search);

       
        $levantamentos = array();
        if($query->execute()) {

            $result      = $query->get_result();
            while($dados = $result->fetch_assoc()) {
                $levantamento = new Levantamento();
                              $levantamento->setId($dados['id_cadaver_']);
                               $levantamento->setIdCadaver($dados['falecido']);
                              $levantamento->setData($dados['data']);
                              $levantamento->setIdGrauParentesco($dados['parentesco']);
                              $levantamento->setTestemunhaFamiliar($dados['testemunha_familiar']);
                              $levantamento->setContacto($dados['contacto']);
                              $levantamento->setIdFuncionario($dados['funcionario']);
                             
                              
                $levantamentos[] = $levantamento;
            }
        }

        return $levantamentos;

        # FECHANDO O COMANDO
       $query->close();
       # FECHANDO A CONEXÃO
       $this->conexao->close();

    }






/*
setId
setData
setIdGrauParentesco
setTestemunhaFamiliar
setContacto
setIdCadaver
setIdFuncionario

 # Função para fazer o update do Funcionario
    public function update(Funcionario $model) {

         $id              = $model->getId();
         $nome            = $model->getNome();
         $bi              = $model->getBi();
         $telefone        = $model->getTelefone();
         $dtCriacao       = $model->getDataCadastro();
         $dtEdicao        = $model->getDataActualizacao();
         $morada          = $model->getMorada();
         $Sexo            = $model->getSexo();
         $funcao          = $model->getFuncao();

     

                $query = $this->conexao->prepare("UPDATE funcionario SET
                  nome       =  '$nome',
                  bi           =  '$bi',
                  morada      =  '$morada',
                  telefone       =  '$telefone', 
                  sexo        =  '$Sexo',
                  id_funcao        =  '$funcao'
                  WHERE idfuncionario   =  '$id'");

                    if($query->execute()) {
                        echo '<div class="alert alert-success mt-5 alert-dismissible fade show" role="alert">
                                            <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                                            <span aria-hidden="true">&times;</span>
                                            <span class="sr-only">Close</span>
                                            </button>
                                            <h4 class="alert-heading">'.$model->getNome().'</h4>
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
                        <h4 class="alert-heading">'.$model->getNome().'</h4>
                        <p>Não foi editado com sucesso!.</p>
                        <p class="mb-0">'.date('d-m-Y H:s').'</p>
                    </div>';
                    }   


       

        # FECHANDO O COMANDO
        $query->close();
        # FECHANDO A CONEXÃO
        $this->conexao->close();
    } 



   # Função para listar todos os funcionarios
    public function select() {
        
        $query = $this->conexao->prepare("SELECT * FROM funcionario ORDER BY nome");
        
        $funcionarios = array();
        if($query->execute()) {

            $result      = $query->get_result();
            while($dados = $result->fetch_assoc()) {
                $funcionario = new Funcionario();
                						  $funcionario->setId($dados["idfuncionario"]);
               							  $funcionario->setNome($dados["nome"]);
                                          $funcionario->setBi($dados["bi"]);
                                          $funcionario->setMorada($dados["morada"]);
                                          $funcionario->setTelefone($dados["telefone"]);
                                          $funcionario->setSexo($dados["sexo"]);
                                          $funcionario->setFuncao($dados["id_funcao"]);
                                          $funcionario->setDataCadastro(date('Y-m-d'));
                                          $funcionario->setDataActualizacao(date('Y-m-d'));		
                $funcionarios[] = $funcionario;
            }
        }

        return $funcionarios;
        
       # FECHANDO O COMANDO
       $query->close();
       # FECHANDO A CONEXÃO
       $this->conexao->close();
    }







     # Função para Pegar o curso vai id
    public function getById($id) {


        $query = $this->conexao->prepare("SELECT * FROM funcionario WHERE idfuncionario = ?");
        $query->bind_param('s', $id);

        if($query->execute()) {

            $result      = $query->get_result(); 
            $funcionario       = new Funcionario();
            while($dados = $result->fetch_assoc()) {
               $funcionario->setId($dados["idfuncionario"]);
               $funcionario->setNome($dados["nome"]);
              $funcionario->setBi($dados["bi"]);
               $funcionario->setMorada($dados["morada"]);
               $funcionario->setTelefone($dados["telefone"]);
              $funcionario->setSexo($dados["sexo"]);
              $funcionario->setFuncao($dados["id_funcao"]);
              $funcionario->setDataCadastro(date('Y-m-d'));
              $funcionario->setDataActualizacao(date('Y-m-d')); 
            }
        }
        
        
        return $funcionario;

       # FECHANDO O COMANDO
       $query->close();
       # FECHANDO A CONEXÃO
       $this->conexao->close();

    }





        # Função para pesquisar o funcionario
    public function search($descricao) {

        $search = "%{$descricao}%";

        $query  = $this->conexao->prepare("SELECT * FROM funcionario WHERE nome  LIKE '$search' ORDER BY nome");
      //  $query->bind_param('s', $search);

        $funcionarios = array();
        if($query->execute()) {

            $result      = $query->get_result(); 

            while($dados = $result->fetch_assoc()) {
                $funcionario   = new Funcionario();
               $funcionario->setId($dados["idfuncionario"]);
               $funcionario->setNome($dados["nome"]);
              $funcionario->setBi($dados["bi"]);
               $funcionario->setMorada($dados["morada"]);
               $funcionario->setTelefone($dados["telefone"]);
              $funcionario->setSexo($dados["sexo"]);
              $funcionario->setFuncao($dados["id_funcao"]);
              $funcionario->setDataCadastro(date('Y-m-d'));
              $funcionario->setDataActualizacao(date('Y-m-d'));   
                $funcionarios[] = $funcionario;

            }
        }

        return $funcionarios;

        # FECHANDO O COMANDO
       $query->close();
       # FECHANDO A CONEXÃO
       $this->conexao->close();

    }



 

*/


}
?>