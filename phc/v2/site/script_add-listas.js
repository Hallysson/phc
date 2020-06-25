$(function(){

	$('#form').bind('submit', function(envio){
		envio.preventhefault();
		
		var txt = $(this).serialize();
		console.log(txt);

		$.ajax({
			type: 'POST',
			url: 'json.php',
			data: txt,
			dataType: 'json',
			success: function(json){
				/*
				alert("Meu nome eh: "+json.nome+" e tem +"+json.qt_nome+" caracteres");
				*/
				console.log(json);
				/*
				$('#tabela-enderecos').html("<thead<th><th>Tipo de Endereco</th><th>CEP</th><th>Logradouro</th><th>Numero</th><th>Complemento</th><th>Bairro</th><th>Cidade</th><th>UF</th></th></thead>");
				$('#tabela-enderecos').html("<tbody<td><td>"+json.tipoendereco+"</td><td>"+json.cep+"</td><td>"+json.logradouro+"</td><td>"+json.numero+"</td><td>"+json.complemento+"</td><td>"+json.bairro+"</td><td>"+json.cidade+"</td><td>"+json.uf+"</td></td></tbody>");
				*/
			}
		});

	});
	
});