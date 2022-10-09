<?php



include_once('conexao.php');

class CrudUsuario extends Conexao{

	  function __construct() {
        # INICIALIZANDO A CONEXÃO
        parent::connect();
    }

        # CRIANDO A FUNÇÃO PARA FAZER O INSERT DO Usuario
    public function insert(Usuario $model) {

         $nome           = $model->getNome();
         $senha             = $model->getSenha();
         $permicao       = $model->getPermicao();
         $funcionario      = $model->getFuncionario();
         //$login      = $model->getFuncionarioLogin();
      
 

         $query = $this->conexao->prepare("INSERT INTO usuario(usuario, senha, id_permicao, id_funcionario) VALUES('$nome', '$senha', '$permicao', '$funcionario')");

                if($query->execute()) {
              
                      echo '<div class="alert alert-success mt-5 alert-dismissible fade show" role="alert">
                                            <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                                            <span aria-hidden="true">&times;</span>
                                            <span class="sr-only">Close</span>
                                            </button>
                                            <h4 class="alert-heading">'.$model->getNome().'</h4>
                                            <p>Foi cadastrado com sucesso!.</p>
                                            <p class="mb-0">'.date('d-m-Y').'</p>

                                        </div>'
                                        ;

                } else {
                    echo "Erro";
                }

            


        # FECHANDO COMANDO
        $query->close();

        #FECHANDO A CONEXÃO
        $this->conexao->close();

    }



       # Função para listar todos os funcionarios
    public function select() {
        
        $query = $this->conexao->prepare("SELECT * FROM view_usuario ORDER BY usuario");
        
        $usuarios = array();
        if($query->execute()) {

            $result      = $query->get_result();
            while($dados = $result->fetch_assoc()) {
                $objecto = new Usuario();
                   $objecto->  setId($dados["idusuario"]);
                    $objecto->  setNome($dados["usuario"]);
                    $objecto->  setSenha($dados["senha"]);
                    $objecto->  setPermicao($dados["nivel"]);
                    $objecto->  setFuncionario($dados['funcionario']);   
                    $objecto->  setStatu($dados['statu']);   
                $usuarios[] = $objecto;
            }
        }

        return $usuarios;
        
       # FECHANDO O COMANDO
       $query->close();
       # FECHANDO A CONEXÃO
       $this->conexao->close();
    }



 # FUNÇÃO PARA FAZER O DELETE DO USUARIO DE FORMA DEFINITIVA
    public function delete($id) {

        $query = $this->conexao->prepare("DELETE FROM usuario WHERE idusuario = $id");
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




    	    # CRIANDO A FUNÇÃO PARA FAZER LOGIN
    public function login(Usuario $model) {

        $nome     = $model->getNome();
        $senha     = $model->getSenha();
        
        $query = $this->conexao->prepare("SELECT * FROM usuario WHERE usuario = '$nome' AND senha = '$senha'");
        //$query     ->bind_param('ssss', $nome, $senha, $telefone, $senha);
        if($query->execute()) {

            $result      = $query->get_result();
            $dados = $result->fetch_assoc();
                 $objecto   =  new Usuario();
                
                    $objecto->  setId($dados["idusuario"]);
                    $objecto->  setNome($dados["usuario"]);
                    $objecto->  setSenha($dados["senha"]);
                    $objecto->  setPermicao($dados["id_permicao"]);
                    $objecto->  setFuncionario($dados['id_funcionario']);


        }

       return $objecto; 

       #FECHANDO A COMANDO
       $query->close();
       #FECHANDO A CONEXÃO
       $this->conexao->close();
    }




     # CRINAOD A FUNÇÃO PARA FAZER O SELECT DO USUARIO APARTIR DO ID
     public function getById($id) {

        $query  = $this->conexao->prepare("SELECT * FROM usuario WHERE idusuario = '$id'");
       // $query->bind_param('i', $id);
        $query->execute();
        $result = $query->get_result();

        while($dados =  $result->fetch_assoc()) {
            $objecto   =  new Usuario();
                
                    $objecto->  setId($dados["idusuario"]);
                    $objecto->  setNome($dados["usuario"]);
                    $objecto->  setSenha($dados["senha"]);
                    $objecto->  setPermicao($dados["id_permicao"]);
                    $objecto->  setFuncionario($dados['id_funcionario']);
                    $objecto->  setStatu($dados['statu']);

        return $objecto; 
        #FECHANDO A COMANDO
       $query->close();
       #FECHANDO A CONEXÃO
       $this->conexao->close();
       
    }

}




 # Função para fazer o update do Usuario
    public function updateSatatu(Usuario $model) {

         $id              = $model->getId();
         $statu            = $model->getStatu();


     

                $query = $this->conexao->prepare("UPDATE usuario SET
                  statu       =  '$statu'
                  WHERE idusuario   =  '$id'");

                    if($query->execute()) {
                        echo '<div class="alert alert-success mt-5 alert-dismissible fade show" role="alert">
                                            <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                                            <span aria-hidden="true">&times;</span>
                                            <span class="sr-only">Close</span>
                                            </button>               
                                            <p>Foi editado com sucesso!.</p>
                        
                                        </div>'
                                        ;
                    
                    } else {
                        echo '<div class="alert alert-success mt-5 alert-dismissible fade show" role="alert">
                        <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                        <span class="sr-only">Close</span>
                        </button>
                        <p>Não foi editado com sucesso!.</p>
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

        $query  = $this->conexao->prepare("SELECT * FROM view_usuario WHERE usuario  LIKE '$search' ORDER BY usuario");
      //  $query->bind_param('s', $search);

        $usuarios = array();
        if($query->execute()) {

            $result      = $query->get_result(); 

            while($dados = $result->fetch_assoc()) {
            $objecto   = new Usuario();
                   $objecto->  setId($dados["idusuario"]);
                    $objecto->  setNome($dados["usuario"]);
                    $objecto->  setSenha($dados["senha"]);
                    $objecto->  setPermicao($dados["nivel"]);
                    $objecto->  setFuncionario($dados['funcionario']);   
                    $objecto->  setStatu($dados['statu']);  
                $usuarios[] = $objecto;

            }
        }

        return $usuarios;

        # FECHANDO O COMANDO
       $query->close();
       # FECHANDO A CONEXÃO
       $this->conexao->close();

    }







}
?>