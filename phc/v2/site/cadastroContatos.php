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
				<form method="POST" action=".">
					<div class="panel panel-default">
						<?php
							$sql = $pdo->prepare("SELECT * FROM obreiro.tblpessoas AS pessoa WHERE id = '$id'");
							$sql->execute();
							
							if($sql->rowCount()>0){
								foreach ($sql->fetchAll() as $resultado) {
									$nome = $resultado['nome'];
									$nomechamado = $resultado['nomechamado'];
									$dtnascimento = $resultado['dtnascimento'];
									$idtiposanguineo = $resultado['idtiposanguineo'];
									$planosaude = $resultado['planosaude'];
								}
							}
							
						?>
						<div class="panel-heading container-fluid">
								<div class="topo_left col-xs-6">
									Contatos
								</div>
								<div class="topo_right col-xs-6" style="text-align: right;">
									<input id="registrarContato" class="btn btn-default" type="submit" value="Cadastrar">
								</div>
						</div>
						
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
					
				</form>

				<!--Esta ordem eh importante-->
				<script type="text/javascript" src="../frameworks/jquery-3.1.0.min.js"></script>
				<!--<script type="text/javascript" src="../frameworks/bootstrap/js/bootstrap.min.js"></script>
				<script type="text/javascript" src="script.js"></script>-->
				<!--<script type="text/javascript" src="script_add-listas.js"></script>-->
			</div>
		</div>
	</body>
</html>