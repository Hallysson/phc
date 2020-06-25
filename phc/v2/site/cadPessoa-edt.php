<?php
	error_reporting(E_ALL);
	ini_set("display_errors", "On");

	require 'assets/conexao_bd.php';

	$id = 0;

	if(isset($_GET['id']) && empty($_GET['id']) == false){
		$id = addslashes($_GET['id']);
	}

	if(isset($_POST['cim']) && empty($_POST['cim']) == false){
		echo 'Ok!';
		$nome = addslashes($_POST['nome']);
		$nomechamado = addslashes($_POST['nomechamado']);
		$dtnascimento = addslashes($_POST['dtnascimento']);
		$idtiposanguineo = addslashes($_POST['idtiposanguineo']);
		$planosaude = addslashes($_POST['planosaude']);
		//$linkedin = addslashes($_POST['linkedin']);
		$senha = md5(addslashes($_POST['senha']));

		$sql = "UPDATE obreiro.tblpessoas SET nome = '$nome', nomechamado = '$nomechamado', dtnascimento = '$dtnascimento', idtiposanguineo = $idtiposanguineo, planosaude = '$planosaude', senha = $senha WHERE id = '$id';";
		$pdo->query($sql);

		header("Location: cadPessoa-sel.php");
	}else{
		echo 'Deu merda!';
	}

	$sql = "SELECT * FROM obreiro.tblpessoas WHERE id = '$id'";
	$sql = $pdo->query($sql);

	if($sql->rowCount() > 0){
		$dado = $sql->fetch();
	}else{
		header("Location: cadPessoa-sel.php");
	}
?>