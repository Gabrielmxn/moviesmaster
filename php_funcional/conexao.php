<?php 

class Conexao {
	private $host = "localhost";
	private $dbname = "mistermovie";
	private $usuario = "root";
	private $senha = "";
	
	public function conectar(){
		try {
			$conexao = new PDO("mysql:host=$this->host;dbname=$this->dbname","$this->usuario","$this->senha");
			return $conexao;
		}
		catch(PDOExpeption $e){
			echo '<p>'.$e->getMessege().'</p>';
		}
	}

}	
?>