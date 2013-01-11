<?php
class MeuBanco{
	private $host;
	private $username;
	private $password;
	private $nomeBase;
	private $conexao;
	public $query;
	public $resultadoConsulta;
	
	function __construct($host,$username,$password,$nomeBase){
		$this->host = $host;
		$this->username = $username;
		$this->password = $password;
		$this->nomeBase = $nomeBase;
	}
	function __destruct(){
	   unset($this->host,$this->username,$this->password,$this->nomeBase,$this->conexao,$this->query);
	   mysql_close();
	}
	//gets
	public function getHost(){
	return $this->host;
	}
	public function getUserName(){
	return $this->username;
	}
	public function getPassWord(){
	return $this->password;
	}
	public function getNomeBase(){
	return $this->nomeBase;
	}
	//metodo que conecta no banco 
	function conect(){
		$msg[0] = "<br><strong>Erro:</strong> A conex&atilde;o com o banco falhou!<br>";
		$msg[1] = "<br><strong>Erro:</strong> Nao foi possivel selecionar o banco de dados!<br>";
		// Fazendo a conexão com o servidor MySQL
		$this->conexao = $conexao = mysql_pconnect($this->getHost(),$this->getUserName(),$this->getPassWord()) or die($msg[0]);
		//seleciona base
		mysql_select_db($this->getNomeBase(),$conexao) or die($msg[1]);
	}
	// metodo que faz a consulta no banco
	function setMyQuery($query){
		if($this->conexao and $query){
    		return mysql_query($query,$this->conexao); // metodo que faz e retorna a consulta se houver retorno
		}
		else print("<br>ERRO: faca a consulta");
	}
}
?>