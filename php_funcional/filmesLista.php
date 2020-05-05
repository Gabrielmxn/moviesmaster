<?php 

class ListaFilmes {
	private $conexao;
	private $idFilmes;
	private $idUsuario;
	private $idStatus;
	private $nomeFilme;

	public function __construct(Conexao $conexao, $idFilmes, $idUsuario, $idStatus, $nomeFilme){
		$this->conexao = $conexao->conectar();
		$this->idFilmes = $idFilmes;
		$this->idUsuario = $idUsuario;
		$this->idStatus = $idStatus;
		$this->nomeFilme = $nomeFilme;
	}

	public function filmeNaLista(){
		try{
			//codigo para inserir o filme. Toda lógica aqui dentro
			$query = "select * FROM usuario_filmes ";
			$query .= "WHERE idFilmes = :idFilme AND idUsuario = :usuario";
			$stmt =  $this->conexao->prepare($query);
			$stmt->bindValue(':usuario', $this->idUsuario);
			$stmt->bindValue(':idFilme', $this->idFilmes);
			$stmt->execute();
			$resultado = $stmt->rowCount();
			//echo "valor do resultado " . $resultado;
			if($resultado !== 0){
				$_SESSION['filmeNaLista'] = 'true';
				header("location:filmeInfo.php?idFilme=$this->idFilmes");
			}
			else{
				$_SESSION['filmeNaLista'] = 'false';
				header("location:filmeInfo.php?idFilme=$this->idFilmes");
				//echo "o filme já está na sua lista";	
			}		
		}	
		catch(PDOExpeption $e){
			echo $e;
		}
	} 
	
	public function inserirFilmes(){
		try{
			$query = "select * FROM usuario_filmes ";
			$query .= "WHERE idFilmes = :idFilme AND idUsuario = :usuario";
			$stmt =  $this->conexao->prepare($query);
			$stmt->bindValue(':usuario', $this->idUsuario);
			$stmt->bindValue(':idFilme', $this->idFilmes);
			$stmt->execute();
			$verificarQuantLinhas = $stmt->rowCount();
			if($verificarQuantLinhas === 0){
				$query = "select * FROM filmes";
				$query .= " WHERE idFilmes = :idDoFilme";
				$stmt =  $this->conexao->prepare($query);
				$stmt->bindValue(':idDoFilme', $this->idFilmes);
				$stmt->execute();
				$verificarQuantLinhas = $stmt->rowCount();
					if($verificarQuantLinhas !== 0){
						$query = "insert into usuario_filmes(idFilmes, idUsuario, idStatus)";
						$query .= "values(:idFilme,:idusuario,:idStatus)";
						$stmt =  $this->conexao->prepare($query);
						$stmt->bindValue(':idFilme', $this->idFilmes);
						$stmt->bindValue(':idusuario', $this->idUsuario);
						$stmt->bindValue(':idStatus', $this->idStatus);
						$stmt->execute();
					}
					else {
						$query = "insert into filmes(idFilmes, nome)";
						$query .= "values(:idFilmes, :tituloFilme)";
						$stmt = $this->conexao->prepare($query);
						$stmt->bindValue(':idFilmes', $this->idFilmes);
						$stmt->bindValue(':tituloFilme', $this->nomeFilme);
						$stmt->execute();

						$query = "insert into usuario_filmes(idFilmes, idUsuario, idStatus)";
						$query .= "values(:idFilme,:idusuario,:idStatus)";
						$stmt = $this->conexao->prepare($query);
						$stmt ->bindValue(':idFilme', $this->idFilmes);
						$stmt ->bindValue(':idusuario', $this->idUsuario);
						$stmt ->bindValue(':idStatus', $this->idStatus);
						$stmt ->execute();					
					}							
			}
			else{
				//echo "o filme já está na sua lista";	
			}		
		}	
		catch(PDOExpeption $e){
			echo $e;
		}
	} 

	public function excluirFilmes(){
		try {
			$query = "delete from usuario_filmes WHERE idFilmes = :idFilme AND idUsuario = :idusuario";
			$stmt =  $this->conexao->prepare($query);
			$stmt->bindValue(':idFilme', $this->idFilmes);
			$stmt->bindValue(':idusuario', $this->idUsuario);
			$stmt->execute();
		}
		catch(PDOExpeption $e){
			echo $e;
		}
	}

	public function recuperarFilmes(){
		$filmes = "";
		try {
			$query = "select * from usuario_filmes WHERE idUsuario = :idusuario";
			$stmt = $this->conexao->prepare($query);
			$stmt ->bindValue(':idusuario', $this->idUsuario);
			$stmt->execute();
			$lista = $stmt->fetchAll(PDO::FETCH_ASSOC);
			foreach ($lista as $key => $value) {
				$filmes .= $value['idFilmes'] . " ";
			} 
			if(!$lista){
				$vazia = "Sua lista está vazia.";
			}else {
				$vazia = "";
			}
			return $filmes;
		}			
		catch(PDOException $e){		
			echo $e;
		}
	}	
}
?>