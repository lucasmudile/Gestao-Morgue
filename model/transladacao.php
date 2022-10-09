<?php
/*
*Modelo transferenca
*/
class Transladacao
{
	private $id;
	private $id_cadaver;
	private $id_proveniencia;
	private $destino;
	private $data;

	private $idSistema;
	private $nomeSistema;


	//Get e Set do ID
	public function getId(){return $this->id;}
	public function setId($id){$this->id=$id;}
	
	public function getIdCadaver(){return $this->id_cadaver;}
	public function setIdCadaver($id_cadaver){$this->id_cadaver=$id_cadaver;}

	//Get e Set do ID
	public function getIdProveniencia(){return $this->id_proveniencia;}
	public function setIdProveniencia($id_proveniencia){$this->id_proveniencia=$id_proveniencia;}

	public function getDestino(){return $this->destino;}
	public function setDestino($destino){$this->destino=$destino;}

	public function getData(){return $this->data;}
	public function setData($data){$this->data=$data;}


	public function getIdSistema(){return $this->idSistema;}
	public function setIdSistema($idSistema){$this->idSistema=$idSistema;}

	public function getNomeSistema(){return $this->nomeSistema;}
	public function setNomeSistema($nomeSistema){$this->nomeSistema=$nomeSistema;}

	
}
?>