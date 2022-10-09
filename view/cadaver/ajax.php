<?php

include_once('../../controller/conexao.php');
include_once('../../model/gaveta.php');

class ListarGaveta extends Conexao{

	  function __construct() {
        # INICIALIZANDO A CONEXÃO
        parent::connect();
    }



    //   # CRIANDO A FUNÇÃO PARA LISTAR TODAS FUNÇÕES NUM OPCTION
    // public function options() {

    // 	// $id=$_REQUEST['id'];
    //     $query     = $this->conexao->prepare("SELECT * FROM gaveta WHERE id_camara='1' and statu='Activo'");
    //     $query     ->execute();
    //     $result    = $query->get_result();
    //     $nacional  = array();

    //     while($dados = $result->fetch_assoc()) {
    //         $objecto = new Gaveta();
    //         $objecto->      setId($dados["id_gaveta"]);
    //         $objecto->      setDescricao($dados["numero"]);
            
    //         if($objecto->getId() == $id) {
    //             echo '<option value="'.$objecto->getId().'" selected>'.$objecto->getNumero().'</option>';
    //         } else {
    //             echo '<option value="'.$objecto->getId().'">'.$objecto->getNumero().'</option>';
    //         }
    //     }

    

    //     # Fechando o comando
    //     $query->close();
    //     #Fechando a conexão
    //     $this->conexao->close();
    // }

  # Função para listar todos os funcionarios
    public function select() {
       
        if (isset($_REQUEST['id'])) {
        	$id=$_REQUEST['id'];
        $query = $this->conexao->prepare("SELECT * FROM gaveta WHERE id_camara='$id' and statu='Activo'");
        
        $cadavers = array();
        if($query->execute()) {

            $result      = $query->get_result();

            	  while($dados = $result->fetch_assoc()) {
                $objecto = new Gaveta();
	            $objecto->      setId($dados["idgaveta"]);
	            $objecto->      setNumero($dados["numero"]);
	            

	                echo '<option value="'.$objecto->getId().'">'.$objecto->getNumero().'</option>';
	            
                            
            }
            }
          
        }
        
        


        //return $cadavers;
        //$funcionario->setId($dados["idfuncionario"]);
       # FECHANDO O COMANDO
       $query->close();
       # FECHANDO A CONEXÃO
       $this->conexao->close();
    }


}





$obj=new ListarGaveta();

echo $obj->select();

?>