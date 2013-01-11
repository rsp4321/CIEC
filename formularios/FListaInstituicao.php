<head>
<style type="text/css">
	@import url("CSS/estiloTabelas.css");
</style>
</head>
<?php header("Content-Type: text/html; charset=ISO-8859-1",true);
include("conexao.php");

$sql = "SELECT * FROM `instituicao` ORDER BY  `nome`";
 
$res = mysql_query($sql,$conexao);
$num = mysql_num_rows($res);
?>
<table border="1" align="center" class="linhasAlternadas">
<tr>
    <th>Instituição</th>
	<th>Opção</th>
</tr>
<?php for($j=0;$j<$num;$j++){
	$dados = mysql_fetch_array($res);
?>
<tr>
    <td><?php echo $dados['nome']?></td>
    <td><a href="CAdmin.class.php?acao=excluir_instituicao&id=<?php echo $dados['id'];?>">Excluir</a></td>
</tr>
<?php }
?>
</table>

 
 
 