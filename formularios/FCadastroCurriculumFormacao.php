<html>
<?php header("Content-Type: text/html; charset=ISO-8859-1",true);
    include "conexao.php";
    $sql = "SELECT * FROM area ORDER BY nome";
    $res = mysql_query($sql,$conexao);
    $num = mysql_num_rows($res);
    
    
?>
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>Teste</title>
<meta http-equiv="Content-Type" content="text/html; charset=iso-8859-1" />
<script type="text/javascript" src="prototype.js"></script>
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
<script language="javascript">
function Botao1(){
    document.FCadastroCurriculum.action="CUsr.class.php?acao=cadastrar_formacao";
    document.forms.FCadastroCurriculum.submit(); 

}

function Botao2(){
    document.FCadastroCurriculum.action="CUsr.class.php?acao=cadastrar_formacao2";
    document.forms.FCadastroCurriculum.submit(); 
}

</script>
	<style type="text/css">
	@import url(cssForm/style_form.css);
	</style>
</head>


<body bgcolor='white'> 
  
  <form method='post' name='FCadastroCurriculum' onsubmit="return validar()">
  <div align="center">
  <table id="todoform" cellspacing='5' rules='none' border="0">
	
  	<!--
		<Formação
	-->
    <tr><td colspan="2"><div id="titulo" align="center">Cadastro de Curriculo</div></td></tr>
	<tr><td colspan="2" bgcolor="#D3D3D3">Formação</td></tr>	
	<tr>
    <td width="88">Area:</td>
    <td width="212">
      <select name="area" id="area" onchange="CarregaCurso(this.value)">
      <option value="0">Selecione</option>
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
    <tr>
      <td>Instituição</td>
      <td><input name='instituicao'  id='instituicao' type='text' size='50'maxlength='50'></td>
    </tr> 
	<tr>
      <td>Campus/Cidade</td>
      <td><input name='campos' id='campos' type='text' size='20'maxlength='20'></td>
    </tr> 
	<tr>
      <td>Duração</td>
      <td><input name='duracao' id='duracao' type='text' size='2'maxlength='2'></td>
    </tr>
	<tr>
      <td>Ano Formação</td>
      <td><input name='ano' id='ano' type='text' size='4'maxlength='4' ></td>
    </tr> 
</div>
<tr>
    <td><div align="center"><input class="botao" type="button" onclick="Botao1()" value="Nova Formação"></div></td>
  	<td><div align="center"><input class="botao" type="button" onclick="Botao2()" value="Próximo"></div></td>
</tr>
</table>
</div>
</form>

</body>


