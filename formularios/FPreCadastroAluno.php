<?php 
header("Content-Type: text/html; charset=UTF-8",true);
include ("ConectaBD.class.php");

$sql = "SELECT * FROM instituicao ORDER BY nome";
//     $res = mysql_query($sql,$conexao);
//     $num = mysql_num_rows($res);

$res = $con->consult($sql);
$num = mysql_num_rows($res);

?>
<html>
<head>
<title>FPreCadastroAluno</title>
<!--
	-->
<script language="javascript">
function CarregaCurso(cod)
{
	if(cod){	   	
        var myAjax = new Ajax.Updater('cursoAjax','carregaCursosInstituicao.php?inst=' + cod,
		{
			method : 'get',
		}) ;

    }
}
</script>
<style type="text/css">
@import url(cssForm/style_form.css);
</style>
</head>

<body bgcolor='white'>

	<form name='FPreCadastro' method='POST'
		action='CAdmin.class.php?acao=pre_cadastro'
		onsubmit='return validaFPreCadastro();'>
		<div>
			<table id="todoform" cellspacing='5' rules='none' border="0">
				<tr>
					<td colspan="2"><div id="titulo">Cadastro de Ex-Alunos</div></td>
				</tr>
				<tr>
					<td>Nome:</td>
					<td><input name='nome' id='nome' type='text' size='50'></td>
				</tr>
				<tr>
					<td>CPF:</td>
					<td><input name='cpf' id='cpf' type='text' maxlength='14' size='12'
						onkeypress="Mask('cpf',this);"></td>
				</tr>
				<tr>
					<td>Ano da Formatura</td>
					<td><input name='anoform' type='text' size='4' maxlength="4"></td>
				</tr>
				<tr>
					<td width="88">Institui&ccedil;&atilde;o</td>
					<td width="212"><select name="instituicao" id="instituicao"
						onchange="CarregaCurso(this.value)">
							<option value="0">Selecione</option>
							<?php for($i=0;$i<$num;$i++)
							{
								$dados = mysql_fetch_array($res);
								?>
							<option value="<?php echo $dados["id"]?>">
								<?php echo $dados["nome"]?>
							</option>
							<?php }?>
					</select>
					</td>
				</tr>
				<tr>
					<td>Curso</td>
					<td><div id="cursoAjax">
							<select name="curso" id="curso">
								<option value="0">Selecione a Institui&ccedil;&atilde;o</option>
							</select>
						</div></td>
				</tr>
				<tr>
					<td colspan="2">
						<div align="center">
							<input class="botao" type="submit" value="Cadastrar">
						</div>
					</td>
				</tr>
			</table>
		</div>
	</form>
</body>
</html>

