<html>
<head>
<style type="text/css">
	@import url("CSS/estiloTabelas.css");
</style>
</head>
<?php header("Content-Type: text/html; charset=ISO-8859-1",true);
include("conexao.php");
session_start();

$area=$_GET["area"];
if($area == 0)
$sql = "SELECT * FROM `vagas` order by curso";
else 
$sql = "SELECT * FROM `vagas` WHERE area=$area order by curso";
 
$res = mysql_query($sql,$conexao);
$num = mysql_num_rows($res);//id_empresa	local	area	curso	quant	desc_atuacao	obs	contatos	responsavel
?>
<table border="1" align="center" class="linhasAlternadas">
<tr><th colspan="8">OPORTUNIDADES</th></tr>
<tr>
    <th>Empresa</th>
    <th>Local</th>
    <th>Curso</th>
    <th>Numero de Vagas</th>
    <th>Atuacao</th>
    <th>Observacoes</th>
    <th>Contato</th>
    <th>Responsavel</th>
</tr>
<?php for($j=0;$j<$num;$j++){
	$dados = mysql_fetch_array($res);
?>
<tr>
    <td><?php
        $id = $dados['id_empresa'];
        $sql2 = "SELECT * FROM empresa WHERE id = '$id'";
        $res2 = mysql_query($sql2,$conexao);
        $dados2 = mysql_fetch_array($res2);
        $razao = $dados2['razao'];
        $nome = $dados2['nomeFantasia'];
        echo "$razao<br>($nome)";?></td>
    <td><?php echo $dados['local']?></td>
    <td><?php echo $dados['curso'];?></td>				
    <td><?php echo $dados['quant'];?></td>
    <td><?php echo $dados['desc_atuacao'];?></td>
    <td><?php echo $dados['obs'];?></td>
    <td><?php echo $dados['contatos'];?></td>
    <td><?php echo $dados['responsavel'];?></td>    
</tr>
<?php }
?>
</table>
</html>