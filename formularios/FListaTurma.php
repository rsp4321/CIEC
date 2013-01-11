<html>
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<meta http-equiv="Content-Type" content="text/html; charset=iso-8859-1" />
<title>Cadastro de Turma</title>
<script type="text/javascript" src="prototype.js"></script>
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
	@import url("CSS/estiloTabelas.css");
	</style>
</head>

<?php header("Content-Type: text/html; charset=ISO-8859-1",true);
    include ("conexao.php");
	
	$instituicao = $_POST["instituicao"];
    $curso = $_POST["curso"];
	$anoform = $_POST["anoform"];

	//echo "$instituicao--$curso--$anoform";
		if($instituicao == 0)echo"<script type='text/javascript'>alert('Selecione a Instituicao!!!');
					window.location.href='index.php?acao_menu=pre_cadastrar_aluno&facao=buscar_turma';
				</script>";
		if($curso == 0)echo"<script type='text/javascript'>alert('Selecione o Curso!!!');
					window.location.href='index.php?acao_menu=pre_cadastrar_aluno&facao=buscar_turma';
				</script>";

	$sql = "SELECT * FROM curso where cid=$curso";
    $res = mysql_query($sql,$conexao);
    //$num = mysql_num_rows($res);
	$dados = mysql_fetch_array($res); 
	
    
?>
<body bgcolor='white'>   
  <form name='FCadastroTurma' method='post' action="" onsubmit="return validaFormulario();">
  <div>
  <table class="linhasAlternadas" border="1" align="center">
  <tr><th colspan="5">Turma de <?php echo $dados["nome"]; if($anoform != 0)echo " - ".$anoform;?></th></tr>
  <tr>
	<th>Nome</th>
	<th>Email</th>
	<th>Telefone</th>
	<th>Celular</th>
	<?php if($anoform == 0){echo "<th>Ano</th>";} ?>
  </tr>
  <?php 
	if($anoform == 0){
		$sql = "Select ex_aluno.nome, ex_aluno.email, ex_aluno.ex_aluno_id,curso_egresso.anoformacao from ex_aluno inner join curso_egresso on ex_aluno.ex_aluno_id = curso_egresso.id_egresso and curso_egresso.curso = $curso order by ex_aluno.nome,curso_egresso.anoformacao";
		$res = mysql_query($sql,$conexao);
		$num = mysql_num_rows($res);
		for($i=0; $i<$num; $i++){
			$dados = mysql_fetch_array($res);
			echo "<tr><td>".$dados["nome"]."</td><td>".$dados["email"]."</td>";
			$sql2 = "Select dados_gerais.telefone, dados_gerais.celular from dados_gerais inner join curso_egresso on dados_gerais.id_egresso = curso_egresso.id_egresso and curso_egresso.curso = $curso and curso_egresso.anoformacao =$anoform and ex_aluno.ex_aluno_id=".$dados["ex_aluno_id"];
			$res2 = mysql_query($sql2,$conexao);
			$dados2 = mysql_fetch_array($res2);
			echo "<td>".$dados2["telefone"]."</td><td>".$dados2["celular"]."</td><td>".$dados["anoformacao"]."</td></tr>";
	}
	}
	else{
	$sql = "Select ex_aluno.nome, ex_aluno.email, ex_aluno.ex_aluno_id from ex_aluno inner join curso_egresso on ex_aluno.ex_aluno_id = curso_egresso.id_egresso and curso_egresso.curso = $curso and curso_egresso.anoformacao =$anoform";
    $res = mysql_query($sql,$conexao);
    $num = mysql_num_rows($res);
	for($i=0; $i<$num; $i++){
		$dados = mysql_fetch_array($res);
		echo "<tr><td>".$dados["nome"]."</td><td>".$dados["email"]."</td>";
		$sql2 = "Select dados_gerais.telefone, dados_gerais.celular from dados_gerais inner join curso_egresso on dados_gerais.id_egresso = curso_egresso.id_egresso and curso_egresso.curso = $curso and curso_egresso.anoformacao =$anoform and ex_aluno.ex_aluno_id=".$dados["ex_aluno_id"];
		$res2 = mysql_query($sql2,$conexao);
		$dados2 = mysql_fetch_array($res2);
		echo "<td>".$dados2["telefone"]."</td><td>".$dados2["celular"]."</td></tr>";
	}
	}
  ?>
  </tr>
</table>
</div>
</form>
</body>
<?php

?>
</html>