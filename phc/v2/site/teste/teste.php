<!DOCTYPE html>
<html>
	<head>
		<link rel="stylesheet" type="text/css" href="../frameworks/bootstrap/css/bootstrap.min.css">
		<title></title>
	</head>
	<body>
		<div id="conteudo" class="container-fluid">
			<form method="POST" action="." id="form" class="form">

				<div class="panel panel-default">

					<div class="panel-heading">Dados de Endereço</div>

					<div class="panel-body">

						<div class="form-group">
							Tipo de Endereço:
							<select name="form_endereco" class="btn btn-default dropdown-toggle">

							</select>
						</div>

						<div class="form-group">
							CEP:
							<input type="text" name="cep" class="form-control" id="cep" value="" size="10" maxlength="9"/>
						</div>

						<hr>

						<div class="form-group">
							Logradouro:
							<input type="text" name="logradouro" class="form-control" id="logradouro" size="80"/>
						</div>

						<div class="form-group">
							Numero:
							<input type="text" name="numero" class="form-control"/>
						</div>

						<div class="form-group">
							complemento:
							<input type="text" name="complemento" class="form-control"/>
						</div>

						<div class="form-group">		
							Bairro:
							<input type="text" name="bairro" class="form-control" id="bairro" size="50"/>
						</div>

						<div class="form-group">
							Cidade:
							<input type="text" name="cidade" class="form-control" id="cidade" size="120"/>
						</div>

						<hr>
					</div>
				</div>
				<div id="idTeste">

				</div>
				<input id="registrarPessoa" class="btn btn-default" type="submit" name="Cadastrar"/>
			</form>
		</div>
		<script type="text/javascript" src="../frameworks/jquery-3.1.0.min.js"></script>
		<script type="text/javascript" src="../script_valida_cep.js"></script>
		<script type="text/javascript" src="testeScript.js"></script>
	</body>
</html>