<?php 
	//include ("conexao.php");
	
	//$id = $_SESSION['ex_aluno_id'];
	//$sql = "SELECT * FROM ex_aluno where ex_aluno_id = $id";
	//$res = mysql_query($sql,$conexao);
	//$dados = mysql_fetch_array($res);
	
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
<li ><a href="index.php?acao_menu=busca_vagas" target="_self" title="estagio_emprego"><span>Oportunidades de Empregos</span></a></li>
<li ><a href="index.php?acao_menu=pesquisa_egresso2" target="_self" title="pesquisa"><span>Pesquisa de Ex-Alunos</span></a></li>
<li ><a href="index.php?acao_menu=cadastrar_curriculum&facao=curriculo" target="_self" title="curriculo"><span>Cadastrar Currículo</span></a></li>
<li ><a href="index.php?acao_menu=atualizar&facao=alterar_senha" target="_self" title="Alterar Senha"><span>Alterar Senha</span></a></li>
<li ><a href="index.php?acao_menu=gn&facao=atualizar" target="_self" title="Atualizar Dados"><span>Atualizar Dados</span></a></li>
<li ><a href="formularios/curriculo.php?id=<?php echo $_SESSION['ex_aluno_id']; ?>" target="_self" title="Veja seu Curriculo"><span>Curriculo</span></a></li>
</ul>
</div>

</body>
</html>