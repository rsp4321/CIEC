<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Strict//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-strict.dtd">
<html xmlns="http://www.w3.org/1999/xhtml" xml:lang="en">
<head>
</head>	
<script>
function limpar(){
    
    document.form1.busca.value = "";
    
}
</script>

<body>

<div id="divmenuv"> 
<ul id="menuv">
    <li><a href="index.php?acao_menu=pre_cadastrar_aluno&facao=fpre_cadastrar_aluno" title="Inserir"><img src="img/adicionar.png" width="20" height="20"> Cadastrar</a></li>
	<li><a href="index.php?acao_menu=pre_cadastrar_aluno&facao=fdel_cadastro" title="Deletar"><img src="img/excluir.png" width="20" height="20">Excluir</a></li>
	<li><a href="index.php?acao_menu=pre_cadastrar_aluno&facao=cadastrar_turma" title="Cadastrar Turma"><img src="img/grupo.png" width="20" height="20"> Cadastrar Turma</a></li>
	<li><a href="index.php?acao_menu=pre_cadastrar_aluno&facao=buscar_turma" title="Buscar Turma"><img src="img/buscar.png" width="20" height="20"> Buscar Turma</a></li>
</ul>
</div>
<br>
<form method="post" name="form1" action="CAdmin.class.php?acao=pesquisa"> 
    <table align="center">
        <tr>
            <td><input type="text" size="28" name="busca" value="  Digite um Nome Para Buscar" onclick="limpar()" /> </td>
        </tr>
        <tr>
            <td align="center"><input type="submit" value="Buscar"/></td>
        </tr>
    </table>
</form>
<!--
<table>
<tr>
	<td><a href="index.php?acao_menu=pre_cadastrar_aluno&facao=fpre_cadastrar_aluno"><img src="botoes/inserir.png"/></a></td>
</tr>
<tr>
	<td><a href="index.php?acao_menu=pre_cadastrar_aluno&facao=fdel_cadastro" ><img src="botoes/deletar.png"/></a>
    <br />
    <br />
    <br />
    <br />
    </td>
</tr>

<tr>
    <td><input type="text" size="20" name="busca" value="Digite um nome" onclick="limpar()"/> </td>
</tr>
<tr>
    <td align="center"><input type="submit" value="Buscar"  /></td>
</tr>
</table> -->

	
</body>		
</html>