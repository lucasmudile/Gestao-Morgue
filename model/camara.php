<?php

	class Camara{

	private $id;
	private $referencia;
	private $n_gaveta_total;
	private $n_gaveta_ocupada;
	
	//Get e Set do ID
	public function getId(){
		return $this->id;
	}

	public function setId($id){
		$this->id=$id;
	}
	//Get e Set da descricao
	public function getReferencia(){
		return $this->referencia;
	}

	public function setReferencia($referencia){
		$this->referencia=$referencia;
	}

		//Get e Set da gaveta total
	public function getN_GavetaTotal(){
		return $this->n_gaveta_total;
	}

	public function setN_GavetaTotal($n_gaveta_total){
		$this->n_gaveta_total=$n_gaveta_total;
	}


		//Get e Set da gaveta total
	public function getN_GavetaOcupada(){
		return $this->n_gaveta_ocupada;
	}

	public function setN_GavetaOcupada($n_gaveta_ocupada){
		$this->n_gaveta_ocupada=$n_gaveta_ocupada;
	}

}