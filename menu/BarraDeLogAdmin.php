<?php 
	ob_start(); 
	session_start();
?>
<html>
<head>
<style type="text/css" media="screen">
	@import url("menu/cssMenu/menu_style.css"); 
</style>
<meta http-equiv="content-type" content="text/html; charset=utf-8">
</head>
<body>

<div>
<ul class="barra">
<li ><a href="CAdmin.class.php?acao=logout" target="_self" title="Sair do Sistema"><span>Sair</span></a></li>
<li ><a href="index.php?acao_menu=gerenciar_egresso&facao=fgerenciar_egresso" target="_self" title="Cadastrar, editar, excluir"><span>Gerenciar Egresso</span></a></li>
<li ><a href="index.php?acao_menu=empresa" target="_self" title="Cadastrar, editar, excluir"><span>Gerenciar Empresa</span></a></li>
<li ><a href="index.php?acao_menu=cadastrarnoticias&facao=noticias" target="_self" title="Cadastrar, editar, excluir"><span>Gerenciar Notícias</span></a></li>
<li ><a href="index.php?acao_menu=busca_vagas" target="_self" title="Ver Vagas Disponíveis"><span>Vagas Oferecidas</span></a></li>
<li ><a href="index.php?facao=altera_dados" target="_self" title="Alterar Senha"><span>Alterar Dados</span></a></li>
<li ><a href="index.php?acao_menu=area_curso&facao=area_curso" target="_self" title="Área de Atuação/ Cursos Oferecidos"><span>Área de Atuação/Cursos</span></a></li>
</ul>
</div>

</body>
</html>