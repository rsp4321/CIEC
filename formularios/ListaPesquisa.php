<head>
<style type="text/css">
	@import url("CSS/estiloTabelas.css");
</style>
</head>
<?php header("Content-Type: text/html; charset=ISO-8859-1",true);
include("conexao.php");
session_start();
 $texto = $_SESSION['busca'];
  
 $sql = "SELECT * FROM `ex_aluno` WHERE (nome LIKE '%$texto%') order by nome";
 
$res = mysql_query($sql,$conexao);
$num_egressos = mysql_num_rows($res);

?>
<table border="1" align="center" class="linhasAlternadas">
<tr>
    <th>Nome</th>
    <th>CPF</th>
    <th>E-mail</th>
</tr>
<?php for($j=0;$j<$num_egressos;$j++){
	$dados = mysql_fetch_array($res);
?>
<tr>
    <td><?php echo $dados['nome']?></td>
    <td><?php echo $dados['cpf']?></td>
    <td><?php echo $dados['email']?></td>
    <td><a href="formularios/curriculo.php?id=<?php echo $dados['ex_aluno_id']?>">Currículo</a></td>
</tr>
<?php }?>
</table>
 
 
 
 