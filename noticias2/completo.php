<?php
require("config.php");
require("functions.php");
$nid = $_GET['nid']; // id da noticia
	// consulta a noticia solicitada na base usando o id como paramentro.
	$query = "SELECT * FROM noticias WHERE idnoticias = '$nid' ORDER BY  `data_post` DESC ";
              
              //select * from ex_aluno where cpf = '$cpf'
	//consulta
	$consulta = mysql_query($query);
	$resultado = mysql_fetch_array($consulta);
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title><?php echo $resultado['titulo']."<br/>";?></title>
<style type="text/css"> @import url(css/style.css); </style>
<style type="text/css">
	body{
		background: url(img/bg_activate.gif) repeat;
	}
	#wraper{
		margin: 0 auto;
		border: 1px solid #999;
		width: 80%;
		-webkit-border-radius: 8px; /*hacks webkit :: define a borda do video*/
		-moz-border-radius: 8px;	
		-khtml-border-radius: 8px;
		border-radius: 8px;
		-webkit-box-shadow: 1px 1px 2px #999;
		-box-box-shadow: 1px 1px 2px #999;
		-khtml-box-shadow: 1px 1px 2px #999;
		box-shadow: 1px 1px 2px #4b8297;
	}
	#noticia{
		width: 97.8%;
		display: table;
		border: 1px solid #fff;
		background: #fff;
		padding: 10px;
		-webkit-border-radius: 8px; /*hacks webkit :: define a borda do video*/
		-moz-border-radius: 8px;	
		-khtml-border-radius: 8px;
		border-radius: 8px;
	}
	.completo-titulo{
		font-size: 30px;
		font-weight: bold;
		text-transform: capitalize;
		display: block;
		color: #27252d;
		margin: 10px 0;

	}
	.sub-titulo{
		font-size: 15px;
		font-weight: 400;
		text-transform: capitalize;
		display: block;
		margin: 15px 0px 25px 0px;
		color: #444;
	}
	.texto{
		font-size: 15px;
		text-indent: 15px;
		display: block;
		
	}
	.erro{
		font-size: 30px;
		font-weight: bold;
		text-align: center;
		color: #27252d;
		margin-bottom: 10px;
		margin-left: 10px;
	}
</style>
</head>

<body>
	<div class="spacer3"></div>
    <div id="wraper">
		<div id="noticia">
			<?php
				if($resultado){
					echo "<small>".$resultado['data']."<small>";
			 		echo "<span class=\"completo-titulo\">".$resultado['titulo']."</span>";
			 		echo "<span class=\"sub-titulo\">".$resultado['resumo']."</span>";
			 		echo "<span class=\"texto\">".$resultado['texto']."</span>";
				}
				else{
					echo "<img src=\"img/smile_sad.png\" /><span class=\"erro\">404 - Ops! Notícia não encontrada.</span>";
				}
			?>
		</div>
    </div>
</body>
</html>