<?php

# CRIANDO O MODEL DO UTILIZADOR

class Usuario {
    private $id;
    private $usuario;
    private $senha;
    private $id_permicao;
    private $id_funcionario;
    private $id_usuario;
    private $statu;
    # CRAINDO OS GET E SETS #

    # CRAINDO O GET E SETS DO ID UTILIZADOR
    public function getId() { return $this->id; }
    public function setId($id) { $this->id = $id; }

    # CRAINDO O GET E SET DO NOME DO UTILIZADOR
    public function getNome() { return $this->usuario; }
    public function setNome($usuario) { $this->usuario = $usuario; }

    # CRIANDO O GET E SET DO EMAIL DO UTILIZADOR
    public function getSenha() { return $this->senha; }
    public function setSenha($senha) { $this->senha = $senha; }

    # CRIANDO O GET E SET DO TELEFONE DO UTILIZADOR
    public function getPermicao() { return $this->id_permicao; }
    public function setPermicao($id_permicao) { $this->id_permicao = $id_permicao; }

    # CREIANDO O GET E SET DO SENHA DO UTILIZADOR
    public function getFuncionario() { return $this->id_funcionario; }
    public function setFuncionario($id_funcionario) { $this->id_funcionario = $id_funcionario; }


        # CREIANDO O GET E SET DO SENHA DO UTILIZADOR
    public function getFuncionarioLogin() { return $this->id_usuario; }
    public function setFuncionarioLogin($id_usuario) { $this->id_usuario = $id_usuario; }

            # CREIANDO O GET E SET DO SENHA DO UTILIZADOR
    public function getStatu() { return $this->statu; }
    public function setStatu($statu) { $this->statu = $statu; }

  
}
