<?php
header("Content-type: text/html; charset=utf-8",true);

class CUsr
{

    function cadastrarAluno()
    {


        foreach ($_POST as $indice => $valor) { //comandos que faz o POST dos dados enviados
            $comando = "\$" . $indice . " = \$_POST[" . $indice . "];";
            //echo $comando . "<br>";
            eval($comando);
        } //fim do foreach
        include ("ConectaBD.class.php");
        //echo $sql;
        $con = Conexao::getInstance();
        //echo "CPF: ";
        //echo $cpf;
        //echo "Nome:";
        //echo $nome;
        $result1 = $con->consult("select * from ex_aluno where cpf ='$cpf'");
        $total = mysqli_num_rows($result1);
        //echo $total;
        if ($total == 0) {
            echo "<script type='text/javascript'>alert('Voc� ainda n�o est� autorizado a realizar se cadastro!!!');
						window.location.href='index.php?acao_menu=cadastrar_aluno&facao=fcadastrar_aluno';				
				</script>";
        } 
		
		$obj = $result1->fetch_assoc();
		if($obj["cadastrado"]!= 1 ){
            if ($con->insert("update ex_aluno set email='$email', login='$login', senha=$senha, cadastrado ='1' where cpf='$cpf'")) {
                echo "
					<script type='text/javascript'>
					alert('N�o foi poss�vel realizar o cadastro');
					window.location.href='index.php?acao_menu=cadastrar_aluno&facao=fcadastrar_aluno';					
					</script>
				";
            } //fim do if

            if ($con->insert("insert into endereco values ('null','$rua','$numero','$complemento','$bairro','$cidade','$estado','$cep')")) {
                echo "
					<script type='text/javascript'>
					alert('N�o foi poss�vel realizar o cadastro');
					window.location.href='index.php?acao_menu=cadastrar_aluno&facao=fcadastrar_aluno';					
					</script>
				";
            } //FIM DO IF


            $result = $con->consult("select ex_aluno_id as lastId from ex_aluno where cpf = '$cpf'");
            $obj = $result->fetch_assoc();
            $aluno_id = $obj['lastId'];

            $result = $con->consult("select MAX(eid) as lastId from endereco");
            $obj = $result->fetch_assoc();
            $endereco_id = $obj['lastId'];

            //echo $endereco_id;
            //echo $aluno_id;
            if ($con->insert("insert into pessoa_endereco values('$aluno_id','$endereco_id','Residencial')")) {
                echo "
					<script type='text/javascript'>
					alert('N�o foi poss�vel realizar o cadastro');
					window.location.href='index.php?acao_menu=cadastrar_aluno&facao=fcadastrar_aluno';					
					</script>
				";
            } else {
                echo "
					<script type='text/javascript'>
					alert('Cadastro realizado com sucesso');
					window.location.href='index.php?acao_menu=cadastrar_aluno&facao=fcadastrar_aluno';					
					</script>
				";
            }
        //}
    }else{
		echo "<script type='text/javascript'>
					alert('Voc� j� est� cadastrado, basta fazer seu login!');
					window.location.href='index.php?acao_menu=cadastrar_aluno&facao=fcadastrar_aluno';					
					</script>
				";
	}
	}
    
      
        function cadastrarDadosGerais(){
            
            include ("ConectaBD.class.php");
        //echo $sql;
            $con = Conexao::getInstance();
        
			$id = $_POST['idEgresso'];
            $sexo = $_POST['sexo'];
            $data_nasc = $_POST['data_nasc'];
            $estado_civil = $_POST['estadocivil'];
            $habilitacao= $_POST['habilitacao'];
            $dddtel = $_POST['dddtel'];
            $fone = $_POST['fone'];
            $dddcel = $_POST['dddcel'];
            $celular = $_POST['celular'];
            
            $tel = "(".$dddtel.") ".$fone;
            $cel = "(".$dddcel.") ".$celular;
            
            $rua = $_POST['rua'];
            $num = $_POST['numero'];
            $complemento = $_POST['complemento'];
            $bairro = $_POST['bairro'];
            $cidade = $_POST['cidade'];
            $estado = $_POST['estado'];
            $cep= $_POST['cep'];    
            $interesse = $_POST['interesse'];
            $areainteresse= $_POST['areainteresse']; 
			
            $numDados = $_POST['numDados'];       
            
			/*echo "$id<br>$sexo<br>$data_nasc<br>$estado_civil<br>$habilitacao<br>$dddtel<br>$fone<br>$dddcel<br>$celular<br>";
            echo "Telefone: $tel , Celular: $cel<br>";
            echo "rua: $rua <br>";
            echo "numero: $num <br>";
            echo "complemento: $complemento <br>";
            echo "bairro: $bairro <br>";
            echo "cidade: $habilitacao <br>";
            echo "estado: $estado <br>";
            echo "cep: $cep <br>";
			echo "$interesse<br>$areainteresse";*/
            //echo"<script type='text/javascript'>alert('num de dados: $numDados');</script>";
            if($numDados>=1){
                if($con->insert("update dados_gerais set sexo='$sexo',data_nasc='$data_nasc',estado_civil='$estado_civil',habilitacao='$habilitacao',telefone='$tel',celular='$cel' where id_egresso='$id'")){
				echo"<script type='text/javascript'>alert('Erro ao Atualizar os Dados Gerais');
				window.location.href='index.php?facao=cadastrar_curriculum';
				</script>";
			 }
            }else{     
				//echo "<br>Primeiro if - else";
                if($con->insert("insert into dados_gerais values (NULL,'$id','$sexo','$data_nasc','$estado_civil','$habilitacao','$tel','$cel')")){
				echo"<script type='text/javascript'>alert('N�o foi poss�vel realizar o cadastro');
				window.location.href='index.php?facao=cadastrar_curriculum';
				</script>";
			 }
            }
			//echo "<br>Primeiro if";
			if($con->insert("insert into informacoes values (NULL,'$id',NULL,'$interesse','$areainteresse')")){
				echo"<script type='text/javascript'>alert('N�o foi poss�vel realizar o cadastro');
				window.location.href='index.php?facao=cadastrar_curriculum';
				</script>";
			}
			//echo "<br>Segundo if";
            if(!$con->insert("update endereco set logradouro='$rua', num='$num', complemento='$complemento', bairro='$bairro', cidade='$cidade', estado='$estado', cep='$cep' where eid=(select eid from pessoa_endereco where ex_aluno_id='$id')")){
				if(!$con->insert("insert into curriculo_cadastrado values(NULL, '$id')")){
                echo"<script type='text/javascript'>
                window.location.href='index.php?facao=cadastrar_formacao&acao_menu=formacao';
				</script>";}
			}else{
				echo"<script type='text/javascript'>alert('N�o foi poss�vel realizar o cadastro');
					window.location.href='index.php?facao=cadastrar_curriculum';
				</script>";
			}	
            
            
    /*	if ($con->insert("update ex_aluno set email='$email', login='$login', senha=$senha, cadastrado ='1' where cpf='$cpf'")) {
                echo "
					<script type='text/javascript'>
					alert('N�o foi poss�vel realizar o cadastro');
					window.location.href='index.php?acao_menu=cadastrar_aluno&facao=fcadastrar_aluno';					
					</script>
				";
            } */
        
        }
        function cadastrarFormacao(){
            include ("ConectaBD.class.php");
            $con = Conexao::getInstance();
            
            session_start();
            
            
            $idEgresso = $_SESSION['ex_aluno_id'];
            
            $area = $_POST['area'];
            $curso = $_POST['curso'];
            $instituicao = $_POST['instituicao'];
            $campos = $_POST['campos'];
            $duracao = $_POST['duracao'];
            $ano = $_POST['ano'];
            
            //$nome = $_POST['nome'];
            //echo "nome: $nome<br>";
            //echo "idEgresso: $idEgresso <br>";
            //echo "area: $area <br>";
            //echo "curso: $curso <br>";
            //echo "instituicao: $instituicao <br>";
            //echo "campos: $campos <br>";
            //echo "duracao: $duracao <br>";
            //echo "ano: $ano <br>";
            
            
            if(!$con->insert("insert into formacao values (NULL,'$idEgresso','$area','$curso','$instituicao','$campos','$duracao','$ano')")){
				echo"<script type='text/javascript'>
				window.location.href='index.php?facao=cadastrar_formacao';
				</script>";
			}else{
                echo"<script type='text/javascript'>alert('N�o foi poss�vel realizar o cadastro');
				window.location.href='index.php?facao=cadastrar_formacao';
				</script>";
			}
        }
        
        function cadastrarFormacao2(){
            include ("ConectaBD.class.php");
            $con = Conexao::getInstance();
            
            session_start();
            
            
            $idEgresso = $_SESSION['ex_aluno_id'];
            
            $area = $_POST['area'];
            $curso = $_POST['curso'];
            $instituicao = $_POST['instituicao'];
            $campos = $_POST['campos'];
            $duracao = $_POST['duracao'];
            $ano = $_POST['ano'];
            
            //$nome = $_POST['nome'];
            //echo "nome: $nome<br>";
            //echo "idEgresso: $idEgresso <br>";
            //echo "area: $area <br>";
            //echo "curso: $curso <br>";
            //echo "instituicao: $instituicao <br>";
            //echo "campos: $campos <br>";
            //echo "duracao: $duracao <br>";
            //echo "ano: $ano <br>";
            
            
            if(!$con->insert("insert into formacao values (NULL,'$idEgresso','$area','$curso','$instituicao','$campos','$duracao','$ano')")){
				echo"<script type='text/javascript'>
				window.location.href='index.php?facao=cadastrar_exp';
				</script>";
			}else{
                echo"<script type='text/javascript'>alert('N�o foi poss�vel realizar o cadastro');
				window.location.href='index.php?acao_menu=gn&facao=atualizar';
				</script>";
			}
        }
        
         function cadastrarFormacao3(){
            include ("ConectaBD.class.php");
            $con = Conexao::getInstance();
            
            session_start();
            
            
            $idEgresso = $_SESSION['ex_aluno_id'];
            
            $area = $_POST['area'];
            $curso = $_POST['curso'];
            $instituicao = $_POST['instituicao'];
            $campos = $_POST['campos'];
            $duracao = $_POST['duracao'];
            $ano = $_POST['ano'];
            
    
            if(!$con->insert("insert into formacao values (NULL,'$idEgresso','$area','$curso','$instituicao','$campos','$duracao','$ano')")){
				echo"<script type='text/javascript'>alert('Cadastrado com Sucesso!!!');
				window.location.href='index.php?acao_menu=gn&facao=atualizar';
				</script>";
			}else{
                echo"<script type='text/javascript'>alert('N�o foi poss�vel realizar o cadastro');
				window.location.href='index.php?acao_menu=gn&facao=atualizar';
				</script>";
			}
        }
        
        function cadastrarExp(){
            include ("ConectaBD.class.php");
            $con = Conexao::getInstance();
            
            session_start();
            
            
            $idEgresso = $_SESSION['ex_aluno_id'];
            $empresa = $_POST['empresa'];
            $email = $_POST['email'];
            $dddtel2 = $_POST['dddtel2'];
            $empresafone = $_POST['empresafone'];
            $data_inicial = $_POST['data_inicial'];
            $data_final = $_POST['data_final'];
            $cargo = $_POST['cargo'];
            $atividade = $_POST['atividade'];
            
            $tel = "(".$dddtel2.") ".$empresafone;
            
            //$nome = $_POST['nome'];
            //echo "nome: $nome<br>";
            //echo "idEgresso: $idEgresso <br>";
            //echo "area: $area <br>";
            //echo "curso: $curso <br>";
            //echo "instituicao: $instituicao <br>";
            //echo "campos: $campos <br>";
            //echo "duracao: $duracao <br>";
            //echo "ano: $ano <br>";
            
            
            if(!$con->insert("insert into experiencia values (NULL,'$idEgresso','$empresa','$email','$tel','$data_inicial','$data_final','$cargo','$atividade')")){
				echo"<script type='text/javascript'>
				window.location.href='index.php?facao=cadastrar_exp';
				</script>";
			}else{
                echo"<script type='text/javascript'>alert('N�o foi poss�vel realizar o cadastro');
				window.location.href='index.php?facao=cadastrar_formacao';
				</script>";
			}
        }
        
        
        function cadastrarExp2(){
            include ("ConectaBD.class.php");
            $con = Conexao::getInstance();
            
            session_start();
            
            
            $idEgresso = $_SESSION['ex_aluno_id'];
            $empresa = $_POST['empresa'];
            $email = $_POST['email'];
            $dddtel2 = $_POST['dddtel2'];
            $empresafone = $_POST['empresafone'];
            $data_inicial = $_POST['data_inicial'];
            $data_final = $_POST['data_final'];
            $cargo = $_POST['cargo'];
            $atividade = $_POST['atividade'];
            
            $tel = "(".$dddtel2.") ".$empresafone;
            
            //$nome = $_POST['nome'];
            //echo "nome: $nome<br>";
            //echo "idEgresso: $idEgresso <br>";
            //echo "area: $area <br>";
            //echo "curso: $curso <br>";
            //echo "instituicao: $instituicao <br>";
            //echo "campos: $campos <br>";
            //echo "duracao: $duracao <br>";
            //echo "ano: $ano <br>";
            
            
            if(!$con->insert("insert into experiencia values (NULL,'$idEgresso','$empresa','$email','$tel','$data_inicial','$data_final','$cargo','$atividade')")){
				echo"<script type='text/javascript'>alert('Curriculo cadastrado com sucesso!');
				window.location.href='index.php?facao=ir_principal';
				</script>";
			}else{
                echo"<script type='text/javascript'>alert('N�o foi poss�vel realizar o cadastro');
				window.location.href='index.php?facao=cadastrar_exp';
				</script>";
			}
        }
        
        function cadastrarExp3(){
            include ("ConectaBD.class.php");
            $con = Conexao::getInstance();
            
            session_start();
            
            
            $idEgresso = $_SESSION['ex_aluno_id'];
            $empresa = $_POST['empresa'];
            $email = $_POST['email'];
            $dddtel2 = $_POST['dddtel2'];
            $empresafone = $_POST['empresafone'];
            $data_inicial = $_POST['data_inicial'];
            $data_final = $_POST['data_final'];
            $cargo = $_POST['cargo'];
            $atividade = $_POST['atividade'];
            
            $tel = "(".$dddtel2.") ".$empresafone;
            
            
            if(!$con->insert("insert into experiencia values (NULL,'$idEgresso','$empresa','$email','$tel','$data_inicial','$data_final','$cargo','$atividade')")){
				echo"<script type='text/javascript'>alert('Curriculo cadastrado com sucesso!');
				window.location.href='index.php?acao_menu=gn&facao=atualizar';
				</script>";
			}else{
                echo"<script type='text/javascript'>alert('N�o foi poss�vel realizar o cadastro');
				window.location.href='index.php?acao_menu=gn&facao=atualizar';
				</script>";
			}
        }
                        
        function cadastrarEmpresa(){
            include ("ConectaBD.class.php");
            $con = Conexao::getInstance();
                                    
            $razaoSocial = $_POST['razaoSocial'];
            $nomeFantasia = $_POST['nomeFantasia'];
            $cnpj = $_POST['cnpj'];           
            $inscricaoEstadual = $_POST['inscricaoEstadual'];
            $site = $_POST['enderecoEletronico'];
            $email = $_POST['email'];
            $dddtel = $_POST['dddtel'];
            $fone = $_POST['telefone']; 
            $fax = $_POST['fax'];
            $representanteLegal = $_POST['representanteLegal'];
            $login = $_POST['login'];
            $senha = $_POST['senha'];
            
            $tel = "(".$dddtel.") ".$fone;
            
            $result = $con->consult("select * from empresa where cnpj='$cnpj' and insc_estadual ='$inscricaoEstadual'");
            if (mysqli_num_rows($result) >= 1) {
                echo"<script type='text/javascript'>alert('CNPJ e Inscricao Estadual ja Cadastrados');
				window.location.href='index.php?facao=fcadastrar_empresa';
				</script>";
                
                return 0;
                
            }
            
            //$nome = $_POST['nome'];
            //echo "nome: $nome<br>";
            //echo "idEgresso: $idEgresso <br>";
            //echo "area: $area <br>";
            //echo "curso: $curso <br>";
            //echo "instituicao: $instituicao <br>";
            //echo "campos: $campos <br>";
            //echo "duracao: $duracao <br>";
            //echo "ano: $ano <br>";
            
            
            if(!$con->insert("insert into empresa values (NULL,'$razaoSocial','$nomeFantasia','$cnpj','$inscricaoEstadual','$email','$site','$tel','$fax','$representanteLegal','$login','$senha')")){
				echo"<script type='text/javascript'>alert('Cadastro realizado com sucesso!');
				window.location.href='index.php?facao=ir_principal';
				</script>";
			}else{
                echo"<script type='text/javascript'>alert('N�o foi poss�vel realizar o cadastro');
				window.location.href='index.php?facao=cadastrar_empresa';
				</script>";
			}
        }

        function atualizarEmpresa(){
            include ("ConectaBD.class.php");
            $con = Conexao::getInstance();
                                    
            $id = $_POST["id"];
            $razaoSocial = $_POST['razaoSocial'];
            $nomeFantasia = $_POST['nomeFantasia'];
            $site = $_POST['enderecoEletronico'];
            $email = $_POST['email'];
            $fone = $_POST['telefone']; 
            $fax = $_POST['fax'];
            $representanteLegal = $_POST['representanteLegal'];  
   
    								
            if(!$con->insert("update empresa set razao='$razaoSocial',nomeFantasia='$nomeFantasia',site='$site',email='$email',fone='$fone',fax='$fax',representante='$representanteLegal' where id='$id'")){
				echo"<script type='text/javascript'>alert('Atualizado com sucesso!');
				window.location.href='index.php?facao=altera_dados_empresa';
				</script>";
			}else{
                echo"<script type='text/javascript'>alert('N�o foi poss�vel atualizar os dados');
				window.location.href='index.php?facao=altera_dados_empresa';
				</script>";
			}
        }        
        
} //fim da class



$cUsr = new CUsr();
$acao = $_GET['acao'];
switch ($acao) {
    case "cadastrar_aluno":
        $cUsr->cadastrarAluno();
        break;
    case "cadastrar_curriculum":
        $cUsr->cadastrarDadosGerais();
        break;
    case "cadastrar_formacao":
        $cUsr->cadastrarFormacao();
        break;
    case "cadastrar_formacao2":
        $cUsr->cadastrarFormacao2();
        break;
    case "cadastrar_formacao3":
        $cUsr->cadastrarFormacao3();
        break;
    case "cadastrar_exp":
        $cUsr->cadastrarExp();
        break;
    case "cadastrar_exp2":
        $cUsr->cadastrarExp2();
        break;
    case "cadastrar_exp3":
        $cUsr->cadastrarExp3();
        break;
    case "cadastrar_empresa":
        $cUsr->cadastrarEmpresa();
        break;
    case "atualizar_empresa":
        $cUsr->atualizarEmpresa();
        break;
} //fim do caso


?>