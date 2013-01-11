<!DOCTYPE HTML PUBLIC "-//W3C//DTD HTML 4.01 Transitional//EN" "http://www.w3.org/TR/html4/loose.dtd">

<html>
<head>
</head>	
<script>
function limpar(){
    
    document.form1.busca.value = "";
    
}
</script>

<body>
<center>
<form method="post" name="form1" action="CAdmin.class.php?acao=pesquisa2">
<table>
<tr>
    <td><input type="text" size="20" name="busca" value="Digite um Nome" onclick="limpar()"/> </td>
</tr>
<tr>
    <td align="center"><input type="submit" value="Buscar"  /></td>
</tr>
</table>
</form>
</center>	
</body>		
</html>