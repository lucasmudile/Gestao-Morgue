<?php

# CRIANDO O MODEL DO UTILIZADOR

class Proveniencia {
    private $id;
    private $local;

    # CRAINDO OS GET E SETS #

    # CRAINDO O GET E SETS DO ID UTILIZADOR
    public function getId() { return $this->id; }
    public function setId($id) { $this->id = $id; }

    # CRAINDO O GET E SET DO NOME DO UTILIZADOR
    public function getLocal() { return $this->local; }
    public function setLocal($local) { $this->local = $local; }


  
}
