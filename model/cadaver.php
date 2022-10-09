<?php
// echo "cadaver";
class Cadaver{

	private $id_cadaver;
	private $nome;	
	private $idade;
	private $sexo;
    private $bi;
	private $dataNascimento;
	private $residente;
	private $nomePai;
	private $nomeMae;
	private $idGrauParentesco;
	private $testemunhaFamiliar;
	private $BitestemunhaFamiliar;
	private $testemunhaResponsavel;
	private $contacto;
	private $idProveniencia;
	private $idGaveta;
	private $idUsuario;
	private $idCamara;
	private $DataRegisto;
	private $statu;

	
	//Get e Set do ID
	public function getId(){
		return $this->id_cadaver;
	}

	public function setId($id_cadaver){
		$this->id_cadaver=$id_cadaver;
	}

	public function getIdade(){
		return $this->idade;
	}

	public function setIdade($idade){
		$this->idade=$idade;
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

	//Get e Set da data de nascimento
	public function getDataNascimento(){
		return $this->dataNascimento;
	}

	public function setDataNascimento($dataNascimento){
		$this->dataNascimento=$dataNascimento;
	}


	//Get e Set do Morada
	public function getResidente(){
		return $this->residente;
	}

	public function setResidente($residente){
		$this->residente=$residente;
	}

	//Get e Set do Telefone
	public function getContacto(){
		return $this->contacto;
	}

	public function setContacto($contacto){

		$this->contacto=$contacto;
	}
	
	//Get e Set do Sexo
	public function getSexo(){
		return $this->sexo;
	}

	public function setSexo($sexo){

		$this->sexo=$sexo;
	}

	//Get e Set do Funcao
	public function getNomePai(){
		return $this->nomePai;
	}

	public function setNomePai($nomePai){

		$this->nomePai=$nomePai;
	}


		//Get e Set do Funcao
	public function getNomeMae(){
		return $this->nomeMae;
	}

	public function setNomeMae($nomeMae){

		$this->nomeMae=$nomeMae;
	}



	//Get e Set do Data de Cadastro
	public function getIdGrauParentesco(){
		return $this->idGrauParentesco;
	}

	public function setIdGrauParentesco($idGrauParentesco){

		$this->idGrauParentesco=$idGrauParentesco;
	}





	//Get e Set de Actualizacao
	public function getTestemunhaFamiliar(){
		return $this->testemunhaFamiliar;
	}

	public function setTestemunhaFamiliar($testemunhaFamiliar){

		$this->testemunhaFamiliar=$testemunhaFamiliar;
	}


	//Get e Set de Actualizacao
	public function getBiTestemunhaFamiliar(){
		return $this->BitestemunhaFamiliar;
	}

	public function setBiTestemunhaFamiliar($BitestemunhaFamiliar){

		$this->BitestemunhaFamiliar=$BitestemunhaFamiliar;
	}




		//Get e Set de Actualizacao
	public function getTestemunhaResponsavel(){
		return $this->testemunhaResponsavel;
	}

	public function setTestemunhaResponsavel($testemunhaResponsavel){

		$this->testemunhaResponsavel=$testemunhaResponsavel;
	}


		public function getIdProveniencia(){
		return $this->idProveniencia;
	}

	public function setIdProveniencia($idProveniencia){

		$this->idProveniencia=$idProveniencia;
	}



		public function getIdGaveta(){
		return $this->idGaveta;
	}

	public function setIdGaveta($idGaveta){

		$this->idGaveta=$idGaveta;
	}


		public function getIdUsuario(){
		return $this->idUsuario;
	}

	public function setIdUsuario($idUsuario){

		$this->idUsuario=$idUsuario;
	}


	public function getIdCamara(){
		return $this->idCamara;
	}

	public function setIdCamara($idCamara){

		$this->idCamara=$idCamara;
	}

	public function getStatu(){
		return $this->statu;
	}

	public function setStatu($statu){

		$this->statu=$statu;
	}


	public function getDataRegisto(){
		return $this->DataRegisto;
	}

	public function setDataRegisto($DataRegisto){

		$this->DataRegisto=$DataRegisto;
	}




}
?>