<?php
$db_banco ="ciec_bd";
$db_user = "userciec";
$db_pass = "3gr3ss0";
$host = "localhost";

$conexao = @mysql_connect($host,$db_user,$db_pass);
if (!($conexao)){
    print("<script language=JavaScript>
          alert(\"Não foi possível conectar ao Banco de Dados.\");
          </script>");
	echo $conexao;
    exit;
}

$db = mysql_select_db($db_banco,$conexao) or
    die("<script language=JavaScript>alert(\"Tabela inexistente!\");</script>");    
?>