$(document).ready(function()
{
	$('#cadaver').submit(function(e) {
		e.preventDefault();
		var bi=$('#bilhete').val(),
			nome=$('#nome').val(),
			data_nascimento=$('#data_nascimento').val(),
			residente=$('#residente').val(),
			sexo=$('#sexo').val(),
			nomeMae=$('#nomeMae').val(),
			nomePai=$('#nomePai').val(),
			grau_parentesco=$('#grau_parentesco').val(),
			contacto=$('#contacto').val(),
			testemunhaFamiliar=$('#testemunhaFamiliar').val(),
			testemunhaResponsavel=$('#testemunhaResponsavel').val(),
			proveniencia=$('#proveniencia').val(),
			camara=$('#camara').val(),
			gaveta=$('#gaveta').val();
		// alert('ola');
		if (bi=='') {
			alert('numero de bi obrigatório');
		}else {
			// alert(bi);
			$.ajax({
			type:'post',    //Definimos o método HTTP usado
			dataType: 'json', //Definimos o tipo de retorno
			url: 'api.php?op=create',
			data: $(this).serialize(),
			success: function(dados){
		        if (dados.op==1) {
		     		alert('Nº de bi disponível');
		        }else if (dados.op==2) {
		        	alert('o nº de bi já existe!');
		        }else if (dados.op==3) {
		        	
		        }
		        else{
		     		alert('erro!');
		        }
		    }
		});
		}
		
	});
});

