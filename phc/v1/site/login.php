<?php
	session_start();

	if(isset($_POST['email']) && empty($_POST['email']) == false){
		$email = addslashes($_POST['email']);
		$senha = md5(addslashes($_POST['senha']));

		$dsn = "pgsql:dbname=dbArezzo;host=127.0.0.1";
		$dbuser = "postgres";
		$dbpass = "postgres";

		try{
			$pdo = new PDO($dsn, $dbuser, $dbpass);
			
			$sql = $pdo->query("SELECT * FROM usuarios WHERE email = '$email' AND senha = '$senha';");

			if($sql->rowCount() > 0){
				$dado = $sql->fetch();

				$_SESSION['id'] = $dado['id'];
				$_SESSION['login'] = $dado['login'];

				header("Location: index.php");
			}
		}catch(PDOException $e){
			echo "Conexao falhou: ".$e->getMessage();
		}
	}
?>

<form method="POST">
	E-mail:<br/>
	<input type="email" name="email"/><br/><br/>

	Senha:<br/>
	<input type="password" name="senha"/><br/><br/>

	<input type="submit" name="Entrar"/><br/><br/>
</form>