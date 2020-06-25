
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
				$("#registrarPessoa").click(function(){
					$("#idTeste").html("<div>Teste</div>");
				});
			}
		});
	});