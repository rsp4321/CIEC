<?php
session_start();
?>
<!DOCTYPE HTML PUBLIC "-//W3C//DTD HTML 4.01 Transitional//EN" "http://www.w3.org/TR/html4/loose.dtd">
	
<html>
<head>
</head>

<div>
<ul class="menu">
<li class="top"><a href="index.php?acao_menu=cadastrar_empresa&facao_menu=ir_principal" target="_self" class="top_link" title="Pagina inicial"><span>Principal</span></a></li>

<li class="top"><a href="index.php?acao_menu=pre_cadastrar_aluno&facao=pre_cadastrar_aluno" target="_self" class="top_link"><span>Pré-Cadastro</span></a>
 <!--
 <ul class="sub">
  <li id="cadastroEgresso"><a href="index.php?acao_menu=cadastrar_aluno&facao=fcadastrar_aluno" target="_self" title="Cadastro de ex-aluno" onclick="location.href('');">Egresso</a></li>
  <li ><a href="index.php?acao_menu=cadastrar_empresa&facao=fcadastrar_empresa" target="_self" title="Cadastre sua Empresa">Empresa</a></li>
  
 </ul>
-->
</li>
<li class="top"><a href="index.php" target="_self" class="top_link" title="O que é a Direção de Extensão"><span>Quem somos</span></a></li>
<li class="top"><a href="index.php" target="_self" class="top_link" title="Endereço para contato"><span>Contato</span></a></li>
	<?php
if (!$_SESSION['nome']) {
    //	echo"<li class='top' id='login'><span><a href='index.php?acao_menu=login' class='top_link' title='Cadastro de aluno'>login</a><span></li>";
} else {
    //	echo"<li class='top' id='logout'><span><a href='CAdmin.class.php?acao=logout' class='top_link'>logout</a><span></li>";
} //fim do else

?>
 	 
</ul>
</div>		
</html>
