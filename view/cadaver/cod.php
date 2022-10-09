<?php
	$sexo=$_REQUEST['sexo'];
	$bi=$_REQUEST['bilhete'];
	$dataNascimento=$_REQUEST['data_nascimento'];
	$residente=$_REQUEST['residente'];
	$nomePai=$_REQUEST['nomePai'];
	$nomeMae=$_REQUEST['nomeMae'];
	$idGrauParentesco=$_REQUEST['grau_parentesco'];
	$testemunhaFamiliar=$_REQUEST['testemunhaFamiliar'];
	$testemunhaResponsavel=$_REQUEST['testemunhaResponsavel'];
	$contacto=$_REQUEST['contacto'];
	$idProveniencia=$_REQUEST['proveniencia'];
	$idGaveta=$_REQUEST['gaveta'];
	$idCamara=$_REQUEST['camara'];


	  $vetor = array(
      'op' => 1,
      'info'=>"ola",
      'nome'=>$nome,
      'Sexo'=>$Sexo,
      'bi'=>$bi,
      'dataNascimento'=>$dataNascimento,
      'residente'=>$residente,
      'contacto'=>$contacto,
      'sexo'=>$sexo,
      'nomePai'=>$nomePai,
      'nomeMae'=>$nomeMae,
      'idGrauParentesco'=>$idGrauParentesco,
      'testemunhaFamiliar'=>$testemunhaFamiliar,
      'testemunhaResponsavel'=>$testemunhaResponsavel,
      'idProveniencia'=>$idProveniencia,
      'idGaveta'=>$idGaveta,
      'idCamara'=>$idCamara,
      'idUsuario'=>$idUsuario);

// else{
    //   $query = $this->conexao->prepare("INSERT INTO cadaver(nome,sexo,data_de_nascimento,residente,nome_do_pai,nome_da_mae,bi,id_grau_parentesco,testemunha_familiar,testemunha_responsavel,
    //       contacto,id_proveniencia_,id_gaveta_,id_usuario_,_id_camara,statu,data_registo) VALUES('$nome','$sexo','$dataNascimento','$residente','$nomePai','$nomeMae','$bi','$idGrauParentesco','$testemunhaFamiliar','$testemunhaResponsavel','$contacto','$idProveniencia','$idGaveta','$idUsuario','$idCamara','Depositado',now())");
    //   if($query->execute()) {
    //     $vetor = array('op' => 1,'info'=>'tudo certo');
    //   }else {
    //     $vetor = array('op' => 2,'info'=>'erro ao cadastrar');
    //   }



	  
      if (mysqli_num_rows($result)>0){
        $vetor = array('op' => 3,'info'=>$result);
        // $vetor = array('op' => 3,'info'=>'erro! este numero de bilhete já está cadastrado');
      }

      else{
        $vetor = array('op' => 3,'info'=>'alerta! este numero de bilhete está disponivel');
      }




?>