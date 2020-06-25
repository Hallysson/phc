<!DOCTYPE html>
<html>
	<head>
		<meta charset="utf-8"/>
		<link rel="stylesheet" href="estilo.css"/>
		<!--<link href="//maxcdn.bootstrapcdn.com/font-awesome/4.2.0/css/font-awesome.min.css" rel="stylesheet">-->
		<title>A∴R∴L∴S∴ PHC 01</title>
		<!--<meta name="viewport" content="width=device-width, initial-scale=1"/>-->
		<!--Esta ordem eh importante-->
		<link rel="stylesheet" type="text/css" href="../frameworks/bootstrap/css/bootstrap.min.css">
		<!--<script type="text/javascript" src="../frameworks/jquery-3.1.0.min.js"></script>-->
		<!--<script type="text/javascript" src="../frameworks/bootstrap/js/bootstrap.min.js"></script>-->
		<!--<script type="text/javascript" src="script.js"></script>-->
	</head>
	<body>
		<?php
			require 'assets/conexao_bd.php';
		?>
		<table class="table table-striped table-bordered table-hover table-condensed">
			<thead>
				<tr>
					<th>Nome do Obreiro</th>
					<th>CIM</th>
					<th>Tipo Sanguineo</th>
					<th>Açoes</th>
				</tr>
			</thead>
			<tbody>
				<?php
					try{
						$sql = "SELECT pessoa.id, nome, cim, tiposanguineo FROM obreiro.tblpessoas pessoa INNER JOIN auxiliar.tbltiposanguineo tiposanguineo ON tiposanguineo.id = pessoa.idtiposanguineo LEFT JOIN obreiro.tblobreiro obreiro ON pessoa.id = obreiro.idpessoa";
						$sql = $pdo->query($sql);
						if($sql->rowCount()>0){
							foreach($sql->fetchAll() as $pessoa){
								echo '<tr>';
									echo '<td width="65%">'.$pessoa["nome"].'</td>';
									echo '<td width="5%">'.$pessoa["cim"].'</td>';
									echo '<td width="15%">'.$pessoa["tiposanguineo"].'</td>';
									echo '<td width="15%"><a href="cadastroPessoa.php?id='.$pessoa['id'].'">Editar</a> - <a href="cadPessoa-exc.php?id='.$pessoa['id'].'">Excluir</a></td>';
								echo '</tr>';
							}
						}else{
							echo "Nao há usuarios cadastrados!";
						}
					}catch(PDOException $e){
						echo "Falhou: ".$e->getMessage();
					}
				?>
			</tbody>
		</table>
	</body>
</html>