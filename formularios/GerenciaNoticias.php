<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<style type="text/css">
	@import url("CSS/estiloTabelas.css");
</style>
</head>
<?php header("Content-Type: text/html; charset=ISO-8859-1",true);
include("conexao.php");

$sql = "SELECT * FROM `noticias` ORDER BY  `data_post` DESC ";
 
$res = mysql_query($sql,$conexao);
$num = mysql_num_rows($res);
?>
<table border="1" align="center" class="linhasAlternadas">
<tr>
	<th>Titulo</th>
	<th>Resumo</th>
	<th colspan="2">Opcoes</th>
</tr>
<?php for($j=0;$j<$num;$j++){
	$dados = mysql_fetch_array($res); //idnoticias 	titulo 	resumo 	texto 	data_post
?>
<tr>
    <td><?php echo utf8_decode($dados['titulo'])?></td>
    <td><?php utf8_decode($dados['resumo']);         
            echo utf8_decode($dados['texto'])."<br>";
			echo utf8_decode($dados['data_post'])."<br>";
    ?></td>
    <td><a href="CAdmin.class.php?acao=excluir_noticia&idnoticias=<?php echo $dados['idnoticias'];?>"><img src="img/excluir.png">Excluir</a></td>
    <td><a href="index.php?acao_menu=cadastrarnoticias&facao=alterarnoticias&id=<?php echo $dados['idnoticias'];?>"><img src="img/editar.png">Alterar</a></td>
    
</tr>
<?php }
?>
</table>

 
 
 