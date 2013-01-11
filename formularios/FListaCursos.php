<head>
<style type="text/css">
	@import url("CSS/estiloTabelas.css");
</style>
</head>
<?php header("Content-Type: text/html; charset=ISO-8859-1",true);
include("conexao.php");

$sql = "SELECT * FROM `curso` ORDER BY  `nome`";
 
$res = mysql_query($sql,$conexao);
$num = mysql_num_rows($res);
?>
<table border="1" align="center" class="linhasAlternadas">
<tr>
    <th>Curso</th>
	<th>Area</th>
	<th>Opcao</th>
</tr>
<?php for($j=0;$j<$num;$j++){
	$dados = mysql_fetch_array($res); //idnoticias 	titulo 	resumo 	texto 	data_post
?>
<tr>
    <td><?php echo $dados['nome']?></td>
    <td><?php 
        $area = $dados['id_area'];
        $sql2 = "SELECT * FROM `area` where id='$area'";
        $res2 = mysql_query($sql2,$conexao);
        $dados2 = mysql_fetch_array($res2);
        echo $dados2['nome'];
        
    ?></td>
    <td><a href="CAdmin.class.php?acao=excluir_curso&idcurso=<?php echo $dados['cid'];?>">Excluir</a></td>
</tr>
<?php }
?>
</table>

 
 
 