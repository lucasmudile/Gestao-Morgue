<?php
include_once('conexao.php');

class CrudTransladacao extends Conexao{

	  function __construct() {
        # INICIALIZANDO A CONEXÃO
        parent::connect();
    }

    public function insert(Transladacao $model){

        $idCadaver=$model->getIdCadaver();
        $idproveniencia=$model->getIdProveniencia();
        $destino=$model->getDestino();

           // $query  = $this->conexao->prepare("INSERT INTO autopsia (id_cadaver,id_sala_autopsia,obs, data)");

           $query = $this->conexao->prepare("INSERT INTO translacao(id_cadaver,id_proveniencia,destino, data_translacao)VALUES('$idCadaver','$idproveniencia','$destino',now()) ");
            if($query->execute()) {
                 echo '<div class="alert alert-success mt-5 alert-dismissible fade show" role="alert">
                                            <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                                            <span aria-hidden="true">&times;</span>
                                            <span class="sr-only">Close</span>
                                            </button>
                                            <p>Foi cadastrado com sucesso!.</p>
                                        </div>';
            }else {
            return 3;
            }

             # Fechando o comando
        $query->close();
        #Fechando a conexão
        $this->conexao->close();
  
    }

     public function Hospital() {

        $query     = $this->conexao->prepare("SELECT * FROM sistema");
        $query     ->execute();
        $result    = $query->get_result();
        $nacional  = array();

        while($dados = $result->fetch_assoc()) {
            $objecto = new Transladacao();
            $objecto->      setIdSistema($dados["id"]);
            $objecto->      setNomeSistema($dados["nome"]);
            
            if($objecto->getIdSistema() == $id) {
                echo '<option title="'.$objecto->getIdSistema().'"value="'.$objecto->getIdSistema().'">'.$objecto->getNomeSistema().'</option>';
            } else {
                echo '<option title="'.$objecto->getIdSistema().'"value="'.$objecto->getIdSistema().'">'.$objecto->getNomeSistema().'</option>';
            }
        }


        # Fechando o comando
        $query->close();
        #Fechando a conexão
        $this->conexao->close();
    }

    public function cadaverId() {

        $query     = $this->conexao->prepare("SELECT * FROM cadaver");
        $query     ->execute();
        $result    = $query->get_result();
        $nacional  = array();

        while($dados = $result->fetch_assoc()) {
            $objecto = new ModelAutopsia();
            $objecto->      setIdCadaver($dados["id_cadaver"]);
            $objecto->      setCadever($dados["nome"]);
            
            if($objecto->getIdCadaver() == $id) {
                echo '<option  title="'.$objecto->getIdCadaver().'"value="'.$objecto->getIdCadaver().'" selected>'.$objecto->getCadever().'</option>';
            } else {
                echo '<option value="'.$objecto->getIdCadaver().'">'.$objecto->getCadever().'</option>';
            }
        }


        # Fechando o comando
        $query->close();
        #Fechando a conexão
        $this->conexao->close();


    }

    public function select() {
        
        $query = $this->conexao->prepare("SELECT * FROM view_transladacao ORDER BY nome");
        
        $transladacoes = array();
        if($query->execute()) {

            $result      = $query->get_result();
            while($dados = $result->fetch_assoc()) {
                $transladacao = new Transladacao();
                $transladacao->setId($dados['idtranslacao']);
                $transladacao->setIdCadaver($dados['nome']);
                $transladacao->setIdProveniencia($dados['hospital']);
                $transladacao->setDestino($dados['destino']);
                $transladacao->setData($dados['data_translacao']);
          

                $transladacoes[] = $transladacao;
            }
        }

        return $transladacoes;

       # FECHANDO O COMANDO
       $query->close();
       # FECHANDO A CONEXÃO
       $this->conexao->close();
    }





        # Função para pesquisar o funcionario
    public function search($descricao) {

        $search = "%{$descricao}%";

        $query  = $this->conexao->prepare("SELECT * FROM view_transladacao WHERE nome  LIKE '$search' ORDER BY nome");
      //  $query->bind_param('s', $search);
  
        $transladacoes = array();
        if($query->execute()) {

            $result      = $query->get_result();
            while($dados = $result->fetch_assoc()) {
                $transladacao = new Transladacao();
                $transladacao->setId($dados['idtranslacao']);
                $transladacao->setIdCadaver($dados['nome']);
                $transladacao->setIdProveniencia($dados['hospital']);
                $transladacao->setDestino($dados['destino']);
                $transladacao->setData($dados['data_translacao']);
          

                $transladacoes[] = $transladacao;
            }
        }

        return $transladacoes;

        # FECHANDO O COMANDO
       $query->close();
       # FECHANDO A CONEXÃO
       $this->conexao->close();

    }












          # FUNÇÃO PARA FAZER O DELETE DO Camara DE FORMA DEFINITIVA
    public function delete($id) {

        $query = $this->conexao->prepare("DELETE FROM translacao WHERE idtranslacao = $id");
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


        $query = $this->conexao->prepare("SELECT * FROM view_transladacao WHERE idtranslacao = ?");
        $query->bind_param('s', $id);

        if($query->execute()) {

            $result      = $query->get_result();
            while($dados = $result->fetch_assoc()) {
                $transladacao = new Transladacao();
                $transladacao->setId($dados['idtranslacao']);
                $transladacao->setIdCadaver($dados['nome']);
                $transladacao->setIdProveniencia($dados['hospital']);
                $transladacao->setDestino($dados['destino']);
                $transladacao->setData($dados['data_translacao']);

            }
        }

        return $transladacao;

       # FECHANDO O COMANDO
       $query->close();
       # FECHANDO A CONEXÃO
       $this->conexao->close();

    }

        # Função para fazer o update da FUnção
    public function update(Transladacao $model) {



        $id=$model->getId();
        $idCadaver=$model->getIdCadaver();
        $idproveniencia=$model->getIdProveniencia();
        $destino=$model->getDestino();    
    

     

                $query = $this->conexao->prepare("UPDATE translacao SET
                  id_cadaver       =  '$idCadaver',
                   destino       =  '$destino',
                   data_translacao       =  now() 
                    WHERE idtranslacao   =  '$id' ");

                    if($query->execute()){
                        echo '<div class="alert alert-success mt-5 alert-dismissible fade show" role="alert">
                                            <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                                            <span aria-hidden="true">&times;</span>
                                            <span class="sr-only">Close</span>
                                            </button>
                                             <p>Foi editado com sucesso!.</p>
                                            <p class="mb-0">'.date('d-m-Y H:s').'</p>
                                        </div>';
        
                    } else {
                        echo '<div class="alert alert-success mt-5 alert-dismissible fade show" role="alert">
                        <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                        <span class="sr-only">Close</span>
                        </button>
                    
                        <p>Não foi editado com sucesso!.</p>
                        <p class="mb-0">'.date('d-m-Y H:s').'</p>
                    </div>';
                    }   


       

        # FECHANDO O COMANDO
        $query->close();
        # FECHANDO A CONEXÃO
        $this->conexao->close();
    } 

}


?>