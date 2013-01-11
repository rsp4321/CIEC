<style>

@media print { 
	#noprint { display:none; }
	#saida { display:none; }                          
	}
</style>

<body>

<?php
include ("conexao.php");

$id = $_GET["id"];
$sql = "SELECT * FROM ex_aluno where ex_aluno_id = $id";
$res = mysql_query($sql,$conexao);

$dados = mysql_fetch_array($res);

//echo ("<br><center>ID: "+$id);

?>
<center>
<div style="border:1px solid black; width:60%; ">
<center><h2><?php echo $dados['nome'];
                $email  = $dados['email'];
            ?> </h2></center>
<hr width="90%" />
<center><?php 
$sql = "SELECT * FROM endereco where eid = (SELECT eid FROM pessoa_endereco where ex_aluno_id = $id)";
$res = mysql_query($sql,$conexao);
$dados = mysql_fetch_array($res);
$logradouro = $dados['logradouro'];
$num = $dados['num'];
$bairro = $dados['bairro'];
$cidade = $dados['cidade'];
$estado = $dados['estado'];
$cep = $dados['cep'];

$sql2 = "SELECT * FROM dados_gerais where id_egresso = $id";
$res2 = mysql_query($sql2,$conexao);
$dados2 = mysql_fetch_array($res2);
$sexo = $dados2['sexo'];
$data_nasc = $dados2['data_nasc'];
$estado_civil = $dados2['estado_civil'];
$telefone = $dados2['telefone'];
?>
<p><?php echo "$logradouro, $num - $bairro - $cidade - $estado - CEP $cep <br> Telefone:$telefone - Email: $email<br>Estado Civil: $estado_civil - Data de Nascimento: $data_nasc";?></p></center>
<table align="center" width="90%" border="0">
    <tr>
        <td align="center"><h3>Formação Acadêmica </h3></td>
        <?php 
            $sql = "SELECT * FROM formacao where id_egresso = $id";
            $res = mysql_query($sql,$conexao);
            $num = mysql_num_rows($res);            
            for($i = 0; $i < $num; $i++)
            {
                $dados = mysql_fetch_array($res);
                $curso = $dados['curso'];
                $instituicao = $dados['instituicao'];
                $campus = $dados['campus'];
                $duracao = $dados['duracao'];
                $ano_formacao = $dados['ano_formacao']; 
                
                $sql2 = "SELECT nome FROM curso where cid = $curso";
                $res2 = mysql_query($sql2,$conexao);
                $dados2 = mysql_fetch_array($res2); 
                $curso = $dados2['nome'];  
                echo "<tr><td><b>Curso:</b> $curso &nbsp; &nbsp; &nbsp; <b>Duração:</b> $duracao<br><b>Instituição:</b> $instituicao - $campus &nbsp; &nbsp; &nbsp;<b>Conclusão:</b> $ano_formacao<br><br></td></tr>";           
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
                echo "<tr><td><b>Curso:</b> $curso &nbsp; &nbsp; &nbsp; <br><b>Instituição:</b> $instituicao - $campus &nbsp; &nbsp; &nbsp;<b>Conclusão:</b> $ano_formacao<br><br></td></tr>";           
            }
                        
        ?>
    </tr>
    <tr>
        <td align="center"><h3>Experiência Profissional </h3></td>
        <?php 
            $sql = "SELECT * FROM experiencia where id_egresso = $id order by data_inicial  DESC";
            $res = mysql_query($sql,$conexao);
            $num = mysql_num_rows($res);            
            for($i = 0; $i < $num; $i++)
            {
                $dados = mysql_fetch_array($res);
                $empresa = $dados['empresa'];
                $email = $dados['email'];
                $telefone = $dados['telefone'];
                $data_inicial = $dados['data_inicial'];
                $data_final = $dados['data_final']; 
                $cargo = $dados['cargo'];
                $atividades = $dados['atividades'];
                
                echo "<tr><td><b>Empresa:</b> $empresa &nbsp; &nbsp; &nbsp; <b>Telefone:</b> $telefone<br><b>Email:</b> $email <br><b>Cargo:</b> $cargo &nbsp; &nbsp; <b>Dt. Inicio:</b>&nbsp; $data_inicial &nbsp;-&nbsp; <b>Dt. Fim:</b>&nbsp; $data_final <br><b>Atividades:</b>&nbsp;$atividades<br><br></td></tr>";           
            }
                        
        ?>
    </tr> 
    <tr>
        <td align="center"><h3>Informações Adicionais</h3></td>
        <?php 
            $sql = "SELECT * FROM informacoes where id_egresso = $id";
            $res = mysql_query($sql,$conexao);      
                $dados = mysql_fetch_array($res);
                $info = $dados['info'];
                                
                echo "<tr><td>$info</td></tr>";           
                
        ?>
    </tr>  
</table>
</div>
</center>
<?php
    echo"<div id='noprint'><a href='javascript:history.go(-1)'>Voltar</a></div>";
?>

</body>
