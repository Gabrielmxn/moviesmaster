<?php 
	$dsn = "mysql:host=localhost;dbname=mistermovie";
	$usuario = "root";
	$senha = '';
	$filmes = " ";

	try {
		$conexao = new PDO($dsn, $usuario, $senha);

		$query = "select * from usuario_filmes WHERE idUsuario =" .$id;
		

		$stmt = $conexao->query($query);
	
		$lista = $stmt->fetchAll(PDO::FETCH_ASSOC);

	foreach ($lista as $key => $value) {
			
			$filmes .= $value['idFilmes'] . " ";

			} 

			if(!$lista){
				$vazia = "Sua lista está vazia.";
			}else {
				$vazia = "";
			}

		}

				
	
		
		catch(PDOException $e){
			
		}
?>