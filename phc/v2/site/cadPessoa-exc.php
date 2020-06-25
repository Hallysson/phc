<?php
	require 'assets/conexao_bd.php';

	if(isset($_GET['id']) && empty($_GET['id']) == false){
		$id = addslashes($_GET['id']);

		$sql = "DELETE FROM obreiro.tblpessoas WHERE id = '$id'";
		$pdo->query($sql);
	}
	header("Location: index.php");
?>