
<?php
	error_reporting(E_ALL);
	ini_set("display_errors", "On");


	//require 'conexao_bd.php';

	if(isset($_POST['cim']) && empty($_POST['cim']) == false){
		// Dados pessoais:
		$nome = addslashes($_POST['nome']);
		$nomechamado = addslashes($_POST['nomechamado']);
		$dtnascimento = addslashes($_POST['dtnascimento']);
		$idtiposanguineo = addslashes($_POST['idtiposanguineo']);
		$planosaude = addslashes($_POST['planosaude']);
		$linkedin = addslashes($_POST['linkedin']);
		$senha = md5(addslashes($_POST['senha']));

		$sqlPessoa = "INSERT INTO obreiro.\"tblpessoas\" (nome, nomechamado, dtnascimento, idtiposanguineo, planosaude, senha) values('$nome', '$nomechamado', '$dtnascimento', '$idtiposanguineo', '$planosaude', '$senha');";
		print_r($sqlPessoa);
		$pdo->query($sqlPessoa);

		// Dados de Endereço:
		$idpessoa = addslashes($_POST['idpessoa']);
		$idtipoendereco = addslashes($_POST['idtipoendereco']);
		$cep = addslashes($_POST['cep']);
		$logradouro = addslashes($_POST['logradouro']);
		$numero = addslashes($_POST['numero']);
		$complemento = addslashes($_POST['complemento']);
		$bairro = addslashes($_POST['bairro']);
		$cidade = addslashes($_POST['cidade']);
		$uf = addslashes($_POST['uf']);/*
		$idcidade = addslashes($_POST['idcidade']);
		$idestado = addslashes($_POST['idestado']);*/

		$sqlEndereco = "INSERT INTO obreiro.\"tblendereco\" (idpessoa, idtipoendereco, cep, logradouro, numero, complemento, bairro, cidade) values('$idpessoa', '$idtipoendereco', '$cep', '$logradouro', '$numero', '$complemento', '$bairro', '$cidade');";
		$pdo->query($sqlEndereco);

		// Dados do Obreiro:
		$cim = addslashes($_POST['cim']);
		$datacim = addslashes($_POST['datacim']);
		$idperfil = addslashes($_POST['idperfil']);
		$idgrau = addslashes($_POST['idgrau']);

		$sqlObreiro = "INSERT INTO obreiro.\"tblobreiro\" (idpessoa, cim, datacim, idperfil) values('$idpessoa', '$cim', '$datacim', '$idperfil');";
		$pdo->query($sqlObreiro);

		//header("Location: cadObreiro.php");
	}
?>