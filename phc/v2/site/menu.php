<!DOCTYPE html>
<html>
	<head>
		<meta charset="utf-8"/>
		<link rel="stylesheet" href="estilo/estilo.css"/>
		<link href="//maxcdn.bootstrapcdn.com/font-awesome/4.2.0/css/font-awesome.min.css" rel="stylesheet">
		<title>A∴R∴L∴S∴ PHC 01</title>
		<meta name="viewport" content="width=device-width, initial-scale=1"/>
		<!--Esta ordem eh importante-->
		<link rel="stylesheet" type="text/css" href="../frameworks/bootstrap/css/bootstrap.min.css">
		<script type="text/javascript" src="../frameworks/jquery-3.1.0.min.js"></script>
		<script type="text/javascript" src="../frameworks/bootstrap/js/bootstrap.min.js"></script>
		<script type="text/javascript" src="assets/script.js"></script>
	</head>
	<body>
		<?php
			error_reporting(E_ALL);
			ini_set("display_errors", "On");

			require 'assets/conexao_bd.php';
			session_start();
			$id  = isset($_SESSION['id']) ? $_SESSION['id'] : '';
			$cim = isset($_SESSION['cim']) ? $_SESSION['cim'] : '';
			$ir  = isset($_SESSION['nomechamado']) ? $_SESSION['nomechamado'] : '';

			if(! isset($_SESSION['id']) || empty($id) == true){
				header("Location: login.php");
			}
		?>
		<!--
				<nav class="navbar navbar-inverse navbar-fixed-top">
					<div class="container-fluid">
						<div class="navbar-header">
							<a href="" class="navbar-brand">3asolucoes.com.br</a>
						</div>
						<ul class="nav navbar-nav">
							<li><a href="">Home</a></li>
							<li class="dropdown">
								<a href="" class="dropdown-toggle" data-toggle="dropdown">Empresa <span class="caret"></span></a>
								<ul class="dropdown-menu">
									<li><a href="">Estrutura</a></li>
									<li><a href="">Cultura</a></li>
									<li><a href="">Carreira</a></li>
								</ul>
							</li>
							<li><a href="">Contato</a></li>
						</ul>
						<ul class="nav navbar-nav navbar-right">
							<li><a href="">Login</a></li>
						</ul>
					</div>
				</nav>
		-->
		<div id="menu" class="nav-side-menu">
			<div class="brand">
				<img id="imagem-menu" src="imagens/maconaria01.png">
				<h4><small>A∴R∴L∴S∴ </small></br>Paz, Harmonia e Concordia nº. 1</h4>
			</div>
			<i class="fa fa-bars fa-2x toggle-btn" data-toggle="collapse" data-target="#menu-content"></i>
			<div class="menu-list">
				<?php
					error_reporting(E_ALL);
					ini_set("display_errors", "On");

					$sql = $pdo->prepare('SELECT *, span[1] span1, span[2] span2, cardinality(nivel) qtd FROM admin."tblmenus" ORDER BY id');
					$sql->execute();
					if($sql->rowCount()>0){
						$nivelAnterior = 0;
						foreach ($sql->fetchAll() as $resultado) {
							if($nivelAnterior < $resultado['qtd']){
								echo '
								<ul id="'.$resultado['idul'].'" class="'.$resultado['classeul'].'">';
							}elseif($nivelAnterior > $resultado['qtd']){
								while ($nivelAnterior > $resultado['qtd']) {
									$nivelAnterior -= 1;
									echo '	</ul>
									';
								}
							}

							if($resultado['target'] == "#perfil"){
								$menu = $ir;
							} else {
								$menu =  $resultado['menu'];
							}

							echo '
								<li id="'.$resultado['idli'].'" class="'.$resultado['classeli'].'" data-toggle="'.$resultado['toggle'].'" data-target="'.$resultado['target'].'">
									<a href="'.$resultado['href'].'"><i class="'.$resultado['icone'].'"></i> '.$menu.' <span class="'.$resultado['span1'].'"><i class="'.$resultado['span2'].'" id="icone-span"></i></span></a>
								</li>
							';

							$nivelAnterior = $resultado['qtd'];
						}

						echo '</ul>';
					}
				?>
			</div>
		</div>

		<div id="area-conteudo">

		</div>
	</body>
</html>