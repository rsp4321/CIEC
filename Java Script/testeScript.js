var BrowserName  //vari�vel global
	BrowserName = navigator.appName;
	document.write ("Seu browser � " + BrowserName);

function valida (){
	var form = document.formulario; //vari�vel local
	if(form.nome.value ==""){
		alert("Preencha o campo nome!");
		return false;
	}else
	if (form.curso.value =="Selecione"){
		alert("Preencha o campo curso");
		return false;
	}
	return true;
	
}