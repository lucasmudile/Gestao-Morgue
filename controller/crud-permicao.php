<?php

include_once('conexao.php');



class CrudPermicao extends Conexao{

	  function __construct() {
        # INICIALIZANDO A CONEXÃO
        parent::connect();
    }





# CRIANDO A FUNÇÃO PARA LISTAR TODAS FUNÇÕES NUM OPCTION
    public function options() {

        $query     = $this->conexao->prepare("SELECT * FROM permicao");
        $query     ->execute();
        $result    = $query->get_result();
        $nacional  = array();

        while($dados = $result->fetch_assoc()) {
            $objecto = new Permicao();
            $objecto->      setId($dados["idpermicao"]);
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












}