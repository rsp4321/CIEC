<?php header("Content-Type: text/html; charset=ISO-8859-1",true);
    include ("ConectaBD.class.php");
    
	$sql = "SELECT * FROM instituicao ORDER BY nome";
    $res = $con->consult($sql);
    $num = mysql_num_rows($res);
    
?>
<html>
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<meta http-equiv="Content-Type" content="text/html; charset=iso-8859-1" />
<title>Cadastro de Turma</title>
<script type="text/javascript" src="prototype.js"></script>
<script type="text/javascript">
function validaFormulario(){
   form = document.FCadastroTurma;
    if (form.anoform.value == ""){
        alert('Preencha o Ano da Formatura');
        form.anoform.focus();
        return false;
        }
        
	if (form.instituicao.value=="0"){
        alert('Selecione a Instituição');
        form.instituicao.focus();
        return false;
	}	
	
	if (form.curso.value==""){
        alert('Selecione um Curso');
        form.curso.focus();
        return false;
	}
	
	if (form.nome0.value==""){
        alert('Preencha o Nome');
        form.nome0.focus();
        return false;
	}
	
	if (form.cpf0.value==""){
        alert('Preencha o CPF');
        form.cpf0.focus();
        return false;
	}
   
    return  true;
 }
</script>
<script language="JavaScript">
var input_cont = 1;
var aux = 0;
var aux2 = "";

var tamanho = document.createElement('input');
tamanho.setAttribute('type', 'hidden');
tamanho.setAttribute('name', 'tamanho');
 
function addInput()
{
	
  tamanho.setAttribute('value', input_cont);
  
  var nome = document.createElement('input');
  nome.setAttribute('type', 'text');
  nome.setAttribute('name', 'nome'+input_cont);
  nome.setAttribute('id', 'nome'+input_cont);
  nome.setAttribute('size', '50');
  
  var cpf = document.createElement('input');
  cpf.setAttribute('type', 'text');
  cpf.setAttribute('name', 'cpf'+input_cont);
  cpf.setAttribute('id', 'cpf'+input_cont);
  cpf.setAttribute('maxlength', '14');
  cpf.setAttribute('size', '14');
  cpf.setAttribute('onKeyPress', "Mask('cpf',this)");
  cpf.setAttribute('value', '');
  
  var botao = document.createElement('input');
  botao.setAttribute('type', 'button');
  botao.setAttribute('value', 'Botão');
  
  var br = document.createElement('br');
 
  var add_input_div = document.getElementById('add_input_div');

  add_input_div.appendChild(nome);
  add_input_div.appendChild(cpf);
  add_input_div.appendChild(tamanho);
  add_input_div.appendChild(br);

  input_cont++;
}

</script>
<script language="javascript">
function CarregaCurso(cod)
{
	if(cod){	   	
        var myAjax = new Ajax.Updater('cursoAjax','carregaCursosInstituicao.php?inst=' + cod,
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
  <form name='FCadastroTurma' method='post' action="CAdmin.class.php?acao=cadastrar_turma" onsubmit="return validaFormulario();">
  <div>
  <table id="todoform" cellspacing='5' rules='none' border="0">
  <tr><td colspan="2"><div id="titulo">Cadastro de Turma</div></td></tr>
    <tr>
      <td>Ano da Formatura</td>
      <td><input name='anoform' type='text' size='4' maxlength="4"></td>
    </tr>
    <tr>
    <td width="88">Institui&ccedil;&atilde;o</td>
    <td width="212">
      <select name="instituicao" id="instituicao" onchange="CarregaCurso(this.value)">
      <option value="0">Selecione</option>
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
    <td>Curso</td>
    <td><div id="cursoAjax">
      	<select name="curso" id="curso">
      		<option value="0">Selecione a Institui&ccedil;&atilde;o</option>
    	</select>
    </div></td>
  </tr>
  <tr>
  <td colspan="2">
  <table>
  <tr>
	<td>Nome</td>
	<td></td>
	<td>CPF</td>
  </tr>
  <tr>
     <td colspan="3"><input type="text" size="50" value="" name="nome0"" />
	<input type="text" maxlength="14" size="14" name="cpf0" onKeyPress="Mask('cpf',this)"/>
	<div id="add_input_div"></div>
	<input type="button" value="Novo Egresso" onclick="addInput()" />
	</td>
  </tr>   
  <tr><td>
</table><div align="center"><input class="botao" type="submit" value="Cadastrar Turma"></div>
</td></tr></table>

</div>
</form>
</body>
</html>