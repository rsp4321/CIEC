<html>
<?php header("Content-Type: text/html; charset=ISO-8859-1",true);
    include ("conexao.php");
    
	$sql = "SELECT * FROM area ORDER BY nome";
    $res = mysql_query($sql,$conexao);
    $num = mysql_num_rows($res);
    
?>
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>Cadastro de curso</title>
<meta http-equiv="Content-Type" content="text/html; charset=iso-8859-1" />
<script type="text/javascript" src="prototype.js"></script>
<script language="javascript">
function CarregaCurso(codArea)
{
	if(codArea){
	   	//alert("Entrou no SE: Estado "+ codArea);
        var myAjax = new Ajax.Updater('cursoAjax','carregaCursos.php?codArea=' + codArea,
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
  <form name='FCadastroCurso' method='post' action="CAdmin.class.php?acao=cadastrar_curso" onsubmit="">
  <div>
  <table id="todoform" cellspacing='5' rules='none' border="0">
  <tr>
	<td colspan="2"><div id="titulo">Cadastro de Curso</div></td>
  </tr>
    <tr>
      <td>Curso</td>
      <td><input name='nome' id='nome' type='text' size='50'></td>
    </tr>
    <tr>
    <td width="88">Area:</td>
    <td width="212">
      <select name="area" id="area" onchange="CarregaCurso(this.value)">
      <option>Selecione</option>
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
	<td width="88">Institui&ccedil;&atilde;o</td>
    <td width="212">
      <select name="instituicao" id="instituicao">
      <option value="0">Selecione</option>
      <?php 
	  
		$sql = "SELECT * FROM instituicao ORDER BY nome";
		$res = mysql_query($sql,$conexao);
		$num = mysql_num_rows($res);
	  
	  for($i=0;$i<$num;$i++)
	  {
	  	$dados = mysql_fetch_array($res);
	  ?>
      	<option value="<?php echo $dados["id"]?>"><?php echo $dados["nome"]?></option>
       <?php }?>
      </select>
    </td>
  </tr>
  <tr>
  <td colspan="2"><div align="center"><input class="botao" type="submit" value="Cadastrar" > </div></td>
  </tr>
</table>
</div>
</form>
</body>


