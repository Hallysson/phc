<!DOCTYPE html>
<html>
	<head>
		<meta charset="utf-8"/>
		<link rel="stylesheet" href="estilo.css"/>
		<link href="//maxcdn.bootstrapcdn.com/font-awesome/4.2.0/css/font-awesome.min.css" rel="stylesheet">
		<title>A∴R∴L∴S∴ PHC 01</title>
		<meta name="viewport" content="width=device-width, initial-scale=1"/>
		<!--Esta ordem eh importante-->
		<link rel="stylesheet" type="text/css" href="../frameworks/bootstrap/css/bootstrap.min.css">
		<script type="text/javascript" src="../frameworks/jquery-3.1.0.min.js"></script>
		<script type="text/javascript" src="../frameworks/bootstrap/js/bootstrap.min.js"></script>
		<script type="text/javascript" src="../assets/script.js"></script>
	</head>
	<body>
		<?php
			require '../assets/conexao_bd.php';
			session_start();
			$ir = $_SESSION['nomechamado'];
			if(! isset($_SESSION['id']) || empty($_SESSION['id']) == true){
				header("Location: login.php");
			}
		?>
		<div id="menu" class="nav-side-menu">
			<div class="brand">
				<img id="imagem-menu" src="imagens/maconaria01.png">
				<h4><small>A∴R∴L∴S∴ </small></br>Paz, Harmonia e Concordia nº. 1</h4>
			</div>
			<i class="fa fa-bars fa-2x toggle-btn" data-toggle="collapse" data-target="#menu-content"></i>
			<div class="menu-list">
				-----------------------------------------------------------------------
			
				<?php
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
							echo '
									<li id="'.$resultado['idli'].'" class="'.$resultado['classeli'].'" data-toggle="'.$resultado['toggle'].'" data-target="'.$resultado['target'].'">
										<a href="'.$resultado['href'].'"><i class="'.$resultado['icone'].'"></i> '.$resultado['menu'].' <span class="'.$resultado['span1'].'"></span></a>
									</li>
							';
							$nivelAnterior = $resultado['qtd'];
						}

						echo '</ul>';
					}
				?>
			
				<!--
				<ul id="menu-content" class="menu-content collapse out">
					<li id="" class="collapsed" data-toggle="collapse" data-target="#obediencia">
						<a href="#"><i class="fa fa-institution fa-lg"></i> A Obediencia <span class="arrow"></span></a>
					</li> 
						
						<ul id="obediencia" class="sub-menu collapse">
							<li id="" class="" data-toggle="" data-target="">
								<a href="#">Sobre o G∴O∴M∴B∴ <span class="label label-warning"><i class="fa fa-unlock-alt fa-lg"></i></span></a>
							</li>
						</ul>

					<li id="" class="collapsed" data-toggle="collapse" data-target="#rito">
						<a href="#"><i class="fa fa-fire fa-lg"></i> O Rito <span class="arrow"></span></a>
					</li>
						<ul id="rito" class="sub-menu collapse">
							<li id="" class="" data-toggle="" data-target="">
								<a href="#">Sobre o Rito Emulation <span class="label label-warning"><i class="fa fa-unlock-alt fa-lg"></i></span></a>
							</li>
							<li id="" class="" data-toggle="" data-target="">
								<a href="#">O Ritual <span class="label label-warning"><i class="fa fa-unlock-alt fa-lg"></i></span></a>
							</li>
						</ul>

					<li id="" class="collapsed" data-toggle="collapse" data-target="#loja">
						<a href="#"><i class="fa fa-gavel fa-lg"></i> A Loja <span class="arrow"></span></a>
					</li>  
						<ul id="loja" class="sub-menu collapse">
							<li id="" class="" data-toggle="" data-target="">
								<a href="#">Sobre a PHC <span class="label label-warning"><i class="fa fa-unlock-alt fa-lg"></i></span></a>
							</li>
							<li id="" class="" data-toggle="" data-target="">
								<a href="#">Integrantes <span class="label label-warning"><i class="fa fa-unlock-alt fa-lg"></i></span></a>
							</li>
							<li id="" class="" data-toggle="" data-target="">
								<a href="#"><i class="fa fa-sun-o fa-lg"></i> As Luzes <span class="label label-warning"><i class="fa fa-unlock-alt fa-lg"></i></span></a>
							</li>
							<li id="" class="" data-toggle="" data-target="">
								<a href="#">Agenda de Eventos <span class="label label-warning"><i class="fa fa-unlock-alt fa-lg"></i></span></a>
							</li>
							<li id="" class="" data-toggle="" data-target="">
								<a href="#">Galeria de Fotos dos Fundadores <span class="label label-warning"><i class="fa fa-unlock-alt fa-lg"></i></span></a>
							</li>
							<li id="" class="" data-toggle="" data-target="">
								<a href="#">Galeria de Fotos das Oficinas <span class="label label-warning"><i class="fa fa-unlock-alt fa-lg"></i></span></a>
							</li>
							<li id="" class="" data-toggle="" data-target="">
								<a href="#">Contato <span class="label label-warning"><i class="fa fa-unlock-alt fa-lg"></i></span></a>
							</li>
							<li id="" class="" data-toggle="" data-target="">
								<a href="#">Fale com o V∴M∴ <span class="label label-warning"><i class="fa fa-unlock-alt fa-lg"></i></span></a>
							</li>
						</ul>

					<li id="" class="collapsed" data-toggle="collapse" data-target="#comissoes">
						<a href="#"><i class="fa fa-users fa-lg"></i> As Comissoes <span class="arrow"></span></a>
					</li>
						<ul id="comissoes" class="sub-menu collapse">
							<li id="" class="collapsed" data-toggle="collapse" data-target="#benemerencia">
								<a href="#"><i class="fa fa-heart fa-lg"></i> A Comissao de Benemerencia <span class="arrow"></span></a>
							</li>
							<ul id="benemerencia" class="sub-menu-n3 collapse">
								<li id="" class="" data-toggle="" data-target="">
									<a href="#">Sobre a Comissao <span class="label label-warning"><i class="fa fa-unlock-alt fa-lg"></i></span></a>
								</li>
								<li id="" class="" data-toggle="" data-target="">
									<a href="#">Campanhas <span class="label label-warning"><i class="fa fa-unlock-alt fa-lg"></i></span></a>
								</li>
								<li id="" class="" data-toggle="" data-target="">
									<a href="#">Instituiçoes Apoiadas <span class="label label-warning"><i class="fa fa-unlock-alt fa-lg"></i></span></a>
								</li>
								<li id="" class="" data-toggle="" data-target="">
									<a href="#">Galeria de Fotos <span class="label label-warning"><i class="fa fa-unlock-alt fa-lg"></i></span></a>
								</li>
								<li id="" class="" data-toggle="" data-target="">
									<a href="#">Estatisticas <span class="label label-warning"><i class="fa fa-unlock-alt fa-lg"></i></span></a>
								</li>
								<li id="" class="" data-toggle="" data-target="">
									<a href="#">Fale com a Comissao <span class="label label-warning"><i class="fa fa-unlock-alt fa-lg"></i></span></a>
								</li>
			                </ul>

							<li id="" class="collapsed" data-toggle="collapse" data-target="#iniciacao">
								<a href="#"><i class="fa fa-plus fa-lg"></i> A Comissao de Iniciaçao <span class="arrow"></span></a>
							</li>
							<ul id="iniciacao" class="sub-menu-n3 collapse">
								<li id="" class="" data-toggle="" data-target="">
									<a href="#">Sobre a Comissao <span class="label label-warning"><i class="fa fa-unlock-alt fa-lg"></i></span></a>
								</li>
								<li id="" class="" data-toggle="" data-target="">
									<a href="#">Regras da Sindicancia <span class="label label-warning"><i class="fa fa-unlock-alt fa-lg"></i></span></a>
								</li>
								<li id="" class="" data-toggle="" data-target="">
									<a href="#">Galeria de Fotos <span class="label label-warning"><i class="fa fa-unlock-alt fa-lg"></i></span></a>
								</li>
								<li id="" class="" data-toggle="" data-target="">
									<a href="#">Fale com a Comissao <span class="label label-warning"><i class="fa fa-unlock-alt fa-lg"></i></span></a>
								</li>
							</ul>

							<li id="" class="collapsed" data-toggle="collapse" data-target="#ritualistica">
								<a href="#"><i class="fa fa-book fa-lg"></i> A Comissao de Ritualistica <span class="arrow"></span></a>
							</li>
							<ul id="ritualistica" class="sub-menu-n3 collapse">
								<li id="" class="" data-toggle="" data-target="">
									<a href="#">Sobre a Comissao <span class="label label-warning"><i class="fa fa-unlock-alt fa-lg"></i></span></a>
								</li>
								<li id="" class="" data-toggle="" data-target="">
									<a href="#">Sobre a Ritualistica <span class="label label-warning"><i class="fa fa-unlock-alt fa-lg"></i></span></a>
								</li>
								<li id="" class="" data-toggle="" data-target="">
									<a href="#">Fale com a Comissao <span class="label label-warning"><i class="fa fa-unlock-alt fa-lg"></i></span></a>
								</li>
							</ul>

							<li id="" class="collapsed" data-toggle="collapse" data-target="#financas">
								<a href="#"><i class="fa fa-money fa-lg"></i> A Comissao de Finanças <span class="arrow"></span></a>
							</li>
							<ul id="financas" class="sub-menu-n3 collapse">
								<li id="" class="" data-toggle="" data-target="">
									<a href="#">Sobre a Comissao <span class="label label-warning"><i class="fa fa-unlock-alt fa-lg"></i></span></a>
								</li>
								<li id="" class="" data-toggle="" data-target="">
									<a href="#">Contabilidade da Loja <span class="label label-warning"><i class="fa fa-unlock-alt fa-lg"></i></span></a>
								</li>
								<li id="" class="" data-toggle="" data-target="">
									<a href="#">Prestaçao de Contas <span class="label label-warning"><i class="fa fa-unlock-alt fa-lg"></i></span></a>
								</li>
								<li id="" class="" data-toggle="" data-target="">
									<a href="#">Fale com a Comissao <span class="label label-warning"><i class="fa fa-unlock-alt fa-lg"></i></span></a>
								</li>
							</ul>
						</ul>

					<li id="" class="collapsed" data-toggle="collapse" data-target="#obreiro">
						<a href="#"><i class="fa fa-user fa-lg"></i> O Obreiro <span class="arrow"></span></a>
					</li>
						<ul id="obreiro" class="sub-menu collapse">
							<li id="" class="" data-toggle="" data-target="">
								<a href="#">Sobre o Obreiros <span class="label label-warning"><i class="fa fa-unlock-alt fa-lg"></i></span></a>
							</li>
							<li id="cad-pessoa" class="" data-toggle="" data-target="">
								<a href="#">Cadastro de Obreiros <span class="label label-info"><i class="fa fa-thumbs-up fa-lg"></i></span></a>
							</li>
							<li id="lista-pessoas" class="" data-toggle="" data-target="">
								<a href="#">Lista de Obreiros <span class="label label-info"><i class="fa fa-thumbs-up fa-lg"></i></span></a>
							</li>
							<li id="" class="" data-toggle="" data-target="">
								<a href="#">Consultar Pagamentos <span class="label label-warning"><i class="fa fa-unlock-alt fa-lg"></i></span></a>
							</li>
							<li id="" class="" data-toggle="" data-target="">
								<a href="#">Consultar Frequencia <span class="label label-warning"><i class="fa fa-unlock-alt fa-lg"></i></span></a>
							</li>
						</ul>

					<li id="" class="collapsed" data-toggle="collapse" data-target="#documentos">
						<a href="#"><i class="fa fa-folder-open fa-lg"></i> Os Documentos <span class="arrow"></span></a>
					</li>
						<ul id="documentos" class="sub-menu collapse">
							<li id="" class="" data-toggle="" data-target="">
								<a href="#">Sobre os Documentos  <span class="label label-warning"><i class="fa fa-unlock-alt fa-lg"></i></span></a>
							</li>
							<li id="" class="" data-toggle="" data-target="">
								<a href="#">Incluir Documentos <span class="label label-warning"><i class="fa fa-unlock-alt fa-lg"></i></span></a>
							</li>
							<li id="" class="" data-toggle="" data-target="">
								<a href="#">Consultar Documentos <span class="label label-warning"><i class="fa fa-unlock-alt fa-lg"></i></span></a>
							</li>
						</ul>

					<li id="" class="collapsed nav navbar-botton" data-toggle="collapse" data-target="#perfil">
						<a href="#"><i class="fa fa-user fa-lg"></i> <?php echo " ".$ir ?> <span class="arrow"></span></a>
					</li>
						<ul id="perfil" class="sub-menu collapse">
							<li id="sair" class="" data-toggle="" data-target="">
								<a href="sair.php?token=.dm5(session_id())">Sair <span class="label label-info al-balao"><i class="fa fa-thumbs-up fa-lg"></i></span></a>
							</li>
						</ul>
				</ul>
				-->
			</div>
		</div>

		<div id="area-conteudo">
			<!--
				<?php
					$sql = $pdo->prepare('SELECT *, span[1] span1, span[2] span2, cardinality(nivel) qtd FROM admin."tblmenus" ORDER BY id');
					$sql->execute();
					if($sql->rowCount()>0){
						$nivelAnterior = 0;
						$passo = 0;
						foreach ($sql->fetchAll() as $resultado) {
							$passo += 1;
							echo 'id - '.$resultado['id'].' | '.$passo.': '.$nivelAnterior.' -> '.$resultado['qtd'].': '.$resultado['menu'].'<br>';
							$nivelAnterior = $resultado['qtd'];
						}
					}
				?>
			-->
		</div>
	</body>
</html>