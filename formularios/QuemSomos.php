<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml" xml:lang="en" lang="en">

<head>
	<meta http-equiv="content-type" content="text/html; charset=iso-8859-1" />
	<meta name="author" content="FreeUser" />
	<title>Quem Somos</title>
</head>

<body>
<div id="info">
<center>
<?php
	include ("conexao.php");
	$sql = "SELECT nome, quemsomos, email FROM dados_ciec";
	$res = mysql_query($sql,$conexao);
	$dados = mysql_fetch_array($res);
?>
<h3 ><div id="tituloContato">Quem Somos:</div></h3>

<span id="t"> <?php echo $dados["quemsomos"];?></span><br><br/> 
<br>
<br><br>
Endereço: <br>
IF Sudeste MG – Campus Rio Pomba<br>

AV. Doutor José Sebastião da Paixão, s/N <br>
Bairro Lindo Vale<br>
Rio Pomba - MG - 36180-000 <br><br />

E-mail: <?php echo " ".$dados["email"];?></br></br>
</center>
</div>
</body>
</html>