<html>
  <head>
    <title>Alterar Dados</title>
  <!--
	-->
	<style type="text/css">
	@import url(cssForm/style_form.css);
	</style>
       <script src='valida.js' type='text/javascript'>
	</script>
	<script language="javascript">
function Botao1(){
    //document.FAlteraDadosAdmin.action="CAdmin.class.php?acao=altera_dados";
    document.forms.FAlteraDadosAdmin.submit(); 

}

function Botao2(){
    //document.FAlteraDados.action="CAdmin.class.php?acao=atualiza_dados";
    document.forms.FAlteraDados.submit(); 
}

</script>   
  </head>

<body bgcolor='white'>


<form name='FAlteraDadosAdmin' method='POST' action='CAdmin.class.php?acao=altera_dados' onsubmit='return validaFPreCadastro();'>
  <div>
  <table id="todoform" cellspacing='5' rules='none'border="0">
    <tr>
        <td colspan="2"><div id="titulo">Alteração de Senha</div></td>
    </tr>
    <tr>
      <td>Login</td>
      <td><input name='login' id='login' type='text' size='50'></td>
    </tr>
    <tr>
      <td>Senha</td>
      <td><input name='senha' id='senha' type='password' size='20'></td>
    </tr>
    <tr>
      <td>Nova Senha</td>
      <td><input name='nvsenha' id='nvsenha' type='password' size='20'></td>
    </tr>
    <tr>
      <td>Repita a Senha</td>
      <td><input name='nvsenha2' id='nvsenha2' type='password' size='20'></td>
    </tr>
    <tr>
	 <td colspan="2">
  		<div align="center"><input type="submit" value="Alterar" onclick="Botao1()"></div>
  	</td>
   </tr>
  </table>
  </div>
  </form>
  <div>
  <?php
	include ("conexao.php");
	$sql = "SELECT * FROM dados_ciec";
	$res = mysql_query($sql,$conexao);
	$dados = mysql_fetch_array($res);
	$nome = $dados["nome"];
	$fone = $dados["fone"];
	$fax = $dados["fax"];
	$email = $dados["email"];
	$quemsomos = $dados["quemsomos"];
?>
<form method='POST' name="FAlteraDados" action="CAdmin.class.php?acao=atualiza_dados">
  <table id="todoform" cellspacing='5' rules='none'border="0">
    <tr>
        <td colspan="2"><div id="titulo">Alteração de Dados</div></td>
    </tr>
    <tr>
      <td>Nome</td>
      <td><input name='nome' id='nome' type='text' size='50' value="<?php echo $nome;?>"></td>
    </tr>
    <tr>
      <td>Telefone</td>
      <td><input name='fone' id='fone' type='text' size='50' value="<?php echo $fone;?>"></td>
    </tr>
    <tr>
      <td>Fax</td>
      <td><input name='fax' id='fax' type='text' size='50' value="<?php echo $fax; ?>"></td>
    </tr>
    <tr>
      <td>Email</td>
      <td><input name='email' id='email' type='text' size='50' value="<?php echo $email;?>"></td>
    </tr>
	<tr>
      <td>Texto Quem Somos</td>
      <td><textarea name="quemsomos" cols="40" rows="10" maxlength="500"><?php echo $quemsomos; ?></textarea></td>
    </tr>
    <tr>
	 <td colspan="2">
  		<div align="center"><input type="button" value="Atualizar" onclick="Botao2()"></div>
  	</td>
   </tr>
  </table>
  </form>
  </div>
  </body>
</html>

<script language="JavaScript" >
function validaFPreCadastro(){
    form = document.FAlteraDadosAdmin;

    if(form.login.value == ""){
        alert('LOGIN EM BRANCO');
        form.login.focus();
        return false;}

    if(form.senha.value == ""){
        alert('SENHA EM BRANCO');
        form.senha.focus();
        return false;}

    if(form.nvsenha.value == ""){
        alert('DIGITE UMA NOVA SENHA');
        form.nvsenha.focus();
        return false;}

     if(form.nvsenha2.value == ""){
        alert('REPITA A NOVA SENHA');
        form.nvsenha2.focus();
        return false;}

    if(form.nvsenha.value != form.nvsenha2.value){
        alert('NOVAS SENHAS NAO CONFEREM');
        form.nvsenha2.focus();
        return false;}

    return true;
}
</script>