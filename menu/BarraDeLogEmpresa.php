<?php 
	ob_start(); 
	session_start();
?>
<html>
<head>
<style type="text/css" media="screen">
	@import url("menu/cssMenu/menu_style.css"); 
</style>
</head>
<body>

<div>
<ul class="barra">
<li ><a href="CAdmin.class.php?acao=logout" target="_self" title="Sair do Sistema"><span>Sair</span></a></li>
<li ><a href="index.php?acao_menu=gerencia_vaga" target="_self" title="vagas"><span>Gerenciar Vagas</span></a></li>
<li ><a href="index.php?acao_menu=pesquisa_egresso_empresa" target="_self" title="busca"><span>Busca de Egressos</span></a></li>
<li ><a href="index.php?facao=altera_dados_empresa" target="_self" title="alterar_dados"><span>Alterar Dados</span></a></li>
<li ><a href="index.php?facao=altera_senha_empresa" target="_self" title="alterar_senha"><span>Alterar Senha</span></a></li>
</ul>
</div>

</body>
</html>