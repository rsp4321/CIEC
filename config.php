<?php  
header("Content-Type: text/html; charset=utf-8",true);
require("bd/classe.banco.php");
define('BD_USER', 'userciec');  
define('BD_PASS', '3gr3ss0');  
define('BD_NAME', 'ciec_bd');  
// conecta ao banco e executa um select no banco de dados
$banco =  new MeuBanco("localhost",BD_USER, BD_PASS, BD_NAME);
$banco->conect();   
?>