<head>
<style type="text/css">
	@import url("CSS/estiloTabelas.css");
</style>
</head>
<?php header("Content-Type: text/html; charset=ISO-8859-1",true);
include("conexao.php");

$sql = "SELECT * FROM `empresa` order by razao"; 
$res = mysql_query($sql,$conexao);
$num = mysql_num_rows($res);
?>
<table border="1" align="center" class="linhasAlternadas">
<tr><th colspan="9">EMPRESAS</th></tr>
<tr>
    <th>Razao</th>
    <th>Nome Fantasia</th>
    <th>CNPJ</th>
    <th>Inscrição Estadual</th>
    <th>Email</th>
    <th>Site</th>
    <th>Fone</th>
    <th>Fax</th>
    <th>Representante</th>
</tr>
<?php for($j=0;$j<$num;$j++){
	$dados = mysql_fetch_array($res);
?>
<tr>
    <td><?php echo $dados['razao']?></td>
    <td><?php echo $dados['nomeFantasia'];?></td>				
    <td><?php echo $dados['cnpj'];?></td>
    <td><?php echo $dados['insc_estadual'];?></td>
    <td><?php echo $dados['email'];?></td>
    <td><?php echo $dados['site'];?></td>
    <td><?php echo $dados['fone'];?></td>    
    <td><?php echo $dados['fax'];?></td>
    <td><?php echo $dados['representante'];?></td>
    <td><a href="index.php?acao_menu=empresa&facao=vagas_empresa&idemp=<?php echo $dados["id"]?>">VAGAS</a></td>
</tr>
<?php }
?>
</table>