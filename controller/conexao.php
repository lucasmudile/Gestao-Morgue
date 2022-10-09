<?php




class Conexao {

    /* VARIAVES DO SERVIDOR */
    const SERVERNAME = "localhost";
    const USERNAME   = "root";
    const PASSWORD   = "";
    const BDNAME     = "morgue_sg";


   
    # Variavel de Conexão
     protected $conexao;

     function connect() {
       $this->conexao = new mysqli(self::SERVERNAME, self::USERNAME, self::PASSWORD, self::BDNAME);
       $this->conexao->set_charset('UTF8');

        if(mysqli_connect_errno()) {
          header('Location: view/404.php');
        }

        return true;
     }
}
   $conn=mysqli_connect('localhost','root','','morgue_sg');