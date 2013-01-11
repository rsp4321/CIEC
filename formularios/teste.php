<!DOCTYPE HTML PUBLIC "-//W3C//DTD HTML 4.01 Transitional//EN" "http://www.w3.org/TR/html4/loose.dtd">
<html>

<head>
	<script language="JavaScript" src="testeScript.js"></script>
	<meta http-equiv="content-type" content="text/html; charset=iso-8859-1">
	<meta name="author" content="">
<style type="text/css" media="screem">
	<!--@import url("style_form.css");-->
body{
background: blue;	
}

table#tabela {
border-collapse: collapse;
color: blue;
background: blue;
}
</style>
	<title>Formulário de Cadastro</title>
	
</head>
<body bgcolor="LIGHTBLUE">
 	<h2 align="center">Cadastro de Aluno</h2>
 	
<form name="formulario" method="POST" onsubmit="return valida()">
	<table id="tabela" border="1" align="center">
	
	<tr>
		<td align="right">Nome:</td>
		<td><input type="text" size="30" maxlength="30" name="nome"></td>
	</tr>
	<tr>
		<td align="right">Sexo:</td>
		<td>Masculino<input type="radio" name="masculino" value="f" > 
			Feminino<input type="radio" name ="feminino" value="m" ></td>
	</tr>
	<tr>
		<td align="right">Curso:</td>
		<td><select  name="curso">
			<option value="Selecione">Selecione</option> 
			<option value="Computação">Ciência da Computação</option> 
			<option value="Administração">Administração</option> 
			<option value="Matematica">Matemática</option>
			<option value="Agroecologia">Agroecologia</option>  
			</select> </a></td>
	</tr>
	<tr>
		<td align="right">Disciplina:</td>
		<td><select  size="4" multiple="">
			<option value="Calculo">Calculo</option> 
			<option value="Algoritmo">Algoritmo 1</option> 
			<option value="Geometria">Geometria Analítica</option>
			<option value="Programação">Programação 1</option>  
			</select> </a></td>
	</tr>
	<tr>
		<td align="center" colspan="2"><input type="submit" value="Enviar"></td>
	</tr>
	</form>
</table>


</body>
</html>