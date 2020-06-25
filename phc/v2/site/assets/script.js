$(function(){
	$('#cad-pessoa').bind('click', function(){
		$('#area-conteudo').load("telaConteudoCadastro.php");
	});

	$('#lista-pessoas').bind('click', function(){
		$('#area-conteudo').load("cadPessoa-sel.php");
	});
});