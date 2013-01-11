<head>
<style type="text/css">
	@import url("CSS/estiloTabelas.css");
</style>
<style>
@media print { 
	#noprint { display:none; }
	#saida { display:none; }                          
	}
</style>
<script type='text/javascript'>
function voltar(){
    window.location.href='javascript:history.go(-1)';	
}
</script>
</head>
<body>

<?php
include ("conexao.php");

//$id = $_GET["id"];
$id = $_SESSION['ex_aluno_id'];
$sql = "SELECT * FROM ex_aluno where ex_aluno_id = $id";
$res = mysql_query($sql,$conexao);
$dados = mysql_fetch_array($res);
$nome = $dados['nome'];
$email = $dados['email'];

$sql = "SELECT * FROM endereco where eid = (SELECT eid FROM pessoa_endereco where ex_aluno_id = $id)";
$res = mysql_query($sql,$conexao);
$dados = mysql_fetch_array($res);
$logradouro = $dados['logradouro'];
$num = $dados['num'];
$comp = $dados['complemento'];
$bairro = $dados['bairro'];
$cidade = $dados['cidade'];
$estado = $dados['estado'];
$cep = $dados['cep'];

$sql2 = "SELECT * FROM dados_gerais where id_egresso = $id";
$res2 = mysql_query($sql2,$conexao);
$dados2 = mysql_fetch_array($res2);
$sexo = $dados2['sexo'];
$data_nasc = $dados2['data_nasc'];
$habilitacao = $dados2['habilitacao'];
$estado_civil = $dados2['estado_civil'];
$telefone = $dados2['telefone'];
$celular = $dados2['celular'];
?>
<form method="POST" action="CAdmin.class.php?acao=atualizaInformacao"> <!-- CAdmin.class.php?acao=atualizaInformacao  formularios/testePost.php -->
<input type="hidden" name="id" value="<?php echo $id;?>"/>  
<table id="todoform" border="0" align="center"  width="80%" >
    <tr>
        <td align="center" colspan="2"><h3>Dados Gerais</h3></td>
    </tr>
    <tr><td>Nome</td><td><input type="text" name="nome" size="50" value="<?php echo $nome;?>"/></td></tr>
    <tr><td>Data de Nascimento</td><td><input type="text" name="data_nasc" value="<?php echo $data_nasc;?>"/></td></tr>
    <tr><td>Estado Civil</td><td><input type="text" name="estado_civil" value="<?php echo $estado_civil;?>"/></td></tr>
    <tr><td>Habilitação</td><td><input type="text" maxlength="2" name="habilitacao" value="<?php echo $habilitacao; ?>"/></td></tr>
    <tr><td>Fone</td><td><input type="text" name="telefone" maxlength='14' value="<?php echo $telefone;?>"/></td></tr>
    <tr><td>Celular</td><td><input type="text" name="celular" maxlength='14' value="<?php echo $celular;?>"/></td></tr>
    <tr><td>Email</td><td><input type="text" size="35" name="email" value="<?php echo $email;?>"/></td></tr>
    <tr><td>Rua</td><td><input type="text" name="rua" size="50" value="<?php echo $logradouro;?>"/></td></tr>
    <tr><td>Numero</td><td><input type="text" name="num" size="10"value="<?php echo $num;?>"/></td></tr>
    <tr><td>Complemento</td><td><input type="text" name="comp" size="10"value="<?php echo $comp;?>"/></td></tr>
    <tr><td>Bairro</td><td><input type="text" name="bairro" size="35" value="<?php echo $bairro;?>"/></td></tr>
    <tr><td>Cidade</td><td><input type="text" name="cidade" value="<?php echo $cidade;?>"/></td></tr>
    <tr><td>Estado</td><td><input type="text" name="estado" value="<?php echo $estado;?>"/></td></tr>
    <tr><td>CEP</td><td><input type="text" name="cep" value="<?php echo $cep;?>"/></td></tr>
    <tr>
        <td align="center" colspan="2"><h3>Formação Acadêmica</h3></td>
        <?php 
            $sql = "SELECT * FROM formacao where id_egresso = $id";
            $res = mysql_query($sql,$conexao);
            $num = mysql_num_rows($res);  
            echo "<input type='hidden' name='numFormacao' value='$num'/>";          
            for($i = 0; $i < $num; $i++)
            {
                $dados = mysql_fetch_array($res);  
                $id_form = $dados['id'];
                $curso = $dados['curso'];
                $instituicao = $dados['instituicao'];
                $campus = $dados['campus'];
                $duracao = $dados['duracao'];
                $ano_formacao = $dados['ano_formacao']; 
                
                $sql2 = "SELECT nome FROM curso where cid = $curso";
                $res2 = mysql_query($sql2,$conexao);
                $dados2 = mysql_fetch_array($res2); 
                $curso = $dados2['nome'];  
                echo "<tr><td>Curso</td><td><input type='hidden' name='idform$i' value='$id_form'/><input type='text' name='curso$i' value='$curso' size='50' disabled='true'/></td><td rowspan='5'><a href='CAdmin.class.php?acao=excluir_formacao&idformacao=$id_form'><img src='img/excluir.png'><br>EXCLUIR</a></td></tr><tr><td>Duração</td><td><input type='text' name='duracao$i' value='$duracao'/></td></tr><tr><td>Instituição</td><td><input type='text' size='50' name='instituicao$i' value='$instituicao'/></td></tr><tr><td>Campus</td><td><input type='text' size='50' name='campus$i' value='$campus'/></td></tr><tr><td>Conclusão</td><td><input type='text' name='ano_formacao$i' value='$ano_formacao'/></td></tr>";           
            }  
			
			$sql = "SELECT curso_egresso.anoformacao, curso.nome, instituicao.nome FROM curso_egresso INNER JOIN curso INNER JOIN instituicao ON curso_egresso.curso = curso.cid AND instituicao.id = curso.instituicao AND curso_egresso.id_egresso = $id";
            $res = mysql_query($sql,$conexao);
            $num = mysql_num_rows($res);            
            for($i = 0; $i < $num; $i++)
            {
                $dados = mysql_fetch_array($res);
                $curso = $dados[1];
                $instituicao = $dados[2];
                $campus = "Rio Pomba";
                $ano_formacao = $dados['anoformacao']; 
                
                //$sql2 = "SELECT nome FROM curso where cid = $curso";
                //$res2 = mysql_query($sql2,$conexao);
                //$dados2 = mysql_fetch_array($res2); 
               // $curso = $dados2['nome'];  
                echo "<tr><td colspan='2'></td></tr><tr><td>Curso</td><td>$curso</td></tr><tr><td>Instituição</td><td>$instituicao</td></tr><tr><td>Campus</td><td>$campus</td></tr><tr><td>Conclusão</td><td>$ano_formacao</td></tr>";           
            }
			
        ?>
    </tr>
    
    <tr>
        <td align="center" colspan="2"><h3>Experiência Profissional</h3></td>
        <?php 
            $sql = "SELECT * FROM experiencia where id_egresso = $id order by data_inicial  DESC";
            $res = mysql_query($sql,$conexao);
            $num = mysql_num_rows($res);
            echo "<input type='hidden' name='numExp' value='$num'/>";            
            for($i = 0; $i < $num; $i++)
            {
                $dados = mysql_fetch_array($res);
                $id_exp = $dados['id'];
                $empresa = $dados['empresa'];
                $emailempresa = $dados['email'];
                $foneempresa = $dados['telefone'];
                $data_inicial = $dados['data_inicial'];
                $data_final = $dados['data_final']; 
                $cargo = $dados['cargo'];
                $atividades = $dados['atividades'];
                
                echo "<tr><td>Empresa</td><td><input type='hidden' name='idemp$i' value='$id_exp'/><input type='text' size='50' name='empresa$i' value='$empresa'/></td><td rowspan='6'><a href='CAdmin.class.php?acao=excluir_exp&idexp=$id_exp'><img src='img/excluir.png'><br>EXCLUIR</a></td></tr><tr><td>Telefone</th><td><input type='text' name='foneempresa$i' maxlength='14' value='$foneempresa'/></td></tr><tr><td>Email</td><td><input type='text' size='50' name='emailempresa$i' value='$emailempresa'/></td></tr><tr><td>Cargo</td><td><input type='text' size='50' name='cargo$i' value='$cargo'/></td></tr><tr><td>Dt. Inicio</td><td><input type='text' name='data_inicial$i' value='$data_inicial'/></td></tr><tr><td>Dt. Fim</td><td><input type='text' name='data_final$i' value='$data_final'/></td></tr><tr><td>Atividades</td><td><textarea cols='40' rows='3' name='atividades$i'>$atividades</textarea></td></tr>";         
            }                        
        ?>
    </tr>
	<tr>
        <td align="center" colspan="2"><h3>Interesses</h3></td></tr>
        <?php 
            $sql = "SELECT * FROM informacoes where id_egresso = $id";
            $res = mysql_query($sql,$conexao);      
                $dados = mysql_fetch_array($res);
                $num = mysql_num_rows($res);
                //echo "<input type='hidden' name='numInfo' value='$num'/>";    
                $interesse = $dados['interesse'];
                $areainteresse = $dados['areainteresse'];  
			?>	
    <tr><td>Interesse</td><td><select name='interesse'>
          <option value="Continuar os Estudos" <?php if($interesse=="Continuar os Estudos")echo "selected";?>>Continuar os Estudos</option>
          <option value="Ingressar no Mercado de Trabalho" <?php if($interesse=="Ingressar no Mercado de Trabalho")echo "selected";?>>Ingressar no Mercado de Trabalho</option>
		</select></td>    
    </tr> 
	<tr><td>Area de Interesse</td><td><textarea cols='40' rows='5' name='areainteresse'><?php echo $areainteresse ?></textarea></td></tr>
	
    <tr>
        <td align="center" colspan="2"><h3>Informações Adicionais</h3></td>
        <?php 
            //$sql = "SELECT * FROM informacoes where id_egresso = $id";
            //$res = mysql_query($sql,$conexao);      
                //$dados = mysql_fetch_array($res);
                //$num = mysql_num_rows($res);
                echo "<input type='hidden' name='numInfo' value='$num'/>";    
                $info = $dados['info'];
                                
                echo "<tr><td>Informações</td><td><textarea cols='40' rows='5' name='info'>$info</textarea></td></tr>";           
                
        ?>
    </tr>     
</table>
<center><div id='noprint'><input type="button" onclick="voltar();" value="Voltar"/><input type="submit" value="Atualizar"/></div></center>
</form>
</body>
