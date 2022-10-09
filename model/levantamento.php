<?php



Class Levantamento{


	private $id;
	private $data;
	private $idGrauParentesco;
	private $testemunhaFamiliar;
	private $contacto;
	private $idCadaver;
	private $idFuncionario;


	public function getId(){
		return  $this->id;
	}

	public function setId($id){
		$this->id=$id;
	}


	public function getData(){
		return  $this->data;
	}

	public function setData($data){
		$this->data=$data;
	}


	public function getIdGrauParentesco(){
		return  $this->idGrauParentesco;
	}

	public function setIdGrauParentesco($idGrauParentesco){
		$this->idGrauParentesco=$idGrauParentesco;
	}


	public function getTestemunhaFamiliar(){
		return  $this->testemunhaFamiliar;
	}

	public function setTestemunhaFamiliar($testemunhaFamiliar){
		$this->testemunhaFamiliar=$testemunhaFamiliar;
	}

	public function getContacto(){
		return  $this->contacto;
	}

	public function setContacto($contacto){
		$this->contacto=$contacto;
	}


	public function getIdCadaver(){
		return  $this->idCadaver;
	}

	public function setIdCadaver($idCadaver){
		$this->idCadaver=$idCadaver;
	}

	public function getIdFuncionario(){
		return  $this->idFuncionario;
	}

	public function setIdFuncionario($idFuncionario){
		$this->idFuncionario=$idFuncionario;
	}















}











?>