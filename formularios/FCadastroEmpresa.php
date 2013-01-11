<?php

	if(!isset($_POST['submit'])){
		?>
		<script src='valida.js' type='text/javascript'></script>
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
    <?php
	}else{
		//echo"<script type='text/javascript'>alert('deu erro');window.location.href='formulario.php'</script>";
		
		    if(isset($_POST["submit"]))
   			{
       			$razaoSocial = $_POST["razaoSocial"];
       			$nomeFantasia = $_POST["nomeFantasia"];
                        $cnpj = $_POST["cnpj"];
                        $inscricaoEstadual = $_POST["inscricaoEstadual"];
                        $enderecoEletronico = $_POST["enderecoEletronico"];
                        $telefone = $_POST["telefone"];
                        $fax = $_POST["fax"];
                        $representanteLegal = $_POST["representanteLegal"];
                        $login = $_POST["login"];
                        $senha = $_POST["senha"];
                        $senha1 = $_POST["senha1"];

       
       			if ($razaoSocial == "")
       			{
          			echo "<script language='javascript'> alert('Razao Social em Branco');</script> ";          			
       			}
        		else
       			{
            		if ($nomeFantasia == "")
            		{
              			 echo "<script language='javascript'> alert('Nome Fantasia em Branco');</script> ";
           			}
           			else
            		{
                		if ($cnpj == "")
                		{
                   			echo "<script language='javascript'> alert('CNPJ em Branco');</script> ";
                		}
                		else
                		{
                    		if ($inscricaoEstadual == "")
                    		{
                       		echo "<script language='javascript'> alert('Incrição Estadual em Branco');</script> ";
                    		}
                    		else
                			{
                    			if ($enderecoEletronico == "")
                    			{
                       				echo "<script language='javascript'> alert('Endereço Eletronico em Branco'); </script> ";
                    			}
                    			else
								{
									if($telefone =="")
									{
										echo "<script language='javascript'> alert('Telefone em Branco'); </script> ";
									}else
									{
										if($fax == "")
										{
											echo "<script language='javascript'> alert('Fax em Branco'); </script> ";
										}
										else
										{
											if($representanteLegal == "")
											{
												echo "<script language='javascript'> alert('Representante Legal em Branco'); </script> ";
											}
											else
											{
												if($login == "")
												{
													echo "<script language='javascript'> alert('Login em Branco'); </script> ";
												}
												else
												{
													if($senha == "")
													{
														echo "<script language='javascript'> alert('Senha em Branco'); </script> ";
													}else
													{
														if(($senha1 =="")||($senha !=$senha1))
														{
															echo "<script language='javascript'> alert('Senhas não Correspodem!!!'); </script> ";														
														}
														else
														{
															header('location:');
														}
													}
												}
											}
										}
									}
								}
                			}
                		}
            		}
       			}
  			}       
      
	}//fim do else	

?> 