<?php header("Content-Type: text/html; charset=ISO-8859-1",true);
    include ("conexao.php");
    $sql = "SELECT * FROM area ORDER BY nome";
    $res = mysql_query($sql,$conexao);
    $num = mysql_num_rows($res);
    
    $id= $_GET["id"];
    $sql2 = "SELECT * FROM vagas where id=$id";
    $res2 = mysql_query($sql2,$conexao);
    $dados2 = mysql_fetch_array($res2);

?>
<html>
  <head>
	<style type="text/css">
	@import url(cssForm/style_form.css);
	</style>
  </head>
  <script type="text/javascript">
  function validaFCadastroEmprego(){
	form = document.FCadastroEmprego;
	
	if(form.tipo.value=="0"){
		alert("Selecione o Tipo");
		form.tipo.focus();
		return false;
	}
	if(form.local.value==""){
		alert("Local em Branco");
		form.local.focus();
		return false;
	}
	if(form.area.value=="0"){
		alert("Selecione a area");
		form.area.focus();
		return false;
	}
	if(form.curso.value==""){
		alert("Cursos em Branco");
		form.curso.focus();
		return false;
	}
	if(form.vagas.value==""){
		alert("Numero de Vagas em Branco");
		form.vagas.focus();
		return false;
	}
	if(form.atuacao.value==""){
		alert("Atuação em Branco");
		form.atuacao.focus();
		return false;
	}
	if(form.contato.value==""){
		alert("Contato em Branco");
		form.contato.focus();
		return false;
	}
	if(form.responsavel.value==""){
		alert("Responsavel em Branco");
		form.responsavel.focus();
		return false;
	}
	return true;
	
}
  </script>
  
<body bgcolor='white'>
  <form name='FCadastroEmprego' method='post' action="CAdmin.class.php?acao=atualiza_vaga" onsubmit="return validaFCadastroEmprego();">
  <div>
  <input type="hidden" name="id" value="<?php echo $dados2["id"];?>">
  <input type="hidden" name="idemp" value="<?php echo $dados2["id_empresa"];?>">
  <table id="todoform" cellspacing='5' rules='none' border="0">
  <tr>
	<td colspan="2";><div id="titulo">Alteração de Empregos/Oportunidades</div></td>
  </tr>
  <tr>
	<td colspan="2" bgcolor="#D3D3D3"><strong>Dados Gerais</strong></td>
  </tr>
	<tr>
	  <td>Local</td>
	  <td><input name='local' id='local' type='text' size='50' value="<?php echo $dados2["local"];?>"></td>
	</tr>
  <tr>
	<td width="88">Area de Atuação:</td>
	<td width="212">
	  <select name="area" id="area" onchange="CarregaCurso(this.value)">
	  <option value="0">Selecione</option>
	  <?php for($i=0;$i<$num;$i++)
	  {
		$dados = mysql_fetch_array($res);
	  ?>
		<option value="<?php echo $dados['id']?>"<?php if($dados['id']==$dados2['area'])echo "selected";?>><?php echo $dados["nome"]?></option>
	   <?php }?>
	  </select>
	</td>
  </tr>
	<tr>
	  <td>Curso</td>
	  <td><input name='curso' id='curso' type='text' size='50' maxlength='50' value="<?php echo $dados2["curso"];?>"></td>
	</tr>
	<tr>
	  <td>N° Vagas</td>
	  <td><input name='vagas' id='vagas' type='text' size='5' maxlength='5' value="<?php echo $dados2["quant"];?>"></td>
	</tr>
	<tr>
	  <td>Atuação</td>
	  <td><input name='atuacao' id='atuacao' type='text' size='50' maxlength='50' value="<?php echo $dados2["desc_atuacao"];?>"></td>
	</tr>
	<tr>
	  <td>Outras Informações</td>
	  <td><textarea name='atividade' id='atividade'  cols = '40' rows = '5' onkeyup = 'checa(this, 500)'><?php echo $dados2["obs"];?></textarea></td>
	</tr> 
	<tr>
	  <td>Contatos</td>
	  <td><input name='contato' id='contato' type='text' size='50' maxlength='50' value="<?php echo $dados2["contatos"];?>"></td>
	</tr>
	<tr>
	  <td>Responsável</td>
	  <td><input name='responsavel' id='responsavel' type='text' size='50' maxlength='50' value="<?php echo $dados2["responsavel"];?>"></td>
	</tr>
	<tr><td></td>
	<td><input type="submit" value="ATUALIZAR"></td>
	</tr>       
  </table>  
  </div>
  </form>
  </body>
</html>	  
	
