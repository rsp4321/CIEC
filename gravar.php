<?php
	header("Content-type: text/html; charset=utf-8",true);
	
	$arquivo = $_POST["nome"];
	$nome = $arquivo.".html";
	$texto = $_POST["texto"];
	$htm = "<html><head><title>".$arquivo."</title></head><body><center><h1>".$arquivo."</h1><br>".$texto."</center><body></html>";
	
	$manipular = fopen("$nome", "a");
	fclose($manipular);
	$manipular = fopen("$nome", "w");

	if(!$manipular) {
		echo "Erro<br /><br />Não foi possível abrir o arquivo.";
	}
	
	if(!fwrite($manipular, $htm)) {
		echo "Erro<br /><br />Não foi possível gravar as informações no arquivo.";
	}
	echo "O texto foi gravado com sucesso!";

	fclose($manipular);
?>
