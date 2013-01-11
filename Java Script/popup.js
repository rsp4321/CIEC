// JavaScript Document

function listar(cod){
	var w = 500;
	var h = 650;
	var x = (screen.width - w)/2;
	var y = (screen.height - h)/2
	var url ="CPopUpOut.class.php?acao=mostra_dados_interno&cod="+cod+"&titulo=Informações";
	//top = "top="+x;
	//left = "left="+y;
	setings= "height="+h+",width="+w+",top="+y+",left="+x;
	void window.open(url,"dados",setings,"scrollbar=yes");
}//fim da funÃ§Ã£o alterar 

function alterar(cod){
	var w = 800;
	var h = 500;
	var x = (screen.width - w)/2;
	var y = (screen.height - h)/2
	var url ="CPopUpOut.class.php?acao=altera_dados_interno&cod="+cod+"&titulo=Atualizar dados";
	setings= "height="+h+",width="+w+",top="+y+",left="+x;
	void window.open(url,"dados",setings,"location=no");
}//fim da funcao alterar

function ocorrencia(cod){
	var w = 500;
	var h = 400;
	var x = (screen.width - w)/2;
	var y = (screen.height - h)/2
	var url ="CPopUpOut.class.php?acao=gerar_ocorrencia&cod="+cod+"&titulo=Ocorrência";
	setings= "height="+h+",width="+w+",top="+y+",left="+x;
	void window.open(url,"dados",setings,"location=no");
}//fim da funcao alterar

function alterarSetor(cod){
	var w = 400;
	var h = 230;
	var x = (screen.width - w)/2;
	var y = (screen.height - h)/2
	var url ="CPopUpOut.class.php?acao=alterar_setor&cod="+cod+"&titulo=Alterar interno de setor";
	setings= "height="+h+",width="+w+",top="+y+",left="+x;
	void window.open(url,"dados",setings,"location=no");
}//fim da funcao alterarSetor

function cadastrarSerie(cod){
	var w = 400;
	var h = 200;
	var x = (screen.width - w)/2;
	var y = (screen.height - h)/2
	var url ="CPopUpOut.class.php?acao=cadastrar_serie&cod="+cod+"&titulo=Cadastrar série";
	setings= "height="+h+",width="+w+",top="+y+",left="+x;
	void window.open(url,"dados",setings,"location=no");
}//fim

function verOcorrencia(cod){
	var w = 730;
	var h = 600;
	var x = (screen.width - w)/2;
	var y = (screen.height - h)/2
	var url ="CPopUpOut.class.php?acao=ver_ocorrencia&cod="+cod+"&titulo=Ver ocorrências";
	setings= "height="+h+",width="+w+",top="+y+",left="+x;
	void window.open(url,"dados",setings,"location=no");
	
}//fim

function verTodos(){
	var w = 800;
	var h = 600;
	var x = (screen.width - w)/2;
	var y = (screen.height - h)/2
	var url ="vertodos.php?acao=ver_todos";
	setings= "height="+h+",width="+w+",top="+y+",left="+x;
	void window.open(url,"dados",setings,"location=no");
}//fim da funcao alterar