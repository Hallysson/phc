<!DOCTYPE html>
<html>
	<head>
		<meta charset="utf-8"/>
		<!--<link rel="stylesheet" href="estilo.css"/>-->
		<!--<link href="//maxcdn.bootstrapcdn.com/font-awesome/4.2.0/css/font-awesome.min.css" rel="stylesheet">-->
		<link rel="stylesheet" type="text/css" href="../frameworks/bootstrap/css/bootstrap.min.css">
		<title>A∴R∴L∴S∴ PHC 01</title>
		<!--<meta name="viewport" content="width=device-width, initial-scale=1"/>-->
	</head>
	<body>
		<?php
			error_reporting(E_ALL);
			ini_set("display_errors", "On");
			session_start();
			$id  = isset($_SESSION['id']) ? $_SESSION['id'] : '';
			$ir  = isset($_SESSION['nomechamado']) ? $_SESSION['nomechamado'] : '';

			require 'cadObreiro-add.php';
			require 'assets/conexao_bd.php';
		?>
		<div id="conteudo" class="container-fluid">
			<div>
				<h1>Saudações Ir∴ <?php echo $ir ?></h1>
				<p>Este cadastro tem como objetivo reunir o máximo de informações sobre o obreiro.</p>
				<p>É importante que todos os campos possíveis sejam preenchidos.</p>
			</div>
			<hr/>

			<div>
				<form method="POST" action="." id="form_endereco" class="form_endereco">
					<div class="panel panel-default">
						<div class="panel-heading container-fluid">
								<div class="head_left col-xs-6">
									Endereço
								</div>
								<div class="head_right col-xs-6" style="text-align: right;">
									<input id="registrarEndereco" class="btn btn-default" type="submit" value="Cadastrar">
								</div>	
						</div>
						<div class="panel-body">
							<div class="form-group">
								Tipo de Endereço:
								<select name="tipoendereco" class="btn btn-default dropdown-toggle">
									
									<?php
										$sql = $pdo->prepare('SELECT * FROM auxiliar."tbltipoendereco" ORDER BY tipoendereco');
										$sql->execute();
										if($sql->rowCount()>0){
											echo '<option disabled="true" value=0>Lista de Tipos de Endereço</option><hr>';
											foreach ($sql->fetchAll() as $resultado) {
												echo '<option value="'.$resultado['id'].'">'.$resultado['tipoendereco'].'</option>';
											}
										}
									?>
									
								</select><br/>
							
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
							<table class="table table-striped table-bordered table-hover table-condensed">
								<div id="tabela-enderecos">
									
									
								</div>
							</table>
						</div>
					</div>
				</form>
				<!--Esta ordem eh importante-->
				<script type="text/javascript" src="../frameworks/jquery-3.1.0.min.js"></script>
				<!--<script type="text/javascript" src="../frameworks/bootstrap/js/bootstrap.min.js"></script>
				<script type="text/javascript" src="script.js"></script>-->
				<script type="text/javascript" src="script_valida_cep.js"></script>
				<!--<script type="text/javascript" src="script_add-listas.js"></script>-->
			</div>
		</div>
	</body>
</html>