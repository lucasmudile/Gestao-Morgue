<?php

	class Gaveta{

	private $id;
	private $numero;
	private $id_camara;
	private $statu;
	
	//Get e Set do ID
	public function getId(){
		return $this->id;
	}

	public function setId($id){
		$this->id=$id;
	}
	//Get e Set da descricao
	public function getNumero(){
		return $this->numero;
	}

	public function setNumero($numero){
		$this->numero=$numero;
	}

		//Get e Set da gaveta total
	public function getIdCamara(){
		return $this->id_camara;
	}

	public function setIdCamara($id_camara){
		$this->id_camara=$id_camara;
	}


		//Get e Set do statu 
	public function getIStatu(){
		return $this->statu;
	}

	public function setIStatu($statu){
		$this->statu=$statu;
	}


}