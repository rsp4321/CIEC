// JavaScript Document
function ajax(){
	var request;
	try{
		request=new XMLHttpRequest();
		return request;
	 }catch(e){
	  	try{
			request = new ActiveXObject("Msxml2.XMLHTTP");
			return request;
			}catch(e){
	   			try{
					request=new ActiveXObject("Microsoft.XMLHTTP");
					return request;
	 			}catch(e){
					alert("Seu broser não da suporte ao AJAX!");
	 				return false;
	 			}//fim do catch
	 		}//fim do catch
	 }//fim do catch
}//fim do método

//busca quarto
function buscaQuarto(setor,tipo){
	request = new ajax();
	var url = "CAjaxResponse.class.php?acao=busca_quarto&setor="+setor+"&tipo="+tipo;
	request.open("GET",url,true);
	request.onreadystatechange = function(){
			if(request.readyState == 1)
				$('saida_quarto').innerHTML = 'Processando...';
				
			if(request.readyState == 4){
				response = request.responseText;
				$('saida_quarto').innerHTML = response;
				}//fim do if
		}//fim da funcao request
		request.send(null);
	}//fim da função

//busca cama
function buscaCama(quarto,tipo){
	//alert(quarto);
	//alert(tipo);
	request = new ajax();
	var url = "CAjaxResponse.class.php?acao=busca_cama&quarto="+quarto+"&tipo="+tipo;
	request.open("GET",url,true);
	request.onreadystatechange = function(){
			if(request.readyState == 1)
				$('saida_cama').innerHTML = 'Processando...';
				
			if(request.readyState == 4){
				response = request.responseText;
				$('saida_cama').innerHTML = response;
				}//fim do if
		}//fim da funcao request
		request.send(null);
	}//fim da função


function buscaCurso(cod){
	if(cod.charAt(2)==0){
		codCurso = cod.charAt(3);
	}else{
		codCurso = cod.charAt(2) + cod.charAt(3);
	}//fim do else
	//alert(codCurso);
	request = new ajax();
	var url = "CAjaxResponse.class.php?acao=busca_curso&cod_curso="+codCurso;
	request.open("GET",url,true);
	request.onreadystatechange = function(){
			if(request.readyState == 1)
				$('curso_tec').innerHTML = 'Processando...';
				
			if(request.readyState == 4){
				response = request.responseText;
				$('curso_tec').innerHTML = response;
				}//fim do if
		}//fim da funcao request
		request.send(null);
	}//fim da funcao

function numQuartos(qnt){
	//alert(qnt);
	if($('setor').value == ""){
		alert("Preencha o campo setor");
		$('setor').focus();
		return false;
		}
	request = new ajax();
	setor = $('setor').value;
	var url ="CAjaxResponse.class.php?acao=qntQuartos&qnt="+qnt+"&setor="+setor;
	request.open("GET",url,true);
	request.onreadystatechange = function() {
	    if(request.readyState == 1) {
			$('saida_quarto').innerHTML = 'Processando...';
	    }//fim do if
	
		if(request.readyState == 4 && request.status == 200) {
			response = request.responseText;
			$('saida_quarto').innerHTML = response;
		}//fim do if
	}//fim do request
	request.send(null);
}//fim da funcao

//busca interno
function buscaInterno(valor,tipo){
	request = new ajax();
	var url ="CAjaxResponse.class.php?acao="+tipo+"&valor="+valor;
	request.open("GET",url,true);
	request.onreadystatechange = function() {
	    if(request.readyState == 1) {
			$('saida_busca').innerHTML = 'Processando...';
	    }//fim do if
	
		if(request.readyState == 4) {
			response = request.responseText;
			$('saida_busca').innerHTML = response;
		}//fim do if
	}//fim do request
	request.send(null);
}//fim da função

function alteraDados(){
	alert('teste');
}//fim da funcao


//buscar interno pela cama
function buscaPorCama(valor,tipo){
	//alert(valor);
	//alert(tipo);
	request = new ajax();
	var url ="CAjaxResponse.class.php?acao="+tipo+"&valor="+valor;
	request.open("GET",url,true);
	request.onreadystatechange = function() {
	    if(request.readyState == 1) {
			$('saida_aluno').innerHTML = 'Processando...';
	    }//fim do if
	
		if(request.readyState == 4) {
			response = request.responseText;
			$('saida_aluno').innerHTML = response;
		}//fim do if
	}//fim do request
	request.send(null);
}//fim da função busca por cama


//busca bloco
function buscaBloco(cod){
	//alert(cod);
	request = new ajax();
	var url ="CAjaxResponse.class.php?acao=busca_bloco&cod="+cod;
	request.open("GET",url,true);
	request.onreadystatechange = function() {
	    if(request.readyState == 1) {
			$('saida_bloco').innerHTML = 'Processando...';
	    }//fim do if
	
		if(request.readyState == 4) {
			response = request.responseText;
			$('saida_bloco').innerHTML = response;
		}//fim do if
	}//fim do request
	request.send(null);
}//fim da funcao busca bloco
	
	
