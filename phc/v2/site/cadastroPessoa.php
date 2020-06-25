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
			//session_start();
			$id  = isset($_SESSION['id']) ? $_SESSION['id'] : '';
			$cim = isset($_SESSION['cim']) ? $_SESSION['cim'] : '';
			$ir  = isset($_SESSION['nomechamado']) ? $_SESSION['nomechamado'] : '';

			require 'assets/conexao_bd.php';
		?>
		<div id="conteudo" class="container-fluid">
			<div>
				<form method="POST" action="cadPessoa-add.php">
					<div class="panel panel-default">
						<?php
							
							$sql = "SELECT * FROM obreiro.tblpessoas AS pessoa WHERE id = '$id'";
							$sql = $pdo->query($sql);
							
							if($sql->rowCount() > 0){
								$dado = $sql->fetch();
							}
							
							if($sql->rowCount()>0){
								foreach ($sql->fetch() as $resultado) {
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
									Dados Pessoais
								</div>
								<div class="topo_right col-xs-6" style="text-align: right;">
									<input id="registrarPessoa" class="btn btn-default" type="submit" value="Cadastrar">
								</div>
						</div>
						
						<div class="panel-body">
							<div class="form-group">
								Nome completo:
								<input type="text" name="nome" class="form-control" <?php echo "value ='$nome'" ?>/> <!--value ="<?php echo $nome ?>"-->
							</div>
							<div class="form-group">
								Nome de Tratamento:
								<input type="text" name="nomechamado" class="form-control" /> <!--value ="<?php echo $nomechamado ?>"-->
							</div>
							<div class="form-group">
								Data de Nascimento:
								<input type="date" name="dtnascimento" class="form-control" /> <!--value ="<?php echo $dtnascimento ?>"-->
							</div>
							<div class="form-group">
								Tipo Sanguineo: 
								<br/>
								<select name="idtiposanguineo" class="btn btn-default dropdown-toggle">
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
								<input type="text" name="planosaude" class="form-control" /> <!--value ="<?php echo $planosaude ?>"-->
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