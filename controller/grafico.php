<?php



include_once('conexao.php');

class CrudGrafico extends Conexao{

	  function __construct() {
        # INICIALIZANDO A CONEXÃO
        parent::connect();
    }

    
       # Função para listar dados do gráfico deposito
    public function depositados() {
        
        $query = $this->conexao->prepare("SELECT * FROM view_grafico_deposito ");
        
        $graficos = array();
        if($query->execute()) {

            $result      = $query->get_result();
            while($dados = $result->fetch_assoc()) {
                $objecto = new Grafico();
                   $objecto->  setJaneiro($dados["Janeiro"]);
                    $objecto->  setFevereiro($dados["Fevereiro"]);
                    $objecto->  setMarco($dados["Marco"]);
                    $objecto->  setAbril($dados["Abril"]);
                    $objecto->  setMaio($dados['Maio']);   
                    $objecto->  setJunho($dados['Junho']);   
                     $objecto->  setJulho($dados["Julho"]);
                    $objecto->  setAgosto($dados["Agosto"]);
                    $objecto->  setSetembro($dados["Setembro"]);
                    $objecto->  setOutubro($dados["Outubro"]);
                    $objecto->  setNovembro($dados['Novembro']);   
                    $objecto->  setDezembro($dados['Dezembro']);   
                $graficos[] = $objecto;
            }
        }

        return $graficos;
        
       # FECHANDO O COMANDO
       $query->close();
       # FECHANDO A CONEXÃO
       $this->conexao->close();
    }


       # Função para listar dados do gráfico deposito
    public function levantados() {
        
        $query = $this->conexao->prepare("SELECT * FROM view_grafico_levantamento ");
        
        $graficos = array();
        if($query->execute()) {

            $result      = $query->get_result();
            while($dados = $result->fetch_assoc()) {
                $objecto = new Grafico();
                   $objecto->  setJaneiro($dados["Janeiro"]);
                    $objecto->  setFevereiro($dados["Fevereiro"]);
                    $objecto->  setMarco($dados["Marco"]);
                    $objecto->  setAbril($dados["Abril"]);
                    $objecto->  setMaio($dados['Maio']);   
                    $objecto->  setJunho($dados['Junho']);   
                     $objecto->  setJulho($dados["Julho"]);
                    $objecto->  setAgosto($dados["Agosto"]);
                    $objecto->  setSetembro($dados["Setembro"]);
                    $objecto->  setOutubro($dados["Outubro"]);
                    $objecto->  setNovembro($dados['Novembro']);   
                    $objecto->  setDezembro($dados['Dezembro']);   
                $graficos[] = $objecto;
            }
        }

        return $graficos;
        
       # FECHANDO O COMANDO
       $query->close();
       # FECHANDO A CONEXÃO
       $this->conexao->close();
    }




     # Função para listar dados do gráfico levantados hoje
    public function levantadosHoje() {
        
        $query = $this->conexao->prepare("SELECT * FROM view_grafico_diairo_levantado ");
        
        $graficos = array();
        if($query->execute()) {

            $result      = $query->get_result();
            while($dados = $result->fetch_assoc()) {
                $objecto = new Grafico();
                   $objecto->  setHoje($dados["hoje"]);
 
                $graficos[] = $objecto;
            }
        }

        return $graficos;
        
       # FECHANDO O COMANDO
       $query->close();
       # FECHANDO A CONEXÃO
       $this->conexao->close();
    }

         # Função para listar dados do gráfico depositados
    public function depositoHoje() {
        
        $query = $this->conexao->prepare("SELECT * FROM view_grafico_diario_deposito ");
        
        $graficos = array();
        if($query->execute()) {

            $result      = $query->get_result();
            while($dados = $result->fetch_assoc()) {
                $objecto = new Grafico();
                   $objecto->  setHoje($dados["hoje"]);
 
                $graficos[] = $objecto;
            }
        }

        return $graficos;
        
       # FECHANDO O COMANDO
       $query->close();
       # FECHANDO A CONEXÃO
       $this->conexao->close();
    }




}
?>