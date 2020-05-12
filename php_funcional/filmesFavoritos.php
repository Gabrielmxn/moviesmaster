<?php 

class ListaFavoritos {
	private $conexao;
	private $idFilmes;
	private $idUsuario;
	private $nomeFilme;

	public function __construct(Conexao $conexao, $idFilmes, $idUsuario, $nomeFilme){
		$this->conexao = $conexao->conectar();
		$this->idFilmes = $idFilmes;
		$this->idUsuario = $idUsuario;
		$this->nomeFilme = $nomeFilme;
	}

	public function filmeNaListaFavoritos(){
		try{
			//codigo para inserir o filme. Toda lógica aqui dentro
			$query = "select * FROM usuario_favoritos ";
			$query .= "WHERE idFilmes = :idFilme AND idUsuario = :usuario";
			$stmt =  $this->conexao->prepare($query);
			$stmt->bindValue(':usuario', $this->idUsuario);
			$stmt->bindValue(':idFilme', $this->idFilmes);
			$stmt->execute();
			$resultado = $stmt->rowCount();
			//echo "valor do resultado " . $resultado;
			if($resultado !== 0){
				$_SESSION['filmeNaListaFavoritos'] = 'true';
			}
			else{
				$_SESSION['filmeNaListaFavoritos'] = 'false';
				//echo "o filme já está na sua lista";	
			}		
		}	
		catch(PDOExpeption $e){
			echo '<p>'.$e->getMessege().'</p>';
		}
	} 
	
	public function inserirFilmesFavoritos(){
		try{
			$query = "select * FROM usuario_favoritos ";
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
						$query = "insert into usuario_favoritos(idFilmes, idUsuario)";
						$query .= "values(:idFilme,:idusuario)";
						$stmt =  $this->conexao->prepare($query);
						$stmt->bindValue(':idFilme', $this->idFilmes);
						$stmt->bindValue(':idusuario', $this->idUsuario);
						$stmt->execute();
					}
					else {
						$query = "insert into filmes(idFilmes, nome)";
						$query .= "values(:idFilmes, :tituloFilme)";
						$stmt = $this->conexao->prepare($query);
						$stmt->bindValue(':idFilmes', $this->idFilmes);
						$stmt->bindValue(':tituloFilme', $this->nomeFilme);
						$stmt->execute();

						$query = "insert into usuario_favoritos(idFilmes, idUsuario)";
						$query .= "values(:idFilme,:idusuario)";
						$stmt = $this->conexao->prepare($query);
						$stmt ->bindValue(':idFilme', $this->idFilmes);
						$stmt ->bindValue(':idusuario', $this->idUsuario);
						$stmt ->execute();					
					}							
			}
			else{
				//echo "o filme já está na sua lista";	
			}		
		}	
		catch(PDOExpeption $e){
			echo '<p>'.$e->getMessege().'</p>';
		}
	} 

	public function excluirFilmesFavoritos(){
		try {
			$query = "delete from usuario_favoritos WHERE idFilmes = :idFilme AND idUsuario = :idusuario";
			$stmt =  $this->conexao->prepare($query);
			$stmt->bindValue(':idFilme', $this->idFilmes);
			$stmt->bindValue(':idusuario', $this->idUsuario);
			$stmt->execute();
		}
		catch(PDOExpeption $e){
			echo '<p>'.$e->getMessege().'</p>';
		}
	}

	public function recuperarFilmesFavoritos(){
		$filmes = "";
		try {
			$query = "select * from usuario_favoritos WHERE idUsuario = :idusuario";
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
			echo '<p>'.$e->getMessege().'</p>';
		}
	}	
}
?>