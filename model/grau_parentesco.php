<?php

	class GrauParentesco{

	private $id;
	private $descricao;

	
	//Get e Set do ID
	public function getId(){
		return $this->id;
	}

	public function setId($id){
		$this->id=$id;
	}
	//Get e Set da descricao
	public function getDescricao(){
		return $this->descricao;
	}

	public function setDescricao($descricao){
		$this->descricao=$descricao;
	}

}