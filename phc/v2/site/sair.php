<?php
	session_start();
	if( @$_GET['token'] === md5(session_id()) ){
	   // limpe tudo que for necessário na saída.
	   // Eu geralmente não destruo a seção, mas invalido os dados da mesma
	   // para evitar algum "necromancer" recuperar dados. Mas simplifiquemos:
	   session_destroy();
	   header("location: login.php");
	   exit();
	} else {
	   echo "<a href='login.php?token='.md5(session_id())>Confirmar logout</a>";
	}
?>