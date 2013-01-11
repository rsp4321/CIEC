<?php
header("Content-Type: text/html; charset=utf-8",true);
//---------------------------------------------------------------------------------------

require("config.php");

//---------------------------------------------------------------------------------------
$titulo = $_POST['titulo'];
$resumo = $_POST['resumo'];
$texto = $_POST['texto'];

    //insert into area values (null,'$nome')
    
    $sql = mysql_query("INSERT INTO noticias VALUES ( NULL , '$titulo', '$resumo', '$texto', NOW());");
    
    
	if( $sql === FALSE )  {
		echo "<h1>Erro</h1>";
	}else{
		echo "Enviado com Sucesso.";
	}

?>