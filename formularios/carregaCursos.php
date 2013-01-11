<?php
include "conexao.php";

$codArea = $_GET['codArea'];

$sql = "SELECT cid, nome FROM curso WHERE id_area='$codArea'";
$res = mysql_query($sql,$conexao);
$num_cursos = mysql_num_rows($res);

?>
<select name="cidade" id="cidade">
<?php for($j=0;$j<$num_cursos;$j++){
	$dados = mysql_fetch_array($res);
?>
	<option value="<?php echo $dados['cid']?>"><?php echo $dados['nome']?></option>
<?php }?>
</select>