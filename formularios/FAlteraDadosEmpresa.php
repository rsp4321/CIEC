<html>
  <head>
    <title>FCadastroEmpresa</title>
    <!--
     < ESTA EM USO
	-->
	<style type="text/css">
	@import url(cssForm/style_form.css);
	</style>
    <script type='text/javascript'>
    function voltar(){
        window.location.href='javascript:history.go(-1)';	
    }							
    </script>
  </head>
  
  <?php 
  include ("conexao.php");
  
  $id = $_SESSION['aid'];
  $sql = "SELECT * FROM empresa where id = $id";
  $res = mysql_query($sql,$conexao);
  $dados = mysql_fetch_array($res);
  $razao = $dados['razao'];
  $nomeFantasia = $dados['nomeFantasia'];
  $email = $dados['email'];
  $site = $dados['site'];
  $fone = $dados['fone'];
  $fax = $dados['fax'];
  $representante = $dados['representante'];
  
  //echo "<script type='text/javascript'>alert('aid= $id');</script>";

  ?>
  
<body bgcolor='white'>
  
<script src='valida.js' type='text/javascript'></script>

  <form name='FCadastroEmpresa' method='post' action="CUsr.class.php?acao=atualizar_empresa">
  <div>
  <table id="todoform" cellspacing='5' rules='none' border="0">
  <tr>
  	<td colspan="2"><div id="titulo">Alterar Dados</div>
    <input type="hidden" name="id" value="<?php echo $id;?>" />   
   </td>
  </tr>
     <tr>
        <td>Razão Social</td>
            <td><input type="text" name="razaoSocial" id="razaoSocial" size="80" maxlength="80" value="<?php echo $razao; ?>"></td>
     </tr>
     
    <tr>
        <td>Nome Fantasia</td>
        <td><input type="text" name="nomeFantasia" size="50" maxlength="50" value="<?php echo $nomeFantasia; ?>"> <td>
    </tr>
    <tr>
        <td>Endereço Eletrônico</td>
        <td><input type="text" name="enderecoEletronico" size="60" maxlength="60" value="<?php echo $site; ?>"></td>
    </tr>
    <tr>
        <td>Email</td>
        <td><input type="text" name="email" size="50" maxlength="50" value="<?php echo $email; ?>"></td>
    </tr>
    <tr>
        <td>Telefone</td>
        <td><input type="text" name="telefone" size="12" maxlength="12" value="<?php echo $fone; ?>"></td>
    </tr>
	<tr><br></tr>   
    <tr>
        <td>Fax</td>
        <td><input type="text" name="fax" size="20" maxlength="20" value="<?php echo $fax; ?>"></td>
    </tr>
    <tr>
	          <td>Representante Legal</td>
                  <td><input type="text" name="representanteLegal" size="70" maxlength="70" value="<?php echo $representante; ?>"></td>
           </tr>
	<tr>
	 <td colspan="2">
  		<div align="center"><span id="botao"><input type="button" onclick="voltar();" value="Voltar"/><input type="submit" value="Atualizar"/></span> </div>
  	</td>
   </tr>
  </table>  
  </div>
  </form>
  </body>
</html>	  