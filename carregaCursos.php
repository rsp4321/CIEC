<?php header("Content-Type: text/html; charset=utf-8",true);
include "ConectaBD.class.php";

$codArea = $_GET['codArea'];

$sql = "SELECT cid, nome FROM curso WHERE id_area='$codArea'";
$res = $con->consult($sql);
$num_cursos = mysql_num_rows($res);

?>
<select name="curso" id="curso">
<?php for($j=0;$j<$num_cursos;$j++){
	$dados = mysql_fetch_array($res);
?>
	<option value="<?php echo $dados['cid']?>"><?php echo $dados['nome']?></option>
<?php }?>
</select>