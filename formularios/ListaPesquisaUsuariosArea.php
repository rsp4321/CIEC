<html>
<head>
<style type="text/css">
	@import url("CSS/estiloTabelas.css");
</style>
</head>
<?php header("Content-Type: text/html; charset=ISO-8859-1",true);
include("conexao.php");
session_start();

$area = $_SESSION['area'];
?>
<table border="1" align="center" class="linhasAlternadas">
<tr>
    <th>Nome</th>
    <th>E-mail</th>
    <th>Curso</th>
    <th>Links</th>
</tr>
<?php 
if ($area==0){
	$sql = "SELECT * FROM `ex_aluno` order by nome";
 
$res = mysql_query($sql,$conexao);
$num_egressos = mysql_num_rows($res);
for($j=0;$j<$num_egressos;$j++){
	$dados = mysql_fetch_array($res);
?>
<tr>
    <td><?php echo $dados['nome']?></td>
    <td><?php echo $dados['email']?></td>
    <td><?php $id=$dados['ex_aluno_id']; 
        $sql2 = "SELECT curso FROM formacao WHERE id_egresso = $id";
        $res2 = mysql_query($sql2,$conexao);
        $num_cursos = mysql_num_rows($res2);
        
        for($i=0; $i<$num_cursos; $i++){
            $dados2 = mysql_fetch_array($res2);            
            $codcurso = $dados2['curso'];
            $sql3 = "SELECT nome FROM curso WHERE cid=$codcurso ";
            $res3 = mysql_query($sql3,$conexao);
            $dados3 = mysql_fetch_array($res3);
            echo $dados3['nome']."<br>";
        }
    ?></td>
    <td><a href="formularios/curriculo.php?id=<?php echo $id; ?>">Currículo</a></td>
    
</tr>
<?php } 
}else{
$sql4= "SELECT id_egresso FROM `formacao` WHERE area=$area";
$res4 = mysql_query($sql4,$conexao);
$num_vezes = mysql_num_rows($res4);
for($j=0;$j<$num_vezes;$j++){
	$dados4 = mysql_fetch_array($res4);
	$id = $dados4["id_egresso"];

$sql = "SELECT * FROM `ex_aluno` WHERE ex_aluno_id=$id";
 
$res = mysql_query($sql,$conexao);
	$dados = mysql_fetch_array($res);
?>
<tr>
    <td><?php echo $dados['nome']?></td>
    <td><?php echo $dados['email']?></td>
    <td><?php $sql2 = "SELECT curso FROM formacao WHERE id_egresso = $id";
        $res2 = mysql_query($sql2,$conexao);
        $num_cursos = mysql_num_rows($res2);
        
        for($i=0; $i<$num_cursos; $i++){
            $dados2 = mysql_fetch_array($res2);            
            $codcurso = $dados2['curso'];
            $sql3 = "SELECT nome FROM curso WHERE cid=$codcurso ";
            $res3 = mysql_query($sql3,$conexao);
            $dados3 = mysql_fetch_array($res3);
            echo $dados3['nome']."<br>";
        }
    ?></td>
    <td><a href="formularios/curriculo.php?id=<?php echo $id; ?>">Currículo</a></td>
    
</tr>
<?php }
}
?>
</table>
</html>

 
 
 