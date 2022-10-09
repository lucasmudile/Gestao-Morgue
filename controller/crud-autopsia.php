<?php
include_once('conexao.php');
require '../../model/autopsia.php';

class CrudAutopsia extends Conexao{

	  function __construct() {
        # INICIALIZANDO A CONEXÃO
        parent::connect();
    }

    public function insert($model){
        $idCadaver=$model->getIdCadaver();
        $idSala=$model->getIdSala();
        $obs=$model->getObs();

           // $query  = $this->conexao->prepare("INSERT INTO autopsia (id_cadaver,id_sala_autopsia,obs, data)");

           $query = $this->conexao->prepare("INSERT INTO autopsia(id_cadaver,id_sala_autopsia,obs, data) VALUES('$idCadaver','$idSala','$obs',now())");
            if($query->execute()) {
                 echo '<div class="alert alert-success mt-5 alert-dismissible fade show" role="alert">
                                            <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                                            <span aria-hidden="true">&times;</span>
                                            <span class="sr-only">Close</span>
                                            </button>
                                            <h4 class="alert-heading">'.'</h4>
                                            <p>Foi cadastrado com sucesso!.</p>
                                            <p class="mb-0">'.date('d-m-Y').'</p>

                                        </div>';
            }else {
            return 3;
            }

             # Fechando o comando
        $query->close();
        #Fechando a conexão
        $this->conexao->close();
  
    }

     public function salaId() {

        $query     = $this->conexao->prepare("SELECT * FROM sala_autopsia");
        $query     ->execute();
        $result    = $query->get_result();
        $nacional  = array();

        while($dados = $result->fetch_assoc()) {
            $objecto = new ModelAutopsia();
            $objecto->      setIdSala($dados["idsala_autopsia"]);
            $objecto->      setSala($dados["descricao"]);
            
            if($objecto->getIdSala() == $id) {
                echo '<option title="'.$objecto->getIdSala().'"value="'.$objecto->getIdSala().'">'.$objecto->getSala().'</option>';
            } else {
                echo '<option title="'.$objecto->getIdSala().'"value="'.$objecto->getIdSala().'">'.$objecto->getSala().'</option>';
            }
        }
// getSala
// getIdSala
    
// idsala_autopsia
// descricao

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
        
        $query = $this->conexao->prepare("SELECT *,YEAR(data_registo)-YEAR(data_de_nascimento) as idade FROM view_autopsia ORDER BY nome");
        
        $cadavers = array();
        if($query->execute()) {

            $result      = $query->get_result();
            while($dados = $result->fetch_assoc()) {
                $cadaver = new ModelAutopsia();
                $cadaver->setId($dados['id_cadaver']);
                $cadaver->setNome($dados['nome']);
                $cadaver->setIdade($dados['idade']);
                $cadaver->setBi($dados['bi']);
                $cadaver->setSexo($dados['sexo']);
                $cadaver->setResidente($dados['residente']);
                $cadaver->setDataNascimento($dados['data_de_nascimento']);
                $cadaver->setContacto($dados['contacto']);
                $cadaver->setNomePai($dados['nome_do_pai']);
                $cadaver->setNomeMae($dados['nome_da_mae']);
                // $cadaver->setIdGrauParentesco($dados['grau_parentesco']);
                $cadaver->setTestemunhaFamiliar($dados['testemunha_familiar']);
                $cadaver->setTestemunhaResponsavel($dados['testemunha_responsavel']);
                $cadaver->setBiTestemunhaFamiliar($dados['bi_testemunha_familiar']);
                // $cadaver->setIdProveniencia($dados['local_proveniencia']);
                // $cadaver->setIdGaveta($dados['gaveta']);
                // $cadaver->setIdCamara($dados['camara']);  
                // $cadaver->setIdUsuario($dados['funcionario']);
                $cadaver->setDataRegisto($dados['data_registo']);

                $cadaver->setSala($dados['sala']);
                $cadaver->setObs($dados['obs']);
                $cadaver->setData($dados['data']);
                // $cadaver->setObs($dados['obs']);
                $cadaver->setIdautopsia($dados['idautopsia']);

                $cadavers[] = $cadaver;
            }
        }

        return $cadavers;
        //$funcionario->setId($dados["idfuncionario"]);
       # FECHANDO O COMANDO
       $query->close();
       # FECHANDO A CONEXÃO
       $this->conexao->close();
    }

          # FUNÇÃO PARA FAZER O DELETE DO Camara DE FORMA DEFINITIVA
    public function delete($id) {

        $query = $this->conexao->prepare("DELETE FROM autopsia WHERE idautopsia = $id");
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


        $query = $this->conexao->prepare("SELECT * FROM view_autopsia WHERE id_cadaver = ?");
        $query->bind_param('s', $id);

        if($query->execute()) {

            $result      = $query->get_result(); 
            $funcao       = new ModelAutopsia();
            while($dados = $result->fetch_assoc()) {
              $funcao->setId($dados['id_cadaver']);
              $funcao->setIdSala($dados['idsala_autopsia']);
              $funcao->setNome($dados['nome']);
              $funcao->setObs($dados['obs']);
              $funcao->setSala($dados['sala']);
              $funcao->setIdautopsia($dados['idautopsia']);

            }
        }
        
        
        return $funcao;

       # FECHANDO O COMANDO
       $query->close();
       # FECHANDO A CONEXÃO
       $this->conexao->close();

    }

        # Função para fazer o update da FUnção
    public function update($model) {
       $idCadaver=$model->getIdCadaver();
        $idSala=$model->getIdSala();
        $obs=$model->getObs();
        $id =$model->getIdautopsia();        
    

     

                $query = $this->conexao->prepare("UPDATE autopsia SET
                  obs       =  '$obs'
                    WHERE idautopsia   =  '$id'");

                    if($query->execute()) {
                        echo '<div class="alert alert-success mt-5 alert-dismissible fade show" role="alert">
                                            <a type="button" class="close" data-dismiss="alert" aria-label="Close">
                                            <span aria-hidden="true">&times;</span>
                                            <span class="sr-only">Close</span>
                                            </button>
                                            <h4 class="alert-heading">'.$model->getObs().'</h4>
                                            <p>Foi editado com sucesso!.</p>
                                            <p class="mb-0">'.date('d-m-Y H:s').'</p></div>';
                                        
                                       

                                       
                    
                    } else {
                        echo '<div class="alert alert-success mt-5 alert-dismissible fade show" role="alert">
                        <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                        <span class="sr-only">Close</span>
                        </button>
                        <h4 class="alert-heading">'.$model->getObs().'</h4>
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


// $a='DELETE FROM view_autopsia WHERE id_cadaver= 8';

?>