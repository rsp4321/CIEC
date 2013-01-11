<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<script type="text/javascript" src="js/jquery.js"></script>
<script type="text/javascript" src="js/jquery.limit-1.2.source.js"></script>
<script type="text/javascript">  
/*
 *
*/
$(document).ready(function(){
	$("#texto").limit("800","#charsLeft");	// limita a quantidade de caracteres do campo.					   
	$(".msg").hide();
	$(".carregando").hide();
	$("#errTitulo").hide();
	$("#errResumo").hide();
	$("#errTexto").hide();
	//
	// validação
	$("#titulo").blur(function(){
		var titulo  = $("#titulo").val();  // recebe o valor do campo nome
		if( titulo == "" || titulo.length < 4 ){
			$("#errTitulo").fadeIn();
		}else{
			$("#errTitulo").fadeOut();
		}
	});
	$("#resumo").blur(function(){
		var resumo  = $("#resumo").val();  // recebe o valor do campo nome
		if( resumo == "" || resumo.length < 4 ){
			$("#errResumo").fadeIn();
		}else{
			$("#errResumo").fadeOut();
		}
	});
	$("#texto").blur(function(){
		var texto  = $("#texto").val();  // recebe o valor do campo nome
		if( texto == "" || texto.length < 5 ){
			$("#errTexto").fadeIn();
		}else{
			$("#errTexto").fadeOut();
		}
	});
	//formulario
	//
	//
	$("#env").click(function(){
		//pegando variaveis
		var titulo = $("#titulo").val();
		var resumo = $("#resumo").val();
		var texto = $("#texto").val();
		//validação
		if( titulo == "" || titulo.length < 4 ){
			$("#errTitulo").fadeIn();
		}else if( resumo == "" || resumo.length < 4 ){
			$("#errResumo").fadeIn();
		}else if( texto == "" || texto.length < 5 ){
			$("#errTexto").fadeIn();
		}else{
			//
			$("#stylized").fadeOut("slow");
			beforeSend: $(".carregando").fadeIn("slow"); // após o envio chamar class carregando
			//
			$.post("form.php", {titulo: titulo, resumo: resumo, texto:texto}, function(pegar_dados){
				complete: $(".carregando").fadeOut("slow"); // após o envio, esconder #carregando
				$(".msg").fadeIn("slow").append(pegar_dados); // mostrar .retorno
				$("#voltar").click(function(){
						$(".msg").fadeOut("slow");
						$("#stylized").fadeIn("slow");
				});
			});
		} //fecha else
	}); //fecha click
 		
});
/*
 *
 *
*/
</script>
<style type="text/css"> @import url(css/style.css); </style>
<style type="text/css">
	body{
		background: url(img/bg_activate.gif) repeat;
	}
</style>
<title>Cadastro de Notícias</title>
</head>

<body>
	<div class="carregando">Carregando <img src="img/ajax-loader.gif" /></div>
    <div class="msg"><a onclick="javascript:document.location.reload();" id="voltar" style="cursor: pointer;">&larr; voltar </a></div>
    
    <div class="spacer3"></div>
	<div id="stylized" class="myform">
		
			<h1>Cadastro de Notícias</h1>
			<p>Formulário para inserção de notícias.</p>

			<label>Título: (50)
			  <span id="errTitulo" class="small">Informe um título!</span>
			</label>
			<input id="titulo" name="titulo" type="text" maxlength="50" />

			<label>Resumo:  (50)
				<span id="errResumo" class="small">Informe um resumo</span>
			</label>
			<input id="resumo" name="resumo" type="text" maxlength="50" />

			<label>Texto:
				<span id="charsLeft" class="small2"></span>
                <span id="errTexto" class="small">Informe um texto</span>
			</label>

			<textarea id="texto" name="texto" cols="25" rows="10"></textarea>

			<button id="env" type="submit">Enviar</button>
			<div class="spacer"></div>
		
	</div>
    <div class="spacer2"></div>
</body>
</html>