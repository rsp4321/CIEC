<?php header("Content-Type: text/html; charset=utf-8",true);
    include ("ConectaBD.class.php");
    
	$sql = "SELECT * FROM instituicao ORDER BY nome";
    $res = $con->consult($sql);
    $num = mysql_num_rows($res);
    
?>
<html>
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<meta http-equiv="Content-Type" content="text/html; charset=iso-8859-1" />
<title>Cadastro de Turma</title>
<script type="text/javascript" src="prototype.js"></script>
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
  <form name='FCadastroTurma' method='post' action="index.php?acao_menu=pre_cadastrar_aluno&facao=listar_turma" onsubmit="return validaFormulario();">
  <div>
  <table id="todoform" cellspacing='5' rules='none' border="0">
  <tr><td colspan="2"><div id="titulo">Buscar Turma</div></td></tr>
  <tr>
    <td width="88">Institui&ccedil;&atilde;o</td>
    <td width="212">
      <select name="instituicao" id="instituicao" onchange="CarregaCurso(this.value)">
      <option value="0">Selecione</option>
      <?php for($i=0;$i<$num;$i++)
	  {
	  	$dados = mysql_fetch_array($res);
	  ?>
      	<option value="<?php echo $dados["id"]?>"><?php echo $dados["nome"]?></option>
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
      <td>Informe o Ano da Formatura</td>
      <td><select name="anoform">
		<option value="0">Todos</option>
	  <?php 
		$sql = "select distinct anoformacao from curso_egresso order by anoformacao asc";
		$res = $con->consult($sql);
		$num = mysql_num_rows($res);
		echo "num: $num";
		for($i=0; $i<$num; $i++){
			$dados = mysql_fetch_array($res);?>
      	<option value="<?php echo $dados["anoformacao"]?>"><?php echo $dados["anoformacao"]?></option>
       <?php }?>
	   </td>
    </tr>  
  <tr>
  <td colspan="2">
<div align="center"><input class="botao" type="submit" value="Buscar"></div>
</td></tr></table>
</div>
</form>
</body>
</html>