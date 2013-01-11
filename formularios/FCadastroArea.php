<html>
<?php
    header("Content-Type: text/html; charset=ISO-8859-1",true);
?>
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>Cadastro de Area</title>
<meta http-equiv="Content-Type" content="text/html; charset=iso-8859-1" />
	<style type="text/css">
	@import url(cssForm/style_form.css);
	</style>
</head>
<body bgcolor='white'>
  <form name='FCadastroCurso' method='post' action="CAdmin.class.php?acao=cadastrar_area" onsubmit="">
  <div >
  <table id="todoform" cellspacing='5' rules='none' border="0">
    <tr>
        <td colspan="2"><div id="titulo">Cadastro Area</div></td>
    </tr>
    <tr>
      <td>Area</td>
      <td><input name='nome' id='nome' type='text' size='50'></td>
    </tr>    
  <tr>
  <td colspan="2"><div align="center"><input class="botao" type="submit" value="Cadastrar" > </div></td>
  </tr>
</table>
</div>
</form>
</body>


