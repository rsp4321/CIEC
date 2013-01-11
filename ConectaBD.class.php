<?php
header("Content-type: text/html; charset=utf-8");

class Conexao extends Mysqli{
	private $server ="localhost";
	private $user = "ciec"; //"userciec"
	private $password = "c13c"; //"c13c"
	public $bd = "ciec_bd";
	private $conn;
	static private $instance = null;

	private function __construct(){
		//$this->conn = $this->connect($this->server,$this->bd);
		$this->conn = $this->connect($this->server,$this->user,$this->password,$this->bd);
		if(mysqli_connect_errno()){
		 die("Erro n�: " . mysqli_connect_errno().' --- Entre em contato com o administrador pelo email ifgnu.ifsudestemg@gmail.com para resolver o problema');
		}
	} // end construct

	public function getInstance(){
		if(!isset(self::$instance)){
			self::$instance= new Conexao();
		}// end if
		return Conexao::$instance;
	}// end getInstance


	/**
	 * Rotina para executar uma instrução SQL.
	 *
	 * @param String $sql
	 * 	String contendo a instrução SQL.
	 *
	 * @return mixed
	 * 	
	 */
	function consult ($sql){
		$result = $this->query($sql);
		return $result;
	}// end consult

	function insert($sql){
		//$this->query($sql);
		if(!$this->query($sql)){
			//include('MsgError.php');
			echo"C�digo do erro 111\n Voc� Pode Estar Tentando Cadastrar Dados Repetidos ou n�o Estar Preenchendo Algum Campo";
			echo"<p>
				<a href='javascript:history.go(-1)'>Voltar</a>
				</p><br>";
			die();
		}//end if
	}// end insert

}// end class

$con = Conexao::getInstance();
?>
