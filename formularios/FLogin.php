<!DOCTYPE HTML PUBLIC "-//W3C//DTD HTML 4.01 Transitional//EN" "http://www.w3.org/TR/html4/loose.dtd">
<html>

<head>
	<meta http-equiv="content-type" content="text/html; charset=utf-8">
	<meta name="author" content="Raphael Barbosa">

	<title>Login</title>
	<style type="text/css">
	@import url("cssForm/style_form.css");
	</style>
</head>

<body>

<center>
    <div id="formLogin" class="" >
        <form action='CAdmin.class.php?acao=login' method='POST' >
	       <table >
        	 <tr>
        	 	<td colspan="2" align="center">Login</td>
        	 </tr>
        	 <tr>
        	 	<td>Usuário:</td>
        	 	<td><input name='login' type="text" size="15"></td>
        	 </tr>
        	 <tr>
        	 	<td>Senha:</td>
        	 	<td><input name='senha' type="password" size="15"></td>
        	 </tr>
             <tr>
                <td>Tipo:</td>
        	 	<td><select name="tipo">
                            <option value="4">Selecione</option>
                            <option value="0">Administrador</option>
                            <option value="1">Egresso</option>
                            <option value="2">Empresa</option>
                    </select></td>
        	 </tr>
        	 <tr>
        	  <td colspan="2"><center><button type="submit" class="botao" >Entrar</button></center></td>
        	 </tr>
	       </table>
        </form>
    </div>
</center>

</body>
</html>