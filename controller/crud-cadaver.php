<?php

include_once('conexao.php');



class CrudCadaver extends Conexao{

	  function __construct() {
        # INICIALIZANDO A CONEXÃO
        parent::connect();
    }


	  # CRIANDO A FUNÇÃO PARA FAZER O INSERT DO CADAVER
    public function insert(Cadaver $model) {

        $nome           = $model->getNome();
         $Sexo         = $model->getSexo();
         $bi             = $model->getBi();
         $dataNascimento=$model->getDataNascimento();
         $residente         = $model->getResidente();
         $contacto       = $model->getContacto();
         $sexo       = $model->getSexo();
         $nomePai=$model->getNomePai();
         $nomeMae=$model->getNomeMae();
         $idGrauParentesco=$model->getIdGrauParentesco();
         $testemunhaFamiliar=$model->getTestemunhaFamiliar();
         $testemunhaResponsavel=$model->getTestemunhaResponsavel();
         $idProveniencia=$model->getIdProveniencia();
         $idGaveta=$model->getIdGaveta();
         $idCamara=$model->getIdCamara();
         $idUsuario=$_SESSION['idusuario'];

      $query  = $this->conexao->prepare("SELECT * FROM view_cadaver WHERE bi='$bi'");

        if($query->execute()) {

          echo '<div class="alert alert-success mt-5 alert-dismissible fade show" role="alert">
                                            <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                                            <span aria-hidden="true">&times;</span>
                                            <span class="sr-only">Close</span>
                                            </button>
                                            <h4 class="alert-heading">Já existe falecido com este número de Bilhete '.$model->getBi().'</h4>
                                         

                                        </div>'
                                        ;
                                $vetor = array('op' => 1,'info'=>'algo deu errado');
                    


        }else{

         $query = $this->conexao->prepare("INSERT INTO cadaver(nome,sexo,data_de_nascimento,residente,nome_do_pai,nome_da_mae,bi,id_grau_parentesco,testemunha_familiar,testemunha_responsavel,
          contacto,id_proveniencia_,id_gaveta_,id_usuario_,_id_camara,statu,data_registo) VALUES('$nome','$sexo','$dataNascimento','$residente','$nomePai','$nomeMae','$bi','$idGrauParentesco','$testemunhaFamiliar','$testemunhaResponsavel','$contacto','$idProveniencia','$idGaveta','$idUsuario','$idCamara','Depositado',now())");

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
                      // $vetor = array('success' => 1,'info'=>'tudo certo');

                } else {
                    return 3;
                }


          }

            


        # FECHANDO COMANDO
        // echo json_encode($vetor);
        $query->close();

        #FECHANDO A CONEXÃO
        $this->conexao->close();

    }


   # Função para listar todos os funcionarios
    public function select() {
        
        $query = $this->conexao->prepare("SELECT *,YEAR(data_registo)-YEAR(data_de_nascimento) as idade FROM view_cadaver where statu='Depositado' ORDER BY nome");
        
        $cadavers = array();
        if($query->execute()) {

            $result      = $query->get_result();
            while($dados = $result->fetch_assoc()) {
                $cadaver = new Cadaver();
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
                              $cadaver->setIdGrauParentesco($dados['grau_parentesco']);
                              $cadaver->setTestemunhaFamiliar($dados['testemunha_familiar']);
                              $cadaver->setTestemunhaResponsavel($dados['testemunha_responsavel']);
                              $cadaver->setBiTestemunhaFamiliar($dados['bi_testemunha_familiar']);
                              $cadaver->setIdProveniencia($dados['local_proveniencia']);
                              $cadaver->setIdGaveta($dados['gaveta']);
                              $cadaver->setIdCamara($dados['camara']);  
                              $cadaver->setIdUsuario($dados['usuario']);
                              $cadaver->setDataRegisto($dados['data_registo']);

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


     # Função para fazer o update do Cadaver
    public function update(Cadaver $model) {

         $id                     = $model->getId();
         $nome           = $model->getNome();
         $Sexo         = $model->getSexo();
         $bi             = $model->getBi();
         $dataNascimento=$model->getDataNascimento();
         $residente         = $model->getResidente();
         $contacto       = $model->getContacto();
         $sexo       = $model->getSexo();
         $nomePai=$model->getNomePai();
         $nomeMae=$model->getNomeMae();
         $idGrauParentesco=$model->getIdGrauParentesco();
         $testemunhaFamiliar=$model->getTestemunhaFamiliar();
         $testemunhaResponsavel=$model->getTestemunhaResponsavel();
         $idProveniencia=$model->getIdProveniencia();
         $idGaveta=$model->getIdGaveta();
         $idCamara=$model->getIdCamara();
         $idUsuario=$_SESSION['idusuario'];

     

                $query = $this->conexao->prepare("UPDATE cadaver SET
                  nome       =  '$nome',
                  sexo        =  '$Sexo',
                  data_de_nascimento           =  '$dataNascimento',
                  residente      =  '$residente',
                  nome_do_pai       =  '$nomePai', 
                  nome_da_mae       =  '$nomeMae',
                  bi       =  '$bi',  
                  id_grau_parentesco       =  '$idGrauParentesco', 
                  testemunha_familiar       =  '$testemunhaFamiliar',
                  testemunha_responsavel       =  '$testemunhaResponsavel',
                  contacto       =  '$contacto',
                  id_proveniencia_       =  '$idProveniencia',
                  id_gaveta_       =  '$idGaveta',
                  id_usuario_       =  '$idUsuario',
                  _id_camara       =  '$idCamara'     
                  WHERE id_cadaver   =  '$id'");

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




        # Função para pesquisar o Cadaver
    public function search($descricao) {

        $search = "%{$descricao}%";

        $query  = $this->conexao->prepare("SELECT * FROM view_cadaver WHERE nome  LIKE '$search'or bi LIKE '$search' ORDER BY nome");
      //  $query->bind_param('s', $search);

        $cadavers = array();
        if($query->execute()) {

            $result      = $query->get_result(); 

            while($dados = $result->fetch_assoc()) {
                $cadaver = new Cadaver();
                              $cadaver->setId($dados['id_cadaver']);
                              $cadaver->setNome($dados['nome']);
                              $cadaver->setBi($dados['bi']);
                              $cadaver->setSexo($dados['sexo']);
                              $cadaver->setResidente($dados['residente']);
                              $cadaver->setDataNascimento($dados['data_de_nascimento']);
                              $cadaver->setContacto($dados['contacto']);
                              $cadaver->setNomePai($dados['nome_do_pai']);
                              $cadaver->setNomeMae($dados['nome_da_mae']);
                              $cadaver->setIdGrauParentesco($dados['grau_parentesco']);
                              $cadaver->setTestemunhaFamiliar($dados['testemunha_familiar']);
                              $cadaver->setTestemunhaResponsavel($dados['testemunha_responsavel']);
                              $cadaver->setIdProveniencia($dados['local_proveniencia']);
                              $cadaver->setIdGaveta($dados['gaveta']);
                              $cadaver->setIdCamara($dados['camara']);  
                              $cadaver->setIdUsuario($dados['funcionario']);
                              $cadaver->setDataRegisto($dados['data_registo']);   
                $cadavers[] = $cadaver;

            }
        }

        return $cadavers;

        # FECHANDO O COMANDO
       $query->close();
       # FECHANDO A CONEXÃO
       $this->conexao->close();

    }




            # Função para pesquisar o Cadaver para listar os detalhes do corpo
    public function pesquisar($descricao) {

        $search = $descricao;
 

        $query  = $this->conexao->prepare("SELECT * FROM view_cadaver WHERE id_cadaver='$search' and statu='Depositado' ");
      //  $query->bind_param('s', $search);

        if($query->execute()) {

          $cadavers = array();

            $result      = $query->get_result(); 

            while($dados = $result->fetch_assoc()) {
                $cadaver = new Cadaver();
                              $cadaver->setId($dados['id_cadaver']);
                              $cadaver->setNome($dados['nome']);
                              $cadaver->setBi($dados['bi']);
                              $cadaver->setSexo($dados['sexo']);
                              $cadaver->setResidente($dados['residente']);
                              $cadaver->setDataNascimento($dados['data_de_nascimento']);
                              $cadaver->setContacto($dados['contacto']);
                              $cadaver->setNomePai($dados['nome_do_pai']);
                              $cadaver->setNomeMae($dados['nome_da_mae']);
                              $cadaver->setIdGrauParentesco($dados['grau_parentesco']);
                              $cadaver->setTestemunhaFamiliar($dados['testemunha_familiar']);
                              $cadaver->setTestemunhaResponsavel($dados['testemunha_responsavel']);
                              $cadaver->setIdProveniencia($dados['local_proveniencia']);
                              $cadaver->setIdGaveta($dados['gaveta']);
                              $cadaver->setIdCamara($dados['camara']);  
                              $cadaver->setIdUsuario($dados['funcionario']);
                              $cadaver->setDataRegisto($dados['data_registo']);   
                $cadavers[] = $cadaver;

            }
        }

        return $cadavers;

        

        # FECHANDO O COMANDO
       $query->close();
       # FECHANDO A CONEXÃO
       $this->conexao->close();

    }



 # FUNÇÃO PARA FAZER O DELETE DO CADAVER DE FORMA DEFINITIVA
    public function delete($id) {

        $query = $this->conexao->prepare("DELETE FROM cadaver WHERE id_cadaver = $id");
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


         # Função para Pegar o cadaver via id
    public function getById($id) {


        $query = $this->conexao->prepare("SELECT *,YEAR(data_registo)-YEAR(data_de_nascimento) as idade  FROM view_cadaver WHERE id_cadaver = ?");
        $query->bind_param('s', $id);

        if($query->execute()) {

            $result      = $query->get_result(); 
            $cadaver       = new Cadaver();
            while($dados = $result->fetch_assoc()) {
              $cadaver->setId($dados['id_cadaver']);
              $cadaver->setIdade($dados['idade']);
              $cadaver->setNome($dados['nome']);
              $cadaver->setBi($dados['bi']);
              $cadaver->setSexo($dados['sexo']);
              $cadaver->setResidente($dados['residente']);
              $cadaver->setDataNascimento($dados['data_de_nascimento']);
              $cadaver->setContacto($dados['contacto']);
              $cadaver->setNomePai($dados['nome_do_pai']);
              $cadaver->setNomeMae($dados['nome_da_mae']);
              $cadaver->setIdGrauParentesco($dados['grau_parentesco']);
              $cadaver->setTestemunhaFamiliar($dados['testemunha_familiar']);
              $cadaver->setBiTestemunhaFamiliar($dados['bi_testemunha_familiar']);
              $cadaver->setTestemunhaResponsavel($dados['testemunha_responsavel']);
              $cadaver->setIdProveniencia($dados['local_proveniencia']);
              $cadaver->setIdGaveta($dados['gaveta']);
              $cadaver->setIdCamara($dados['camara']);  
              $cadaver->setIdUsuario($dados['funcionario']);
              $cadaver->setDataRegisto($dados['data_registo']);  
            }
        }
        
        
        return $cadaver;

       # FECHANDO O COMANDO
       $query->close();
       # FECHANDO A CONEXÃO
       $this->conexao->close();

    }





        public function selectMax(){

             $query = $this->conexao->prepare("SELECT max(id_cadaver) as id_cadaver FROM view_cadaver");
        
        
        if($query->execute()) {
            
            $result      = $query->get_result();

            while($dados = $result->fetch_assoc()) {
                $dado = new Cadaver();
                              $dado->setId($dados['id_cadaver']);
                                 
                $aluno = $dado;
            }

            }

        return $aluno;
       # FECHANDO O COMANDO
       $query->close();
       # FECHANDO A CONEXÃO
       $this->conexao->close();


    }








}
?>