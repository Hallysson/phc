<!DOCTYPE html>
<html>
	<head>
		<meta charset="utf-8"/>
        <link rel="stylesheet" href="estilo.css"/>
		<title>A.'.R.'.L.'.S.'. PHC 01</title>
		<meta name="viewport" content="width=device-width, initial-scale=1"/>
		<!--Esta ordem eh importante-->
		<link rel="stylesheet" type="text/css" href="../frameworks/bootstrap/css/bootstrap.min.css">
		<script type="text/javascript" src="../frameworks/jquery-3.1.0.min.js"></script>
		<script type="text/javascript" src="../frameworks/bootstrap/js/bootstrap.min.js"></script>
	</head>
	<body>
		<?php
			session_start();
			$ir = $_SESSION['login'];
			if(! isset($_SESSION['id']) || empty($_SESSION['id']) == true){
				header("Location: login.php");
			}
		?>
		<div class="container-fluid">
			<div class="topo">
				<div class="topoint">
					<div  id="col-topoleft" class="col-sm-10">
						<h4><small>A∴R∴L∴S∴ </small></br>Paz, Harmonia e Concordia nº. 1</h4>
					</div>
					<div id="col-toporight" class="col-sm-2">
						<div class="dropdown">
							<button class="btn btn-primary dropdown-toggle" data-toggle="dropdown"> 
								<?php
									echo "Ir∴ ".$ir;
								?> 
								<span class="caret"></span>
							</button>
							<ul class="dropdown-menu">
								<li class="dropdown-header">Comunicaçao</li>
								<li class="disabled"><a href="#">Novas Msgs</a></li>
								<li class="divider"></li>
								<li class="dropdown-header">Sistema</li>
								<li class="disabled"><a href="#">Ajuda</a></li>
								<li class="disabled"><a href="#">Sair</a></li>
							</ul>
						</div>
					</div>
				</div>
			</div>


			<header role="banner" class="navbar navbar-fixed-top navbar-inverse">
				<div class="container">
					<div class="navbar-header">
						<button data-toggle="collapse-side" data-target=".side-collapse" data-target-2=".side-collapse-container" type="button" class="navbar-toggle pull-left"><span class="icon-bar"></span><span class="icon-bar"></span><span class="icon-bar"></span></button>
					</div>
					<div class="navbar-inverse side-collapse in">
						<nav role="navigation" class="navbar-collapse">
							<ul class="nav navbar-nav">
								<li><a href="#Home">Home</a></li>
								<li><a href="#users">Users</a></li>
								<li><a href="http://placesforlove.com">Places</a></li>
							</ul>
						</nav>
					</div>
				</div>
			</header>
			<div class="container side-collapse-container">
				<div class="row">
					<h1>Olá</h1>
					<p>Esta é uma demonstração de navegação de abertura lateral</p>
					<p>Faça o seu browser menor eo menu superior se transformará em um menu deslizante lateral</p>
				</div>
			</div>
			
			<!-- Teste -->
			<div id="col-menu" class="col-sm-4">
				
			

				<!--
				<div class="dropdown">
					<button class="btn btn-default dropdown-toggle" data-toggle="dropdown">Menu <span class="caret"></span></button>
					<ul class="dropdown-menu">
						<li class="dropdown-header">A Obediencia</li>
						<li class="disabled"><a href="#">Sobre o G∴O∴M∴B∴ <span class="label label-warning">breve</span></a></li>
						<li class="divider"></li>

						<li class="dropdown-header">O Rito</li>
						<li class="disabled"><a href="#">Sobre o Rito Emulation <span class="label label-warning">breve</span></a></li>
						<li class="divider"></li>

						<li><a href="#n2-3" data-toggle="collapse">A Loja<a></li>
							<div id="n2-3" class="collapse out">
								<ul>
									<li class="disabled"><a href="#">Sobre a PHC <span class="label label-warning">breve</span></a></li>
									<li class="disabled"><a href="#">Galeria de fotos dos Fundadores <span class="label label-warning">breve</span></a></li>
									<li class="disabled"><a href="#">Integrantes <span class="label label-warning">breve</span></a></li>
									<li class="disabled"><a href="#">Agenda de Eventos <span class="label label-warning">breve</span></a></li>
									<li class="disabled"><a href="#">Galeria de Fotos das Oficinas <span class="label label-warning">breve</span></a></li>
									<li class="disabled"><a href="#">Contato <span class="label label-warning">breve</span></a></li>
								</ul>
							</div>
						<li class="divider"></li>

						<li><a href="#n2-4" data-toggle="collapse">A Comissao de Benemerencia</a></li>
							<div id="n2-4" class="collapse out">
								<ul>
									<li class="disabled"><a href="#">Sobre a Comissao <span class="label label-warning">breve</span></a></li>
									<li class="disabled"><a href="#">Campanhas <span class="label label-warning">breve</span></a></li>
									<li class="disabled"><a href="#">Instituiçoes Apoiadas <span class="label label-warning">breve</span></a></li>
									<li class="disabled"><a href="#">Estatisticas <span class="label label-warning">breve</span></a></li>
								</ul>
							</div>
						<li class="divider"></li>

						<li><a href="#n2-5" data-toggle="collapse">A Comissao de Iniciaçao</a></li>
							<div id="n2-5" class="collapse out">
								<ul>
									<li class="disabled"><a href="#">Sobre a Comissao <span class="label label-warning">breve</span></a></li>
									<li class="disabled"><a href="#">Regras para a Sindicancia <span class="label label-warning">breve</span></a></li>
									<li class="disabled"><a href="#">Galeria de Fotos dos Iniciados <span class="label label-warning">breve</span></a></li>
								</ul>
							</div>
						<li class="divider"></li>

						<li><a href="#n2-6" data-toggle="collapse">A Comissao de Ritualistica</a></li>
						<div id="n2-6" class="collapse out">
							<ul>
								<li class="disabled"><a href="#">Sobre a Comissao <span class="label label-warning">breve</span></a></li>
								<li class="disabled"><a href="#">Sobre a Ritualistica <span class="label label-warning">breve</span></a></li>
							</ul>
						</div>
						<li class="divider"></li>

						<li><a href="#n2-7" data-toggle="collapse">A Comissao de Finanças</a></li>
						<div id="n2-7" class="collapse out">
							<ul>
								<li class="disabled"><a href="#">Sobre a Comissao <span class="label label-warning">breve</span></a></li>
								<li class="disabled"><a href="#">Contabilidade da Loja <span class="label label-warning">breve</span></a></li>
								<li class="disabled"><a href="#">Prestaçao de Contas <span class="label label-warning">breve</span></a></li>
							</ul>
						</div>
						<li class="divider"></li>

						<li><a href="#n2-8" data-toggle="collapse">O Obreiro</a></li>
						<div id="n2-8" class="collapse out">
							<ul>
								<li class="disabled"><a href="#">Sobre o Obreiro <span class="label label-warning">breve</span></a></li>
								<li><a href="#">Cadastro de Obreiros <span class="label label-info">novo</span></a></li>
								<li class="disabled"><a href="#">Consultar Pagamento <span class="label label-warning">breve</span></a></li>
								<li class="disabled"><a href="#">Consultar Frequencia <span class="label label-warning">breve</span></a></li>
							</ul>
						</div>
						<li class="divider"></li>

						<li><a href="#n2-9" data-toggle="collapse">Documentos</a></li>
						<div id="n2-9" class="collapse out">
							<ul>
								<li class="disabled"><a href="#">Incluir documentos <span class="label label-warning">breve</span></a></li>
								<li class="disabled"><a href="#">Incluir documentos <span class="label label-warning">breve</span></a></li>
							</ul>
						</div>
					</ul>
				</div>
				-->
			</div>
			<div id="col-conteudo" class="col-sm-8">
				Conteudo
				<hr/>

				<div class="row">
					<div class="col-sm-6">
						<div class="panel panel-info">
							<div class="panel-heading">Dados Pessoais</div>
							<div class="panel-body">
								<form method="POST">
									Nome do Obreiro:<br/>
									<input type="text" name="nome"/><br/><br/>
									Senha:<br/>
									<input type="password" name="senha"/><br/><br/>
									Perfil:<br/>
									<input type="text" name="perfil"/><br/><br/>
									E-mail:<br/>
									<input type="text" name="email"/><br/><br/>
									<input type="submit" value="Cadastrar">
								</form>
							</div>
						</div>
					</div>
					<div class="col-sm-6">
						<div class="panel panel-danger">
							<div class="panel-heading">Dados de Contatos</div>
							<div class="panel-body">Conteudos aqui</div>
						</div>
					</div>
					<div class="col-sm-6">
						<div class="panel panel-danger">
							<div class="panel-heading">Dados de Saude</div>
							<div class="panel-body">Conteudos aqui</div>
						</div>
					</div>
					<div class="col-sm-6">
						<div class="panel panel-danger">
							<div class="panel-heading">Dados Profissionais</div>
							<div class="panel-body">Conteudos aqui</div>
						</div>
					</div>
					<div class="col-sm-6">
						<div class="panel panel-danger">
							<div class="panel-heading">Dados de Acesso ao Sistema</div>
							<div class="panel-body">Conteudos aqui</div>
						</div>
					</div>
					<div class="col-sm-6">
						<div class="panel panel-danger">
							<div class="panel-heading">Dados de Acesso ao Sistema</div>
							<div class="panel-body">Conteudos aqui</div>
						</div>
					</div>
				</div>

			</div>
	</body>
</html>