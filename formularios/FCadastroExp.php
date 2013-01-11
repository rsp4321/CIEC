<html>
<?php header("Content-Type: text/html; charset=ISO-8859-1",true);
    include ("conexao.php");
    $sql = "SELECT * FROM area ORDER BY nome";
    $res = mysql_query($sql,$conexao);
    $num = mysql_num_rows($res);
    
    
?>
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>Experiências Profissionais</title>
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
    document.FCadastroCurriculum.action="CUsr.class.php?acao=cadastrar_exp3";
    document.forms.FCadastroCurriculum.submit();    
}
</script>
	<style type="text/css">
	@import url(cssForm/style_form.css);
	</style>
</head>
<body bgcolor='white'>


  <form name='FCadastroCurriculum' method='post' onsubmit="return validaFCadastroCurriculum();">
  <div align="center">
  <table id="todoform" cellspacing='5' rules='none' border="0">
    <tr><td colspan="2" bgcolor="#D3D3D3">Experiencia Profissional</td></tr>
    <tr>
      <td>Empresa</td>
      <td><input name='empresa' id='empresa' type='text' size='50'maxlength='50'></td>
    </tr>
    <tr>
      <td>Email</td>
      <td><input name='email' id='email' type='text' size='' maxlength='50'></td>
    </tr>
    <tr>
      <td>Telefone</td>
      <td><input name='dddtel2' id='dddtel2' type='text' size='1' maxlength='2' onKeyPress="muda()"> -
      <input name='empresafone' id='empresafone' type='text' size='5' maxlength='8'>ddd-numero</td>
    </tr>
	<tr>
      <td>Período (Data Inicial - Data Final)</td>
      <td><input name='data_inicial' id='peridoi' type='text' size='10' maxlength = '10'> a
	  <input name='data_final' id='periodof' type='text' size='10' maxlength = '10'> dd/mm/aaaa</td>
    </tr>
	 <tr>
      <td>Cargo</td>
      <td><input name='cargo' id='cargo' type='text' size='30' maxlength='30'></td>
    </tr>
	<tr>
      <td>Atividades</td>
      <td><textarea name='atividade' id='atividade'  cols = '40' rows = '5' onkeyup = 'checa(this, 500)'></textarea></td>
    </tr>
	<!--
		<Areas de atuação
	-->
	<tr>
      
    </tr>
    <tr>
	 
   </tr>
  </div>
  <tr>
    <td><div align="center"><input class="botao" type="button" onclick="Botao1()" value="CADASTRAR" > </div></td>
</tr>
</table>
</div>
</form>
</body>


