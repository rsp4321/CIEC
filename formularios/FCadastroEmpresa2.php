<html>
  <head>
    <title>FCadastroAluno</title>
    <!--
    <
	-->
	<style type="text/css">
	@import url(cssForm/style_form.css);
	</style>
  </head>
      
<body bgcolor='white'>       
        <div id="titulo">Cadastro de Empresa</div>
        
		<form name='FCadastroEmpresa' method='POST' onsubmit='return validaFCadastroEmpresa();' action='CUsr.class.php?acao=cadastrar_empresa'>
		<table id="todoform" cellspacing='5' rules='none' border="1">
           <tr>
	          <td>Razão Social</td>
                  <td><input type="text" name="razaoSocial" id="razaoSocial" size="50" maxlength="50"></td>
           </tr>
           <tr>
	          <td>Nome Fantasia</td>
                  <td><input type="text" name="nomeFantasia" size="30" maxlength="30"> <td>
           </tr>
           <tr>
	          <td>CNPJ</td>
                  <td><input type="text" name="cnpj" size="14" maxlength="14"></td>
           </tr>
           <tr>
	          <td>Inscrição Estadual</td>
                  <td><input type="text" name="inscricaoEstadual" size="12" maxlength="12"></td>
           </tr>
           <tr>
	          <td>Email</td>
                  <td><input type="text" name="email" size="30" maxlength="30"></td>
           </tr>
           <tr>
	          <td>Endereço Eletronico</td>
                  <td><input type="text" name="enderecoEletronico" size="30" maxlength="30"></td>
           </tr>
           <tr>
	          <td>Telefone</td>
                  <td><input type="text" name="telefone" size="12" maxlength="12"></td>
           </tr>
           <tr>
	          <td>Fax</td>
                  <td><input type="text" name="fax" size="20" maxlength="20"></td>
           </tr>
           <tr>
	          <td>Representante Legal</td>
                  <td><input type="text" name="representanteLegal" size="30" maxlength="30"></td>
           </tr>
           <tr>
	          <td>Login</td>
                  <td><input type="text" name="login" size="30" maxlength="30"></td>
           </tr>
           <tr>
	          <td>Senha</td>
                  <td><input type="text" name="senha" size="25" maxlength="25"></td>
           </tr>
           <tr>
	          <td>Confirma Senha</td>
                  <td><input type="text" name="senha1" size="25" maxlength="25"></td>
           </tr>
           <tr>
             <td colspan = "2" >
			 <div align="center"><input name='submit' id='submit' type="submit" value="Cadastrar"></td></div>
          </tr>
       </table>	
	</form>
  </body>  
  </html> 