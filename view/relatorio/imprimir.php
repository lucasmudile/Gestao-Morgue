<?php

  $depositados="Depositado";
    $mes[1]="Janeiro"; 
    $mes[2]="Fevereiro"; 
    $mes[3]="Março"; 
    $mes[4]="Abril"; 
    $mes[5]="Maio"; 
    $mes[6]="Junho"; 
    $mes[7]="Julho"; 
    $mes[8]="Agosto"; 
    $mes[9]="Setembro"; 
    $mes[10]="Outubro"; 
    $mes[11]="Novembro"; 
    $mes[12]="Dezembro";

  		// $header[1]='';
     $header[1]='mes';
     $header[2]='corpos depositados por mes';
     $header[3]='nº de corpos no deposito';


?>

<table border>	
	<tr>
		<?php foreach ($header as $key => $value): ?>
		<th><?php echo $value;?></th>
		<?php endforeach ?>
	</tr>
</table>
