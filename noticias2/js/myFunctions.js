// JavaScript Document

$(function(){
	// chama a função contadora de caracteres
	$("#texto").limit("400","#charsLeft");
	$("#env").click(function(){
		$("#stylized").fadeOut();
	})
});
