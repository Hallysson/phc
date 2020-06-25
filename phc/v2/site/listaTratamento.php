<?php
	error_reporting(E_ALL);
	ini_set("display_errors", "On");

	$dsn = "pgsql:dbname=dbPHC;host=127.0.0.1";//"mysql:dbname=blog;host=127.0.0.1";
	$dbuser = "postgres";//"root";
	$dbpass = "postgres";//"esfinge78";

	try{
		$pdo = new PDO($dsn, $dbuser, $dbpass);
		echo "Conexao estabelecida com sucesso!<br/><br/>";

		$sql = 'SELECT * FROM auxiliar."tbltratamentomaconico"';
		$sql = $pdo->query($sql);
		if($sql->rowCount()>0){
			foreach($sql->fetchAll() as $tratamentos){
				echo "Nome: ".$tratamentos["tratamento"]."<br/>";
			}
		}else{
			echo "Nao ha registros cadastrados!";
		}
	}catch(PDOException $e){
		echo "Falhou: ".$e->getMessage();
	}
?>