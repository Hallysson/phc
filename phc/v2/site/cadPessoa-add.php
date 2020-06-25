
<?php
	error_reporting(E_ALL);
	ini_set("display_errors", "On");

	require 'assets/conexao_bd.php';

	if(isset($_POST['nome']) && empty($_POST['nome']) == false){
		echo 'Deu certo!';
		// Dados pessoais:
		$nome = addslashes($_POST['nome']);
		$nomechamado = addslashes($_POST['nomechamado']);
		$dtnascimento = addslashes($_POST['dtnascimento']);
		$idtiposanguineo = addslashes($_POST['idtiposanguineo']);
		$planosaude = addslashes($_POST['planosaude']);
		//$linkedin = addslashes($_POST['linkedin']);
		$senha = md5(addslashes($_POST['senha']));

		$sqlPessoa = "INSERT INTO obreiro.\"tblpessoas\" (nome, nomechamado, dtnascimento, idtiposanguineo, planosaude, senha) values('$nome', '$nomechamado', '$dtnascimento', '$idtiposanguineo', '$planosaude', '$senha');";
		//print_r($sqlPessoa);
		$pdo->query($sqlPessoa);

		header("Location: telaConteudoCadastro.php");
	} else {
		echo 'Deu merda!';
	}
?>