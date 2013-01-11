<style>

@media print { 
	#noprint { display:none; }
	#saida { display:none; }                          
	}
</style>
<script type="text/javascript">
function voltar(){
	javascript:history.go(-1);
}
</script>

<body>

<?php
include ("conexao.php");

$id = $_GET["id"];
//$id= 17;

$sql = "SELECT * FROM noticias where idnoticias = $id";
$res = mysql_query($sql,$conexao);
$dados = mysql_fetch_array($res);

//echo ("<br><center>ID: "+$id);

?>
<table border="1">
<tr><td>
<form method="POST" action="CAdmin.class.php?acao=alterar_noticia">
<table border="0" align="center">
<tr>
	<td><b>Data</b></td>
	<td><input type="hidden" name="id" value="<?php echo $dados['idnoticias'];?>">
	<?php echo $dados['data_post'];?></td>
</tr>
<tr>
	<td><b>Titulo(50)</b></td>   
    <td><input type="text" name="titulo" value="<?php echo $dados['titulo']?>" size="50" maxlength="50"></td>
</tr>
<tr>
	<td><b>Resumo(50)</b></td>
    <td><input type="text" name="resumo" value="<?php echo $dados['resumo']; ?>" size="50" maxlength="50"></td>
</tr>
<tr>
	<td><b>Texto</b></td>
    <td colspan="3"><textarea name="texto" cols="50"><?php echo $dados['texto'];?></textarea></td> 
</tr><tr><td colspan="2" align="center"><input type="button" value="Voltar" onclick="voltar();">
<input type="submit" value="Alterar"></td></tr>
</table>
</td></tr>
</table>
</form>
</body>
