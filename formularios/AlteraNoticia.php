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
include ("ConectaBD.class.php");

$id = $_GET["id"];
//$id= 17;

$sql = "SELECT * FROM noticias where idnoticias = $id";
$res = $con->consult($sql);
$dados = mysql_fetch_array($res);

//echo ("<br><center>ID: "+$id);

?>
<form method="POST" action="CAdmin.class.php?acao=alterar_noticia">
<div>
<table id="todoform" cellspacing='5' rules='none'border="0">
<tr>
	<td><b>Data</b></td>
	<td><input type="hidden" name="id" value="<?php echo utf8_decode($dados['idnoticias']);?>">
	<?php echo $dados['data_post'];?></td>
</tr>
<tr>
	<td><b>Titulo(50)</b></td>   
    <td><input type="text" name="titulo" value="<?php echo utf8_decode($dados['titulo']);?>" size="50" maxlength="50"></td>
</tr>
<tr>
	<td><b>Resumo(50)</b></td>
    <td><input type="text" name="resumo" value="<?php echo utf8_decode($dados['resumo']); ?>" size="50" maxlength="50"></td>
</tr>
<tr>
	<td><b>Texto</b></td>
    <td colspan="3"><textarea name="texto" cols="50"><?php echo utf8_decode($dados['texto']);?></textarea></td> 
</tr><tr><td colspan="2" align="center"><input type="button" value="Voltar" onclick="voltar();">
<input type="submit" value="Alterar"></td></tr>
</table>
</div>
</form>
</body>
