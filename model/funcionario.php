<?php

class Funcionario{

	private $id;
	private $nome;
	private $bi;
	private $morada;
	private $telefone;
	private $sexo;
	private $funcao;
	private $dataCadastro;
	private $dataActualizacao;
	
	//Get e Set do ID
	public function getId(){
		return $this->id;
	}

	public function setId($id){
		$this->id=$id;
	}
	//Get e Set do Nome
	public function getNome(){
		return $this->nome;
	}

	public function setNome($nome){
		$this->nome=$nome;
	}
	
	//Get e Set do BI
	public function getBi(){
		return $this->bi;
	}

	public function setBi($bi){
		$this->bi=$bi;
	}

	//Get e Set do Morada
	public function getMorada(){
		return $this->morada;
	}

	public function setMorada($morada){
		$this->morada=$morada;
	}

	//Get e Set do Telefone
	public function getTelefone(){
		return $this->telefone;
	}

	public function setTelefone($telefone){

		$this->telefone=$telefone;
	}
	
	//Get e Set do Sexo
	public function getSexo(){
		return $this->sexo;
	}

	public function setSexo($sexo){

		$this->sexo=$sexo;
	}

	//Get e Set do Funcao
	public function getFuncao(){
		return $this->funcao;
	}

	public function setFuncao($funcao){

		$this->funcao=$funcao;
	}

	//Get e Set do Data de Cadastro
	public function getDataCadastro(){
		return $this->dataCadastro;
	}

	public function setDataCadastro($dataCadastro){

		$this->dataCadastro=$dataCadastro;
	}

	//Get e Set de Actualizacao
	public function getDataActualizacao(){
		return $this->dataActualizacao;
	}

	public function setDataActualizacao($dataActualizacao){

		$this->dataActualizacao=$dataActualizacao;
	}




}


?>