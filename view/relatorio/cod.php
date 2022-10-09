
<?php
$cod='SELECT * FROM view_levantamento WHERE data=2021-06-13 13:55:35';
$cod='SELECT * FROM view_levantamento WHERE data=2021-06-13';
$query="SELECT data_registo FROM cadaver WHERE data_registo>='2021-13-30'";

$query="SELECT data_registo FROM cadaver WHERE data_registo>='2021-04-30' and data_registo<='2021-05-30'";

$por_mes="SELECT data_registo FROM cadaver WHERE MONTH(data_registo)=5";
$por_smes="SELECT * FROM cadaver WHERE MONTH(data_registo)=$relMensal and YEAR(data_registo)=YEAR(CURRENT_DATE)";
$por_mes_ano="SELECT data_registo FROM cadaver WHERE MONTH(data_registo)=5 and YEAR(data_registo)=2021";







foreach ($dados as $key => $value) {
echo '<tr>

<td>'.$value->getNome().'</td>
<td>'.$value->getBi().'</td>
<td>'.$value->getSexo().'</td>
<td>'.$value->getDataNascimento().'</td>
<td>'.$value->getIdProveniencia().'</td>
<td>'.$value->getResidente().' </td>
<td>'.$value->getIdUsuario().'</td>

<td>
<a href="#"  data-toggle="modal" data-target="#ver'.$value->getId().'" class="btn btn-outline-primary"><i class="fas fa-pen-alt"></i></a>
</td>


<td>
<a href="editar.php?id='.$value->getId().'" class="btn btn-outline-secondary"><i class="fas fa-pen"></i></a>
</td>

<td>
<a href="#"  data-toggle="modal" data-target="#delete'.$value->getId().'" class="btn btn-outline-danger"><i class="fas fa-trash-alt"></i></a>
</td>
</tr>';
}

	$doc.='
			<table border="1">
			<tr>
			<th>mes</th>
			<th>corpos depositados por mes</th>
			<th>nº de corpos no deposito</th>
			</tr>';

			foreach ($mes as $key => $value){
				$corpos_depositados_por_mes = "select count(id_cadaver) as num from cadaver where month(data_registo)='$key'";

				$resultado = mysqli_query($conn, $corpos_depositados_por_mes);
				$row = mysqli_fetch_assoc($resultado);
				if ($row['num']!=0 && $row['num']>0 ) {$td=$row['num'];}else{$td="---";}
				// select count(id_cadaver) as num from cadaver where month(data_registo)=6 AND statu="Depositado"
				$corpos_no_deposito = "select count(id_cadaver) as depo from cadaver where month(data_registo)='$key'AND statu='$depositados'";

				$resultado1 = mysqli_query($conn, $corpos_no_deposito);
				$row1 = mysqli_fetch_assoc($resultado1);
				if ($row1['depo']!=0 && $row1['depo']>0 ) {$td1=$row1['depo'];}else{$td1="---";}

				$doc.='<tr>';
				$doc.='<td> '.$value.'</td>';
				$doc.='<td> '.$td.'</td>';
				$doc.='<td> '.$td1.'</td>';
				$doc.='</tr>';
			}
		
	
		$doc.='</table>';
?>