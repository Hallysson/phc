$(function(){
	
	$('#cep').mask('00000-000');

	$('#form').bind('submit', function(envio){
		envio.preventDefault();

		var txt = $(this).serialize();
		console.log(txt);

		$.ajax({
			type: 'POST',
			url: 'ajax.php',
			data: txt,
			dataType: 'json',
			success: function(json){
				console.log(json.satus);
				$("#registrarPessoa").click(function(){
					/*
					$("#tabela-enderecos").html("<div>Teste</div>");
					*/
					$("#tabela-enderecos").html("<table style='width: 100%' class='table-responsive table table-striped table-bordered table-hover table-condensed'><thead><tr><th>Tipo de Endereco</th><th>CEP</th><th>Logradouro</th><th>Numero</th><th>Complemento</th><th>Bairro</th><th>Cidade</th><th>UF</th></tr></thead></table>");
					/*
					$("#tabela-enderecos").html("<table style='width: 100%' class='table-responsive table table-striped table-bordered table-hover table-condensed'><tbody><tr><td>"+json.tipoendereco+"</td><td>"+json.cep+"</td><td>"+json.logradouro+"</td><td>"+json.numero+"</td><td>"+json.complemento+"</td><td>"+json.bairro+"</td><td>"+json.cidade+"</td><td>"+json.uf+"</td></tr></tbody></table>");
					
					$("#tabela-enderecos").html("<table style='width: 100%' class='table-responsive table table-striped table-bordered table-hover table-condensed'><thead><tr><th>Tipo de Endereco</th><th>CEP</th><th>Logradouro</th><th>Numero</th><th>Complemento</th><th>Bairro</th><th>Cidade</th><th>UF</th></tr></thead><tbody><tr><td>Residencial</td><td>03417000</td><td>Serrade Btucatu</td><td>2627</td><td>152A</td><td>Chacara California</td><td>Sao Paulo</td><td>SP</td></tr><tr></tbody></table>");
					*/
				});
			}
		});

	});
	
});