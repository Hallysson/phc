<?php
	$dsn = "pgsql:dbname=labs3a;host=179.188.16.157";
	$dbuser = "labs3a";
	$dbpass = "Hall@78";

	try{
		$pdo = new PDO($dsn, $dbuser, $dbpass);
		$pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
	//	echo "Conexao estabelecida com sucesso!<br/><br/>";	

	}catch(PDOException $e){
		echo "Conexao falhou: ".$e->getMessage();
	}
?>