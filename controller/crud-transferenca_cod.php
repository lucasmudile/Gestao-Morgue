<?php
/**
 * 
 */
include_once('conexao.php');
require '../../model/transferenca.php';
class CrudTransferenca extends Conexao
{
	function __construct() {
        # INICIALIZANDO A CONEXÃO
        parent::connect();
    }
    public function teste($model)
    {
    	echo $model->getIdCadaver();
    }
    public function transferir($model)
    {
    	$query = $this->conexao->prepare("");
            if($query->execute())
            {

            }
            else
            {

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

        while($dados = $result->fetch_assoc()) {
            $model = new Transferenca();
            $model->      setIdCadaver($dados["id_cadaver"]);
            $model->      setCadever($dados["nome"]);
            echo '<option  title="'.$model->getIdCadaver().'"value="'.$model->getIdCadaver().'" selected>'.$model->getCadever().'</option>';
        }


        # Fechando o comando
        $query->close();
        #Fechando a conexão
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
              $cadaver->setIdCadaver($dados['id_cadaver']);
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


}

?>