<html>
	<head>
		<meta charset="UTF-8">
		<link rel="stylesheet" type="text/css" href="../frameworks/bootstrap/css/bootstrap.min.css">
		<title>A∴R∴L∴S∴ PHC 01</title>
	</head>
	<body>
		<?php
			error_reporting(E_ALL);
			ini_set("display_errors", "On");
			session_start();
			$id  = isset($_SESSION['id']) ? $_SESSION['id'] : '';
			
			//require 'cadObreiro-add.php';
			require '../conexao_bd.php';
		?>
		<div id="conteudo" class="container-fluid">
			<form method="POST" action="." id="form" class="form">

				<div class="panel panel-default">

					<div class="panel-heading">Dados de Endereço</div>

					<div class="panel-body">

						<div class="form-group">
							Tipo de Endereço:
							<select name="tipo_endereco" class="btn btn-default dropdown-toggle">
								
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
						<div id="tabela-enderecos">
							<!--
							<table style="width: 100%" class="table-responsive table table-striped table-bordered table-hover table-condensed">
								<thead>
									<tr>
										<th>Tipo de Endereco</th>
										<th>CEP</th>
										<th>Logradouro</th>
										<th>Numero</th>
										<th>Complemento</th>
										<th>Bairro</th>
										<th>Cidade</th>
										<th>UF</th>
									</tr>
								</thead>
								<tbody>
									<tr>
										<td>Residencial</td>
										<td>03417000</td>
										<td>Serrade Btucatu</td>
										<td>2627</td>
										<td>152A</td>
										<td>Chacara California</td>
										<td>Sao Paulo</td>
										<td>SP</td>
									</tr>
									<tr>
										<td>Residencial</td>
										<td>54430350</td>
										<td>Anibal Ribeiro Varejao</td>
										<td>1167</td>
										<td>152A</td>
										<td>Candeias</td>
										<td>Jaboatao dos Guararapes</td>
										<td>PE</td>
									</tr>
								</tbody>
							</table>
							-->
						</div>
						
						<div class="panel panel-default">
							<div class="panel-heading">
								<input id="registrarPessoa" class="btn btn-default" type="submit" name="Cadastrar"/>
							</div>
						</div>

					</div>
				</div>
			</form>
		</div>
		<script type="text/javascript" src="../frameworks/jquery-3.1.0.min.js"></script>
		<script type="text/javascript" src="../frameworks/bootstrap/css/bootstrap.min.css"></script>	
		<script type="text/javascript" src="../frameworks/JQuery_Plugins/jquery.mask.js"></script>
		<script type="text/javascript" src="../script_valida_cep.js"></script>
		<script type="text/javascript" src="scriptTeste.js"></script>
	</body>
</html>