<?php
require("config.php");
if( isset($_GET['nid']) ){
	$nid = $_GET['nid']; // id da noticia
	//exclui noticia
	$query = "DELETE FROM `noticias` 
			  WHERE `idnoticias` = '$nid'";
	mysql_query($query);
}
$query = "SELECT  `idnoticias` , `titulo` ,  `resumo` , `texto`, DATE_FORMAT(  `data_post` ,  '%d/%m/%Y %h:%i ' ) AS data 
		  FROM  `noticias`";
//consulta
$consulta = mysql_query($query);
$resultado = mysql_fetch_array($consulta);
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<script language="JavaScript" type="text/javascript">
function excluir(nid){
	decisao = confirm("Você deseja mesmo excluir esta notícia?");
	if (decisao){
    	window.location = "?nid="+nid; // redireciona a página e informa o id da noticia a ser excluida
	} 
}
</script>
<style type="text/css">
	body {
		margin: 0;
		font-family: "Helvetica Neue", Arial, Helvetica, Geneva, sans-serif;
		font-size: 13px;
		line-height: 20px;
		color: #444;
	}
	#wraper{
		margin: 0 auto;
		border: 1px solid #999;
		padding: 10px 5px;
		width: 98%;
		-webkit-border-radius: 8px; /*hacks webkit :: define a borda do video*/
		-moz-border-radius: 8px;	
		-khtml-border-radius: 8px;
		border-radius: 8px;
		-webkit-box-shadow: 1px 1px 2px #999;
		-box-box-shadow: 1px 1px 2px #999;
		-khtml-box-shadow: 1px 1px 2px #999;
		box-shadow: 1px 1px 2px #4b8297;
	}
	.registro{
		width: 1200px;
		border-top: 1px solid #999;
		border-left: 1px solid #999;
		border-right: 1px solid #999;
		border-bottom: 1px solid #999;
		margin: 0 auto;
		padding: 3px;
		display: block;
		clear: both;
		overflow: auto;
	}
	.par{background: #fafafa;}
	.impar{ background: #f2f2fa;}
	.titulo, .data, .resumo, excluir{
		display: inline;
		padding: 0px 5px;
		font-size: 16px;
		text-align: left;
	}
	.data{ width: 100px; font-weight: bold; }
	.titulo{ width: 550px; }
	.resumo{ width: 550px; color:#666; }
	.excluir{ font-weight: bold; border-left: 1px solid #000; float: right; margin: 0px 5px; padding: 0px 5px; cursor: pointer; }
	.spacer3{ clear: both; height: 20px; }
	.highlight { background: #d6fec2 !important; }
</style>
<title>Excluir Notícias</title>
</head>
<body>
		<div class="spacer3"></div>
        <div id="wraper">
		<h2> &raquo; Excluir Notícias</h2>
        <?php
				if($resultado){
					while($resultado = mysql_fetch_array($consulta)){
						if($resultado['idnoticias'] % 2 == 0){
							$class = "par";
						}else{ $class = "impar";}
						echo "<div class=\"registro ".$class."\">";
				        	echo "<span class=\"data\">".$resultado['data']."</span>";
        			    	echo "<span class=\"titulo\">".$resultado['titulo']."</span>";
            				echo "<span class=\"resumo\">".$resultado['resumo']."</span>";
            		    	echo" <span class=\"excluir\"><a onclick=javascript:excluir(".$resultado['idnoticias'].");>excluir</a></span>";
        				echo"</div>";
					}
				}
				else{
					echo "<span class=\"erro\">Não há notícias cadastradas.</span>";
				}
		?>
        </div>
</body>
</html>