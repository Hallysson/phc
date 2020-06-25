<html>
	<head>
		<meta charset="UTF-8">
        <link rel="stylesheet" href="estilo.css"/>
		<title>Curso de JQuery Completo</title>
	</head>
	<body>
		<form method="POST" id="form" class="form">

				Tipo de Endereço:
				<select name="tipoendereco" class="btn btn-default dropdown-toggle">

				</select><br/><br/>


				CEP:
				<input type="text" name="cep" class="form-control" id="cep" value="" size="10" maxlength="9"/><br/><br/>

			<hr>

				Logradouro:
				<input type="text" name="logradouro" class="form-control" id="logradouro" size="80"/><br/><br/>

				Numero:
				<input type="text" name="numero" class="form-control"/><br/><br/>

				complemento:
				<input type="text" name="complemento" class="form-control"/><br/><br/>

				Bairro:
				<input type="text" name="bairro" class="form-control" id="bairro" size="50"/><br/><br/>

				Cidade:
				<input type="text" name="cidade" class="form-control" id="cidade" size="120"/><br/><br/>
			<hr>
			<table class="table table-striped table-bordered table-hover table-condensed"><br/><br/>
				<div id="tabela-enderecos">
					
					
				</div>
			</table>

			<input id="registrarPessoa" class="btn btn-default" type="submit" name="Cadastrar"/>


		</form>
		<!--Esta ordem eh importante-->
		<script type="text/javascript" src="../frameworks/jquery-3.1.0.min.js"></script>
		<!--<script type="text/javascript" src="../frameworks/bootstrap/js/bootstrap.min.js"></script>
		<script type="text/javascript" src="script.js"></script>-->
		<script type="text/javascript" src="script_valida_cep.js"></script>
		<script type="text/javascript" src="script_add-listas.js"></script>
	</body>
</html>