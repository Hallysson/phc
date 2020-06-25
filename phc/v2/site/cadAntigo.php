<!DOCTYPE html>
<html>
	<head>
		<meta charset="utf-8"/>
		<!--<link rel="stylesheet" href="estilo.css"/>-->
		<!--<link href="//maxcdn.bootstrapcdn.com/font-awesome/4.2.0/css/font-awesome.min.css" rel="stylesheet">-->
		<title>A∴R∴L∴S∴ PHC 01</title>
		<!--<meta name="viewport" content="width=device-width, initial-scale=1"/>-->
		<!--Esta ordem eh importante-->
		<link rel="stylesheet" type="text/css" href="../frameworks/bootstrap/css/bootstrap.min.css">
		<script type="text/javascript" src="../frameworks/jquery-3.1.0.min.js"></script>
		<!--<script type="text/javascript" src="../frameworks/bootstrap/js/bootstrap.min.js"></script>-->
		<script type="text/javascript" src="script.js"></script>
		<script type="text/javascript" src="script_valida_cep.js"></script>
		<script type="text/javascript" src="script_add-listas.js"></script>
	</head>
	<body>
		<?php
			error_reporting(E_ALL);
			ini_set("display_errors", "On");
			session_start();
			$id  = isset($_SESSION['id']) ? $_SESSION['id'] : '';
			$ir  = isset($_SESSION['nomechamado']) ? $_SESSION['nomechamado'] : '';
			
			require 'assets/conexao_bd.php';
			require 'cadObreiro-add.php';
		?>
		<div id="conteudo" class="container-fluid">
			<div>
				<form method="POST" action="." id="form_endereco">
					<div class="panel panel-default">
						<div class="panel-heading">Dados de Endereço</div>
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
							
							<div class="form-group">
								Cidade (lista):
								<select name="cidades" class="btn btn-default dropdown-toggle">
									<?php
										/*
										$sql = $pdo->prepare("SELECT cidade.\"id\", cidade.\"cidade\" FROM auxiliar.\"tblcidade\" AS cidade WHERE estado = '1' ORDER BY cidade");
										$sql->execute();
										if($sql->rowCount()>0){
											echo '<option value=0>Lista de Cidades</option><hr>';
											foreach ($sql->fetchAll() as $resultado) {
												echo '<option value="'.$resultado['id'].'">'.$resultado['cidade'].'</option>';
											}
										}
										*/
									?>
								</select><br/>
							</div>
							<div class="form-group">
								Estado:
								<input type="text" name="uf" class="form-control" id="uf" size="2"/>
							</div>
							
							<div class="form-group">
								Estado (lista):
								<select name="estados" class="btn btn-default dropdown-toggle">
									<?php
										/*
										$sql = $pdo->prepare('SELECT * FROM auxiliar."tblestado" ORDER BY estado');
										$sql->execute();
										if($sql->rowCount()>0){
											echo '<option value=0>Lista de Estados</option><hr>';
											foreach ($sql->fetchAll() as $resultado) {
												echo '<option value="'.$resultado['id'].'">'.$resultado['estado'].'</option>';
											}
										}
										*/
									?>
								</select><br/>
							</div>
							
							<hr>
							<table class="table table-striped table-bordered table-hover table-condensed">
								<div id="tabela-enderecos">
									
									
								</div>

								<?php
									/*
									$sql = $pdo->prepare("SELECT obreiro.\"id\", obreiro.\"logradouro\", obreiro.\"numero\", obreiro.\"complemento\", obreiro.\"bairro\", obreiro.\"cidade\", obreiro.\"uf\" FROM obreiro.\"tblendereco\" AS endereco");
										$sql->execute();
										if($sql->rowCount()>0){
											echo '
												<thead>
													<tr>
														<th>Endereço</th>
														<th>Tipo</th>
													</tr>
												</thead>
												<tbody>
													<tr>
											';
												foreach ($sql->fetchAll() as $resultado) {
													echo '<option value="'.$resultado['id'].'">'.$resultado['logradouro'].'</option>';
												}
											echo '
												</tr>
											</tbody>';
										}
									*/
								?>
								
								<!--
								<thead>
									<tr>
										<th>Endereço</th>
										<th>Tipo</th>
									</tr>
								</thead>
								<tbody>
									<tr>
										<td>Fulano</td>
										<td>da Silva</td>
									</tr>
								</tbody>
								-->
							</table>
						</div>
					</div>
					<div class="panel panel-default">
						<div class="panel-heading">
							<input id="registrarPessoa" class="btn btn-default" type="submit" value="Cadastrar">
						</div>
					</div>
				</form>

				<form method="POST" action=".">
					<div class="panel panel-default">
						<div class="panel-heading">Dados de Contatos</div>
						<div class="panel-body">
							<div class="form-group">
								E-mail do Obreiro:
								<input type="email" name="email" class="form-control"/>
							</div>
							<div class="form-group">
								Celular do Obreiro:
								<input type="text" name="celular" class="form-control"/>
							</div>
							<div class="form-group">
								Pessoa para Contato:
								<input type="text" name="pessoa" class="form-control"/>
							</div>
							<div class="form-group">
								Fone da Pessoa:
								<input type="text" name="fonePessoa" class="form-control"/>
							</div>
						</div>
					</div>

					<div class="panel panel-default">
						<div class="panel-heading">Dados do Obreiro</div>
						<div class="panel-body">
							<div class="form-group">
								Data da Iniciaçao:
								<input type="date" name="iniciacao" class="form-control"/>
							</div>
							<div class="form-group">
								CIM:
								<input type="text" name="cim" class="form-control"/>
							</div>
							<div class="form-group">
								Grau:
								<select name="opcoes" class="btn btn-default dropdown-toggle">
									<?php
										$sql = $pdo->prepare('SELECT * FROM ordem."tblgraumaconico"');
										$sql->execute();
										if($sql->rowCount()>0){
											echo '<option value=0>Lista de Graus</option><hr>';
											foreach ($sql->fetchAll() as $resultado) {
												echo '<option value="'.$resultado['id'].'">'.$resultado['grau'].'</option>';
											}
										}
									?>
								</select><br>
							</div>
						</div>
					</div>
					
					<div class="panel panel-danger">
						<div class="panel-heading">Dados de Saude</div>
						<div class="panel-body">
							<div class="form-group">
								Tipo Sanguineo:
								<select name="tiposangue" class="btn btn-default dropdown-toggle">
									<?php
										$sql = $pdo->prepare('SELECT * FROM auxiliar."tbltiposanguineo" ORDER BY tiposanguineo');
										$sql->execute();
										if($sql->rowCount()>0){
											echo '<option value=0>Lista de Tipos Sanguineos</option><hr>';
											foreach ($sql->fetchAll() as $resultado) {
												echo '<option value="'.$resultado['id'].'">'.$resultado['tiposanguineo'].'</option>';
											}
										}
									?>
								</select><br/>
							</div>
							<div class="form-group">
								Plano de Saude:
								<input type="text" name="planoSaude" class="form-control"/>
							</div>
							<hr/>
							<div class="form-group">
								Problema de Saude:
								<input type="text" name="doenca" class="form-control"/>
							</div>
							<div class="form-group">
								Medicamento de Urgencia:
								<input type="text" name="medicamentourgencia" class="form-control"/>
							</div>
							<div class="form-group">
								Alergia a Medicaçao:
								<input type="text" name="alergiamedicacao" class="form-control"/>
							</div>
						</div>
					</div>

					<div class="panel panel-warning">
						<div class="panel-heading">Dados Profissionais</div>
						<div class="panel-body">
							<div class="form-group">
								Formaçao:
								<input type="text" name="formaçao" class="form-control"/>
							</div>
							<div class="form-group">
								Ultimo Cargo:
								<input type="text" name="ultimoCargo" class="form-control"/>
							</div>
							<div class="form-group">
								Area de Atuaçao:
								<input type="text" name="areaAtuacao" class="form-control"/>
							</div>
							<div class="form-group">
								Esta trabalhando atualmente?
								<input type="text" name="trabalhando" class="form-control"/>
							</div>
							<div class="form-group">
								Linkedin:
								<input type="text" name="linkedin" class="form-control"/>
							</div>
						</div>
					</div>

					<div class="panel panel-default">
						<div class="panel-heading">Dados de Acesso ao Sistema</div>
						<div class="panel-body">
							<div class="form-group">
								Senha:
								<input type="password" name="senha" class="form-control"/>
							</div>
							<div class="form-group">
								Perfil:
								<input type="text" name="perfil" class="form-control"/>
							</div>
							<div class="form-group">
								E-mail:
								<input type="text" name="email" class="form-control"/>
							</div>
						</div>
					</div>
					<div class="panel panel-default">
						<div class="panel-heading">
							<input id="registrar" class="btn btn-default" type="submit" value="Cadastrar">
						</div>
					</div>
				</form>
			</div>
		</div>
	</body>
</html>