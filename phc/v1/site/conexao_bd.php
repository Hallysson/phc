<?php
	$dsn = "pgsql:dbname=dbArezzo;host=127.0.0.1";
	$dbuser = "postgres";
	$dbpass = "postgres";

	try{
		$pdo = new PDO($dsn, $dbuser, $dbpass);
		echo "Conexao estabelecida com sucesso!<br/><br/>";

	}catch(PDOException $e){
		echo "Conexao falhou: ".$e->getMessage();
	}
?>