<?php  
require("bd/classe.banco.php");
define('BD_USER', 'root');  
define('BD_PASS', '');  
define('BD_NAME', 'ciec_bd');  
// conecta ao banco e executa um select no banco de dados
$banco =  new MeuBanco("localhost",BD_USER, BD_PASS, BD_NAME);
$banco->conect();   
?>