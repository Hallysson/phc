<?php
/*
	$p = $_POST;
	$p['qt_nome'] = strlen($_POST['nome']);
	echo json_encode($p);

	echo json_encode($_POST);
	*/

	$tipoEndereco = $_POST['tipo_endereco'];
	$cep = $_POST['cep'];
	$logradouro = $_POST['logradouro'];
	$numero = $_POST['complemento'];
	$bairro = $_POST['bairro'];
	$cidade = $_POST['cidade'];

	$array = array('status'=>'');
	echo json_encode($_POST);
?>