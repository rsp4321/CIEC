<html>
<?php header("Content-Type: text/html; charset=ISO-8859-1",true);
    include ("conexao.php");
    
    session_start();
    $idEgresso = $_SESSION['ex_aluno_id'];
    $sql = "SELECT * FROM curriculo_cadastrado where id_egresso=$idEgresso";
    $res = mysql_query($sql,$conexao);
    $num = mysql_num_rows($res);
    if($num==1)
    {
        echo("<script type='text/javascript'>alert('Voce ja possui curriculo cadastrado. Se desejar, pode atualizar seus DADOS!!!');window.location.href='index.php?acao_menu=gn&facao=atualizar';</script>");
    }

    $sql = "SELECT * FROM area ORDER BY nome";
    $res = mysql_query($sql,$conexao);
    $num = mysql_num_rows($res);
    
    $nome = $_SESSION['nome'];
    $login = $_SESSION['login'];
    $senha = $_SESSION['senha'];
    $cpf = $_SESSION['cpf'];
    $email = $_SESSION['email'];
    
    $rua = $_SESSION['rua'];
    $num = $_SESSION['num'];
    $complemento = $_SESSION['complemento'];
    $bairro = $_SESSION['bairro'];
    $cidade = $_SESSION['cidade'];
    $estado = $_SESSION['estado'];
    $cep = $_SESSION['cep'];
    
    $sql2 = "SELECT * FROM dados_gerais where id_egresso=$idEgresso";
    $res2 = mysql_query($sql2,$conexao);
    $numDados = mysql_num_rows($res2);
    
    //echo "<script type='text/javascript'>alert('Dados Gerais:  $numDados de $idEgresso')</script>"; 
    
?>
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>Teste</title>
<meta http-equiv="Content-Type" content="text/html; charset=iso-8859-1" />
<script type="text/javascript" src="prototype.js"></script>
<script type="text/javascript">
function validaFCadastroCurriculum(){
	form = document.FCadastroCurriculum;
		
   if (!form.sexo[0].checked && !form.sexo[1].checked){
        alert('Sexo em Branco');
        form.sexo[0].focus();
        return false;}

	if (form.data_nasc.value==""){
        alert('Preencha a Data de Nascimento');
        form.data_nasc.focus();
        return false;}  
	
	if (!form.estadocivil[0].checked && !form.estadocivil[1].checked && !form.estadocivil[2].checked && !form.estadocivil[3].checked){
        alert('Estado Civil em Branco');
        form.estadocivil[0].focus();
        return false;}	    

      
   	if (form.email.value==""){
        alert('Preencha o Email');
        form.email.focus();
        return false;}
		
	if (form.dddtel.value==""){
        alert('Preencha o DDD');
        form.dddtel.focus();
        return false;}
		
	if (form.fone.value==""){
        alert('Preencha o Telefone');
        form.fone.focus();
        return false;}		    
   
   	if (form.dddcel.value==""){
        alert('Prencha o DDD');
        form.dddcel.focus();
        return false;}	
        
   if (form.celular.value==""){
        alert('Preencha o Celular');
        form.celular.focus();
        return false;}	
		
	if (form.rua.value==""){
        alert('Preencha a Rua');
        form.rua.focus();
        return false;}
		  
   	if (form.numero.value==""){
        alert('Preencha o Número');
        form.numero.focus();
        return false;}	
	
   	if (form.bairro.value==""){
        alert('Preencha o Bairro');
        form.bairro.focus();
        return false;}
    	
	if (form.cidade.value==""){
        alert('Preencha a Cidade');
        form.cidade.focus();
        return false;}
		
	if (form.estado.value==""){
        alert('Selecione o Estado');
        form.estado.focus();
        return false;}		    
   
   	if (form.cep.value==""){
        alert('Prencha o CEP');
        form.cep.focus();
        return false;}

	if (!form.interesse[0].checked && !form.interesse[1].checked){
        alert('Interesse em Branco');
        form.interesse[0].focus();
        return false;}	
	
	if (form.areainteresse.value==""){
        alert('Prencha a Area de Interesse');
        form.areainteresse.focus();
        return false;}
		
    return  true;
 }
</script>
	<style type="text/css">
	@import url(cssForm/style_form.css);
	</style>
</head>
<body bgcolor='white'>

  
  <form name='FCadastroCurriculum' method='post' action="CUsr.class.php?acao=cadastrar_curriculum" onsubmit="return validaFCadastroCurriculum();">
  <div align="center">  
  <table id="todoform" cellspacing='5' rules='none' border="0">
	<tr>
      <td colspan="2"><div id="titulo" align="center">Cadastro de Curriculo</div></td>
    </tr>
	<!--
		<Dados Pessoias
	-->
  <tr><td colspan="2" bgcolor="#D3D3D3">Dados Pessoais</td></tr>    
    <tr>
      <td>Nome</td>
      <td><input name='nome' id='nome' type='text' size='50' value="<?php echo $nome?>"  disabled="true" ></td>
    </tr>
    <tr>
      <td><input name='idEgresso' id='idEgresso' type='hidden' size='50' value="<?php echo $idEgresso?>"></td>
    </tr>
	<tr>
      <td>Sexo</td>
      <td>
		<input name='sexo' id='sexo' type='radio' value = 'masculino'>Masculino
		<input name='sexo' id='sexo' type='radio' value = 'feminino'>Feminino
	  </td>
    </tr>
	<tr>
      <td>Data de Nascimento</td>
      <td><input name='data_nasc' id='data_nasc' type='text' size='10' maxlength = '10'> dd/mm/aaaa</td>
    </tr>
	<tr>
      <td>Estado Civil</td>
      <td>
		<input name='estadocivil' id='estadocivil' type='radio' value = 'Solteiro'>Solteiro(a)
		<input name='estadocivil' id='estadocivil' type='radio' value = 'Casado'>Casado(a)
		<input name='estadocivil' id='estadocivil' type='radio' value = 'Divorciado'>Divorciado(a)
		<input name='estadocivil' id='estadocivil' type='radio' value = 'Viuvo'>Vi&uacute;vo(a)</td>
    </tr> 
	<tr>
      <td>Carteira de Habilitacao</td>
      <td><select name='habilitacao'>
          <option value="">Tipo/Categoria</option>
          <option value='A'>A</option>
       	  <option value='B'>B</option>
          <option value='C'>C</option>
		  <option value='D'>D</option>
		  <option value='E'>E</option>
       	  <option value='AB'>AB</option>
          <option value='AC'>AC</option>
		  <option value='AD'>AD</option>
          <option value='AE'>AE</option></select>
      </td>
    </tr>
    <tr>
      <td>Email</td>
      <td><input name='email' id='email' type='text' size='' maxlength='50' value="<?php echo $email?>"></td>
    </tr>
    <tr>
      <td>Telefone</td>
      <td><input name='dddtel' id='dddtel' type='text' size='1' maxlength='2' onKeyPress="muda()"> -
      <input name='fone' id='fone' type='text' size='5' maxlength='8'>ddd-numero</td>
    </tr>
    <tr>
      <td>Celular</td>
	  <td><input name='dddcel' id='dddcel' type='text' size='1' maxlength='2' onKeyPress="muda()"> -
      <input name='celular' id='celular' type='text' size='5' maxlength='8'> ddd-numero</td>
    </tr>
	<tr><br></tr>  
	<!--
		<Endereço
	-->	
    <tr><td colspan="2" bgcolor="#D3D3D3">Endereço</td></tr>
    <tr>
      <td>Rua</td>
      <td><input name='rua' type='text' size='50' value="<?php echo $rua ?>"></td>
    </tr>
    <tr>
      <td>Número</td>
      <td><input name='numero' type='text' maxlength='5' value="<?php echo $num ?>"></td>
    </tr> 
	<tr>
      <td>Complemento</td>
      <td><input name='complemento' type='text' maxlength='15' value="<?php echo $complemento?>"></td>
    </tr>  
    <tr>
      <td>Bairro</td>
      <td><input name='bairro' type='text' size='50' value="<?php echo $bairro?>"></td>
    </tr>
    <tr>
      <td>Cidade</td>
      <td><input name='cidade' type='text' size='25' value="<?php echo $cidade?>"></td>
    </tr>
    <tr>
      <td>Estado</td>
      <td><select name='estado'>
          <option value=''>estado</option>
          <option value='AC' <?php if($estado == 'AC')echo "selected = 'selected'"?>>AC</option>
       	  <option value='AL' <?php if($estado == 'AL')echo "selected = 'selected'"?>>AL</option>
          <option value='AP' <?php if($estado == 'AP')echo "selected = 'selected'"?>>AP</option>
          <option value='AM' <?php if($estado == 'AM')echo "selected = 'selected'"?>>AM</option>
          <option value='BA' <?php if($estado == 'BA')echo "selected = 'selected'"?>>BA</option>
          <option value='CE' <?php if($estado == 'CE')echo "selected = 'selected'"?>>CE</option>
          <option value='DF' <?php if($estado == 'DF')echo "selected = 'selected'"?>>DF</option>
          <option value='GO' <?php if($estado == 'GO')echo "selected = 'selected'"?>>GO</option>
          <option value='ES' <?php if($estado == 'ES')echo "selected = 'selected'"?>>ES</option>
          <option value='MA' <?php if($estado == 'MA')echo "selected = 'selected'"?>>MA</option>
          <option value='MT' <?php if($estado == 'MT')echo "selected = 'selected'"?>>MT</option>
          <option value='MS' <?php if($estado == 'MS')echo "selected = 'selected'"?>>MS</option>
          <option value='MG' <?php if($estado == 'MG')echo "selected = 'selected'"?>>MG</option>
          <option value='PA' <?php if($estado == 'PA')echo "selected = 'selected'"?>>PA</option>
          <option value='PB' <?php if($estado == 'PB')echo "selected = 'selected'"?>>PB</option>
          <option value='PR' <?php if($estado == 'PR')echo "selected = 'selected'"?>>PR</option>
          <option value='PE' <?php if($estado == 'PE')echo "selected = 'selected'"?>>PE</option>
          <option value='PI' <?php if($estado == 'PI')echo "selected = 'selected'"?>>PI</option>
          <option value='RJ' <?php if($estado == 'RJ')echo "selected = 'selected'"?>>RJ</option>
          <option value='RN' <?php if($estado == 'RN')echo "selected = 'selected'"?>>RN</option>
          <option value='RS' <?php if($estado == 'RS')echo "selected = 'selected'"?>>RS</option>
          <option value='RO' <?php if($estado == 'RO')echo "selected = 'selected'"?>>RO</option>  
          <option value='RR' <?php if($estado == 'RR')echo "selected = 'selected'"?>>RR</option>
          <option value='SP' <?php if($estado == 'SP')echo "selected = 'selected'"?>>SP</option>
          <option value='SC' <?php if($estado == 'SC')echo "selected = 'selected'"?>>SC</option>
          <option value='SE' <?php if($estado == 'SE')echo "selected = 'selected'"?>>SE</option>
          <option value='TO' <?php if($estado == 'TO')echo "selected = 'selected'"?>>TO</option></select>
      </td>
    </tr>
    <tr>
      <td>CEP</td>
      <td><input name='cep' type='text' size='10' value="<?php echo $cep?>"><input type="hidden" name="numDados" value="<?php echo $numDados;?>"/> </td>
    </tr> 
	<tr><td colspan="2" bgcolor="#D3D3D3">Interesse Futuro</td></tr>
	<tr>
	<td>Meu interesse futuro é</td>
	<td>
		<input name='interesse' id='interesse' type='radio' value = 'Continuar os Estudos'>Continuar os Estudos
		<input name='interesse' id='interesse' type='radio' value = 'Ingressar no Mercado de Trabalho'>Ingressar no Mercado de Trabalho
    </td></tr> 
	<tr>
	<td>Area de Interesse</td>
	<td><textarea cols='40' rows='10' name='areainteresse' ></textarea><br><font color="red"><i>Ex: Gosto de trabalhar com gado leiteiro e tenho interesse de trabalhar em fazendas da região</i></font></td>
	</tr>
  </div>
  <td colspan="2">
        
  		<div align="center"><input class="botao" type="submit" value="Próximo" > </div>
	</td>
</table>
</div>
</form>
</body>


