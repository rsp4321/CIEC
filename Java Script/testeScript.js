var BrowserName  //variável global
	BrowserName = navigator.appName;
	document.write ("Seu browser é " + BrowserName);

function valida (){
	var form = document.formulario; //variável local
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