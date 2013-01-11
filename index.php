<?php
header("Content-type: text/html; charset=utf-8");
ob_start();
session_start();
?>
<!DOCTYPE HTML PUBLIC "-//W3C//DTD HTML 4.01 Transitional//EN" "http://www.w3.org/TR/html4/loose.dtd">

<html>
<head>
<script type='text/javascript' src='Java Script/prototype.js'></script>
<script type='text/javascript' src='Java Script/valida.js'></script>
<script type="text/javascript" src="Java Script/ajax.js"></script>
<script type="text/javascript" src="Java Script/validaForm.js"></script>
<script type="text/javascript" src="Java Script/popup.js"></script>
<script type="text/javascript" src="Java Script/mascara.js"></script>
<meta http-equiv="content-type" content="text/html; charset=utf-8">
<meta name="author" content="">
<!-- [if !lt IE 6]<!-->
<style type="text/css" media="screen">
@import url("CSS/style_css.css");

@import url("CSS/menu_style.css");

@import url("CSS/menu_secundario_style.css");

@import url("CSS/style_form.css");

@import url("CSS/BarraDeLog_style.css");
</style>
<!-- <![endif]-->

<!-- [if IE 6]<!-->
<style type="text/css" media="screen">
@import url("ie6.css");
</style>
<!-- <![endif]-->

<title>Sistemas Egressos</title>
</head>

<body>

	<div id="recipiente">
		<div id="cabecalho">

			<img id="ifet" src="cabecalho/cabecalho.png">
		</div>
		<div id="menuPrincipal ">
			<!-- MENU PRINCIPAL AQUI -->
			<?php
			include ("menu/menuPrincipal.php");
			if (isset($_SESSION['nome'])) {
    if ($_SESSION['tipo'] == 0) {
        include ("menu/BarraDeLogAdmin.php");
    } else {
        if ($_SESSION['tipo'] == 1){
            include ("menu/BarraDeLogEgresso.php");
            //include ("menu/BarraDeLogEmpresa.php");

            }else{
                if ($_SESSION['tipo'] == 2){
                    include ("menu/BarraDeLogEmpresa.php");
                    //include ("menu/BarraDeLogEgresso.php");
            }
            }
    }
} else {
    include ("menu/BarraDeLogPrincipal.php");
}



?>
		</div>


		<div id="menu">
			<!-- MENU ESPECIFICO AQUI -->

			<?php
			if (!isset($_SESSION['nome']))
				include ("formularios/FLogin.php");

			switch ($_GET['acao_menu'])
			{
				case 'gerenciar_egresso' :
					include ("menu/menuSecundarioPrincipal.php");
					break;

				case 'pre_cadastrar_aluno' :
					include ("menu/menuSecundarioPrincipal.php");
					break;

				case 'area_curso' :
					include ("menu/menuAtuacao.htm");
					break;

				case 'area' :
					include ("menu/menuAreaAtuacao.htm");
					break;

				case 'curso' :
					include ("menu/menuCursos.htm");
					break;

				case 'instituicao' :
					include ("menu/menuNomesInstituicao.htm");
					break;

				case 'pesquisa_egresso2' :
					include ("formularios/pesquisaEgressoEmpresa.php");
					break;

				case 'pesquisa_egresso_empresa' :
					include ("formularios/pesquisaEgressoEmpresa.php");
					break;

				case 'cadastrarnoticias' :
					include ("formularios/FGerenciaNoticias.php");
					break;

				case 'busca_vagas' :
					include ("formularios/FBuscaVagas.php");
					break;

				case 'gn' :
					include ("formularios/FGerenciaDados.php");
					break;

				case 'empresa' :
					include ("formularios/FGerenciaEmpresa.php");
					break;

				case 'gerencia_vaga' :
					include ("formularios/FGerenciaVagas.php");
					break;
			}
			?>



		</div>

		<div class="conteudo">

			<!-- CONTEUDO AQUI  -->
			<?php

			switch ($_GET['facao'])
			{
				case 'ir_principal' :
					include ("news.html");
					break;
				case 'fcadastrar_aluno' :
					include ("formularios/FCadastroAluno.html");
					break;
				case 'fcadastrar_empresa' :
					include ("formularios/FCadastroEmpresa2.htm");
					break;
				case 'fpre_cadastrar_aluno' :
					include ("formularios/FPreCadastroAluno.php");
					break;
				case 'fcontatos' :
					include ("formularios/Contatos.php");
					break;
				case 'altera_dados' :
					include ("formularios/FAlteraDadosAdmin.php");
					break;
				case 'construcao' :
					include ("construcao.htm");
					break;
				case 'noticias' :
					include ("news.html");
					break;
				case 'curriculo' :
					include ("formularios/FCadastroCurriculumDadosGerais.php");
					break;
				case 'cadastrar_area' :
					include ("formularios/FCadastroArea.php");
					break;
				case 'cadastrar_curso' :
					include ("formularios/FCadastroCurso.php");
					break;
				case 'cadastrar_instituicao' :
					include ("formularios/FCadastroInstituicao.php");
					break;
				case 'cadastrar_formacao' :
					include ("formularios/FCadastroCurriculumFormacao.php");
					break;
				case 'cadastrar_exp' :
					include ("formularios/FCadastroCurriculumExp.php");
					break;
				case 'cadastrar_formacao2' :
					include ("formularios/FCadastroFormacao.php");
					break;
				case 'cadastrar_exp2' :
					include ("formularios/FCadastroExp.php");
					break;
				case 'pesquisar' :
					include ("formularios/ListaPesquisa.php");
					break;
				case 'pesquisar2' :
					include ("formularios/ListaPesquisaUsuarios.php");
					break;
				case 'pesquisa_egresso_empresa' :
					include ("formularios/ListaPesquisaUsuariosArea.php");
					break;
				case 'fdel_cadastro' :
					include ("formularios/FDelCadastroAluno.html");
					break;
				case 'atualizar' :
					include ("formularios/EditaCurriculo.php");
					break;
				case 'altera_dados_empresa' :
					include ("formularios/FAlteraDadosEmpresa.php");
					break;
				case 'alterar_senha' :
					include ("formularios/FAlteraDadosEgresso.htm");
					break;
				case 'altera_senha_empresa' :
					include ("formularios/FAlteraSenhaEmpresa.html");
					break;
				case 'cadastrarnoticias' :
					include ("cadastroNoticias.php");
					break;
				case 'cadastrar_vaga' :
					include ("formularios/FCadastroVaga.php");
					break;
				case 'gerenciarnoticias' :
					include ("formularios/GerenciaNoticias.php");
					break;
				case 'alterarnoticias' :
					include ("formularios/AlteraNoticia.php");
					break;
				case 'bV' :
					include ("formularios/FListaVagas.php");
					break;
				case 'deleta_curso' :
					include ("formularios/FListaCursos.php");
					break;
				case 'deleta_instituicao' :
					include ("formularios/FListaInstituicao.php");
					break;
				case 'deleta_area' :
					include ("formularios/FListaAreas.php");
					break;
				case 'lista_empresa' :
					include ("formularios/FListaEmpresas.php");
					break;
				case 'vagas_empresa' :
					include ("formularios/FListaVagasEmpresas.php");
					break;
				case 'gerenciar_vaga' :
					include ("formularios/FListaVagasEmpresas2.php");
					break;
				case 'alterarvagas' :
					include ("formularios/FAlteraVagas.php");
					break;
				case 'cadastrar_turma' :
					include ("formularios/FCadastroTurma.php");
					break;
				case 'buscar_turma' :
					include ("formularios/FBuscaTurma.php");
					break;
				case 'listar_turma' :
					include ("formularios/FListaTurma.php");
					break;
				case 'quemsomos' :
					include ("formularios/QuemSomos.php");
					break;
			}
			?>
		</div>
		<div id="rodape">
			<div align="center">
				<img src="imagens/logo_ifgnu.png"></img> <img
					src="imagens/logo_pronto.png"></img>
			</div>
		</div>
	</div>

</body>
</html>

