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
<script>
function limpar(){
    
    document.FCadastroCurso.busca.value = "";
    
}

function buscar(){
	document.FCadastroCurso.action = "CAdmin.class.php?acao=pesquisa2";
	document.FCadastroCurso.submit();
	//window.location.href='CAdmin.class.php?acao=pesquisa2';
}
</script>
	<style type="text/css">
	@import url(cssForm/style_form.css);
	</style>
</head>
<body bgcolor='white'>
    <b>Pesquisa de Egresso</b>
	<form name='FCadastroCurso' method='post' action="CAdmin.class.php?acao=pesquisa_por_area">
  <table cellspacing='5' rules='none' border="0">
    <tr>
    <td width="88">Selecione a Area</td></tr>
    <tr><td width="212">
      <select name="area" id="area">
      <option value="0">Todos</option>
      <?php for($i=0;$i<$num;$i++)
	  {
	  	$dados = mysql_fetch_array($res);
	  ?>
      	<option value="<?php echo $dados["id"]?>"><?php echo $dados["nome"]?></option>
       <?php }?>
      </select>
    </td></tr>
	<tr>
	 <td colspan="2"><input class="botao" type="submit" value="Por Area" > OU</td>
  	</tr>
  	<tr><td>Digite um nome</td></tr>
  <tr>
    <td><input type="text" size="20" name="busca" value="Digite um Nome" onclick="limpar()"/> </td></tr>
	<tr>
    <td align=""><input type="button" value="Por Nome" onclick="buscar()" /></td>
</tr>
</table>
</form>
</body>