<html>
<?php header("Content-Type: text/html; charset=utf-8",true);
    include ("ConectaBD.class.php");
    $sql = "SELECT * FROM area ORDER BY nome";
    $res = $con->consult($sql);
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
	alert('Funcionou');
	window.location.href='CAdmin.class.php?acao=pesquisa2';
}
</script>
	<style type="text/css">
	@import url(cssForm/style_form.css);
	</style>
</head>
<body bgcolor='white'>
    <div id="titulo">Pesquisa de Egresso</div>
  <form name='FCadastroCurso' method='post' action="" onsubmit="">
  <div>
  <table id="todoform" cellspacing='5' rules='none' border="0">
    <tr>
    <td width="88">Selecione a Area</td>
    <td width="212">
      <select name="area" id="area">
      <option value="0">Todos</option>
      <?php for($i=0;$i<$num;$i++)
	  {
	  	$dados = mysql_fetch_array($res);
	  ?>
      	<option value="<?php echo $dados["id"]?>"><?php echo $dados["nome"]?></option>
       <?php }?>
      </select>
    </td>
  <td colspan="2"><input class="botao" type="submit" value="Por Area" > OU</td>
  </tr>
  <tr><td>Digite um nome</td>
    <td><input type="text" size="20" name="busca" value="Digite um Nome" onclick="limpar()"/> </td>
    <td align="center"><input type="button" value="Por Nome" onclick="buscar()" /></td>
</tr>
</table>
</div>
</form>
</body>