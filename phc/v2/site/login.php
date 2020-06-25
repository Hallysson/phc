<!DOCTYPE html>
<html>
	<head>
		<meta charset="utf-8"/>
		<link rel="stylesheet" href="login.css"/>
		<title>A∴R∴L∴S∴ PHC 01 - [Login]</title>
		<link rel="stylesheet" type="text/css" href="../frameworks/bootstrap/css/bootstrap.min.css">
	</head>
	<body>
		<?php
			error_reporting(E_ALL);
			ini_set("display_errors", "On");
			session_start();
			
			if(isset($_POST['cim']) && empty($_POST['cim']) == false){
				$cim = addslashes($_POST['cim']);
				$senha = md5(addslashes($_POST['senha']));

				require 'assets/conexao_bd.php';

				try{
					$pdo = new PDO($dsn, $dbuser, $dbpass);

					$sql = $pdo->query("SELECT pessoas.\"id\", obreiros.\"cim\", pessoas.\"nomechamado\" FROM obreiro.\"tblobreiro\" AS obreiros INNER JOIN obreiro.\"tblpessoas\" pessoas ON pessoas.\"id\" = obreiros.\"idpessoa\" WHERE obreiros.\"cim\" = '$cim' AND pessoas.\"senha\" = '$senha';");
						print_r($sql);
					if($sql->rowCount() > 0){
						$dado = $sql->fetch();

						$_SESSION['id'] = $dado['id'];
						$_SESSION['cim'] = $dado['cim'];
						$_SESSION['nomechamado'] = $dado['nomechamado'];

						header("Location: menu.php");
					}
				}catch(PDOException $e){
					echo "Conexao falhou: ".$e->getMessage();
				}
			}
		?>
		<div  id="formulario" class="container-fluid panel panel-default">
			<div class="panel-body">
				<form method="POST">
					<div class="form-group">
						CIM:<br/>
						<input type="text" name="cim" class="form-control"/>
					</div>
					<div class="form-group">
						Senha:<br/>
						<input type="password" name="senha" class="form-control"/>
					</div>
					<input id="entrar" class="btn btn-default" type="submit" value="Entrar">
				</form>
			</div>
		</div>
	</body>
</html>