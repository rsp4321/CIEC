<?php
require("../config.php");
//se a variavel foi definida
if( isset($_GET['function']) ){
	$var = $_GET['function'];
	//seleciona a função 
	switch ( $var){
		case 1:
			getNews();
		    break;
		case 2:
			countNews();
		    break;
		case 3:
			getAllNews();
		    break;
	}
}
function getNews(){
	/* retorna as 5 noticias mais atuais.
	 * ordena em ordem decrescente
	 * formata a data no formato 'dia/mes hora:min'
	 */
	$query =  mysql_query("SELECT  `idnoticias` , `titulo` , `resumo` , DATE_FORMAT(  `data_post` ,  '%d/%m %h:%i' ) AS data 
			  			  FROM  `noticias` 
			              ORDER BY  `data_post` DESC 
						  LIMIT 0 , 5");
	// array que conterá toda a consulta.
	$data = array();
	// pegando todos os registros e passando por json usando um array[]
	while ( $row = mysql_fetch_row($query) ){
  					$data[] = $row;
	}
	echo json_encode($data);
}
function getAllNews(){
	/* retorna as 5 noticias mais atuais.
	 * ordena em ordem decrescente
	 * formata a data no formato 'dia/mes hora:min'
	 */
	$query =  mysql_query("SELECT  `idnoticias` , `titulo` , `resumo` , DATE_FORMAT(  `data_post` ,  '%d/%m %h:%i' ) AS data 
			  			  FROM  `noticias` 
			              ORDER BY  `data_post` DESC");
	// array que conterá toda a consulta.
	$data = array();
	// pegando todos os registros e passando por json usando um array[]
	while ( $row = mysql_fetch_row($query) ){
  					$data[] = $row;
	}
	echo json_encode($data);
}
function countNews(){
	$query = mysql_query("SELECT COUNT(`idnoticias`) FROM  `noticias`");
	$row = mysql_fetch_row($query);
	echo $row[0];
}
function data(){
	$query = "SELECT  `idnoticias` , `titulo` , `resumo` , DATE_FORMAT(  `data_post` ,  '%d/%m %h:%i' ) AS data 
			  			  FROM  `noticias` 
			              ORDER BY  `data_post` DESC ";
	$r = mysql_query($query);		
	 while($resultado = mysql_fetch_array($r)){
		 echo $resultado."<br/>";
	 }				  
}
?>