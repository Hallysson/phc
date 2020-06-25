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
		<!--<script type="text/javascript" src="script.js"></script>-->
		<!--<script type="text/javascript" src="script_valida_cep.js"></script>-->
		<!--<script type="text/javascript" src="script_add-listas.js"></script>-->
	</head>
	<body>
		<?php
			error_reporting(E_ALL);
			ini_set("display_errors", "On");
			session_start();
			$id  = isset($_SESSION['id']) ? $_SESSION['id'] : '';
			$cim = isset($_SESSION['cim']) ? $_SESSION['cim'] : '';
			$ir  = isset($_SESSION['nomechamado']) ? $_SESSION['nomechamado'] : '';
			
		?>
		<div id="conteudo" class="container-fluid">
			<div>
				<h1>Saudações Ir∴ <?php echo $ir."!"; ?> </h1>
				<p>Este cadastro tem como objetivo reunir o máximo de informações sobre o obreiro.</p>
				<p>É importante que todos os campos possíveis sejam preenchidos.</p>
			</div>
			<hr/>
					
			<div>
				<?php
					require 'cadastroPessoa.php';
				?>
			</div>
		</div>
	</body>
</html>