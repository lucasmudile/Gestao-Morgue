<?php
/*
*Modelo transferenca
*/
class Transferenca
{
	private $id_cadaver;
	private $cadaver;
	private $nome;
	private $id;

	private $idgaveta;
	private $gaveta;
	private $idcamara;
	private $camara;
	private $data;

	private $idgavetaNovo;
	private $idcamaraNovo;

	//Get e Set do ID
	public function getId(){return $this->id;}
	public function setId($id){$this->id=$id;}
	
	public function getIdCadaver(){return $this->id_cadaver;}
	public function setIdCadaver($id_cadaver){$this->id_cadaver=$id_cadaver;}

	//Get e Set do ID
	public function getCadaver(){return $this->cadaver;}
	public function setCadaver($cadaver){$this->cadaver=$cadaver;}

	public function getNome(){return $this->nome;}
	public function setNome($nome){$this->nome=$nome;}

	public function getIdGaveta(){return $this->idgaveta;}
	public function setIdGaveta($idgaveta){$this->idgaveta=$idgaveta;}

	public function getGaveta(){return $this->gaveta;}
	public function setGaveta($gaveta){$this->gaveta=$gaveta;}

	public function getIdCamara(){return $this->idcamara;}
	public function setIdCamara($idcamara){$this->idcamara=$idcamara;}

	public function getCamara(){return $this->camara;}
	public function setCamara($camara){$this->camara=$camara;}

	public function getData(){return $this->data;}
	public function setData($data){$this->data=$data;}

	public function getIdCamaraNovo(){return $this->idcamaraNovo;}
	public function setIdCamaraNovo($idcamaraNovo){$this->idcamaraNovo=$idcamaraNovo;}

	
}
?>