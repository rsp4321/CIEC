<?php
include "ConectaBD.class.php";
//include "ConectaBD.class.php";

$sql = "SELECT * FROM area ORDER BY nome";
$res = $con->consult($sql);
$num = mysql_num_rows($res);
?>

<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>Teste</title>
<script type="text/javascript" src="Java Script/prototype.js" charset="utf-8"></script>
<script language="javascript">
function CarregaCurso(codArea)
{
	if(codArea){
	   	//alert("Entrou no SE: Estado "+ codArea);
        var myAjax = new Ajax.Updater('cursoAjax','carregaCursos.php?codArea=' + codArea,
		{
			method : 'get',
		}) ;

    }	
}
</script>

</head>

<body>
<table width="300" border="0" align="center" cellpadding="2" cellspacing="1">
  <tr>
    <td width="88">Área:</td>
    <td width="212">
      <select name="area" id="area" onchange="CarregaCurso(this.value)">
      <option>Selecione</option>
      <?php for($i=0;$i<$num;$i++)
	  {
	  	$dados = mysql_fetch_array($res);
	  ?>
      	<option value="<?php echo $dados["id"]?>"><?php echo $dados["nome"]?></option>
       <?php }?>
      </select>
    </td>
  </tr>
  <tr>
    <td>Cursos:</td>
    <td><div id="cursoAjax">
      	<select name="curso" id="curso">
      		<option value="0">Selecione o curso</option>
    	</select>
    </div></td>
  </tr>
</table>
</body>
</html>
