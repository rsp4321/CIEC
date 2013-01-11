<html>
<?php header("Content-Type: text/html; charset=ISO-8859-1",true);
    include ("conexao.php");
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
    
    echo "<script type='text/javascript'>alert('Entrou no curriculo CPF: $cpf')</script>"; 
    
?>
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>Teste</title>
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
	<style type="text/css">
	@import url(cssForm/style_form.css);
	</style>
</head>
<body bgcolor='white'>

  
  <form name='FCadastroCurriculum' method='post' action="CUsr.class.php?acao=cadastrar_curriculum" onsubmit="return validaFCadastroCurriculum();">
  <div align="center">
  <table id="todoform" cellspacing='5' rules='none' border="0">
	<!--
		<Dados Pessoias
	-->
  <tr><td colspan="2" bgcolor="#D3D3D3">Dados Pessoais</td></tr>
    <tr>
      <td><div id="titulo" align="center">Cadastro de Curriculo</div></td>
    </tr>

    <tr>
      <td>Nome</td>
      <td><input name='nome' id='nome' type='text' size='70' value="<?php echo $nome?>"></td>
    </tr>
	<tr>
      <td>Sexo</td>
      <td>
		<input name='sexo' id='sexo' type='radio' value = '1'>Masculino
		<input name='sexo' id='sexo' type='radio' value = '2'>Feminino
	  </td>
    </tr>
	<tr>
      <td>Data de Nascimento</td>
      <td><input name='nome' id='nome' type='text' size='10' maxlength = '10'> dd/mm/aaaa</td>
    </tr>
	<tr>
      <td>Estado Civil</td>
      <td>
		<input name='estadocivil' id='estadocivil' type='radio' value = '1'>Solteiro(a)
		<input name='estadocivil' id='estadocivil' type='radio' value = '2'>Casado(a)
		<input name='estadocivil' id='estadocivil' type='radio' value = '3'>Divorciado(a)
		<input name='estadocivil' id='estadocivil' type='radio' value = '4'>Vi&uacute;vo(a)</td>
    </tr> 
	<tr>
      <td>Carteira de Habilitacao</td>
      <td><select name='habilitacao'>
          <option>Tipo/Categoria</option>
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
      <td><input name='dddtel' id='dddtel' type='text' size='3' maxlength='2' onKeyPress="muda()"> -
      <input name='fone' id='fone' type='text' size='12' maxlength='12'>ddd-numero</td>
    </tr>
    <tr>
      <td>Celular</td>
	  <td><input name='dddcel' id='dddcel' type='text' size='3' maxlength='2' onKeyPress="muda()"> -
      <input name='celular' id='celular' type='text' size='12' maxlength='12'> ddd-numero</td>
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
          <option>estado</option>
          <option value='ac'>AC</option>
       	  <option value='al'>AL</option>
          <option value='ap'>AP</option>
          <option value='am'>AM</option>
          <option value='ba'>BA</option>
          <option value='ce'>CE</option>
          <option value='df'>DF</option>
          <option value='go'>GO</option>
          <option value='es'>ES</option>
          <option value='ma'>MA</option>
          <option value='mt'>MT</option>
          <option value='ms'>MS</option>
          <option value='mg'>MG</option>
          <option value='pa'>PA</option>
          <option value='pb'>PB</option>
          <option value='pr'>PR</option>
          <option value='pe'>PE</option>
          <option value='pi'>PI</option>
          <option value='rj'>RJ</option>
          <option value='rn'>RN</option>
          <option value='rs'>RS</option>
          <option value='ro'>RO</option>  
          <option value='rr'>RR</option>
          <option value='sp'>SP</option>
          <option value='sc'>SC</option>
          <option value='se'>SE</option>
          <option value='to'>TO</option></select>
      </td>
    </tr>
    <tr>
      <td>CEP</td>
      <td><input name='cep' type='text' size='10'></td>
    </tr> 
	<!--
		<Formação
	-->
	<tr><td colspan="2" bgcolor="#D3D3D3">Formação</td></tr>	
	<tr>
    <td width="88">Area:</td>
    <td width="212">
      <select name="area" id="area" onchange="CarregaCurso(this.value)">
      <option>Selecione</option>
      <?php for($i=0;$i<$num;$i++)
	  {
	  	$dados = mysql_fetch_array($res);
	  ?>
      	<option value="<?php echo $dados["id"]?>"><?php echo $dados["nome"]?></option>
       <?php }?>
      </select>
    </td>
  </tr>
  <tr>
    <td>Cursos:</td>
    <td><div id="cursoAjax">
      	<select name="curso" id="curso">
      		<option value="0">Selecione o curso</option>
    	</select>
    </div></td>
  </tr>
    <tr>
      <td>Instituição</td>
      <td><input name='instituicao'  id='instituicao' type='text' size='50'maxlength='50'></td>
    </tr> 
	<tr>
      <td>Campus/Cidade</td>
      <td><input name='campos' id='campos' type='text' size='20'maxlength='20'></td>
    </tr> 
	<tr>
      <td>Duração</td>
      <td><input name='duracao' id='duracao' type='text' size='2'maxlength='2'></td>
    </tr>
	<tr>
      <td>Ano Formação</td>
      <td><input name='ano' id='ano' type='text' size='4'maxlength='4' ></td>
    </tr> 
	<!--
		<Experiencia Profissional
	-->
	<tr><td colspan="2" bgcolor="#D3D3D3">Experiencia Profissional</td></tr>
	<tr>
      <td>Empresa</td>
      <td><input name='curso' id='curso' type='text' size='50'maxlength='50'></td>
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
      <td><input name='periodoi' id='peridoi' type='text' size='10' maxlength = '10'> a
	  <input name='periodof' id='periodof' type='text' size='10' maxlength = '10'> dd/mm/aaaa</td>
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
  <td colspan="2">
  		<div align="center"><input class="botao" type="submit" value="Cadastrar" > </div>
	</td>
</table>
</div>
</form>
</body>


