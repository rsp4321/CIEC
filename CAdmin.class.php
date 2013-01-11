<?php
	header("Content-type:text/html; Charset=utf-8",true);

	class CAdmin{
		private $con;
		
		function __construct(){
			include("ConectaBD.class.php");
			$this->con = Conexao::getInstance();
		}//fim do construtor
		
		function fazLogout(){
			session_start();
			session_unset();
			session_destroy();
			echo "<script type='text/javascript'>window.location.href='index.php'</script>";
		}//fim do faz logout
		
		//LOGIN
		function fazLogin()
    {
        $login = $_POST['login'];
        //$senha = md5($_POST['senha']);
        $senha = $_POST['senha'];
        $tipo = $_POST['tipo'];
       //echo "<script type='text/javascript'>alert('TIPO de usu�rio= $tipo');</script>";

        if ($tipo == 0) {
            $result = $this->con->consult("select * from admin where login='$login' and senha ='$senha'");

            if (mysqli_num_rows($result) == 1) {
                //if(1==1){
                session_start();
                $obj = $result->fetch_assoc();
                $_SESSION['tipo'] = 0;
                $_SESSION['aid'] = $obj['aid'];
                $_SESSION['nome'] = $obj['nome'];
                $_SESSION['login'] = $obj['login'];
                $_SESSION['senha'] = $obj['senha'];
                $_SESSION['np'] = $obj['np'];
                $_SESSION['sistema'] = $obj['sistema'];
                echo "<script type='text/javascript'>window.location.href='index.php'</script>";
            } else {
                echo "<script type='text/javascript'>alert('Login ou Senha inv�lido');
					window.location.href='index.php';
				</script>";
            } //fim do else
        } else {
            if ($tipo == 1) {
                $result = $this->con->consult("select * from ex_aluno where login='$login' and senha ='$senha'");

                if (mysqli_num_rows($result) == 1) {
                    //if(1==1){
                    session_start();
                    $obj = $result->fetch_assoc();
                    $_SESSION['tipo'] = 1;
                    $_SESSION['ex_aluno_id'] = $obj['ex_aluno_id'];
                    $_SESSION['nome'] = $obj['nome'];
                    $_SESSION['login'] = $obj['login'];
                    $_SESSION['senha'] = $obj['senha'];
                    $_SESSION['cpf'] = $obj['cpf'];
                    $_SESSION['email'] = $obj['email'];
                    $_SESSION['np'] = $obj['np'];
                    $_SESSION['sistema'] = $obj['sistema'];
                    $cpf = $_SESSION['cpf'];
                    $ex_aluno_id =  $_SESSION['ex_aluno_id'];
                    
                    //echo "<script type='text/javascript'>alert('ID: $ex_aluno_id')</script>";
                    
                    $result2 = $this->con->consult("SELECT * FROM endereco WHERE eid = (SELECT eid FROM pessoa_endereco WHERE ex_aluno_id =(SELECT ex_aluno_id FROM ex_aluno WHERE cpf = '$cpf'))");
                    if (mysqli_num_rows($result2) == 1) {
                      
                    $obj = $result2->fetch_assoc();
                    $_SESSION['rua'] =$obj['logradouro'];
                    $_SESSION['num'] = $obj['num'];
                    $_SESSION['complemento'] = $obj['complemento'];
                    $_SESSION['bairro'] = $obj['bairro'];
                    $_SESSION['cidade'] = $obj['cidade'];
                    $_SESSION['estado'] = $obj['estado'];
                    $_SESSION['cep'] = $obj['cep'];
                    $rua = $_SESSION['rua'];
                    }
                    //echo "<script type='text/javascript'>alert(RUA:'$rua')</script>";                    
                    echo "<script type='text/javascript'>window.location.href='index.php'</script>";
                } else {
                    echo "<script type='text/javascript'>alert('Login ou Senha inv�lido');
	                        window.location.href='index.php';
			             	</script>";
                }
            } else {
                if ($tipo == 2) {
                    $result = $this->con->consult("select * from empresa where login='$login' and senha ='$senha'");

                    if (mysqli_num_rows($result) == 1) {
                        //if(1==1){
                        session_start();
                        $_SESSION['tipo'] = 2;
                        $obj = $result->fetch_assoc();
                        $_SESSION['aid'] = $obj['id'];
                        $_SESSION['razao'] = $obj['razao'];
                        $_SESSION['nome'] = $obj['nomeFantasia'];
                        $_SESSION['cnpj'] = $obj['cnpj'];
                        $_SESSION['insc_estadual'] = $obj['insc_estadual'];
                        $_SESSION['login'] = $obj['login'];
                        $_SESSION['senha'] = $obj['senha'];
                        $_SESSION['np'] = $obj['np'];
                        $_SESSION['sistema'] = $obj['sistema'];
                        echo "<script type='text/javascript'>window.location.href='index.php'</script>";
                    } else {
                        echo "<script type='text/javascript'>alert('Login ou Senha inv�lido');
	                                window.location.href='index.php';
			                     	</script>";

                    } //fim do else
                } else {
                    echo "<script type='text/javascript'>alert('Selecione um TIPO de usu�rio');
	                                window.location.href='index.php';
			                     	</script>";
                }
            }
        }
    }//Pre Cadastro		
		function preCadastroAluno(){
			$nome = $_POST['nome'];
			$cpf = $_POST['cpf'];
			$anoform = $_POST["anoform"];
			$nome= $_POST["nome"];
			$cpf = $_POST["cpf"];
			$curso = $_POST["curso"];
			
			//echo $nome . $cpf;
			if($this->con->insert("insert into ex_aluno values (null,'$nome','$cpf',null,null,null,'0')")){
				echo"<script type='text/javascript'>alert('Erro ao Cadastrar');
					window.location.href='index.php?facao=fpre_cadastrar_aluno';
				</script>";			
			}      
			else
			{
				$result = $this->con->consult("select ex_aluno_id from ex_aluno where cpf = '$cpf'");
				$linha = $result->fetch_array();
				$id = $linha['ex_aluno_id'];
				
				if(!$this->con->insert("INSERT INTO curso_egresso (`id_egresso`, `curso`, `anoformacao`) VALUES ('$id', '$curso', '$anoform')")){
				echo"<script type='text/javascript'>alert('Cadastro realizado com sucesso');
					window.location.href='index.php?acao_menu=pre_cadastrar_aluno&facao=fpre_cadastrar_aluno';
					</script>";                
				}else{
					echo"<script type='text/javascript'>alert('N�o foi poss�vel Cadastrar a Turma');
					window.location.href='index.php?acao_menu=pre_cadastrar_aluno&facao=fpre_cadastrar_aluno';
					</script>";
				}
			}	
			
			
		}//fim da função precadastro aluno

            function alteraDados(){

                    $login = $_POST['login'];
                    $senha = $_POST['senha'];
                    $result = $this->con->consult("select * from admin where login='$login' and senha ='$senha'");

                    if(mysqli_num_rows($result) == 1){
                        $login = $_POST['login'];
						$senha = $_POST['senha'];
                        //$nvlogin = $_POST['nvlogin'];
						$nvsenha = $_POST['nvsenha'];
			//echo $nome . $cpf;
					if(!$this->con->insert("update admin set senha=$nvsenha where login='$login'")){
						echo "<script type='text/javascript'>alert('Senha Alterada com Sucesso!!!');
						window.location.href='index.php?facao=altera_dados';
						</script>";
					}				
					}else{
						echo"<script type='text/javascript'>alert('Login ou Senha Inv�lido');
						window.location.href='index.php?facao=altera_dados';
						</script>";
					}//fim do else
                       
		}
        
        
        function alteraDadosEgresso(){

                    $login = $_POST['login'];
                    $senha = $_POST['senha'];
                    $result = $this->con->consult("select * from ex_aluno where login='$login' and senha ='$senha'");

                    if(mysqli_num_rows($result) == 1){

                    $login = $_POST['login'];
                    $senha = $_POST['senha'];
                    //$nvlogin = $_POST['nvlogin'];
                    $nvsenha = $_POST['nvsenha'];
			//echo $nome . $cpf;
			if(!$this->con->insert("update ex_aluno set senha=$nvsenha where login='$login'")){
				echo "<script type='text/javascript'>alert('Senha Alterada com Sucesso!!!');
					window.location.href='index.php';
				</script>";
			}				
			}else{
				echo"<script type='text/javascript'>alert('Login ou Senha Inv�lido');
					window.location.href='index.php';
				</script>";
			}//fim do else
                       
		}
        
        function alteraSenhaEmpresa(){

                    $login = $_POST['login'];
                    $senha = $_POST['senha'];
                    $result = $this->con->consult("select * from empresa where login='$login' and senha ='$senha'");

                    if(mysqli_num_rows($result) == 1){

                    $login = $_POST['login'];
                    $senha = $_POST['senha'];
                    //$nvlogin = $_POST['nvlogin'];
                    $nvsenha = $_POST['nvsenha'];
			//echo $nome . $cpf;
			if(!$this->con->insert("update empresa set senha=$nvsenha where login='$login'")){
				echo "<script type='text/javascript'>alert('Login e Senha Alterados com Sucesso!!!');
					window.location.href='index.php';
				</script>";
			}				
			}else{
				echo"<script type='text/javascript'>alert('Login ou Senha Inv�lido');
					window.location.href='index.php';
				</script>";
			}//fim do else
                       
		}
        
        function alteraNoticia(){

                    $idnoticia = $_POST['id'];
                    $titulo = $_POST['titulo'];
					$resumo = $_POST['resumo'];
					$texto = $_POST['texto'];
                    
			if(!$this->con->insert("update noticias set titulo='$titulo', resumo='$resumo', texto='$texto' where idnoticias='$idnoticia'")){
				echo "<script type='text/javascript'>alert('Noticia Alterada com Sucesso!!! :)');
					window.location.href='index.php';
				</script>";
			}else{
				echo "<script type='text/javascript'>alert('Noticia n�o Alterada! :(');
					window.location.href='javascript:history.go(-1);';
				</script>";
			}		
			
			}                      
		
        
        function cadastraArea(){
			$nome = $_POST['nome'];

			if(!$this->con->insert("insert into area values (null,'$nome')")){
				echo"<script type='text/javascript'>alert('Cadastro realizado com sucesso');
					window.location.href='index.php?facao=cadastrar_area&acao_menu=area';
				</script>";
			}else{
				echo"<script type='text/javascript'>alert('N�o foi poss�vel realizar o cadastro');
					window.location.href='index.php?facao=cadastrar_area';
				</script>";
			}
		}

        function cadastraCurso(){
                        $nome = $_POST['nome'];
                        $area = $_POST['area'];
						$instituicao = $_POST['instituicao'];
			
			if(!$this->con->insert("insert into curso values (null,'$area','$nome','$instituicao')")){
				echo"<script type='text/javascript'>alert('Cadastro realizado com sucesso');
					window.location.href='index.php?facao=cadastrar_curso&acao_menu=curso';
				</script>";

                
			}else{
				echo"<script type='text/javascript'>alert('N�o foi poss�vel realizar o cadastro');
					window.location.href='index.php?facao=cadastrar_curso';
				</script>";
			}
		}
		
        function cadastraInstituicao(){
                        $nome = $_POST['nome'];
                        
			if(!$this->con->insert("insert into instituicao values (null,'$nome')")){
				echo"<script type='text/javascript'>alert('Cadastro realizado com sucesso');
					window.location.href='index.php?facao=cadastrar_instituicao&acao_menu=instituicao';
				</script>";

                
			}else{
				echo"<script type='text/javascript'>alert('N�o foi poss�vel realizar o cadastro');
					window.location.href='index.php?facao=cadastrar_instituicao';
				</script>";
			}
		} 
			
	function cadastrarTurma(){		
		$cont = 0;
		$anoform = $_POST["anoform"];
		$nome[0] = $_POST["nome0"];
		$cpf[0] = $_POST["cpf0"];
		$tamanho = $_POST["tamanho"];
		$curso = $_POST["curso"];
		//echo "curso: $curso - Ano: $anoform";
		
		for ($i = 0; $i<=$tamanho; $i++){
			$nome[$i] = $_POST["nome$i"];
			$cpf[$i] = $_POST["cpf$i"];	

			if($nome[$i] == ""){
				break;
			}
			$cont++;
		}
		
		$texto = "INSERT INTO ex_aluno(nome,cpf,cadastrado) values ('$nome[0]', '$cpf[0]','0')";
		
		for ($i=1; $i<$cont; $i++){
			$texto = $texto.",('$nome[$i]', '$cpf[$i]','0')";
		}

		if($this->con->insert($texto)){
				echo"<script type='text/javascript'>alert('Error ao Cadastrar');
					window.location.href='index.php?facao=cadastrar_turma&acao_menu=pre_cadastrar_aluno';
				</script>";                
		}else
		{
			$result = $this->con->consult("select ex_aluno_id from ex_aluno where cpf = '$cpf[0]'");
			$linha = $result->fetch_array();
			$id = $linha['ex_aluno_id'];
			$texto = "INSERT INTO curso_egresso (`id_egresso`, `curso`, `anoformacao`) VALUES ('$id', '$curso', '$anoform')";
			for ($i=1; $i<$cont; $i++){
				$result = $this->con->consult("select ex_aluno_id from ex_aluno where cpf = '$cpf[$i]'");
				$linha = $result->fetch_array();
				$id = $linha['ex_aluno_id'];
				$texto = $texto.",('$id', '$curso', '$anoform')";
			}
			//echo $texto;
			if(!$this->con->insert($texto)){
				echo"<script type='text/javascript'>alert('Cadastro realizado com sucesso');
					window.location.href='index.php?facao=cadastrar_turma&acao_menu=pre_cadastrar_aluno';
				</script>";                
			}else{
				echo"<script type='text/javascript'>alert('N�o foi poss�vel Cadastrar a Turma');
					window.location.href='index.php?facao=cadastrar_turma&acao_menu=pre_cadastrar_aluno';
				</script>";
			}

		}
   

	}
		
        function pesquisaEgresso(){
            
            session_start();
            $_SESSION['busca'] = $_POST['busca'];
            $teste = $_SESSION['busca'];
            echo("<script type='text/javascript'>window.location.href='index.php?acao_menu=gerenciar_egresso&facao=pesquisar';</script>");
        }
        
        function pesquisaEgresso2(){
            
            session_start();
            $_SESSION['busca'] = $_POST['busca'];
            $teste = $_SESSION['busca'];
            echo("<script type='text/javascript'>window.location.href='index.php?acao_menu=pesquisa_egresso2&facao=pesquisar2';</script>");
        }
        
        function pesquisaPorArea(){
            
            session_start();
            $_SESSION['area'] = $_POST['area'];
            $teste = $_SESSION['busca'];
            echo("<script type='text/javascript'>window.location.href='index.php?acao_menu=pesquisa_egresso2&facao=pesquisa_egresso_empresa';</script>");
        }
        
        function buscaVagas(){
            $area = $_POST["area"];
            echo("<script type='text/javascript'>window.location.href='index.php?acao_menu=busca_vagas&facao=bV&area=$area';</script>");
        }
        
                
        function cadastarVaga(){      
            
            $id = $_POST["id"];
            $local = $_POST["local"];
            $area = $_POST["area"];
            $curso = $_POST["curso"];
            $quant = $_POST["vagas"];
            $desc = $_POST["atuacao"];
            $obs = $_POST["atividade"];
            $contatos = $_POST["contato"];
            $responsavel = $_POST["responsavel"];
            
            //echo "Entrou: $id<br>$tipo<br>$local<br>$area<br>$curso<br>$quant<br>$desc<br>$obs<br>$contatos<br>$responsavel";
            
            if(!$this->con->insert("insert into vagas values (null,'$id','$local','$area','$curso','$quant','$desc','$obs','$contatos','$responsavel')")){            
                echo("<script type='text/javascript'>alert('Cadastro Realizado com Sucesso!!! :)'); window.location.href='index.php?acao_menu=gerencia_vaga&facao=cadastrar_vaga';</script>");
            }else{
                echo("<script type='text/javascript'>alert('ERROR! Nao Cadastrado! :(') window.location.href='history.go(-1)';</script>");
            }
        }
        
        function atualizaVagas(){      
            
            $id = $_POST["id"];
            $idemp = $_POST["idemp"];
            $local = $_POST["local"];
            $area = $_POST["area"];
            $curso = $_POST["curso"];
            $quant = $_POST["vagas"];
            $desc = $_POST["atuacao"];
            $obs = $_POST["atividade"];
            $contatos = $_POST["contato"];
            $responsavel = $_POST["responsavel"];
            
            //echo "Entrou: id:$id<br>$idemp<br>$local<br>$area<br>$curso<br>$quant<br>$desc<br>$obs<br>$contatos<br>$responsavel";
            //id_empresa	local	area	curso	quant	desc_atuacao	obs	contatos	responsavel
            if(!$this->con->insert("update vagas set id_empresa='$idemp',local='$local',area='$area',curso='$curso',quant='$quant',desc_atuacao='$desc',obs='$obs',contatos='$contatos',responsavel='$responsavel' where id='$id'")){            
                echo("<script type='text/javascript'>alert('Atualizado com Sucesso!!! :)'); window.location.href='index.php?acao_menu=gerencia_vaga';</script>");
            }else{
                echo("<script type='text/javascript'>alert('ERROR! Nao Cadastrado! :(') window.location.href='history.go(-1)';</script>");
            }
        }
        function del_cadastro(){

            $cpf = $_POST['cpf'];            
            $result = $this->con->consult("select * from ex_aluno where cpf = '$cpf'");
            while($linha = $result->fetch_array())
            {
                $cadastrado = $linha['cadastrado'];
            }
            if($cadastrado == 0){
				$result = $this->con->consult("select ex_aluno_id from ex_aluno where cpf = '$cpf'");
				$linha = $result->fetch_array();
				$id = $linha['ex_aluno_id'];
				if(!$this->con->insert("DELETE FROM curso_egresso WHERE curso_egresso.id_egresso =  '$id'")){
					if(!$this->con->insert("delete from ex_aluno where ex_aluno.cpf = '$cpf'"))
					{
						echo("<script type='text/javascript'>alert('Deletado com Sucesso!'); window.location.href='index.php?acao_menu=gerenciar_egresso&facao=pesquisar';</script>");
					}
				}
            }
			else{
                echo("<script type='text/javascript'>alert('Este Egresso j� possui dados cadastrados!'); window.location.href='index.php?acao_menu=gerenciar_egresso&facao=fdel_cadastro';</script>");
                }
        

	}//fim da classe
	
	function deletaNoticia(){
		$idnoticias = $_GET["idnoticias"];
		if(!$this->con->insert("delete from noticias where noticias.idnoticias = '$idnoticias'"))
                {
                    echo("<script type='text/javascript'>alert('Deletado com Sucesso!'); window.location.href='index.php?acao_menu=cadastrarnoticias&facao=gerenciarnoticias';</script>");
                }            
			else{
                echo("<script type='text/javascript'>alert('Error ao Excluir!!!'); window.location.href='index.php?acao_menu=cadastrarnoticias&facao=gerenciarnoticias';</script>");
                }
	}
    
   	function excluirFormacao(){   	    
		$idform = $_GET["idformacao"];
        //echo $idform;
		if(!$this->con->insert("delete from formacao where formacao.id = '$idform'"))
                {
                    echo("<script type='text/javascript'>alert('Deletado com Sucesso!'); window.location.href='index.php?acao_menu=gn&facao=atualizar';</script>");
                }            
			else{
                echo("<script type='text/javascript'>alert('Error ao Excluir!!!'); window.location.href='index.php?acao_menu=gn&facao=atualizar';</script>");
                }
	}
    
    function excluirExperiencia(){   	    
		$idexp = $_GET["idexp"];
        //echo $idform;
		if(!$this->con->insert("delete from experiencia where experiencia.id = '$idexp'"))
                {
                    echo("<script type='text/javascript'>alert('Deletado com Sucesso!'); window.location.href='index.php?acao_menu=gn&facao=atualizar';</script>");
                }            
			else{
                echo("<script type='text/javascript'>alert('Error ao Excluir!!!'); window.location.href='index.php?acao_menu=gn&facao=atualizar';</script>");
                }
	}
    
   	function excluirArea(){
		$idarea = $_GET["idarea"];
		if(!$this->con->insert("delete from area where area.id = '$idarea'"))
                {
                    echo("<script type='text/javascript'>alert('Deletado com Sucesso!'); window.location.href='index.php?acao_menu=area&facao=deleta_area';</script>");
                }            
			else{
                echo("<script type='text/javascript'>alert('Error ao Excluir!!!'); window.location.href='index.php?acao_menu=area&facao=deleta_area';</script>");
                }
	}
    
    function excluirCurso(){
		$idcurso = $_GET["idcurso"];
		if(!$this->con->insert("delete from curso where curso.cid = '$idcurso'"))
                {
                    echo("<script type='text/javascript'>alert('Deletado com Sucesso!'); window.location.href='index.php?acao_menu=curso&facao=deleta_curso';</script>");
                }            
		else{
                echo("<script type='text/javascript'>alert('Error ao Excluir!!!'); window.location.href='index.php?acao_menu=curso&facao=deleta_curso';</script>");
                }
	}
    
	function excluirInstituicao(){
		$id = $_GET["id"];
		if(!$this->con->insert("delete from instituicao where instituicao.id = '$id'"))
                {
                    echo("<script type='text/javascript'>alert('Deletado com Sucesso!'); window.location.href='index.php?acao_menu=instituicao&facao=deleta_instituicao';</script>");
                }            
			else{
					echo("<script type='text/javascript'>alert('Error ao Excluir!!!'); window.location.href='index.php?acao_menu=instituicao&facao=deleta_instituicao';</script>");
                }
	}
    
	function excluirVagas(){
		$idvaga = $_GET["idvaga"];
		if(!$this->con->insert("delete from vagas where vagas.id = '$idvaga'"))
                {
                    echo("<script type='text/javascript'>alert('Deletado com Sucesso!'); window.location.href='index.php?acao_menu=gerencia_vaga&facao=gerenciar_vaga';</script>");
                }            
			else{
                echo("<script type='text/javascript'>alert('Error ao Excluir!!!'); window.location.href='index.php?acao_menu=gerencia_vaga&facao=gerenciar_vaga';</script>");
                }
	}
	
	function atualizaDados(){

        $nome = $_POST['nome'];
        $fone = $_POST['fone'];
		$fax = $_POST['fax'];
        $email = $_POST['email'];
		$quemsomos = $_POST['quemsomos'];
		/*echo "$nome<br>
        $fone<br>
		$fax<br>
        $email<br>
		$quemsomos";*/
		
		if(!$this->con->insert("update dados_ciec set nome='$nome', fone='$fone', fax='$fax', email='$email', quemsomos='$quemsomos'")){
			echo "<script type='text/javascript'>alert('Alterado com Sucesso!!!');
				window.location.href='index.php?facao=altera_dados';
			</script>";
		}				
		else{
			echo"<script type='text/javascript'>alert('Falha ao Alterar');
				window.location.href='index.php?facao=altera_dados';
			</script>";
		}
	}

    
    function atualizaInformacao(){
            
            $id = $_POST['id'];
            $nome = $_POST["nome"];
            $data_nasc = $_POST["data_nasc"];
            $estado_civil = $_POST["estado_civil"];
            $telefone = $_POST["telefone"];
            $celular = $_POST["celular"];
            $email = $_POST["email"];
            $rua = $_POST["rua"];
            $num = $_POST["num"];
            $comp = $_POST["comp"];
            $bairro = $_POST["bairro"];
            $cidade = $_POST["cidade"];
            $estado = $_POST["estado"];
            $cep = $_POST["cep"];
            $numFormacao = $_POST["numFormacao"];
            $habilitacao = $_POST["habilitacao"];
            $numExp = $_POST["numExp"];
            
            for($i=0; $i<$numFormacao; $i++){
            	$idform[$i]=$_POST["idform$i"];
                $curso[$i] = $_POST["curso$i"];
                $instituicao[$i] = $_POST["instituicao$i"];
                $campus[$i] = $_POST["campus$i"];
                $duracao[$i] = $_POST["duracao$i"];
                $ano_formacao[$i] = $_POST["ano_formacao$i"];
                
                /*echo $idform[$i]."<br>";
                echo $curso[$i]."<br>";
                echo $instituicao[$i]."<br>";
                echo $campus[$i]."<br>";
                echo $duracao[$i]."<br>";
                echo $ano_formacao[$i]."<br>";*/
            }
            
            for($i=0; $i<$numExp; $i++){
            	$idexp[$i]=$_POST["idemp$i"];
                $empresa[$i] = $_POST["empresa$i"];
                $emailempresa[$i] = $_POST["emailempresa$i"];
                $foneempresa[$i] = $_POST["foneempresa$i"];
                $data_inicial[$i] = $_POST["data_inicial$i"];
                $data_final[$i] = $_POST["data_final$i"]; 
                $cargo[$i] = $_POST["cargo$i"];
                $atividades[$i] = $_POST["atividades$i"];
                
                /*echo $idexp[$i]."<br>";
                echo $empresa[$i]."<br>";
                echo $emailempresa[$i]."<br>";
                echo $foneempresa[$i]."<br>";
                echo $data_inicial[$i]."<br>";
                echo $data_final[$i]."<br>"; 
                echo $cargo[$i]."<br>";
                echo $atividades[$i]."<br>";*/
            }
            
            $numInfo = $_POST["numInfo"];
            $info = $_POST["info"];
			$interesse = $_POST["interesse"];
            $areainteresse = $_POST["areainteresse"];
            
			//echo "$numInfo<br>$info<br>$interesse<br>$areainteresse";
            
            if($this->con->insert("update  ex_aluno set nome='$nome', email='$email' where ex_aluno_id	='$id'")){
				echo "<script type='text/javascript'>alert('Erro ao atualizar os Dados Gerais');
					window.location.href='index.php?acao_menu=atualizar&facao=atualizar';
				</script>";
                }
			//echo "Primeiro if";
            if($this->con->insert("update endereco set logradouro='$rua', num='$num', complemento ='$comp', bairro='$bairro', cidade='$cidade', estado='$estado',cep='$cep' where eid = (SELECT eid FROM pessoa_endereco where ex_aluno_id = '$id')")){
				echo "<script type='text/javascript'>alert('Erro ao atualizar Endereco');window.location.href='index.php?acao_menu=atualizar&facao=atualizar';</script>";
                }
            //echo "Segundo if";
            if($this->con->insert("update  dados_gerais set data_nasc='$data_nasc', estado_civil='$estado_civil', habilitacao='$habilitacao', telefone='$telefone', celular='$celular' where id_egresso = '$id'")){
				echo "<script type='text/javascript'>alert('Erro ao atualizar os Dados Gerais');window.location.href='index.php?acao_menu=atualizar&facao=atualizar';</script>";
                }  
			//echo "Terceiro if";   
                
            if($numInfo>=1){
                if($this->con->insert("update informacoes set info='$info', interesse='$interesse', areainteresse='$areainteresse' where id_egresso='$id'")){
				echo "<script type='text/javascript'>alert('Falha ao atualizar INFORMA��ES!');
					window.location.href='index.php?acao_menu=atualizar&facao=atualizar';
				</script>";
                }
                }else{
					//echo "Terceiro if - else";   
                    if($this->con->insert("insert into informacoes values(null, '$id', '$info','$interesse','$areainteresse')")){
				    echo "<script type='text/javascript'>alert('Falha ao salvar INFORMA��ES!');
					window.location.href='index.php';
				    </script>";
                    }
            }
			//echo "Quarto if";
                          
            for($i=0; $i<$numExp; $i++){            
             if($this->con->insert("update  experiencia set empresa='$empresa[$i]', email='$emailempresa[$i]', telefone='$foneempresa[$i]', data_inicial='$data_inicial[$i]', data_final='$data_final[$i]', cargo='$cargo[$i]', atividades='$atividades[$i]' where id_egresso = '$id' and id='$idexp[$i]'")){
				echo "<script type='text/javascript'>alert('Erro ao atualizar Forma��o $i');window.location.href='index.php?acao_menu=atualizar&facao=atualizar';</script>";
                }               
			}
			//echo "Quinto if";
			for($i=0; $i<$numFormacao; $i++){                
                if($this->con->insert("update  formacao set instituicao='$instituicao[$i]', campus='$campus[$i]', duracao ='$duracao[$i]', ano_formacao ='$ano_formacao[$i]' where id_egresso = '$id' and id = '$idform[$i]'")){
				echo "<script type='text/javascript'>alert('Erro ao atualizar Experiencia $i');window.location.href='index.php?acao_menu=atualizar&facao=atualizar';</script>";
                } 
            }
            //echo "Sexto if";
            echo "<script type='text/javascript'>alert('SUCESSO!!!');window.location.href='index.php'</script>";
        }
    
    
    }
	$cAdmin = new CAdmin();
	$acao = $_GET['acao'];
	switch($acao){
		case "pre_cadastro":
			$cAdmin->preCadastroAluno();	
			break;
		case "login":
			$cAdmin->fazLogin();
			break;	
		case "logout":	
			$cAdmin->fazLogout();
			break;
        case "altera_dados":
			$cAdmin->alteraDados();
			break;
        case "cadastrar_area":
			$cAdmin->cadastraArea();
			break;
        case "cadastrar_curso":
			$cAdmin->cadastraCurso();
			break;
        case "cadastrar_instituicao":
			$cAdmin->cadastraInstituicao();
			break;		
		case "pesquisa":
            $cAdmin->pesquisaEgresso();
            break;
         case "pesquisa2":
            $cAdmin->pesquisaEgresso2();
            break;
        case "del_cadastro":
            $cAdmin->del_cadastro();
            break;
        case "informacoes_egressos":
            $cAdmin->informacoesEgressos();
            break;
        case "atualizaInformacao":
            $cAdmin->atualizaInformacao();
            break;    
        case "altera_dados_egresso":
            $cAdmin->alteraDadosEgresso();
            break;  
        case "altera_senha_empresa":
            $cAdmin->alteraSenhaEmpresa();
            break;
        case "pesquisa_por_area":
            $cAdmin->pesquisaPorArea();
            break;  
        case "cadastrar_vaga":
            $cAdmin->cadastarVaga();
            break;      
        case "alterar_noticia":
            $cAdmin->alteraNoticia();
            break;
		case "excluir_noticia":
            $cAdmin->deletaNoticia();
            break;
        case "busca_vagas":
            $cAdmin->buscaVagas();
            break;
        case "curriculo":
            $cAdmin->cadastraCurriculo();
            break;
        case "excluir_formacao":
            $cAdmin->excluirFormacao();
            break;
        case "excluir_exp":
            $cAdmin->excluirExperiencia();
            break;
        case "excluir_area":
            $cAdmin->excluirArea();
            break;
		case "excluir_curso":
            $cAdmin->excluirCurso();
            break;
        case "excluir_instituicao":
            $cAdmin->excluirInstituicao();
            break;
		case "excluir_vagas":
            $cAdmin->excluirVagas();
            break;
        case "atualiza_vaga":
            $cAdmin->atualizaVagas();
            break;
		case "cadastrar_turma":
            $cAdmin->cadastrarTurma();
            break;
		case "atualiza_dados":
            $cAdmin->atualizaDados();
            break;
        }//fim do caso
?>
